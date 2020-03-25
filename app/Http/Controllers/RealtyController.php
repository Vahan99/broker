<?php

namespace App\Http\Controllers;

use App\Reality;
use App\Region;
use App\SubRegion;
use App\Http\Data\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Filters\RealEstateFilter;
use App\Http\Data\Realty as DataRealty;

class RealtyController extends Controller
{
    public function index(Request $request)
    {
        $regions    = Region::get();
        $subRegions = SubRegion::get();
        $subReg     = $request->realitySubReg;
        $reality    = (new RealEstateFilter($request))->filter->paginate(10);

        $data = [
            'subReg'     => $subReg,
            'reality'    => $reality,
            'regions'    => $regions,
            'subRegions' => $subRegions,
            'realtyData' => new DataRealty,
            'admin'      => Auth::user()->Admin(),
        ];

        if (request()->ajax()) {
            return response()->json(view('reality.table', $data)->render());
        } else{
            return view('reality.index', $data);
        }
    }

    public function create()
    {
        return view('reality.add-reality', [
            'rules'      => new Rules(),
            'regions'    =>  Region::get(),
            'realtyData' => new DataRealty,
            'subRegions' =>  SubRegion::get(),
            'action'    => 'realty.add'
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'realityType' => 'required',
        ]);

        Reality::create($request->all());

        return redirect()->back();
    }

    public function printList(Request $request, $ids)
    {
        $ids = json_decode($ids);
        $array = [];
        for($i = 0; $i < count($ids); $i++){
            array_push($array, $ids[$i]->id);
        }
        return view('reality.print', [
            'regions'    => Region::get(),
            'subRegions' =>  SubRegion::get(),
            'reality'    => Reality::whereIn('id', $array)->paginate(40)
        ]);

    }

    public function single($id){
        return view('reality.single', [
            'realtyData' => new DataRealty,
            'regions'    => $regions = Region::get(),
            'subRegions' => $subRegions = SubRegion::get(),
            'reality'    => Reality::whereId($id)->whereUserId(Auth::id())->first(),
        ]);
    }

    public function updateRealityStatus($id, $status)
    {
        $reality = Reality::whereId($id)->update(['status' => $status]);

        if($reality){
            return response(['error' => false, 'message' => 'Ստատուսը փոփոխվեց']);
        }else{
            return response(['error' => true, 'message' => 'Փորցեք մի փոքր ուշ']);
        }
    }
}
