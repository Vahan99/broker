<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Data\Customer as CustomerData;
use App\Http\Data\Realty as DataRealty;
use App\Http\Data\Rules;
use App\Reality;
use App\Region;
use App\SubRegion;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.index', [
            'customers'    => Customer::get(),
            'customerData' => new CustomerData,
        ]);
    }

    public function create()
    {
        return view('customer.create-edit', [
            'action'       => 'customer.add',
            'customerData' => new CustomerData,
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'user_id'  => 'required',
            'customer' => 'required',
            'email'    => 'unique:customers',
            'first_phone'    => 'unique:customers',
            'last_phone'    => 'unique:customers',
        ]);

        Customer::create($request->all());

        return redirect()->back();
    }
}
