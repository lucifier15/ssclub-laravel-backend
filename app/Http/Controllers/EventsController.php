<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
use App\Participants;
use App\Mail\SSClubOTP;
use Illuminate\Support\Facades\Mail;

class EventsController extends Controller
{
    //post a new event

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

    // fetch all events list with details
    public function eventList(){

        $events = Events::all();

        $response = [
            'events' =>$events
        ];

        return response()->json($response,200);
    }

    // get a particular event by id
    public function getEvent($id){

        $event = Events::where('id',$id)->get();

        $response = [
            'event' => $event
        ];
        return response()->json($response,200);
    }

    // register a participant for an event
    public function register(Request $request){

        $this->validate($request,[
            'name' => 'required|min:3',
            'roll_no' => 'required',
            'phone' => 'required|min:10',
            'email' => 'required|email',
            'otp' => 'required',
            'eventId' => 'required'
        ]);

        $participant = new Participants([
            'name' => $request->name,
            'roll_no' => $request->roll_no,
            'phone' => $request->phone,
            'email' => $request->email,
            'eventId' => $request->eventId
        ]);

        $condition = ['eventId' => $request->eventId, 'email' => $request->email];

        $exists = Participants::where($condition)->count();

        if($exists!=0){
            return response()->json([
                'message' => 'Already registered'
            ],409);
        }
        else{
            $participant->save();

            return response()->json([
                'message' => 'Registered Successfully'
            ],201);
        }
    }

    public function getlist(){

        $participants = Participants::all();
        $ids = Events::all('id');
        $response =[
            'participants' => $participants,
            'ids' => $ids
        ];

        return response()->json($response,201);
    }

    public function sendOtp(Request $request){

        $email = $request->email;

        if ($email==NULL) {
            return response()->json([
                'message' => 'email is required'
            ],401);
        }
        else{

            $otp = rand(100000,999999);

            Mail::to($email)->send(new SSClubOTP($otp));
            return response()->json([
                'otp'  => $otp,
                'message' => 'otp sent successfully'

            ],201);
        }
    }


}
