<?php

namespace App\Http\Controllers;

use App\Http\Filters\RealEstateFilter;
use App\Http\Middleware\Admin;
use App\Http\Resources\views;
use App\Reality;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use DB;
use Illuminate\Support\Facades\Auth;

class RealtyController extends Controller
{

    public function printList($id)
    {
        $id = json_decode($id);
        if ($id != 0) {
            if(count($id) > 0){
                $array = [];
                for($i = 0; $i < count($id); $i++){
                    array_push($array, $id[$i]->id);
                }
                $users = DB::table('users')->get();

                $regions = DB::table('regions')->get();
                $subRegions = DB::table('sub_regions')->get();
                $reality = DB::table('reality')
                    ->whereIn('id', $array)->paginate(40);


//                for($i = 0; $i < count($reality); $i++){
//                    for($j = 0; $j < count($users); $j++){
//                        if($reality[$i]->user_id == $users[$j]->id){
//                            $reality[$i]->user_id =  $users[$j];
//                        }
//                    }
//                }



                return view('admin.reality.print', [
                    'error'=> false,
                    'admin'=>Auth::user()->Admin(),
                    'users'=>$users,
                    'subRegions' => $subRegions,
                    'regions' => $regions,
                    'reality' => $reality]);
            }else{
                $reality = [];
                return view('admin.reality.print', [
                    'error'=> false,
                    'admin'=>Auth::user()->Admin(),
                    'reality' => $reality]);
            }
        }else{
            $reality = [];
            return view('admin.reality.print', [
                'error'=> false,
                'admin'=>Auth::user()->Admin(),
                'reality' => $reality]);
        }

    }
    public function index(Request $request, $id = null, $type = null)
    {
        //Broker Role 2
        $admins = DB::table('users')->where('admin','=', 0)->get();
        if (request()->ajax()) {
            $reality = (new RealEstateFilter($request))->filter->paginate(10);
            $regions = DB::table('regions')->get();
            $subRegions = DB::table('sub_regions')->get();
            $subReg = $request->realitySubReg;

            return response()->json(view('admin.reality.table', [
                'error'=> false,
                'id' => $id,
                'type' => $type,
                'superadmins'=>$admins,
                'admin'=>Auth::user()->Admin(),
                'subRegions' => $subRegions,
                'regions' => $regions,
                'reality' => $reality])->render());

        }else{
            $array = [];
            array_push($array, ["user_id", "=",Auth::id()]);
            if($id == 3) {
                return back();
            }else{
                array_push($array, ["status", "=",$id]);
                $regions = DB::table('regions')->get();
                $subRegions = DB::table('sub_regions')->get();
                $reality = DB::table('reality')->where('type', $type)
                    ->where($array)->orderBy('code', 'desc')->paginate(10);
                return view('admin.reality.index',[
                    'error'=> false,
                    'id' => $id,
                    'type' => $type,
                    'superadmins'=>$admins,
                    'admin'=>Auth::user()->Admin(),
                    'subRegions' => $subRegions,
                    'regions' => $regions,
                    'reality' => $reality]);
            }
        }
    }

    public function updateRealityStatus($id, $status)
    {
        $reality = DB::table('reality')->where('id', $id)->update(['status' => $status]);

        if($reality){
            return response(['error' => false, 'message' => 'Ստատուսը փոփոխվեց']);
        }else{
            return response(['error' => true, 'message' => 'Փորցեք մի փոքր ուշ']);
        }
    }

    public function addRealityBlade()
    {
        $regions = DB::table('regions')->get();
        $subRegions = DB::table('sub_regions')->get();
        if(Auth::user()->admin == 1){
            return back();
        }else if(Auth::user()->admin == 0){
            $users = DB::table('users')->where('admin_id', Auth::user()->id)->get();
            $admins = [];
        }else{
            $users = DB::table('users')->whereNotIn('admin',[1,3,0])->get();
            $admins = DB::table('users')->where('admin', 0)->get();
            // dd($users);
        }
        return view('admin.reality.add-reality', [
            'error'=> false,
            'edit' => false,
            'admin'=>Auth::user()->Admin(),
            'subRegions' => $subRegions,
            'users' => $users,
            'admins' => $admins,
            'regions' => $regions]);
    }

