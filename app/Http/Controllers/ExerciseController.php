<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Auth;
use DB;
use Illuminate\Support\Facades\Redirect;
use App\CoachAsk;
use App\Http\Requests\ExerciseGoalRequest;
use App\Goal;

class ExerciseController extends Controller
{


	
	public function postGoal(ExerciseGoalRequest $req)
	{
		$step = $req->step;
		
		$res = DB::select('select * from goals where userid = ?', [Auth::user()->id]);
		
		if(count($res)!=0){
			DB::update('update goals set step = ? where userid = ?',[$step,Auth::user()->id]);
		}else{
			$g = new Goal();
			$g->userid = Auth::user()->id;
			$g->step = $step;
			$g->weight = 60;
			$g->height = 170;
			$g->save();
		}
		
		return Redirect::to ( '/exercise/goal' );
	}
	
	public function getGoal()
	{
		$res = DB::select('select * from goals where userid = ?', [Auth::user()->id]);
		$goalstep = 0;
		if(count($res)!=0){
			$goalstep = $res[0]->step;
		}else{
			$g = new Goal();
			$g->userid = Auth::user()->id;
			$g->step = 0;
			$g->weight = 60;
			$g->height = 170;
			$g->save();
		}
		
		return view('exercise.goal',['goalstep' => $goalstep]);
	}
	
	
	public function getSuggestionDelete($sugid)
	{
		DB::update('update coach_asks set state = 1 where id = ?',[$sugid]);
		
		return Redirect::to ( '/exercise/suggestion' );
	}
	
	
	public function getSuggestionAsk(Request $req)
	{
		$ca = new CoachAsk();
		$ca->userid = Auth::user()->id;
		$ca->title = $req->title;
		$ca->content = $req->content;
		$ca->kind= $req->kind;
		$ca->coachid= $req->coachid;
		$ca->state=0 ;
		$ca->save();
		
		return Redirect::to ( '/exercise/suggestion' );
	}
	
	public function getCoachList(){
		$result = DB::select('select * from users where type =2');
		return view('exercise.suggestion',['coachlist'=> $result]);
	}
	
	public function getSuggestion()
	{
		$results = DB::select('select replies.id,users.nickname,replies.reply,replies.question_id,replies.created_at as addate,coach_asks.title,coach_asks.content as ask_content,coach_asks.state,coach_asks.kind,coach_asks.created_at as asdate
				from replies join users join coach_asks
				on replies.question_id = coach_asks.id and replies.coach_id = users.id
				where replies.user_id = ?', [Auth::user()->id]);
		
		$hasAsked = DB::select('select * from coach_asks where userid = ? and state = 0', [Auth::user()->id]);
		$result = DB::select('select * from users where type =2');

		return view('exercise.suggestion',['suggestions' => $results,'hasAsked' => count($hasAsked),'coachlist'=> $result,'notAnswered'=> $hasAsked]);
	}
	
	public function postHistory(Request $req)
	{
		$date = $req->date;
// 		return $date;
		
		return redirect()->action('ExerciseController@getHistory', [$date]);
	}
	
	public function getHistory($date = '2015-12')
	{
		
		$results = DB::select('select * from moves where date like ? and userid = ?', [$date.'%',Auth::user()->id]);
		
		return view('exercise.history',['datas' => $results]);
// 		return $date;
	}
	
	public function postChart(Request $req)
	{
		$year = $req->date;
		
		return redirect()->action('ExerciseController@getChart', [$year]);
	}
	
	public function getChart($year = '2015')
	{
		$steps = [];
		$kms = [];
		$calories = [];
		for($i=1;$i<=12;$i++)
		{
			$res = [];
			if($i<10){
				$res = DB::select('select ifnull(sum(step),0)as steps,ifnull(sum(km),0)as kms,ifnull(sum(calory),0)as calories 
						from moves where date like ? and userid = ?', [$year.'-0'.$i.'%',Auth::user()->id]);
			}else{
				$res = DB::select('select ifnull(sum(step),0)as steps,ifnull(sum(km),0)as kms,ifnull(sum(calory),0)as calories
						from moves where date like ? and userid = ?', [$year.'-'.$i.'%',Auth::user()->id]);
			}
			$steps[] = (int)$res[0]->steps;
			$kms[] = (float)$res[0]->kms;
			$calories[] = (float)$res[0]->calories;
		}
		
		
		$stepstr = implode(',',$steps);
		$kmstr = implode(',',$kms);
		$caloriesstr = implode(',',$calories);
		
		return view('exercise.chart',['steps'=>$stepstr,'kms'=>$kmstr,'calories'=>$caloriesstr]);

// 		return $calories;
		
	}
	
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	//计算百分比
    	$result = DB::select('select * from goals where userid = ?', [Auth::user()->id]);
    	if(count($result)==0){
    		$goalStep = 100000;
    	}else{
    		$goalStep = $result[0]->step;
    	}
    	
    	$month = '2015-12';
    	$results = DB::select('select ifnull(sum(step),0)as steps 
    			from moves where date like ? and userid = ?', [$month.'%',Auth::user()->id]);
    	$steps = $results[0]->steps;
    	$percent = round($steps/$goalStep * 100,2);
    	
    	//获得总数据
    	$results = DB::select('select count(distinct date)as days,ifnull(sum(km),0)as kms,
    			ifnull(sum(calory),0)as calories
    			from moves where userid = ?', [Auth::user()->id]);
    	
    	$days = $results[0]->days;
    	$calories = $results[0]->calories;
    	$km = $results[0]->kms;
    	
//     	return $steps;
    	
        return view('exercise.index',['percent'=>$percent,'days'=>$days,'calories'=>$calories,'km'=>$km]);
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
}
