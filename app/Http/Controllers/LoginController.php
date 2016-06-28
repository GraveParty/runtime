<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller {
	
	
	public function getLogout()
	{
		Auth::logout();
		return Redirect::to('/');
	}
	
	
	public function postLogin(Request $req) 

	{
		if (Auth::attempt ( array (
				'email' => Input::get ( 'email' ),
				'password' => Input::get ( 'password' ) 
		) )) {
			
			$type = Auth::user()->type;
			if($type==2){ // 教练
				return Redirect::to ( '/coach/export' )->with ( 'message', '成功登录' );
			}else if($type==3){  //医生
				return Redirect::to ( '/doctor' )->with ( 'message', '成功登录' );
			}else if($type==9){  //管理员
				return Redirect::to ( '/admin' )->with ( 'message', '成功登录' );
			}else{  //普通用户
				return Redirect::to ( '/exercise' )->with ( 'message', '成功登录' );
			}
			
		} else {
			return Redirect::to ( '/login' )->with ( 'message', '用户名密码不正确' )->withInput ();
		}
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
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
