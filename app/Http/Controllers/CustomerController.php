<?php

namespace App\Http\Controllers;

use App\Customer;
use App\CustomerFilter;
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
            'first_phone'    => 'unique:customers',
            'last_phone'    => 'unique:customers',
        ]);

        Customer::create($request->all());

        return redirect()->back();
    }

    public function createFilter()
    {
        return view('customer.filter.create-edit', [
            'rules'           => new Rules(),
            'regions'         => Region::get(),
            'realtyData'      => new DataRealty,
            'customerFilters' => CustomerFilter::get(),
            'subRegions'      => SubRegion::get(),
            'action'          => 'customer.filter.add',
            'customers'       => Customer::orderBy('created_at', 'desc')->orderBy('customer', 'desc')->get(),
        ]);
    }

    public function addFilter(Request $request)
    {
        $request->validate([
            'customer_id' => 'required'
        ]);

        CustomerFilter::create($request->all());

        return redirect()->back()->with('message', ['status' => 'success', 'text' => 'Success fully.']);
    }
}
