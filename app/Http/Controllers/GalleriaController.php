<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use Auth;
use App\Halls;


class GalleriaController extends Controller
{

    public function index($type)
    {
        if (Auth::check()) {
            $galleria = DB::table('galleria')->where('type', $type)->where('type', $type)->paginate(10);
            return view('admin.galleria.galleria-list', ['galleria' => $galleria ]);
        } else {
            return redirect('/achtamar_admin_panel');
        }
        
    }

    public function updateGalleriaBlade($id)
    {
        $edit = true;
        if (Auth::check()) {
           $halls = DB::table('halls')->get();
           $galleria =  DB::table('galleria')->where('id', $id)->get();
            return view('admin.galleria.add-galleria', ['galleria'=> $galleria[0], 'halls' => $halls, 'edit'=>$edit, 'error'=>false ]);
        } else {
            return redirect('/achtamar_admin_panel');
        }
        

    }

    public function updateGalleriaPost($id,Request $request )
    {
        $error = false;
        if (Auth::check()) {
            $gal_image = DB::table('galleria')->where('id', $id)->get();
            if (strlen($request->file('galleria_image')) > 0) {
                unlink(storage_path('app/public/'.$gal_image[0]->image));
                $halls = DB::table('halls')->get();

	            $saved = DB::table('galleria')
	            	->where('id', $id)
                    ->update(['type' => $request->input('gallerira_type'),
	                'hall_id' => $request->input('galleria_hall_id'),
	                'link' => $request->input('galleria_video_link'),
                    'name' => $request->input('galleria_name'),
                    'descr' => $request->input('galleria_desc'),
	                'image' => date("Ymdgis").'.'.$request->file('galleria_image')->getClientOriginalExtension()]
	            );

	            $request->galleria_image->storeAs('public', date("Ymdgis").'.'.$request->file('galleria_image')->getClientOriginalExtension());

	            if(!$saved) {
	                return view('admin.menu.add-galleria', ['halls' => $halls,'error'=>true, 'error-message' => 'Problem on saving data please try again later']);
	            }else{
	                return redirect('/galleria/galleria-list/1');
	            }    
            }else{
                $halls = DB::table('halls')->get();

	            $saved = DB::table('galleria')
	            	->where('id', $id)
                    ->update(['type' => $request->input('gallerira_type'),
	                'hall_id' => $request->input('galleria_hall_id'),
                    'name' => $request->input('galleria_name'),
                    'descr' => $request->input('galleria_desc'),
	                'link' => $request->input('galleria_video_link')]
	            );


	            if(!$saved) {
	                return view('admin.menu.add-galleria', ['halls' => $halls,'error'=>true, 'error-message' => 'Problem on saving data please try again later']);
	            }else{
	                return redirect('/galleria/galleria-list/1');
	            } 
            }
        } else {
            return redirect('/achtamar_admin_panel');
        } 
    }

    public function delete($id)
    {
        if(Auth::check()) {
            $galleria_image = DB::table('galleria')->where('id', $id)->get();
            unlink(storage_path('app/public/'.$galleria_image[0]->image));
            $delete = Db::table('galleria')->where('id', $id)->delete();
            if($delete) {
                return redirect('/galleria/galleria-list/1');
            }else {
                $error = true;
                return redirect('/galleria/galleria-list/1');
            }
        }else{
        	return redirect('/achtamar_admin_panel');
        }
    }

    public function addGalleria()
    {
        if (Auth::check()) {
            $halls = DB::table('halls')->get();
            return view('admin.galleria.add-galleria', ['halls' => $halls, 'edit'=>false, 'error'=>false ]);
        } else {
            return redirect('/achtamar_admin_panel');
        }    
    }

    public function addGalleriaPost(Request $request)
    {
        if (Auth::check()) {
            $halls = DB::table('halls')->get();

            $saved = DB::table('galleria')->insert(
                ['type' => $request->input('gallerira_type'),
                'hall_id' => $request->input('galleria_hall_id'),
                'link' => $request->input('galleria_video_link'),
                'name' => $request->input('galleria_name'),
                'descr' => $request->input('galleria_desc'),
                'image' => date("Ymdgis").'.'.$request->file('galleria_image')->getClientOriginalExtension()]
            );

            $request->galleria_image->storeAs('public', date("Ymdgis").'.'.$request->file('galleria_image')->getClientOriginalExtension());

            if(!$saved) {
                return view('admin.menu.add-galleria', ['halls' => $halls,'error'=>true, 'error-message' => 'Problem on saving data please try again later']);
            }else{
                return redirect('/galleria/galleria-list/1');
            }
        } else {
            return redirect('/achtamar_admin_panel');
        }
        
    }
}
