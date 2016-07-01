<?php

namespace App\Http\Controllers;

use App\ActivityIn;
use Illuminate\Http\Request;
use App\ActivityStore;
use App\Activity_User;
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
	

    public function newactivity(){
        return view('activity.newactivity');
    }
	
	public function getMyActivity(){
        /*
        $activities_enter = ActivityStore::where('State','=','-1')->orderBy('created_at')->get();
        $activities_my = ActivityStore::where('State','=','1')->orderBy('created_at')->get();

        return view('activity.myactivity',['activities_enter' => $activities_enter,'activities_my'=>$activities_my]);
        */

        
		$activities_enter = DB::select('select activity_stores.* from activity_stores Left JOIN activity__Users on
                          activity_stores.id = activity__Users.ActivityId where activity__Users.UserID = ?', [Auth::user()->id]);

        $activities_my = DB::select('select activity_stores.* from activity_stores where activity_stores.UserID = ?', [Auth::user()->id]);

		return view('activity.myactivity',['name' => Auth::user()->name, 'activities_my' => $activities_my,'activities_enter' => $activities_enter]);
	}


    public function getMyActivityenter(){
        /*
        $activities_enter = ActivityStore::where('State','=','-1')->orderBy('created_at')->get();
        $activities_my = ActivityStore::where('State','=','1')->orderBy('created_at')->get();

        return view('activity.myactivity',['activities_enter' => $activities_enter,'activities_my'=>$activities_my]);
        */

        
        $activities_enter = DB::select('select activity_stores.* from activity_stores Left JOIN activity__Users on
                          activity_stores.id = activity__Users.ActivityId where activity__Users.UserID = ?', [Auth::user()->id]);

        $activities_my = DB::select('select activity_stores.* from activity_stores where activity_stores.UserID = ?', [Auth::user()->id]);

        return view('activity.myactivityenter',['name' => Auth::user()->name, 'activities_my' => $activities_my,'activities_enter' => $activities_enter]);
    }


    public function signActivity(Request $request){
        $activityUser = new Activity_User();
        $activityUser->ActivityId=$request->get('newsign');
        $activityUser->UserID=Auth::user()->id;
        if($activityUser->save()) {
            return Redirect::to('/activity');
        }else {
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }
    }

    public function exitActivity(Request $request){
        DB::delete('delete from activity__Users where ActivityId = ? and UserID = ?', [$request->get('newexit'),Auth::user()->id]);
        

        return Redirect::to('/activity');
        
    }





    public function postNewActivity(Request $request){
        $activityStore = new ActivityStore();


        

        $activityStore->Theme = $request->get('theme');
        $activityStore->Time = $request->get('daterange');
        $activityStore->peopleNumber = $request->get('peopleNumber');
        $activityStore->Money = $request->get('money');
        $activityStore->Description = $request->get('descriptionInfo');
        $activityStore->PlanList = $request->get('listInfo');
        $activityStore->Field = $request->get('activityField');
        $activityStore->Tag = $request->get('tagInfo');
        $activityStore->UserID = Auth::user()->id;
        $activityStore->UserName = Auth::user()->nickname;
        $activityStore->State = "-1";

        if(Auth::user()->type == 9){
            $activityStore->Type = "1";
        }else{
            $activityStore->Type = "0";
        }


        if($activityStore->save()) {

        }else {
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }

    }


	
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $activities_all = ActivityStore::where('State','=','1')->get();
        $activities_personal = ActivityStore::where('State','=','1')->where('Type','=','0')->orderBy('created_at')->get();
        $activities_gov = ActivityStore::where('State','=','1')->where('Type','=','1')->orderBy('created_at')->get();
        $activities = ActivityStore::all();
        return view('activity.index',['activities' => $activities,'activities_all'=>$activities_all,'activities_personal'=>$activities_personal,'activities_gov'=>$activities_gov]);

        /*
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



        return view('activity.index',['name' => Auth::user()->name, 'activities' => $result, 'isIn' => $isIn]);
        */
    }
    public function indexgov()
    {
        
        $activities_all = ActivityStore::where('State','=','1')->get();
        $activities_personal = ActivityStore::where('State','=','1')->where('Type','=','0')->orderBy('created_at')->get();
        $activities_gov = ActivityStore::where('State','=','1')->where('Type','=','1')->orderBy('created_at')->get();
        $activities = ActivityStore::all();
        return view('activity.indexgov',['activities' => $activities,'activities_all'=>$activities_all,'activities_personal'=>$activities_personal,'activities_gov'=>$activities_gov]);

        /*
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



        return view('activity.index',['name' => Auth::user()->name, 'activities' => $result, 'isIn' => $isIn]);
        */
    }
    public function indexper()
    {
        
        $activities_all = ActivityStore::where('State','=','1')->get();
        $activities_personal = ActivityStore::where('State','=','1')->where('Type','=','0')->orderBy('created_at')->get();
        $activities_gov = ActivityStore::where('State','=','1')->where('Type','=','1')->orderBy('created_at')->get();
        $activities = ActivityStore::all();
        return view('activity.indexper',['activities' => $activities,'activities_all'=>$activities_all,'activities_personal'=>$activities_personal,'activities_gov'=>$activities_gov]);

        /*
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



        return view('activity.index',['name' => Auth::user()->name, 'activities' => $result, 'isIn' => $isIn]);
        */
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
