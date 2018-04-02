<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;

class UserController extends Controller
{
    //signin admins

    public function adminsignin(Request $request)
    {
    	$this->validate($request,[
    		'email' => 'required',
    		'password' => 'required'
    	]);

    	$credentials = $request->only('email','password');
    	try{
    		if(!$token = JWTAuth::attempt($credentials)){
    			return response()->json([
    				'error' => 'Invalid Credentials'
    			],401);
    		}
    	}catch(JWTException $e){
    		return response()->json([
    			'error' => 'could not create token'
    		],500);
    	}
    	return response()->json([
    		'token' => $token
    	],200);
    }
}
