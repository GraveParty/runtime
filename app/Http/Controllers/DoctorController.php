<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\DoctorAdvice;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AdviceRequest;
use DB;

class DoctorController extends Controller {
	
	
	
	
	public function getExport()
	{
		$results = DB::select('select * from doctor_asks');
		$id = [];
		$nickname = [];
		$bmi = [];
		$bodyfat = [];
		$rate = [];
		foreach ($results as $r)
		{
			$id[] = $r->userid;
			$temp = DB::select('select users.nickname,bodydatas.bmi,bodydatas.bodyfat 
					from users join bodydatas on users.id=bodydatas.userid 
					where users.id = ? order by bodydatas.date DESC limit 1',[$r->userid]);
			if(count($temp)!=0){
				$nickname[] = $temp[0]->nickname;
				$bmi[] = 10000 * $temp[0]->bmi;
				$bodyfat[] = $temp[0]->bodyfat;
				$temp = DB::select('select avg(heartrates.rate)as avg
					from users join heartrates on users.id=heartrates.userid
					where users.id = ? order by heartrates.time DESC limit 200',[$r->userid]);
				$rate[] = $temp[0]->avg;
			}else{
				$temp = DB::select('select nickname from users where users.id = ? ',[$r->userid]);
				$nickname[] = $temp[0]->nickname;
				$bmi[] = '暂无数据';
				$bodyfat[] = '暂无数据';
				$rate[] = '暂无数据';
			}
		}
		
		return view('doctor.export',[
				'ids'=>$id,
				'nicknames'=>$nickname,
				'bmis'=>$bmi,
				'bodyfats'=>$bodyfat,
				'rates'=>$rate]);
	}
	
	
	
	public function postAdviceIn(AdviceRequest $request) {
		if ($request->hasFile ( 'inputFile' )) {
			$file = $request->file ( 'inputFile' );
			
			$result = Excel::load ( $file, function ($reader) {
			} )->get ();
			
			// for($i=0;$i<count($result);$i++)
			// {
			// $da = new DoctorAdvice();
			// $da->docid = Auth::user()->id;
			// $da->userid = $result[$i][0];
			// $da->content = $result[$i][1];
			
			// $da->save();
			// }
			
			
			foreach ($result as $row){
			$da = new DoctorAdvice();
			$da->docid = Auth::user()->id;
			$da->userid = $row['id'];
			
			DB::delete('delete from doctor_asks where userid = ?',[$da->userid]);
			
			$da->content = $row['content'];
			
			$da->save();
			
			}
			return Redirect::to ( '/doctor' );
			
		} else {
			return Redirect::to ( '/doctor' );
		}
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view ( 'doctor.index' );
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
