<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\PersonalModifyRequest;
use Auth;
use DB;
use App\Http\Requests\PasswordModifyRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
	
	public function getModifyPassword()
	{
		return view('personal.password');
	}
	
	public function postModifyPassword(PasswordModifyRequest $req)
	{
		$result = DB::select('select * from users where userid = ?', [Auth::user()->id])->first();
		
		if(Hash::make($req->password) == $result->password){
			DB::update('update users set password = ? where id = ?', [Hash::make($req->get('newpassword')),Auth::user()->id]);
		}
		
		return redirect('/personal/password');
	}
	
	
	public function postModify(PersonalModifyRequest $req){
		
		$id = Auth::user()->id;
		
		DB::update('update users set nickname = ? where id = ?', [$req->get('nickname'),$id]);
		DB::update('update users set tel = ? where id = ?', [$req->get('tel'),$id]);
		
		$s = '';
		if($req->get('sex')==1){
			$s = '男';
		}else{
			$s = '女';
		}
		DB::update('update users set sex = ? where id = ?', [$s,$id]);
		
		return redirect('/personal');
		
	}
	
	public function getModify()
	{
		return view('personal.modify');
	}
	
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('personal.index');
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
