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
use App\Reply;
use App\CoachAsk;
use App\User;
use App\Bodydata;

class CoachController extends Controller {
	public function getExport() {
		$currentId = Auth::user()->id;
		
		$userNamesToMe = array();
		$userDataToMe = array();
		$questionsToMe = CoachAsk::where('coachid', '=', $currentId)->where('state', '=', 0)->get();
		foreach ($questionsToMe as $question) {
			$user = User::find($question->userid);
			$userNamesToMe[] = $user->nickname;
			
			$userData = Bodydata::where('userid', '=', $question->userid)->orderBy('date')->first();
			if($userData != null) {
				$userDataToMe[] = "身高：{$userData->height} cm<br/>体重：{$userData->weight} kg<br/>体脂率：{$userData->bodyfat}<br/>bmi：{$userData->bmi}";
			} else {
				$userDataToMe[] = "";
			}
		}
		
		$userNamesToAll = array();
		$userDataToAll = array();
		$questionsToAll = CoachAsk::where('coachid', '=', 0)->where('state', '=', 0)->get();
		foreach ($questionsToAll as $question) {
			$user = User::find($question->userid);
			$userNamesToAll[] = $user->nickname;
			
			$userData = Bodydata::where('userid', '=', $question->userid)->orderBy('date')->first();
			if($userData != null) {
				$userDataToAll[] = "身高：{$userData->height} cm<br/>体重：{$userData->weight} kg<br/>体脂率：{$userData->bodyfat}<br/>bmi：{$userData->bmi}";
			} else {
				$userDataToAll[] = "";
			}
		}
		
		$oneDayRecipes = array();
		$oneWeekRecipes = array();
		$exerciseItems = array();
		
		$replies = Reply::where('coach_id', '=', $currentId ) -> get();
		foreach ($replies as $reply) {
			$oneDayRecipe = $reply->oneDayRecipes;
			$temp = explode(";", $oneDayRecipe);
			foreach ($temp as $t) {
				if($t != ""){
					$oneDayRecipes[] = $t;
				}
			}
			
			$oneWeekRecipe = $reply->oneWeekRecipes;
			$temp = explode(";", $oneWeekRecipe);
			foreach ($temp as $t) {
				if($t != ""){
					$oneWeekRecipes[] = $t;
				}
			}
			
			$exerciseItem = $reply->exerciseItems;
			$temp = explode(";", $exerciseItem);
			foreach ($temp as $t) {
				if($t != ""){
					$exerciseItems[] = $t;
				}
			}
		}
		
		return view ( 'coach.export', [ 
				'exerciseItems' => $exerciseItems,
				'oneWeekRecipes' => $oneWeekRecipes,
				'oneDayRecipes' => $oneDayRecipes,
				'userNamesToMe' => $userNamesToMe,
				'questionsToMe' => $questionsToMe,
				'userNamesToAll' => $userNamesToAll,
				'questionsToAll' => $questionsToAll,
				'userDataToMe' => $userDataToMe,
				'userDataToAll' => $userDataToAll
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
	
	public function reply(Request $request) {
// 		$this->validate($request, [
// 				'replyArea' => 'required', // 必填
// 				'oneDayRecipesInput' => 'required'
// 		]);
		$currentId = Auth::user()->id;
		$reply = new Reply();
		$reply->user_id = $request->get('userId');
		$reply->coach_id = $currentId;
		$reply->question_id = $request->get('questionId');
		$reply->reply = $request->get('replyArea');
		$reply->oneDayRecipes = $request->get('oneDayRecipesInput');
		$reply->oneWeekRecipes = $request->get('oneWeekRecipesInput');
		$reply->exerciseItems = $request->get('exerciseItemsInput');
		
		$question = CoachAsk::find($request->get('questionId'));
		
		if ($reply->save()) {
			$question->state = 1;
			if($question->save()) {
				return redirect('coach/export');
			}else {
				return redirect()->back()->withInput()->withErrors('保存失败！');
			}
		} else {
			return redirect()->back()->withInput()->withErrors('保存失败！');
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
