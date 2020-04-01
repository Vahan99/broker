<?php

namespace App\Http\Controllers;

use App\Customer;
use App\CustomerFilter;
use App\Http\Data\Customer as CustomerData;
use App\Http\Data\Realty as DataRealty;
use App\Http\Data\Rules;
use App\Http\Helper\Filtering;
use App\Region;
use App\SubRegion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'customerData' => new CustomerData,
            'customers'    => \Auth::user()->customers,
        ];
        if (request()->ajax()) {
            $data['customers'] = (new Filtering($request, new Customer))->filter->paginate(10);
            return response()->json(view('customer.table', $data)->render());
        } else{
            return view('customer.index', $data);
        }
    }

    public function single(Request $request, $id)
    {
        $data['realtyData'] = new DataRealty;
        $data['customer']   = Customer::find($id);
        $data['filters']    = Customer::find($id)->filters;
        if($request->filter){
            $data['filter']         = Customer::find($id)->filters()->whereId($request->filter)->first();
            if($data['filter']){
                $request            = $data['filter']->toArray();
                $request['broker']  = Auth::id();
                $data['reality']    = (new Filtering($request, new \App\Reality))->filter->paginate(10);
                $data['realtyData'] = new DataRealty;
                $data['admin']      = Auth::user()->Admin();
            }
        }

        return view('customer.single', $data);
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
            'name'        => 'required',
            'user_id'     => 'required',
            'customer'    => 'required',
            'first_phone' => 'unique:customers',
            'last_phone'  => 'unique:customers',
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
            'subRegions'      => SubRegion::get(),
            'action'          => 'customer.filter.add',
            'customers'       => Auth::user()->customers()->orderBy('created_at', 'desc')->orderBy('customer', 'desc')->get(),
            'customerFilters' => CustomerFilter::whereIn('customer_id', \Auth::user()->customers()->pluck('id')->toArray())->get(),
        ]);
    }

    public function addFilter(Request $request)
    {
        $request->validate([
            'customer_id' => 'required'
        ]);

        $request['type'] = Customer::find($request['customer_id'])->customer;

        CustomerFilter::create($request->all());

        return redirect()->back()->with('message', ['status' => 'success', 'text' => 'Successfully.']);
    }
}
