<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if($request->chart){
            return Company::orderBy('created_at')->get()->groupBy(function ($group) {
                return \Carbon\Carbon::parse($group->created_at)->format('Y-m-d');
            })->toArray();
        } else {
            $companies = Company::get();
        } return view('superadmin.index', compact('companies'));
    }
}
