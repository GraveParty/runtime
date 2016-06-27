<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CoachAdvice;
use App\Http\Requests\AdviceRequest;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use DB;

class CoachController extends Controller {
	public function getExport() {
		$results = DB::select ( 'select * from coach_asks' );
		$id = [ ];
		$nickname = [ ];
		$bmi = [ ];
		$bodyfat = [ ];
		$rate = [ ];
		foreach ( $results as $r ) {
			$id [] = $r->userid;
			$temp = DB::select ( 'select users.nickname,bodydatas.bmi,bodydatas.bodyfat
					from users join bodydatas on users.id=bodydatas.userid
					where users.id = ? order by bodydatas.date DESC limit 1', [ 
					$r->userid 
			] );
			if (count ( $temp ) != 0) {
				$nickname [] = $temp [0]->nickname;
				$bmi [] = 10000 * $temp [0]->bmi;
				$bodyfat [] = $temp [0]->bodyfat;
				$temp = DB::select ( 'select avg(heartrates.rate)as avg
					from users join heartrates on users.id=heartrates.userid
					where users.id = ? order by heartrates.time DESC limit 200', [ 
						$r->userid 
				] );
				$rate [] = $temp [0]->avg;
			} else {
				$temp = DB::select ( 'select nickname from users where users.id = ? ', [ 
						$r->userid 
				] );
				$nickname [] = $temp [0]->nickname;
				$bmi [] = '暂无数据';
				$bodyfat [] = '暂无数据';
				$rate [] = '暂无数据';
			}
		}
		$oneDayRecipe = array(0=>"主题：针对中年人<br/>早餐：西红柿炒鸡蛋<br/>午餐：红烧肉<br/>晚餐：不吃了",
				1=>"主题：针对老年人<br/>早餐：牛奶豆浆<br/>午餐：面包炒蛋<br/>晚餐：披萨",
				2=>"主题：针对青年人<br/>早餐：乐视薯片<br/>午餐：牛肉棒<br/>晚餐：饺子");
// 		$oneDayRecipe = [ ];
		
		return view ( 'coach.export', [ 
				'oneDayRecipes' => $oneDayRecipe,
				'ids' => $id,
				'nicknames' => $nickname,
				'bmis' => $bmi,
				'bodyfats' => $bodyfat,
				'rates' => $rate
		] );
	}
	public function postAdviceIn(AdviceRequest $request) {
		if ($request->hasFile ( 'inputFile' )) {
			$file = $request->file ( 'inputFile' );
			
			$result = Excel::load ( $file, function ($reader) {
			} )->get ();
			
			foreach ( $result as $row ) {
				$ca = new CoachAdvice ();
				$ca->coachid = Auth::user ()->id;
				$ca->userid = $row ['id'];
				
				DB::delete ( 'delete from coach_asks where userid = ?', [ 
						$ca->userid 
				] );
				
				$ca->content = $row ['content'];
				
				$ca->save ();
			}
			return Redirect::to ( '/coach' );
		} else {
			return Redirect::to ( '/coach' );
		}
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view ( 'coach.index' );
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
