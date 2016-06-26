<?php

namespace App\Http\Controllers;

use App\UserFollow;
use App\WeiboCollect;
use App\WeiboLabel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\NewWeiboRequest;
use App\Weibo;

use Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WeiboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $weibos = Weibo::latest()->get();
        $author_name = [];
        $collects = [];
        $follows = [];
        $haveWeibo = 1;

        if(count($weibos) == 0){
            $haveWeibo = 0;

        }else{
            //作者名
            foreach($weibos as $w){
                $id = $w->author_id;
                $name = DB::select('select nickname from users  where id = ?', [$id]);
                $author_name[] = $name[0]->nickname;
            }
            reset($author_name);

            //收藏
            foreach($weibos as $w){
                $wid = $w->id;
                $cid = Auth::user()->id;
                $count = DB::select('select * from weibo_collects  where weibo_id = ? and collector_id = ?', [$wid,$cid]);
                if(count($count) == 0){
                    $collects[] = 0; //未收藏
                }else{
                    $collects[] = 1; //已收藏
                }
            }


            //关注
            foreach($weibos as $w){
                $aid = $w->author_id;
                $fid = Auth::user()->id;
                $count = DB::select('select * from user_follows  where coach_id = ? and follower_id = ?', [$aid,$fid]);
                if(count($count) == 0){
                    $follows[] = 0; //未收藏
                }else{
                    $follows[] = 1; //已收藏
                }
            }
        }


        return view('weibo.weibo',compact('weibos'),['names' => $author_name,'collects' => $collects,'follows' => $follows,'haveWeibo' => $haveWeibo]);
    }


    public function hotWeibo(){
        $weibos = Weibo::orderBy('collect_count', 'desc')->latest()->get();

        $author_name = [];
        $collects = [];
        $follows = [];
        $haveWeibo = 1;

        if(count($weibos) == 0){
            $haveWeibo = 0;

        }else{
            //作者名
            foreach($weibos as $w){
                $id = $w->author_id;
                $name = DB::select('select nickname from users  where id = ?', [$id]);
                $author_name[] = $name[0]->nickname;
            }
            reset($author_name);

            //收藏
            foreach($weibos as $w){
                $wid = $w->id;
                $cid = Auth::user()->id;
                $count = DB::select('select * from weibo_collects  where weibo_id = ? and collector_id = ?', [$wid,$cid]);
                if(count($count) == 0){
                    $collects[] = 0; //未收藏
                }else{
                    $collects[] = 1; //已收藏
                }
            }


            //关注
            foreach($weibos as $w){
                $aid = $w->author_id;
                $fid = Auth::user()->id;
                $count = DB::select('select * from user_follows  where coach_id = ? and follower_id = ?', [$aid,$fid]);
                if(count($count) == 0){
                    $follows[] = 0; //未收藏
                }else{
                    $follows[] = 1; //已收藏
                }
            }
        }


        return view('weibo.weibo',compact('weibos'),['names' => $author_name,'collects' => $collects,'follows' => $follows,'haveWeibo' => $haveWeibo]);

    }

    public function MyCollect(){
//        $weibos = Weibo::orderBy('collect_count', 'desc')->latest()->get();

        $weibos = DB::select('select weibos.*
					from weibos join weibo_collects on weibos.id=weibo_collects.weibo_id
					where weibo_collects.collector_id = ? order by weibos.published_at DESC',[Auth::user()->id]);

        $author_name = [];
        $collects = [];
        $follows = [];
        $haveWeibo = 1;

        if(count($weibos) == 0){
            $haveWeibo = 0;

        }else{
            //作者名
            foreach($weibos as $w){
                $id = $w->author_id;
                $name = DB::select('select nickname from users  where id = ?', [$id]);
                $author_name[] = $name[0]->nickname;
            }
            reset($author_name);

            //收藏
            foreach($weibos as $w){
                $wid = $w->id;
                $cid = Auth::user()->id;
                $count = DB::select('select * from weibo_collects  where weibo_id = ? and collector_id = ?', [$wid,$cid]);
                if(count($count) == 0){
                    $collects[] = 0; //未收藏
                }else{
                    $collects[] = 1; //已收藏
                }
            }


            //关注
            foreach($weibos as $w){
                $aid = $w->author_id;
                $fid = Auth::user()->id;
                $count = DB::select('select * from user_follows  where coach_id = ? and follower_id = ?', [$aid,$fid]);
                if(count($count) == 0){
                    $follows[] = 0; //未收藏
                }else{
                    $follows[] = 1; //已收藏
                }
            }
        }


        return view('weibo.weibo',compact('weibos'),['names' => $author_name,'collects' => $collects,'follows' => $follows,'haveWeibo' => $haveWeibo]);

    }

    public function myFollow(){
//        $weibos = Weibo::orderBy('collect_count', 'desc')->latest()->get();

        $weibos = DB::select('select weibos.*
					from weibos join user_follows on weibos.author_id=user_follows.coach_id
					where user_follows.follower_id = ? order by weibos.published_at DESC',[Auth::user()->id]);

        $author_name = [];
        $collects = [];
        $follows = [];
        $haveWeibo = 1;

        if(count($weibos) == 0){
            $haveWeibo = 0;

        }else{
            //作者名
            foreach($weibos as $w){
                $id = $w->author_id;
                $name = DB::select('select nickname from users  where id = ?', [$id]);
                $author_name[] = $name[0]->nickname;
            }
            reset($author_name);

            //收藏
            foreach($weibos as $w){
                $wid = $w->id;
                $cid = Auth::user()->id;
                $count = DB::select('select * from weibo_collects  where weibo_id = ? and collector_id = ?', [$wid,$cid]);
                if(count($count) == 0){
                    $collects[] = 0; //未收藏
                }else{
                    $collects[] = 1; //已收藏
                }
            }


            //关注
            foreach($weibos as $w){
                $aid = $w->author_id;
                $fid = Auth::user()->id;
                $count = DB::select('select * from user_follows  where coach_id = ? and follower_id = ?', [$aid,$fid]);
                if(count($count) == 0){
                    $follows[] = 0; //未收藏
                }else{
                    $follows[] = 1; //已收藏
                }
            }
        }


        return view('weibo.weibo',compact('weibos'),['names' => $author_name,'collects' => $collects,'follows' => $follows,'haveWeibo' => $haveWeibo]);

    }

    public function confirmCollect($id){

        $data = $id;
        $wc = new WeiboCollect();
        $wc->weibo_id = $data;
        $wc->collector_id = Auth::user()->id;
        $wc->save();


        DB::update('update weibos set collect_count = collect_count+1 where id = ?', [$id]);
        $c = DB::select('select collect_count from weibos  where id = ?', [$id]);
        $count = $c[0]->collect_count;

        return $count;

    }

    public function cancelCollect($id){

        DB::delete('delete from weibo_collects where weibo_id = ? and collector_id = ?',[$id,Auth::user()->id]);


        DB::update('update weibos set collect_count = collect_count-1 where id = ?', [$id]);
        $c = DB::select('select collect_count from weibos  where id = ?', [$id]);
        $count = $c[0]->collect_count;

        return $count;
    }

    public function confirmFollow($author_id){

        $uf = new UserFollow();
        $uf->coach_id = $author_id;
        $uf->follower_id = Auth::user()->id;
        $uf->save();

    }

    public function cancelFollow($author_id){

        DB::delete('delete from user_follows where coach_id = ? and follower_id = ?',[$author_id,Auth::user()->id]);

    }


    public function createWeibo()
    {
        $result = DB::select('select * from labels');

        return view('weibo.create',['labels' => $result]);
    }

    public function postNewWeibo(NewWeiboRequest $req)
    {

//        dd($req->all());

        $w = new Weibo();

        $w->author_id = Auth::user()->id;
        $w->title = $req->get('title');
        $w->content = $req->get('content');
        $w->intro = mb_substr($req->get('content'),0,64);
        $w->collect_count = 0;
        $w->published_at = Carbon::now();


        if ($w->save()) {
            $w->labels()->attach($req->input('label_list'));
            return redirect('/weibo/');
        } else {
            // 保存失败，跳回来路页面，保留用户的输入，并给出提示
            return redirect()->back()->withInput()->withErrors('失败！');
        }

//        $labelarray = $req->input('label_list');
//        foreach ($labelarray as $la){
//            $wl = new WeiboLabel();
//            $wl->label_id = $la;
//            $wl->
//        }

//        attach($req->input('label_list');

//        $w->labels()->attach($req->input('label_list'));


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
