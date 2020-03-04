<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use Auth;
use App\Halls;

class EventsController extends Controller
{
    public function eventsBooking()
    {
        if (Auth::check()) {
            $eventBookings = DB::table('event_reserve')
                ->orderBy('createdAt', 'desc')
                ->get();
            return view('admin.events.event-booking', compact('eventBookings'));
        } else {
            return view('admin.admin',['error'=>false]);
        }
        // return view('admin.events.event-booking');	   		
    }

    public function deleteEventBooking($id)
    {
        if(Auth::check()) {
            $delete = Db::table('event_reserve')->where('id', $id)->delete();
            if($delete){
                return ["error" => false, "message" => "Delete success"]; 
            }else{
                return ["error" => true, "message" => "Delete error"]; 
            }
        }else{
            return redirect('/achtamar_admin_panel');
        }
    }

    public function readEventBooking($id)
    {
        if(Auth::check()) {
            $eventbooking = Db::table('event_reserve')->where('id', $id)->get();
            if($eventbooking[0]->status === 0){
                $eventbookingStatuseChange = Db::table('event_reserve')->where('id', $id)
                    ->update(['status' => 1]);  
            }else{
                $eventbookingStatuseChange = 1;
            }
            
            if($eventbookingStatuseChange){
                $eventbooking = Db::table('event_reserve')->where('id', $id)->get();
                return ["data" => $eventbooking]; 
            }else{
                return ["error" => true, "message" => $eventbookingStatuseChange]; 
            }
        }else{
            return redirect('/achtamar_admin_panel');
        }
    }

    public function index()
    {
        $error = false;
        if (Auth::check()) {
            $events = DB::table('events')->paginate(10);
            $halls = DB::table('halls')->get();
            foreach ($events as $key => $event) {
                foreach ($halls as $key => $hall) {
                    if($hall->id === $event->hall_id){
                        $event->hall_id = $hall->name;
                    }   
                };
            };   
            return view('admin.events.events-list', ['events'=>$events,'error'=>$error ]);
        } else {
            return redirect('/achtamar_admin_panel');
        }
        
    }

    public function editEventStatus($id, Request $request)
    {
        if(Auth::check()){
            $saved = DB::table('events')
                ->where('id', $request->id)
                ->update(['status'=>$request->status]);
            if($saved){
                return ["error" => false, "message" => "Update success"]; 
            }else{
                return ["error" => true, "message" => "Update error"]; 
            }
        } else {
            return redirect('/achtamar_admin_panel');
        }
    }

    public function editEventBlade($id)
    {
        $edit = true;
        if (Auth::check()) {
            $event = DB::table('events')->where('id', $id)->get();
            $halls = DB::table('halls')->get();
            return view('admin.events.add-event', ['event' => $event[0],'halls' => $halls,'error'=>false, 'edit'=>$edit  ]);
        } else {
            return redirect('/achtamar_admin_panel');
        }
        

    }

    public function editEvenetPost($id,Request $request )
    {
        $error = false;
        if (Auth::check()) {
            $event = DB::table('events')->where('id', $id)->get();
            if (strlen($request->file('image')) > 0) {
                unlink(storage_path('app/public/'.$event[0]->image));
                $saved = DB::table('events')
                    ->where('id', $id)
                    ->update(
                        ['name' => $request->input('name'),
                        'time' => $request->input('time'),
                        'date' => $request->input('date'),
                        'hall_id' => $request->input('hall_id'),
                        'link' => $request->input('link'),
                        'descr' => $request->input('descr'),
                        'image' => date("Ymdgis").'.'.$request->file('image')->getClientOriginalExtension()]
                    );
                    $request->image->storeAs('public', date("Ymdgis").'.'.$request->file('image')->getClientOriginalExtension());
                if($saved) {
                    return redirect('/events/events-list');
                }else{
                    $error = true;
                    $edit = true;

                    $halls = DB::table('halls')->get();
                    return view('admin.events.add-event', ['event' => $event[0],'halls' => $halls, 'edit'=>$edit,  'error'=>$error ]);
                }    
            }else{
                $saved = DB::table('events')
                    ->where('id', $id)
                    ->update(
                        ['name' => $request->input('name'),
                        'time' => $request->input('time'),
                        'date' => $request->input('date'),
                        'hall_id' => $request->input('hall_id'),
                        'link' => $request->input('link'),
                        'descr' => $request->input('descr')]
                    );
                if($saved) {
                    return redirect('/events/events-list');
                }else{
                    $error = true;
                    $edit = true;

                    $halls = DB::table('halls')->get();
                    return view('admin.events.add-event', ['event' => $event[0],'halls' => $halls, 'edit'=>$edit,  'error'=>$error ]);
                }
            }
        } else {
            return redirect('/achtamar_admin_panel');
        } 
    }

    public function deleteEvent($id)
    {
        if(Auth::check()) {
            $events = DB::table('events')->where('id', $id)->get();
            unlink(storage_path('app/public/'.$events[0]->image));
            $delete = Db::table('events')->where('id', $id)->delete();
            if($delete){
                return ["error" => false, "message" => "Delete success"]; 
            }else{
                return ["error" => true, "message" => "Delete error"]; 
            }
        }else{
            return redirect('/achtamar_admin_panel');
        }
    }

    public function addEvent()
    {
        if (Auth::check()) {
            $halls = DB::table('halls')->get();
                
            return view('admin.events.add-event', ['halls' => $halls, 'edit'=>false, 'error'=>false, ]);
        } else {
            return redirect('/achtamar_admin_panel');
        }    
    }

    public function createEvenet(Request $request)
    {
        // dd($request->file('image')->getClientOriginalExtension());
        if (Auth::check()) {
            $halls = DB::table('halls')->get();
            $saved = DB::table('events')->insert(
                [
                'status' => 1,
                'name' => $request->input('name'),
                'time' => $request->input('time'),
                'date' => $request->input('date'),
                'hall_id' => $request->input('hall_id'),
                'link' => $request->input('link'),
                'descr' => $request->input('descr'),
                'image' => date("Ymdgis").'.'.$request->file('image')->getClientOriginalExtension()]
            );

            $request->image->storeAs('public', date("Ymdgis").'.'.$request->file('image')->getClientOriginalExtension());

            if(!$saved) {
                return view('admin.events.add-event', ['categories' => $categories,'error'=>true, 'edit'=>true, 'error-message' => 'Problem on saving data please try again later']);
            }else{
                return redirect('/events/events-list');
            }
        } else {
           return redirect('/achtamar_admin_panel');
        }
        
    }
}
