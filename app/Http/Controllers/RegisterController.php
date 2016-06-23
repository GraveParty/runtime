<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use App\Goal;
use DB;

class RegisterController extends Controller
{
	
	public function postRegister(RegisterRequest $req)
	{
// 		$input = $req->all();
		$email = $req->get('email');
		$user = new User();
		$user->email = $req->get('email');
		$user->password = Hash::make($req->get('password'));
		$user->nickname = $req->get('nickname');
		$user->tel = $req->get('tel');
		
		$s = $req->get('sex');
		if($s==1){
			$user->sex = '男';
		}else{
			$user->sex = '女';
		}
		$user->type = $req->get('type');
		$user->save();
		
		//设置目标
		$res = DB::select('select * from users where email = ?', [$req->get('email')]);
		$g = new Goal();
		$g->userid = $res[0]->id;
		$g->step = 10000;
		$g->weight = 50.0;
		$g->height = 160.0;
		$g->save();
		
// 		return $user;
		return redirect('/login');
	}
	
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
