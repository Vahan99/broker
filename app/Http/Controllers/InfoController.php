<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class InfoController extends Controller
{
    public function index()
    {
    	if(Auth::check()){
    		$info = DB::table('info')->get();
    		$address = DB::table('address')->get();
    		$halls = DB::table('halls')->get();
    		$daily_infos = DB::table('daily_info')->get();
    		if(count($daily_infos) === 0){
    			$daily_infos[0] = (object) array('status'=>1,
    			'sun_text'=>'',
    		    'sun_time'=>'',
    		    'mon_text'=>'',
    		    'mon_time'=>'',
    		    'tues_text'=>'',
    		    'tues_time'=>'',
    		    'wedn_text'=>'',
    		    'wedn_time'=>'',
    		    'thurs_text'=>'',
    		    'thurs_time'=>'',
    		    'frid_text'=>'',
    		    'frid_time'=>'',
    		    'sut_text'=>'',
    		    'sut_time'=>'',
    		    'id'=>'');
    		}
    		if(count($address) > 0){
	    		if(count($info) > 0){
				 	return view('admin.info.index',['info' => $info[0], 'address' => $address, 'halls' => $halls, 'daily_infos' => $daily_infos[0] ]);
	    		}else{
	    			$info = (object) array('about'=>'', 'facebook'=>'', 'instagram'=>'', 'gmail'=>'', 'id'=>'');
				 	return view('admin.info.index',['info' => $info, 'address' => $addres, 'halls' => $halls, 'daily_infos' => $daily_infos[0] ]);
	    		}
    		} else{
    			if(count($info) > 0){
    				$address[0] = (object) array('id' => 1,'address' => '','phone1' => '','phone2' => '','phone3' => '','latit' => '','longit' => '', 'hall_id'=>1);
				 	return view('admin.info.index',['info' => $info[0], 'address' => $address, 'halls' => $halls, 'daily_infos' => $daily_infos[0] ]);
	    		}else{
	    			$info = (object) array('about'=>'', 'facebook'=>'', 'instagram'=>'', 'gmail'=>'', 'id'=>'');
				 	return view('admin.info.index',['info' => $info, 'address' => $address, 'halls' => $halls, 'daily_infos' => $daily_infos[0] ]);
	    		}
    		}

    	} else {
            return redirect('/achtamar_admin_panel');
        }
    }

    public function addDailyInfo(Request $request)
    {
    	if(Auth::check()){
			$saved = DB::table('daily_info')
                ->insert(['status'=>$request->status,
			'sun_text'=>$request->sun_text,
		    'sun_time'=>$request->sun_time,
		    'mon_text'=>$request->mon_text,
		    'mon_time'=>$request->mon_time,
		    'tues_text'=>$request->tues_text,
		    'tues_time'=>$request->tues_time,
		    'wedn_text'=>$request->wedn_text,
		    'wedn_time'=>$request->wedn_time,
		    'thurs_text'=>$request->thurs_text,
		    'thurs_time'=>$request->thurs_time,
		    'frid_text'=>$request->frid_text,
		    'frid_time'=>$request->frid_time,
		    'sut_text'=>$request->sut_text,
		    'sut_time'=>$request->sut_time]);
            if($saved){
				return ["error" => false, "message" => "Update success"]; 
			}else{
				return ["error" => true, "message" => "Update error"]; 
			}
    	} else {
            return redirect('/achtamar_admin_panel');
        }
    }

    public function editDailyInfo($id, Request $request)
    {
    	if(Auth::check()){
			$saved = DB::table('daily_info')
                ->where('id', $id)
                ->update(['status'=>$request->status,
    			'sun_text'=>$request->sun_text,
    		    'sun_time'=>$request->sun_time,
    		    'mon_text'=>$request->mon_text,
    		    'mon_time'=>$request->mon_time,
    		    'tues_text'=>$request->tues_text,
    		    'tues_time'=>$request->tues_time,
    		    'wedn_text'=>$request->wedn_text,
    		    'wedn_time'=>$request->wedn_time,
    		    'thurs_text'=>$request->thurs_text,
    		    'thurs_time'=>$request->thurs_time,
    		    'frid_text'=>$request->frid_text,
    		    'frid_time'=>$request->frid_time,
    		    'sut_text'=>$request->sut_text,
    		    'sut_time'=>$request->sut_time]);
            if($saved){
				return ["error" => false, "message" => "Update success"]; 
			}else{
				return ["error" => true, "message" => "Update error"]; 
			}
    	} else {
            return redirect('/achtamar_admin_panel');
        }
    
    }

    public function editDailyInfoStatus($is, Request $request)
    {
    	if(Auth::check()){
			$saved = DB::table('daily_info')
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
    

    public function aboutUsPost(Request $request)
    {
    	// dd($request->about_us);
    	if(Auth::check()){
    		if($request->id !== '' && $request->id !== null){
				$saved = DB::table('info')
                    ->where('id', $request->id)
                    ->update(['about' => $request->about_us,'facebook' => $request->fb_link,'instagram' => $request->inst_link,'gmail' => $request->gmail]);
                if($saved){
    				return ["error" => false, "message" => "Update success"]; 
    			}else{
    				return ["error" => true, "message" => "Update error"]; 
    			}       
    		}else{
    			$saved = DB::table('info')->insert(
                		['about' => $request->about_us,'facebook' => $request->fb_link,'instagram' => $request->inst_link,'gmail' => $request->gmail]
           		 );
    			if($saved){
    				return ["error" => false, "message" => "Insert success"]; 
    			}else{
    				return ["error" => true, "message" => "Insert error"]; 
    			}
    		}
    	} else {
            return redirect('/achtamar_admin_panel');
        }
    }


    public function getCurrentAddress($id)
    {
    	return DB::table('address')->where('id', $id)->get();
    }

    public function deleteAddress($id)
    {
    	if(Auth::check()){
			$delete = DB::table('address')->where('id', $id)->delete();
			if($delete){
				return ["error" => false, "message" => "Delete success"]; 
			}else{
				return ["error" => true, "message" => "Delete error"]; 
			}
    	} else {
            return redirect('/achtamar_admin_panel');
        }
    }

    public function updateCurrentAddress($id, Request $request)
    {
    	if(Auth::check()){
			$saved = DB::table('address')
                ->where('id', $id)
                ->update(["address"=> $request->address,
							"phone1"=> $request->phone1,
						    "phone2"=> $request->phone2,
						    "phone3"=> $request->phone3,
						    "hall_id"=> $request->hall_id,
						    "latit"=> $request->lat,
						    "longit"=> $request->long]);
            if($saved){
				return ["error" => false, "message" => "Update success"]; 
			}else{
				return ["error" => true, "message" => "Update error"]; 
			}
    	} else {
            return redirect('/achtamar_admin_panel');
        }
    }

    public function addAddress( Request $request)
    {
    	if(Auth::check()){
			$saved = DB::table('address')->insert(
            		["address"=> $request->address,
					"phone1"=> $request->phone1,
				    "phone2"=> $request->phone2,
				    "phone3"=> $request->phone3,
				    "hall_id"=> $request->hall_id,
				    "latit"=> $request->lat,
				    "longit"=> $request->long]
       		 );
			if($saved){
				return ["error" => false, "message" => "Insert success"]; 
			}else{
				return ["error" => true, "message" => "Insert error"]; 
			}
    	} else {
            return redirect('/achtamar_admin_panel');
        }
    }

    
	
}
