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

Route::post('addMember',[						//add a member
	'uses' => 'MemberController@addMember',
	'middleware' => 'auth.jwt'
]);

Route::get('getMembers',[						//get all members
	'uses' => 'MemberController@getMembers'
]);

Route::post('postEvent',[						//post a new event
	'uses' => 'EventsController@postEvent',
	'middleware' => 'auth.jwt'
]);

Route::post('deleteEvent',[						//delete an event
	'uses' => 'EventsController@deleteEvent',
	'middleware' => 'auth.jwt'
]);

Route::get('eventList',[						//get all events
	'uses' => 'EventsController@eventList',
]);

Route::get('getEvent/{id}',[					//fetch event by id
	'uses' => 'EventsController@getEvent'
]);

Route::post('register',[						//register for an event
	'uses' => 'EventsController@register'
]);

Route::get('getPartList',[						//get all participants list
	'uses' =>  'EventsController@getlist'
]);

Route::post('sendOtp',[							//send otp
	'uses' => 'EventsController@sendOtp'
]);

Route::post('admin/signin',[					//admin signin
	'uses' => 'UserController@adminsignin'
]);