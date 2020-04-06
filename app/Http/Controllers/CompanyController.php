<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        $admin     = Auth::user()->Admin();
        return view('superadmin.company.index', compact('admin', 'companies'));
    }

    public function indexAdmin()
    {
        $admins = \App\User::whereAdmin(1)->has('companyUser')->get();
        $admin  = Auth::user()->Admin();
        return view('superadmin.admin.index', compact('admin', 'admins'));
    }

    public function createCompany()
    {
        $admin = Auth::user()->Admin();
        return view('superadmin.company.create-update', compact('admin'));
    }

    public function updateCompany($id)
    {
        $admin   = Auth::user()->Admin();
        $company = Company::find($id);
        return view('superadmin.company.create-update', compact('company', 'admin'));
    }

    public function editCompany($id, Request $request)
    {
        if(isset($request->display)){
            $request['display'] = $request->display === 'true' ? true : false;
        }

        Company::find($id)->update($request->all());

        return redirect()->route('company.index');
    }

    public function storeCompany(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'address' => 'required',
            'phone'   => 'required',
            'email'   => 'required|unique:companies',
        ]);

        Company::create($request->all());

        return redirect()->route('company.index');
    }

    public function createAdmin()
    {
        $admin     = Auth::user()->Admin();
        $companies = Company::with('companyUser')->has('companyUser', '==', '0')->get();
        return view('superadmin.admin.create-update', compact('admin', 'companies'));
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name'       => 'required',
            'address'    => 'required',
            'phone'      => 'required',
            'email'      => 'required|unique:users',
            'company_id' => 'required',
        ]);

        $user = \App\User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'address'  => $request->address,
            'password' => bcrypt($request->password),
            'status'   => 1,
            'admin'    => 1,
        ]);

        $user->companyUser()->create([
            'company_id' => $request->company_id,
            'user_id'    => $user->id
        ]);

        return redirect()->route('company.admin.index');
    }
}
