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
                <div class="row m-t-20">
                    <div class="col-sm-4">
                        <h4 class="page-title breadcrumb">Հաճախորդների Ցուցակ</h4>
                    </div>
                </div>
                <div class="table-block row m-t-20 tabelList">
                    <div class="col-sm-12 card-box">
                        <div class="table-responsive">
                            @if(count($customers) > 0)
                                <table class="table table-bordered m-0">
                                    <thead  id="subRegionTableHeade">
                                        <tr>
                                            <th>#</th>
                                            <th>Հաճաղորդ</th>
                                            <th>Անուն</th>
                                            <th>Ազգանուն</th>
                                            <th>էլ․ հասցե</th>
                                            <th>Բջջ․</th>
                                            <th>Քաղ․</th>
                                        </tr>
                                    </thead>
                                    <tbody id="subRegionTableBody">
                                        @foreach ($customers as $key => $customer)
                                            <tr class="{{$key % 2 == 0 ? 'odd' : ''}}">
                                                <td>{!! $customer->id !!}</td>
                                                <td>{!! $customerData->types()[$customer->customer]['label'] !!}</td>
                                                <td>{!! $customer->name !!}</td>
                                                <td>{!! $customer->surname !!}</td>
                                                <td>{!! $customer->email !!}</td>
                                                <td>{!! $customer->first_phone !!}</td>
                                                <td>{!! $customer->last_phone !!}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>Տվյալներ չեն գտնվել</p>
                            @endif
                        </div>
                    </div>
                </div>
                @include('adminLayouts.footer')
            </div>
        </div>
        <span class="print">
            <button class="printNumbers">0</button>
        </span>
@stop