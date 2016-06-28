<?php

use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

	Route::get('/', 'HomeController@index');
	Route::get('/index', 'HomeController@index');
	
	//测试
	Route::get('/testdata', 'HomeController@getTestData');
	
	//登录注册
	Route::get('/login', 'HomeController@login');
	Route::get('/register', 'HomeController@register');
	Route::get('/home', 'HomeController@home');
	
	Route::post('/login', 'LoginController@postLogin');
	Route::post('/register', 'RegisterController@postRegister');
	Route::get('/logout', 'LoginController@getLogout');
	
	//个人设置
	Route::get('/personal', 'UserController@index');
	Route::get('/personal/modify', 'UserController@getModify');
	Route::post('/personal/modify', 'UserController@postModify');
	Route::get('/personal/modifypassword', 'UserController@getModifyPassword');
	Route::post('/personal/modifypassword', 'UserController@postModifyPassword');
	
	//锻炼
	Route::get('/exercise', 'ExerciseController@index');
	Route::get('/exercise/suggestion', 'ExerciseController@getSuggestion');
	Route::get('/exercise/suggestion/ask', 'ExerciseController@getSuggestionAsk');
	Route::get('/exercise/suggestion/delete/{suggestionid}', 'ExerciseController@getSuggestionDelete');
	Route::get('/exercise/goal', 'ExerciseController@getGoal');
	Route::post('/exercise/goal/', 'ExerciseController@postGoal');
	Route::get('/exercise/history/{date?}', 'ExerciseController@getHistory');
	Route::post('/exercise/history', 'ExerciseController@postHistory');
	Route::get('/exercise/chart/{year?}', 'ExerciseController@getChart');
	Route::post('/exercise/chart', 'ExerciseController@postChart');
	Route::get('/exercise/coachlist','ExerciseController@getCoachList');
	
	//健康
	Route::get('/health', 'HealthController@index');
	Route::post('/health', 'HealthController@postModifyGoal');
	Route::get('/health/suggestion', 'HealthController@getSuggestion');
	Route::get('/health/suggestion/ask', 'HealthController@getSuggestionAsk');
	Route::get('/health/suggestion/delete/{suggestionid}', 'HealthController@getSuggestionDelete');
	Route::get('/health/sleep', 'HealthController@getSleep');
	Route::post('/health/sleep', 'HealthController@postSleep');
	Route::get('/health/rate', 'HealthController@getRate');

	
	
	//活动
	Route::get('/activity', 'ActivityController@index');
	Route::get('/activity/success/{id}', 'ActivityController@activityIn');
	Route::get('/activity/myactivity', 'ActivityController@getMyActivity');
	Route::post('/activity/newActivity', 'ActivityController@postNewActivity');
	
	//医生
	Route::get('/doctor', 'DoctorController@index');
	Route::post('/doctor', 'DoctorController@postAdviceIn');
	Route::get('/doctor/export', 'DoctorController@getExport');
	
	//教练
	Route::get('/coach', 'CoachController@index');
	Route::post('/coach', 'CoachController@postAdviceIn');
	Route::post('/coach/reply', 'CoachController@reply');
	Route::get('/coach/export', 'CoachController@getExport');
	
	
	//管理员
	Route::get('/admin', 'AdminController@index');
	Route::get('/admin/usermodify/{user}', 'AdminController@getUserModify');
	Route::get('/admin/usermodify/delete/{user}', 'AdminController@deleteUser');
	Route::post('/admin/usermodify/', 'AdminController@postUserModify');
	Route::get('/admin/newactivity', 'AdminController@newActivity');
	Route::post('/admin/newactivity', 'AdminController@postNewActivity');
	Route::get('/admin/activity', 'AdminController@adminActivity');
	Route::get('/admin/activity/delete/{user}', 'AdminController@deleteActivity');
	Route::get('/admin/activity', 'AdminController@adminActivity');
	Route::get('/admin/activity/modify/{user}', 'AdminController@getActivityModify');
	Route::post('/admin/activity/modify', 'AdminController@postActivityModify');


	//微博
	Route::get('/weibo', 'WeiboController@index');
	Route::get('/weibo/hot', 'WeiboController@hotWeibo');
	Route::get('/weibo/create', 'WeiboController@createWeibo');
	Route::post('/weibo/create', 'WeiboController@postNewWeibo');
	Route::get('/weibo/confirmcollect/{id}', 'WeiboController@confirmCollect');
	Route::get('/weibo/cancelcollect/{id}', 'WeiboController@cancelCollect');
	Route::get('/weibo/confirmfollow/{author_id}', 'WeiboController@confirmFollow');
	Route::get('/weibo/cancelfollow/{author_id}', 'WeiboController@cancelFollow');
	Route::get('/weibo/follow', 'WeiboController@myFollow');
	Route::get('/weibo/collect', 'WeiboController@myCollect');
	Route::get('/weibo/search/{keyword}', 'WeiboController@myCollect');
	Route::get('/weibo/myweibo', 'WeiboController@myWeibo');


	
	