    public function addRealityPost(Request $request)
    {
        $regions = DB::table('regions')->get();
        $subRegions = DB::table('sub_regions')->get();
        if(Auth::user()->admin == 1){
            return back();
        }else if(Auth::user()->admin == 0){
            $users = DB::table('users')->where('admin_id', Auth::user()->id)->get();
            $admins = [];
        }else{
            $users = DB::table('users')->where([['admin_id','<>', 0],['admin_id','<>', 4],['admin_id','<>', 1]])->get();
            $admins = DB::table('users')->where('admin', 0)->get();
        }
        $re = DB::table('reality')
        ->where('type', $request->type)
        ->where('region', $request->region)
        ->where('subRegion', $request->subRegion)
        ->where('street', $request->street)
        ->where('buildingNumber', $request->buildingNumber)
        ->where('apartamentNumber', $request->apartamentNumber)->get();
        
        if(count($re) > 0){
             return view('admin.reality.add-reality', [
            'error'=> true,
            'errormessage' => 'Գույքը գոյություն ունի',
            'edit' => false,
            'admin'=>Auth::user()->Admin(),
            'subRegions' => $subRegions,
            'users' => $users,
            'admins' => $admins,
            'regions' => $regions]);
        }else{
            $array = [
                "code" => $request->code,
                "type" => $request->type,
                "realityType" => $request->realityType,
                "proect" => $request->proect,
                "buildingType" => $request->buildingType,
                "cosmetic" => $request->cosmetic,
                "balcon" => $request->balcon,
                "region" => $request->region,
                "subRegion" => $request->subRegion,
                "street" => $request->street,
                "buildingNumber" => $request->buildingNumber,
                "apartamentNumber" => $request->apartamentNumber,
                "floors" => $request->floors,
                "area" => $request->area,
                "rooms" => $request->rooms,
                "price" => $request->price,
                "buildingFloors" => $request->buildingFloors,
                "gardenArea" => $request->gardenArea,
                "faceArea" => $request->faceArea,
                "phone" => $request->phone,
                "customerName" => $request->customerName,
                "link" => $request->link,
                "info" => $request->info,
                "firstFloor" => 0,
                "status" => 1,
                "lastFloor" => 0,
                "user_id" => Auth::id(),
                "created_at" => date('Y-m-d-H:i:s'),
                "updated_at" => date('Y-m-d-H:i:s'),
            ];
            if($request->lastFloor && $request->lastFloor === 'on') {
                $array["lastFloor"] = 1;
            }
    
            if($request->firstFloor && $request->firstFloor === 'on') {
                $array["firstFloor"] = 1;
            }
            $save = DB::table('reality')->insert($array);
    
            if ($save) {
                return redirect('/admin/reality/reality-list/1/1');
            }else {
                return response([
                    'error' => true,
                ]);
            }
        }
    }

    public function updateRealityBlade($id)
    {
        $admins = DB::table('users')->where('admin','=', 0)->get();

        $reality = DB::table('reality')->where('id', $id)->get();
        $regions = DB::table('regions')->get();
        $subRegions = DB::table('sub_regions')->get();
        if(Auth::user()->admin == 0){
            $users = DB::table('users')->where('admin_id', Auth::user()->id)->where('admin_id', Auth::user()->id)->get();
        }else{
            $users = DB::table('users')->where('admin_id','<>', 0)->get();
        }

        return view('admin.reality.add-reality', [
            'error'=> false,
            'admin'=>Auth::user()->Admin(),
            'edit' => true,
            'users'=>$users,
            'admins'=>$admins,
            'subRegions' => $subRegions,
            'regions' => $regions,
            'reality' => $reality[0]]);
    }

