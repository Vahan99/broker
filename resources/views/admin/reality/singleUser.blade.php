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
                        <h4 class="page-title breadcrumb">Գնորդ / Վարձակալ</h4>
                    </div>
                </div>
                <div class="row">
                    <p><b>Անուն ։ </b> {!! $user->customerName !!}</p>
                    <p><b>Հեռ ։ </b> {!! $user->phone !!}</p>
                </div>
                <div class="">
                    @if($error)
                        <p class="alert-danger"><b>Error !</b> Something goes wrong , please try again</p>
                    @endIf
                    <p class="alert alert-success" id="successMessageHallBookingDelete" style="display:none"></p>
                    <div class="row m-t-20 tabelList">
                        @include('admin.reality.table')
                    </div>

                </div>
                @include('adminLayouts.footer')
            </div>
        </div>
        <span class="print">
            <button class="printNumbers">0</button>
        </span>
@stop