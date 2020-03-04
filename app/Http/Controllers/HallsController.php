<?php

namespace App\Http\Controllers;

use App\Halls;
use DB;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class HallsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $error = false;
            $edit = false;
            return view('admin.halls.add-halls', compact('error', 'edit'));
        } else {
            return view('admin.admin',['error'=>false]);
        }
    }

    public function getHalls()
    {
       return DB::table('halls')->get(); 
    }

    public function updateGet($id)
    {
        if (Auth::check()) {
            $error = false;
            $hall = DB::table('halls')->where('id', $id)->get();
            $edit = true;
            return view('admin.halls.add-halls',compact('hall', 'edit', 'error'));
        } else {
            return view('admin.admin',['error'=>false]);
        }
    }

    public function updatePost($id, Request $request)
    {
        $error = false;
        if (Auth::check()) {
            $saved = DB::table('halls')
                    ->where('id', $id)
                    ->update(['name' => $request->input('name')]);
            if($saved) {
                $halls = DB::table('halls')->get();
                return view('admin.halls.halls-list', ['halls' => $halls, 'error' => $error] );
            }else{
                $error = true;
                $hall = DB::table('halls')->where('id', $id)->get();

                $edit = true;
                return view('admin.halls.add-halls', compact('hall', 'edit' , 'error'));
            }
        } else {
            return view('admin.admin',['error'=>false]);
        }    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $error = false;
        if (Auth::check()) {
            $saved = DB::table('halls')->insert(
                ['name' => $request->input('name')]
            );
            if($saved) {
                $halls = DB::table('halls')->get(); 
                return view('admin.halls.halls-list', ['halls' => $halls, 'error' => $error] );
            }else{
                $error = true;
                $edit = false;
                return view('admin.halls.add-halls', compact('edit' , 'error'));
            }
        } else {
            return view('admin.admin',['error'=>false]);
        }    
    }

    public function hallBookingList(){
        if (Auth::check()) {
            $hallBokkings = DB::table('hall_reserve')
                ->orderBy('createdAt', 'desc')
                ->get();
            return view('admin.halls.hall-booking', compact('hallBokkings'));
        } else {
            return view('admin.admin',['error'=>false]);
        }
    }

    public function show(Halls $halls)
    {
        $error = false;
        $halls = DB::table('halls')->get();
        return view('admin.halls.halls-list', ['halls' => $halls, 'error' => $error] );
    }

    public function delete($id)
    {
        $error = false;
        if(Auth::check()) {
            $delete = Db::table('halls')->where('id', $id)->delete();
            if($delete) {
                $halls = DB::table('halls')->get(); 
                return view('admin.halls.halls-list', ['halls' => $halls, 'error' => $error] );
            }else {
                $error = true;
                $halls = DB::table('halls')->get(); 
                return view('admin.halls.halls-list', ['halls' => $halls, 'error' => $error] );
            }
        }else{
            return redirect('/achtamar_admin_panel');
        }
    }

    public function deleteHallBooking($id)
    {
        if(Auth::check()) {
            $delete = Db::table('hall_reserve')->where('id', $id)->delete();
            if($delete){
                return ["error" => false, "message" => "Delete success"]; 
            }else{
                return ["error" => true, "message" => "Delete error"]; 
            }
        }else{
            return redirect('/achtamar_admin_panel');
        }
    }

    public function readHallBooking($id)
    {
        if(Auth::check()) {
            $hallbooking = Db::table('hall_reserve')->where('id', $id)->get();
            if($hallbooking[0]->status === 0){
                $hallbookingStatuseChange = Db::table('hall_reserve')->where('id', $id)
                    ->update(['status' => 1]);  
            }else{
                $hallbookingStatuseChange = 1;
            }
            
            if($hallbookingStatuseChange){
                $hallbooking = Db::table('hall_reserve')->where('id', $id)->get();
                return ["data" => $hallbooking]; 
            }else{
                return ["error" => true, "message" => $hallbookingStatuseChange]; 
            }
        }else{
            return redirect('/achtamar_admin_panel');
        }
    }
}
