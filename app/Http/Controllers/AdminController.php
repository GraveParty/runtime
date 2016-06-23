<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\UserModifyRequest;
use App\User;
use App\Http\Requests\NewActivityRequest;
use App\Activity;

class AdminController extends Controller
{
	
	public function adminActivity()
	{

		$result = DB::select('select * from activities');
		 
		return view('admin.activity',['activities' => $result]);
	}
	
	public function deleteActivity($acid)
	{
	
		DB::delete('delete from activities where id = ?',[$acid]);
		return redirect('/admin/activity');
	
	}
	
	public function getActivityModify($id)
	{
	
		$ac = DB::table('activities')->where('id', $id)->first();
		return view('admin.modifyActivity',['activity' => $ac]);
	
	}
	
	public function postActivityModify(NewActivityRequest $req)
	{
		
		$id = $req->get('id');
		
		DB::update('update activities set title = ? where id = ?', [$req->get('title'),$id]);
		DB::update('update activities set introduction = ? where id = ?', [$req->get('introduction'),$id]);
		DB::update('update activities set start = ? where id = ?', [$req->get('start'),$id]);
		DB::update('update activities set end = ? where id = ?', [$req->get('end'),$id]);
		
		return redirect('/admin/activity');
	
	}
	
	public function newActivity()
	{
		return view('admin.newactivity');
	}
	
	public function postNewActivity(NewActivityRequest $req)
	{
		$ac = new Activity();
		$ac->title = $req->get('title');
		$ac->introduction = $req->get('introduction');
		$ac->start = $req->get('start');
		$ac->end = $req->get('end');
		$ac->image = '';
		$ac->save();
		
		return redirect('/admin/activity');
		
	}
	
	public function postUserModify(UserModifyRequest $req)
	{
		
		$email = $req->get('email');
		
		$s = $req->get('sex');
		$sex = '';
		if($s==1){
			$sex = '男';
		}else{
			$sex = '女';
		}
		
		if(!nullOrEmptyString($req->get('password'))){
			DB::update('update users set password = ? where email = ?', [Hash::make($req->get('password')),$email]);
		}
		
		DB::update('update users set nickname = ? where email = ?', [$req->get('nickname'),$email]);
		DB::update('update users set sex = ? where email = ?', [$sex,$email]);
		DB::update('update users set tel = ? where email = ?', [$req->get('tel'),$email]);
		DB::update('update users set type = ? where email = ?', [$req->get('type'),$email]);
		
		
		return redirect('/admin');
	}
	
	public function deleteUser($user)
	{
	
		DB::delete('delete from users where id = ?',[$user]);
		return redirect('/admin');
		
	}
	
	public function getUserModify($user)
	{
		
		$u = DB::table('users')->where('id', $user)->first();
		return view('admin.usermodify',['user' => $u]);
		
	}
	
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	
    	$result = DB::select('select * from users where type != 9');
    	
        return view('admin.index',['users' => $result]);
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
