<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('addMember',[
	'uses' => 'MemberController@addMember',
	'middleware' => 'auth.jwt'
]);

Route::get('getMembers',[
	'uses' => 'MemberController@getMembers'
]);

Route::post('postEvent',[
	'uses' => 'EventsController@postEvent',
	'middleware' => 'auth.jwt'
]);

Route::post('deleteEvent',[
	'uses' => 'EventsController@deleteEvent',
	'middleware' => 'auth.jwt'
]);

Route::get('eventList',[
	'uses' => 'EventsController@eventList',
]);

Route::get('getEvent/{id}',[
	'uses' => 'EventsController@getEvent'
]);

Route::post('register',[
	'uses' => 'EventsController@register'
]);

Route::get('getPartList',[
	'uses' =>  'EventsController@getlist'
]);

Route::post('sendOtp',[
	'uses' => 'EventsController@sendOtp'
]);

Route::post('admin/signin',[
	'uses' => 'UserController@adminsignin'
]);