    public function updateRealityPost(Request $request, $id)
    {
        $regions = DB::table('regions')->get();
        $subRegions = DB::table('sub_regions')->get();
        if(Auth::user()->admin == 1){
            return back();
        }else if(Auth::user()->admin == 0){
            $users = DB::table('users')->where('admin_id', Auth::user()->id)->get();
            $admins = [];
        }else{
            $users = DB::table('users')->where([['admin_id','<>', 0],['admin_id','<>', 4],['admin_id','<>', 1]])->get();
            $admins = DB::table('users')->where('admin', 0)->get();
        }
        $re = DB::table('reality')
        ->whereNotIn('id', [$id])
        ->where('type', $request->type)
        ->where('region', $request->region)
        ->where('subRegion', $request->subRegion)
        ->where('street', $request->street)
        ->where('buildingNumber', $request->buildingNumber)
        ->where('apartamentNumber', $request->apartamentNumber)->get();
        
        if(count($re) > 0){
             return view('admin.reality.add-reality', [
            'error'=> true,
            'errormessage' => 'Գույքը գոյություն ունի',
            'edit' => false,
            'admin'=>Auth::user()->Admin(),
            'subRegions' => $subRegions,
            'users' => $users,
            'admins' => $admins,
            'regions' => $regions]);
        }else{
            $array = [
                "code" => $request->code,
                "type" => $request->type,
                "realityType" => $request->realityType,
                "proect" => $request->proect,
                "buildingType" => $request->buildingType,
                "cosmetic" => $request->cosmetic,
                "balcon" => $request->balcon,
                "region" => $request->region,
                "subRegion" => $request->subRegion,
                "street" => $request->street,
                "buildingNumber" => $request->buildingNumber,
                "apartamentNumber" => $request->apartamentNumber,
                "floors" => $request->floors,
                "area" => $request->area,
                "rooms" => $request->rooms,
                "price" => $request->price,
                "buildingFloors" => $request->buildingFloors,
                "gardenArea" => $request->gardenArea,
                "faceArea" => $request->faceArea,
                "phone" => $request->phone,
                "customerName" => $request->customerName,
                "link" => $request->link,
                "info" => $request->info,
                "firstFloor" => 0,
                "lastFloor" => 0,
                "user_id" => $request->user,
                "updated_at" => date('Y-m-d-H:i:s'),
            ];
        
            if($request->lastFloor && $request->lastFloor === 'on') {
                $array["lastFloor"] = 1;
            }
        
            if($request->firstFloor && $request->firstFloor === 'on') {
                $array["firstFloor"] = 1;
            }
            $save = DB::table('reality')->where('id', $id)->update($array);
        
            if ($save) {
                return redirect('/admin/reality/reality-list/1/1');
            }else {
                return response([
                    'error' => true,
                ]);
            }
        }
    }

    public function usersList($id)
    {
        if(Auth::user()->Admin() == 2){
            $users = DB::table('reality')->where('type', $id)->where('user_id', Auth::user()->id)->paginate(20);

            return view('admin.reality.users', [
                'users' => $users,
                'id'=>$id,
                'admin'=>Auth::user()->Admin(),
                'error' => false]);
        }else if(Auth::user()->Admin() == 0){
            // $ar = [];
            // $user = DB::table('users')->select('id')->where('admin_id',  Auth::user()->id)->get();
            

            // for($i = 0; $i < count($user); $i++){
            //     array_push($ar, [$user[$i]->id]);
            // }
            
            // $users = DB::table('reality')->whereIn('id', $ar)->paginate(20);
            $ar = [];
            $users = DB::table('users')->where('admin_id',  Auth::user()->id)->get();
            
            $sql = DB::table('reality');
            for($i = 0; $i < count($users); $i++){
                $sql->orWhere(function ($sql) use ($id,$users, $i, $ar) {
                    $sql->where('type', $id);
                    $sql->where('user_id', '=', $users[$i]->id);
                });
            };
            
            $reality = $sql->orderBy('code', 'desc')->paginate(30);
            return view('admin.reality.users', [
                'users' => $reality,
                'id'=>$id,
                'admin'=>Auth::user()->Admin(),
                'error' => false]);
        }else{
            $user = DB::table('users')->select('id')->get();
            $users = DB::table('reality')->where('type', $id)->paginate(20);
            return view('admin.reality.users', [
                'users' => $users,
                'id'=>$id,
                'admin'=>Auth::user()->Admin(),
                'error' => false]);
        }


    }

