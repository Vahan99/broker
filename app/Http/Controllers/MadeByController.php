<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use Auth;
use App\Halls;

class MadeByController extends Controller
{
    public function index()
    {
    	if(Auth::check()){
    		$mader = DB::table('made_by')->get();
    		if(count($mader) === 0){
    			$mader[0] = (object) array('name'=>'',
    			'id'=>'',
    		    'link'=>'',
    		    'image'=>'');
    		    return view('admin.madeby.index',['mader'=>$mader[0]]);
    		}else{
    			return view('admin.madeby.index',['mader'=>$mader[0]]);
    		}
    	} else {
            return redirect('/achtamar_admin_panel');
        }
	   
    }

    public function create(Request $request)
    {
    	if(Auth::check()){
    		if( $request->input('id') === null){
				$saved = DB::table('made_by')->insert(
	                ['name' => $request->input('name'),
	                'link' => $request->input('link'),
	                'image' => date("Ymdgis").'.'.$request->file('image')->getClientOriginalExtension()]
	            );

	            $request->image->storeAs('public', date("Ymdgis").'.'.$request->file('image')->getClientOriginalExtension());

	            if(!$saved) {
	                return redirect('/made-by/add-madeby');
	            }else{
	                return redirect('/made-by/add-madeby');
	            }       
    		}else{
    			$mader = DB::table('made_by')->where('id', $request->input('id'))->get();
    			if (strlen($request->file('image')) > 0) {
	                unlink(storage_path('app/public/'.$mader[0]->image));

		            $saved = DB::table('made_by')
		            	->where('id', $request->input('id') )
	                    ->update(['name' => $request->input('name'),
		                'link' => $request->input('link'),
		                'image' => date("Ymdgis").'.'.$request->file('image')->getClientOriginalExtension()]
		            );

		            $request->image->storeAs('public', date("Ymdgis").'.'.$request->file('image')->getClientOriginalExtension());

		            if(!$saved) {
		                return redirect('/made-by/add-madeby');
		            }else{
		                return redirect('/made-by/add-madeby');
		            }    
	            }else{

		            $saved = DB::table('made_by')
		            	->where('id', $request->input('id') )
	                    ->update(['name' => $request->input('name'),
		                'link' => $request->input('link')]
		            );


		            if(!$saved) {
		                return redirect('/made-by/add-madeby');
		            }else{
		                return redirect('/made-by/add-madeby');
		            } 
	            }
    		}
    	} else {
            return redirect('/achtamar_admin_panel');
        }
    }
}
