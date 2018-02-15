<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;

class EventsController extends Controller
{
    //post event

    public function postEvent(Request $request){

    	$this->validate($request,[
    		'title' => 'required',
    		'date' => 'required',
    		'venue' => 'required'
    	]);

    	$event = new Events([
    		'title'=>$request->title,
    		'date'=>$request->date,
    		'venue'=>$request->venue
    	]);

    	$event->save();

    	return response()->json([
    		'message' => 'Event posted successfully'
    	],201);
    }

    public function eventList(){

        $events = Events::all();

        $response = [
            'events' =>$events
        ];

        return response()->json($response,200);
    }
}