    public function curentUser($id)
    {
        if(Auth::user()->Admin() == 2){
            $user = DB::table('reality')->where('id', $id)->where('user_id', Auth::user()->id)->get();
            $users = DB::table('users')->where('id', Auth::user()->id)->get();

            $array = [];
            if(intval($user[0]->type) == "3"){
                $type = 0;
            }else if(intval($user[0]->type) == "2"){
                $type = 1;
            }
            array_push($array, ["type","=", $type]);
            if($user[0]->realityType && $user[0]->realityType != "-1"){
                array_push($array, ["realityType", "=",intval($user[0]->realityType)]);
            }
            if($user[0]->proect && $user[0]->proect != "-1"){
                array_push($array, ["proect", "=",intval($user[0]->proect)]);
            }
            if($user[0]->buildingType && $user[0]->buildingType != "-1"){
                array_push($array, ["buildingType", "=",intval($user[0]->buildingType)]);
            }
            if($user[0]->cosmetic && $user[0]->cosmetic != "-1"){
                array_push($array, ["cosmetic", "=",intval($user[0]->cosmetic)]);
            }
            if($user[0]->balcon && $user[0]->balcon != "-1"){
                array_push($array, ["balcon", "=",intval($users[0]->balcon)]);
            }
            if($user[0]->region && $user[0]->region != "-1"){
                array_push($array, ["region", "=",intval($user[0]->region)]);
            }
            if($user[0]->subRegion && $user[0]->subRegion != "-1"){
                array_push($array, ["subRegion", "=",intval($user[0]->subRegion)]);
            }
            if($user[0]->street && $user[0]->street != null){
                array_push($array, ["street", "like","%".$user[0]->street."%"]);
            }
            if($user[0]->buildingNumber && $user[0]->buildingNumber != null){
                array_push($array, ["buildingNumber", "=",$user[0]->buildingNumber]);
            }
            if($user[0]->apartamentNumber && $user[0]->apartamentNumber != null){
                array_push($array, ["apartamentNumber", "=",intval($user[0]->apartamentNumber)]);
            }
            if($user[0]->floors && $user[0]->floors != null){
                array_push($array, ["floors", "<=",intval($user[0]->floors)]);
            }
            if($user[0]->firstFloor && $user[0]->firstFloor == "1"){
                array_push($array, ["firstFloor", "=",intval($user[0]->firstFloor)]);
            }
            if($user[0]->lastFloor && $user[0]->lastFloor == "1"){
                array_push($array, ["lastFloor", "=",intval($user[0]->lastFloor)]);
            }
            if($user[0]->area && $user[0]->area != null){
                array_push($array, ["area", "<=",intval($user[0]->area)]);
            }
            if($user[0]->rooms && $user[0]->rooms != null){
                array_push($array, ["rooms", "<=",intval($user[0]->rooms)]);
            }
            if($user[0]->price && $user[0]->price != null){
                array_push($array, ["price", "<=",intval($user[0]->price)]);
            }
            if($user[0]->buildingFloors && $user[0]->buildingFloors != null){
                array_push($array, ["buildingFloors", "<=",intval($user[0]->buildingFloors)]);
            }
            if($user[0]->gardenArea && $user[0]->gardenArea != null){
                array_push($array, ["gardenArea", "<=",intval($user[0]->gardenArea)]);
            }
            if($user[0]->faceArea && $user[0]->faceArea != null){
                array_push($array, ["faceArea", "<=",intval($user[0]->faceArea)]);
            }
            
             array_push($array, ["user_id", "=",Auth::user()->id]);

            $reality = DB::table('reality')->where($array)->paginate(30);
            $regions = DB::table('regions')->get();
            $subRegions = DB::table('sub_regions')->get();
            return view('admin.reality.singleUser', [
                'user' => $user[0],
                'reality' => $reality,
                'id'=>$id,
                'users'=>$users,
                'subRegions' => $subRegions,
                'regions' => $regions,
                'admin'=>Auth::user()->Admin(),
                'error' => false]);
        }else if(Auth::user()->Admin() == 0){
            
            $users = DB::table('users')->where('admin_id', Auth::user()->id)->get();
            $user = DB::table('reality')->where('id', $id)->get();
            if(intval($user[0]->type) == "3"){
                $type = 0;
            }else if(intval($user[0]->type) == "2"){
                $type = 1;
            }
            $array = [];
            array_push($array, ["type","=", $type]);
            if($user[0]->realityType && $user[0]->realityType != "-1"){
                array_push($array, ["realityType", "=",intval($user[0]->realityType)]);
            }
            if($user[0]->proect && $user[0]->proect != "-1"){
                array_push($array, ["proect", "=",intval($user[0]->proect)]);
            }
            if($user[0]->buildingType && $user[0]->buildingType != "-1"){
                array_push($array, ["buildingType", "=",intval($user[0]->buildingType)]);
            }
            if($user[0]->cosmetic && $user[0]->cosmetic != "-1"){
                array_push($array, ["cosmetic", "=",intval($user[0]->cosmetic)]);
            }
            if($user[0]->balcon && $user[0]->balcon != "-1"){
                array_push($array, ["balcon", "=",intval($user[0]->balcon)]);
            }
            if($user[0]->region && $user[0]->region != "-1"){
                array_push($array, ["region", "=",intval($user[0]->region)]);
            }
            if($user[0]->subRegion && $user[0]->subRegion != "-1"){
                array_push($array, ["subRegion", "=",intval($user[0]->subRegion)]);
            }
            if($user[0]->street && $user[0]->street != null){
                array_push($array, ["street", "like","%".$user[0]->street."%"]);
            }
            if($user[0]->buildingNumber && $user[0]->buildingNumber != null){
                array_push($array, ["buildingNumber", "=",$user[0]->buildingNumber]);
            }
            if($user[0]->apartamentNumber && $user[0]->apartamentNumber != null){
                array_push($array, ["apartamentNumber", "=",intval($user[0]->apartamentNumber)]);
            }
            if($user[0]->floors && $user[0]->floors != null){
                array_push($array, ["floors", "<=",intval($user[0]->floors)]);
            }
            if($user[0]->firstFloor && $user[0]->firstFloor == "1"){
                array_push($array, ["firstFloor", "=",intval($user[0]->firstFloor)]);
            }
            if($user[0]->lastFloor && $user[0]->lastFloor == "1"){
                array_push($array, ["lastFloor", "=",intval($user[0]->lastFloor)]);
            }
            if($user[0]->area && $user[0]->area != null){
                array_push($array, ["area", "<=",intval($user[0]->area)]);
            }
            if($user[0]->rooms && $user[0]->rooms != null){
                array_push($array, ["rooms", "<=",intval($user[0]->rooms)]);
            }
            if($user[0]->price && $user[0]->price != null){
                array_push($array, ["price", "<=",intval($user[0]->price)]);
            }
            if($user[0]->buildingFloors && $user[0]->buildingFloors != null){
                array_push($array, ["buildingFloors", "<=",intval($user[0]->buildingFloors)]);
            }
            if($user[0]->gardenArea && $user[0]->gardenArea != null){
                array_push($array, ["gardenArea", "<=",intval($user[0]->gardenArea)]);
            }
            if($user[0]->faceArea && $user[0]->faceArea != null){
                array_push($array, ["faceArea", "<=",intval($user[0]->faceArea)]);
            }
            $sql = DB::table('reality');
            for($i = 0; $i < count($users); $i++){
                $sql->orWhere(function ($sql) use ($users, $i, $array) {
                    $sql->where($array);
                    $sql->where('user_id', '=', $users[$i]->id);
                });
            };
            
            $reality = $sql->orderBy('code', 'desc')->paginate(30);


            // ->where($array)->paginate(30);
            $regions = DB::table('regions')->get();
            $subRegions = DB::table('sub_regions')->get();
            return view('admin.reality.singleUser', [
                'user' => $user[0],
                'reality' => $reality,
                'id'=>$id,
                'users'=>$users,
                'subRegions' => $subRegions,
                'regions' => $regions,
                'admin'=>Auth::user()->Admin(),
                'error' => false]);
        }else{
            $users = DB::table('users')->get();
            $user = DB::table('reality')->where('id', $id)->get();
            if(intval($user[0]->type) == "3"){
                $type = 0;
            }else if(intval($user[0]->type) == "2"){
                $type = 1;
            }
            $array = [];
            array_push($array, ["type","=", $type]);
            if($user[0]->realityType && $user[0]->realityType != "-1"){
                array_push($array, ["realityType", "=",intval($user[0]->realityType)]);
            }
            if($user[0]->proect && $user[0]->proect != "-1"){
                array_push($array, ["proect", "=",intval($user[0]->proect)]);
            }
            if($user[0]->buildingType && $user[0]->buildingType != "-1"){
                array_push($array, ["buildingType", "=",intval($user[0]->buildingType)]);
            }
            if($user[0]->cosmetic && $user[0]->cosmetic != "-1"){
                array_push($array, ["cosmetic", "=",intval($user[0]->cosmetic)]);
            }
            if($user[0]->balcon && $user[0]->balcon != "-1"){
                array_push($array, ["balcon", "=",intval($user[0]->balcon)]);
            }
            if($user[0]->region && $user[0]->region != "-1"){
                array_push($array, ["region", "=",intval($user[0]->region)]);
            }
            if($user[0]->subRegion && $user[0]->subRegion != "-1"){
                array_push($array, ["subRegion", "=",intval($user[0]->subRegion)]);
            }
            if($user[0]->street && $user[0]->street != null){
                array_push($array, ["street", "like","%".$user[0]->street."%"]);
            }
            if($user[0]->buildingNumber && $user[0]->buildingNumber != null){
                array_push($array, ["buildingNumber", "=",$user[0]->buildingNumber]);
            }
            if($user[0]->apartamentNumber && $user[0]->apartamentNumber != null){
                array_push($array, ["apartamentNumber", "=",intval($user[0]->apartamentNumber)]);
            }
            if($user[0]->floors && $user[0]->floors != null){
                array_push($array, ["floors", "<=",intval($user[0]->floors)]);
            }
            if($user[0]->firstFloor && $user[0]->firstFloor == "1"){
                array_push($array, ["firstFloor", "=",intval($user[0]->firstFloor)]);
            }
            if($user[0]->lastFloor && $user[0]->lastFloor == "1"){
                array_push($array, ["lastFloor", "=",intval($user[0]->lastFloor)]);
            }
            if($user[0]->area && $user[0]->area != null){
                array_push($array, ["area", "<=",intval($user[0]->area)]);
            }
            if($user[0]->rooms && $user[0]->rooms != null){
                array_push($array, ["rooms", "<=",intval($user[0]->rooms)]);
            }
            if($user[0]->price && $user[0]->price != null){
                array_push($array, ["price", "<=",intval($user[0]->price)]);
            }
            if($user[0]->buildingFloors && $user[0]->buildingFloors != null){
                array_push($array, ["buildingFloors", "<=",intval($user[0]->buildingFloors)]);
            }
            if($user[0]->gardenArea && $user[0]->gardenArea != null){
                array_push($array, ["gardenArea", "<=",intval($user[0]->gardenArea)]);
            }
            if($user[0]->faceArea && $user[0]->faceArea != null){
                array_push($array, ["faceArea", "<=",intval($user[0]->faceArea)]);
            }


            $sql = DB::table('reality');
            for($i = 0; $i < count($users); $i++){
                $sql->orWhere(function ($sql) use ($users, $i, $array) {
                    $sql->where($array);
                    $sql->where('user_id', '=', $users[$i]->id);
                });
            }
            $reality = $sql->orderBy('code', 'desc')->paginate(30);

            $regions = DB::table('regions')->get();
            $subRegions = DB::table('sub_regions')->get();
            return view('admin.reality.singleUser', [
                'user' => $user[0],
                'reality' => $reality,
                'id'=>$id,
                'users'=>$users,
                'subRegions' => $subRegions,
                'regions' => $regions,
                'admin'=>Auth::user()->Admin(),
                'error' => false]);
        }


    }

