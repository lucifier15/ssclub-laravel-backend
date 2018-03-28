<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Members;

class MemberController extends Controller
{
    //add new member

    public function addMember(Request $request){
    	
        
        $this->validate($request,[
            'name'=>'required',
            'roll_no'=>'required',
            'post' =>'required',
            'photo' => 'required'
        ]);

        $photo_path = $request->photo->getClientOriginalName();
    	$member = new Members([
    		'name'=>$request->name,
    		'roll_no'=>$request->roll_no,
    		'post'=>$request->post,
            'photo' => $photo_path
    	]);
        $request->photo->storeAs('public/upload',$photo_path);

    	$member->save();

    	return response()->json([
    		'message'=>'member added successfully'
    	],201);
    }

    public function getMembers(){

        $members = Members::all();

        $response = [
            'members' => $members
        ];
        return response()->json($response,201);
    }
}
