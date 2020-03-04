<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use Auth;
use App\Halls;

class IndexController extends Controller
{

	public function index()
	{
		$sliderImages = DB::table('galleria')->where('type', 3)->get();
		$events = DB::table('events')->get();
		$halls = DB::table('halls')->get();
		return view('user_side.index', compact('events','halls', 'sliderImages'));
	}

	public function contactAs()
	{
		return view('user_side.contact_us');
	}

	public function getGalleria()
	{
		return view('user_side.galleria');
	}

	public function getEvent($id)
	{
		$events = DB::table('events')->get();
		$event = DB::table('events')->where('id', $id)->get();
		$singleEvent = $event[0];
		return view('user_side.event',compact('events','singleEvent'));
	}

	public function getMenu()
	{
		return view('user_side.menu');
	}

	public function reserveHall(Request $request)
	{
		$saved = DB::table('hall_reserve')
                    ->insert([
                    'date' => $request->date,
	                'time' => $request->time,
	                'persone' => $request->persone,
	                'lastName' => $request->lastName,
	                'hall' => $request->hall,
	                'phone' => $request->phoneNumber,
	                'message' => $request->message,
	                'status' => $request->statuse,
	                'createdAt' => date(DATE_RFC822)]
	            );
        if(!$saved) {
                return 'true';
            }else{
                return 'false';
            }            
		// dd($request->date);
	}

	public function reserveEvent(Request $request)
	{
		$saved = DB::table('event_reserve')
                    ->insert([
	                'person' => $request->persone,
	                'name' => $request->lastName,
	                'event_id' => $request->event,
	                'phone' => $request->phoneNumber,
	                'message' => $request->message,
	                'status' => $request->statuse,
	                'createdAt' => date(DATE_RFC822)]
	            );
        if(!$saved) {
                return 'true';
            }else{
                return 'false';
            }            
	}


}