    public function singleRealityBlade($id){
        if(Auth::user()->Admin() == 2){
            $reality = DB::table('reality')->where('id', $id)->where('user_id', Auth::user()->id)->get();
            $regions = DB::table('regions')->get();
            $subRegions = DB::table('sub_regions')->get();
            $users = DB::table('users')->where('id', Auth::user()->id)->get();
            return view('admin.reality.single', [
                'user' => $users[0],
                'reality' => $reality[0],
                'id'=>$id,
                'subRegions' => $subRegions,
                'regions' => $regions,
                'admin'=>Auth::user()->Admin(),
                'error' => false]);
        }else{
            $reality = DB::table('reality')->where('id', $id)->get();
            $regions = DB::table('regions')->get();
            $subRegions = DB::table('sub_regions')->get();
            $users = DB::table('users')->where('id', Auth::user()->id)->get();
            return view('admin.reality.single', [
                'user' => $users[0],
                'reality' => $reality[0],
                'id'=>$id,
                'subRegions' => $subRegions,
                'regions' => $regions,
                'admin'=>Auth::user()->Admin(),
                'error' => false]);
        }
    }

    public function getCode()
    {
        $arr = [];

        if(Auth::user()->Admin() == 2){
            $code = DB::table('reality')->select('code')->where('user_id', Auth::user()->id)->get();
        }else if(Auth::user()->Admin() == 1){
            $code = DB::table('reality')->select('code')->get();
        }else if(Auth::user()->Admin() == 0){
            $users = DB::table('users')->select('id')->where('admin_id',  Auth::user()->id)->get();
            for($i = 0; $i < count($users); $i++){
                array_push($arr, ['user_id', '=',$users[$i]->id]);
            }
            $code = DB::table('reality')->select('code')->where([ $arr])->get();
        }

        return response(['error' => false, 'code' => $code]);
    }

