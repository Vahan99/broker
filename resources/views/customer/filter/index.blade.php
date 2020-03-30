@extends('adminLayouts.index')
@section('title', 'Admin Dashboard')
@section('content')
    @include('adminLayouts.header')
    @include('adminLayouts.sidebar')
    <div class="content-page">
        <!-- Start content -->
        <input type="hidden" name="_token" value="{!! csrf_token() !!}" id="token">
        <div class="content">
            <div class="container">
                <div class="row m-t-20">
                    <div class="col-sm-4">
                        <h4 class="page-title breadcrumb">Հաճախորդների ֆիլտրացյաներ</h4>
                    </div>
                </div>
                <div class="row search-box m-t-20">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="customers">Հաճախորդներ</label>
                            <select name="customers" id="customers" class="form-control">
                                @foreach($customers as $customer)
                                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="customerFilters">ֆիլտրացյաներ</label>
                            <select name="customerFilters" id="customerFilters" class="form-control">
                                @isset($customerFilters)
                                    @foreach($customerFilters as $filter)
                                        <option value="{{$filter->id}}">{{$filter->name}}</option>
                                    @endforeach
                                @endisset
                            </select>
                        </div>
                    </div>
                </div>
                <div class="table-block row m-t-20 tabelList">
    {{--                        @include('reality.table')--}}
                </div>

                </div>
                <!-- Modal -->
                @include('adminLayouts.footer')
            </div>
        </div>
        <span class="print">
            <button class="printNumbers">0</button>
        </span>
@stop