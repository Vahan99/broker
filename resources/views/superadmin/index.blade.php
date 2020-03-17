@extends('adminLayouts.index')
@section('title', 'Admin Dashboard')
@section('content')
    @include('adminLayouts.header')
    @include('adminLayouts.sidebar')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <div class="row m-t-20">
                    <div class="col-sm-12">
                        <h4 class="page-title breadcrumb">Գլխավոր</h4>
                    </div>
                </div>
                <div class="row">
                    <p id="errorMessageUserDelete"></p>
                </div>
                <div class="card-box">
                </div>
                @include('adminLayouts.footer')
            </div>
        </div>
@stop