    public function getCount($id)
    {
        $count = DB::table('reality')
            ->where('user_id', $id)->select('id')->get();
        return response(['error'=> false, 'count' => $count]);
    }

    public function getRealityByUserId($id)
    {
        $admins = DB::table('users')->where('admin','=', 0)->get();
        $regions = DB::table('regions')->get();
        $subRegions = DB::table('sub_regions')->get();
        $reality = DB::table('reality')
            ->where('user_id', $id)->paginate(10);
        $users = DB::table('users')->where('admin','=', 2)->get();

        return view('admin.reality.byUserId',[
            'error'=> false,
            'id' => $id,
            'admin'=>Auth::user()->Admin(),
            'users'=> $users,
            'superadmins'=>$admins,
            'subRegions' => $subRegions,
            'regions' => $regions,
            'reality' => $reality]);
    }

    public function delete($id)
    {
        $delete = Db::table('reality')->where('id', $id)->delete();
        if($delete) {
            return redirect('/admin/reality/reality-list/1/1');
        }else {
            $reality = DB::table('reality')->where('id', $id)->where('user_id', Auth::user()->id)->get();
            $regions = DB::table('regions')->get();
            $subRegions = DB::table('sub_regions')->get();
            $users = DB::table('users')->where('id', Auth::user()->id)->get();
            return view('admin.reality.single', [
                'user' => $users[0],
                'reality' => $reality[0],
                'id'=>$id,
                'subRegions' => $subRegions,
                'regions' => $regions,
                'admin'=>Auth::user()->Admin(),
                'error' => true]);
        }
    }
}
