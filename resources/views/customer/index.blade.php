@extends('adminLayouts.index')
@section('title', 'Admin Dashboard')
@section('content')
    @include('adminLayouts.header')
    @include('adminLayouts.sidebar')
    <div class="content-page" id="reality-filter">
        <!-- Start content -->
        <input type="hidden" name="_token" value="{!! csrf_token() !!}" id="token">
        <div class="content">
            <div class="container">
                <div class="row m-t-20" id="customer-filter">
                    <div class="col-sm-4">
                        <h4 class="page-title">Հաճախորդների Ցուցակ</h4>
                    </div>
                    <div class="col-sm-2 col-sm-offset-4">
                        <select name="customer" class="form-control">
                            <option value="all">Բոլորը</option>
                            @foreach($customerData->types() as $type)
                                <option value="{{$type['value']}}">{{$type['label']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <input type="search" class="form-control" placeholder="Փնտրել" name="search">
                    </div>
                </div>
                <div class="table-block row m-t-20 tabelList">
                    @include('customer.table')
                </div>
                @include('adminLayouts.footer')
            </div>
        </div>
        <span class="print">
            <button class="printNumbers">0</button>
        </span>
@stop