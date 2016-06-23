<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\DoctorAsk;
use Auth;
use DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\GoalHWeightRequest;

class HealthController extends Controller {
	public function getRate() {
		$re = DB::select ( 'select DISTINCT * from heartrates where userid = ? order by time desc limit 1000', [ 
				Auth::user ()->id 
		] );
		$rate = [ ];
		$time = [ ];
		foreach ( $re as $r ) {
			$rate [] = $r->rate;
			$time [] = $r->time;
		}
		return view ( 'health.rate', [ 
				'name' => Auth::user ()->name,
				'rate' => array_reverse ( $rate ),
				'time' => array_reverse ( $time ) 
		] );
	}
	public function postSleep(Request $req) {
		$this->validate ( $req, [ 
				'date' => 'required' 
		] );
		
		$re = DB::select ( 'select * from sleeps where userid = ? order by date desc limit 10', [ 
				Auth::user ()->id 
		] );
		$deep = [ ];
		$light = [ ];
		$total = [ ];
		$date = [ ];
		
		foreach ( $re as $r ) {
			$deep [] = round ( $r->deep / 3600, 1 );
			$light [] = round ( $r->light / 3600, 1 );
			$total [] = round ( $r->asleep / 3600, 1 );
			$date [] = $r->date;
		}
		
		$re = DB::select ( 'select * from sleeps where userid = ? and date = ?', [ 
				Auth::user ()->id,
				$req->date 
		] );
		return view ( 'health.sleep', [ 
				'name' => Auth::user ()->name,
				'deep' => array_reverse ( $deep ),
				'light' => array_reverse ( $light ),
				'total' => array_reverse ( $total ),
				'date' => array_reverse ( $date ),
				'info' => $re 
		] );
	}
	public function getSleep() {
		$re = DB::select ( 'select * from sleeps where userid = ? order by date desc limit 10', [ 
				Auth::user ()->id 
		] );
		$deep = [ ];
		$light = [ ];
		$total = [ ];
		$date = [ ];
		
		foreach ( $re as $r ) {
			$deep [] = round ( $r->deep / 3600, 1 );
			$light [] = round ( $r->light / 3600, 1 );
			$total [] = round ( $r->asleep / 3600, 1 );
			$date [] = $r->date;
		}
		
		$info = DB::select ( 'select * from sleeps where userid = ? order by date desc limit 1', [ 
				Auth::user ()->id 
		] );
		
		return view ( 'health.sleep', [ 
				'name' => Auth::user ()->name,
				'deep' => array_reverse ( $deep ),
				'light' => array_reverse ( $light ),
				'total' => array_reverse ( $total ),
				'date' => array_reverse ( $date ),
				'info' => $info 
		]
		 );
	}
	public function postModifyGoal(GoalHWeightRequest $req) {
		if ($req->height != '') {
			DB::update ( 'update goals set height = ? where userid = ?', [ 
					( float ) $req->height,
					Auth::user ()->id 
			] );
		}
		if ($req->weight != '') {
			DB::update ( 'update goals set weight = ? where userid = ?', [ 
					( float ) $req->weight,
					Auth::user ()->id 
			] );
		}
		
		return Redirect::to ( '/health' );
	}
	public function getSuggestionDelete($sugid) {
		DB::delete ( 'delete from doctor_advices where id = ?', [ 
				$sugid 
		] );
		
		return Redirect::to ( '/health/suggestion' );
	}
	public function getSuggestionAsk() {
		$da = new DoctorAsk ();
		$da->userid = Auth::user ()->id;
		$da->save ();
		
		return Redirect::to ( '/health/suggestion' );
	}
	public function getSuggestion() {
		$results = DB::select ( 'select doctor_advices.id,users.nickname,doctor_advices.content
				from doctor_advices join users
				on doctor_advices.docid = users.id
				where userid = ?', [ 
				Auth::user ()->id 
		] );
		
		$hasAsked = DB::select ( 'select * from doctor_asks where userid = ?', [ 
				Auth::user ()->id 
		] );
		
		return view ( 'health.suggestion', [ 
				'suggestions' => $results,
				'hasAsked' => count ( $hasAsked ) 
		] );
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		// 目标！
		$goals = DB::select ( 'select * from goals where userid = ?', [
				Auth::user ()->id
		] );
		$goalheight = $goals [0]->height;
		$goalweight = $goals [0]->weight;
		
		
		// 当前！
		$now = DB::select ( 'select * from bodydatas where userid = ? order by date DESC limit 1', [ 
				Auth::user ()->id 
		] );
		if(count($now)!=0){
			$height = $now [0]->height;
			$weight = $now [0]->weight;
			$bmi = round(10000*$now [0]->bmi,2);
		}else{
			$height = $goalheight;
			$weight = $goalweight;
			$bmi = round($weight/(($height/100)*($height/100)),2);
		}
		
		// 体重变化
		$date = [];
		$weights = [];
		$result = DB::select ( 'select * from bodydatas where userid = ? order by date DESC limit 30', [ 
				Auth::user ()->id 
		] );
		
		if(count($result)!=0){
			foreach ($result as $r)
			{
				$date[] = $r->date;
				$weights[] = (float)$r->weight;
			}
			
		}else{
			$date[] = '2015-12-06';
			$weights[] = 0;
		}
		
		
		
		return view ( 'health.index', [ 
				'height' => $height,
				'weight' => $weight,
				'bmi' => $bmi,
				'goalheight' => $goalheight,
				'goalweight' => $goalweight,
				'dates' => array_reverse($date),
				'weights' => array_reverse($weights),
		]
		 );
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request        	
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param int $id        	
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id        	
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request        	
	 * @param int $id        	
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id        	
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
