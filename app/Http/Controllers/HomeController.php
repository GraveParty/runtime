<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Heartrate;
use App\Goal;
use App\Move;
use App\Sleep;
use App\Bodydata;
use DB;
use Auth;

ini_set('max_execution_time','0');

class HomeController extends Controller
{
	

	public function getTestData()
	{
		$this->readHeartrates();
// 		$this->readGoals();
// 		$this->readMoves();
// 		$this->readSleeps();
// 		$this->readBodydatas();
		
		return redirect('/home');
// 		return 'success';
	}
	
	public function home(){
		
		//获得总数据
		$results = DB::select('select count(distinct date)as days,ifnull(sum(km),0)as kms,
    			ifnull(sum(calory),0)as calories
    			from moves where userid = ?', [Auth::user()->id]);
		
		$days = $results[0]->days;
		$calories = $results[0]->calories;
		$km = $results[0]->kms;
		
		$results = DB::select('select count(distinct userid)as num from moves');
		$userNum = $results[0]->num;
		
		$results = DB::select('select userid,count(distinct date)as num from moves 
				group by userid order by count(distinct date)ASC ');
		$count = 0;
		foreach ($results as $r)
		{
			if($r->userid==Auth::user()->id)
			{
				break;
			}
			$count++;
				
		}
		$dayexcess = round(100*$count/$userNum,2);
		
		$results = DB::select('select userid,ifnull(sum(km),0)as kms from moves
				group by userid order by kms ASC ');
		$count = 0;
		foreach ($results as $r)
		{
			if($r->userid==Auth::user()->id)
			{
				break;
			}
			$count++;
		
		}
		$kmexcess = round(100*$count/$userNum,2);
		
		$results = DB::select('select userid,ifnull(sum(calory),0)as calories from moves
				group by userid order by calories ASC ');
		$count = 0;
		foreach ($results as $r)
		{
			if($r->userid==Auth::user()->id)
			{
				break;
			}
			$count++;
		
		}
		$caloryexcess = round(100*$count/$userNum,2);
		
		return view('home',[
				'days'=>$days,
				'calories'=>$calories,
				'km'=>$km,
				'dayexcess'=>$dayexcess,
				'kmexcess'=>$kmexcess,
				'caloryexcess'=>$caloryexcess,
				
		]);
		
	}
	
	public function login(){
		return view('login');
	}
	
	public function register(){
		return view('register');
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    
    public function readHeartrates() {
    	$xml = simplexml_load_file("heartrates.xml");
    
    	foreach ($xml as $key => $value) { //遍历数组
    		$userid=$value->userid;
    		$time=$value->time;
    		$rate = $value->rate;
    
    		$h = new Heartrate();
    		$h->userid = $userid;
    		$h->time = $time;
    		$h->rate = $rate;
    		$h->save();
    
    	}
    	return "success";
    
    }
    
    public function readGoals() {
    	$xml = simplexml_load_file("goals.xml");
    
    	foreach ($xml as $key => $value) { //遍历数组
    		$g = new Goal();
    		$g->userid = $value->userid;
    		$g->step = $value->step;
    		$g->weight = $value->weight;
    		$g->height = $value->height;
    		$g->save();
    
    	}
    	return "success";
    }
    
    public function readMoves() {
    	$xml = simplexml_load_file("moves.xml");
    
    	foreach ($xml as $key => $value) { //遍历数组
    		$m = new Move();
    		$m->userid = $value->userid;
    		$m->date = $value->date;
    		$m->km = $value->km;
    		$m->step = $value->step;
    		$m->calory = $value->calory;
    		$m->save();
    
    	}
    	return "success";
    }
    
    public function readSleeps() {
    	$xml = simplexml_load_file("sleeps.xml");
    
    	foreach ($xml as $key => $value) { //遍历数组
    		$s = new Sleep();
    		$s->userid = $value->userid;
    		$s->date = $value->date;
    		$s->awake = $value->awake;
    		$s->asleep = $value->asleep;
    		$s->light = $value->light;
    		$s->deep = $value->deep;
    		$s->start = $value->start;
    		$s->end = $value->end;
    		$s->save();
    
    	}
    	return "success";
    }
    
    public function readBodydatas() {
    	$xml = simplexml_load_file("bodydatas.xml");
    
    	foreach ($xml as $key => $value) { //遍历数组
    		$b = new Bodydata();
    		$b->userid = $value->userid;
    		$b->date = $value->date;
    		$b->weight = $value->weight;
    		$b->height = $value->height;
    		$b->bodyfat = $value->bodyfat;
    		$b->bmi = $value->bmi;
    		$b->save();
    
    	}
    	return "success";
    }
    
    
}
