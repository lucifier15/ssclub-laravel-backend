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
	'uses' => 'MemberController@addMember'
]);

Route::get('getMembers',[
	'uses' => 'MemberController@getMembers'
]);

Route::post('postEvent',[
	'uses' => 'EventsController@postEvent'
]);

Route::get('eventList',[
	'uses' => 'EventsController@eventList'
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