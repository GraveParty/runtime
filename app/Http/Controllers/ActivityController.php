<?php

namespace App\Http\Controllers;

use App\ActivityIn;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Illuminate\Support\Facades\Redirect;

class ActivityController extends Controller
{
	public function activityIn($id) {
		$ac = new ActivityIn;
		$ac->userid = Auth::user()->id;
		$ac->activityid = $id;
		$ac->save();
		return Redirect::to('/activity');
	}
	
	
	public function getMyActivity(){
		$results = DB::select('select activities.* from activity_ins JOIN activities on
                          activity_ins.activityid = activities.id where userid = ?', [Auth::user()->id]);
		return view('activity.myactivity',['name' => Auth::user()->name, 'activities' => $results]);
	}
	
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = DB::select('select * from activities');
        $re = DB::select('select activities.* from activity_ins JOIN activities on
                          activity_ins.activityid = activities.id where userid = ?', [Auth::user()->id]);
        $isIn = [];
        foreach($result as $ac){
            $flag = 0;
            foreach($re as $my) {
                if ($ac->id == $my->id) {
                    $flag = 1;
                }
            }

            $isIn[] = $flag;
        }
        reset($isIn);
//         return $isIn;
        return view('activity.index',['name' => Auth::user()->name, 'activities' => $result, 'isIn' => $isIn]);
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
