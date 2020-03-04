<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Admin;
use Illuminate\Http\Request;
use App\User;
use DB;
use Auth;

class RegionsController extends Controller
{
    public function index($id)
    {
        
        if(Auth::user()->Admin() == 1 || Auth::user()->Admin() == 3){
            $regions = DB::table('regions')->get();
           $subRegions = DB::table('sub_regions')->where('region_id', $id)->orderBy('name', 'asc')->paginate(30);
        return view('admin.subregions.index', ['error'=> false,'id'=> $id, 'admin'=>Auth::user()->Admin(), 'subRegions' => $subRegions, 'regions' => $regions]);
            
        }else{
          return back();    
        }
        
    }

    public function getStreet($region_id, $sub_region_id, $street)
    {
        $array = [];
        if($region_id != '-1') {
            $array["region"] = $region_id;
        }else {
            array_push($array, ['region', '<>', '-1']);
        }

        if($sub_region_id != '-1') {
            $array["subRegion"] = $sub_region_id;
        }else{
            array_push($array, ['subRegion', '<>', '-1']);
        }
        $street = DB::table('reality')->select(['street'])
            ->where($array)
            ->where('street', 'like', '%'.$street.'%')->get();
        return response(['error' => false, 'street' => $street]);
    }

    public function getSubRegion($id)
    {
        $subRegions = DB::table('sub_regions')->where('region_id', $id)->orderBy('name', 'asc')->get();
        return response(['error'=> false, 'subRegions' => $subRegions]);
    }

    public function addSubRegionBlade()
    {
        if(Auth::user()->Admin() == 1 || Auth::user()->Admin() == 3){
            
            $regions = DB::table('regions')->get();
            return view('admin.subregions.add-region', [
                'admin'=>Auth::user()->Admin(),
                'regions' => $regions,
                'edit' => false,
                'error' => false
            ]);
        }else{
            return back();
        }
        
    }

    public function addSubRegionPost(Request $request)
    {
        $save = DB::table('sub_regions')->insert(
            [
                'name' => $request->name,
                'region_id' => $request->region_id
            ]
        );

        if ($save) {
            $regions = DB::table('regions')->get();
            return redirect('/admin/regions/regions-list/'.$regions[0]->id);
        } else {
            return response()->json(['error' =>  !$save, 'message' => 'Error on saving please try again later']);
        }

    }

    public function updateSubRegionBlade($id)
    {
        if(Auth::user()->Admin() == 1 || Auth::user()->Admin() == 3){
            
            $regions = DB::table('regions')->get();
            $subRegion = DB::table('sub_regions')->where('id', $id)->get();
            return view('admin.subregions.add-region', [
                'admin' => Auth::user()->Admin(),
                'subRegion' => $subRegion[0],
                'regions' => $regions,
                'edit' => true,
                'error' => false
            ]);
        }else{
            return back();
        }
        
    }

    public function updateSubRegionPost($id, Request $request)
    {

        $save = DB::table('sub_regions')->where('id', $id)->update(
            [
                'name' => $request->name,
                'region_id' => $request->region_id
            ]
        );

        if ($save) {
            return redirect('/admin/regions/regions-list/'.$request->region_id);
        } else {
            return redirect('/admin/regions/regions-list/'.$request->region_id);
        }
    }

    public function delete($id)
    {
        $delete = Db::table('sub_regions')->where('id', $id)->delete();
        if($delete) {
            $regions = DB::table('regions')->get();
            return redirect('/admin/regions/regions-list/'.$regions[0]->id);
        }else {
            $regions = DB::table('regions')->get();
            $subRegions = DB::table('sub_regions')->where('region_id', $id)->paginate(30);
            return view('admin.subregions.index', ['error'=> true, 'admin'=>Auth::user()->Admin(), 'subRegions' => $subRegions, 'regions' => $regions]);

        }
    }
}
