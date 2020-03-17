@extends('adminLayouts.index')
@section('title', 'Admin Dashboard')
@section('content')
    @include('adminLayouts.header')
    @include('adminLayouts.sidebar')
    <style>
    .table-container {
        height: 55rem;
        overflow:auto;
    }
    </style>
    <script src="{{asset('js/Chart.bundle.js')}}"></script>
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
                    <div class="row">
                        <div class="container">
                            <div class="col-md-6">
                                <canvas id="companyDateChart" width="400" height="400"></canvas>
                            </div>
                            <div class="col-md-6 table-container">
                                    <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col"><span>Ամսաթիվ</span> </th>
                                            <th scope="col"><span>Անուն</span> </th>
                                            <th scope="col"><span>Հասցե</span> </th>
                                            <th scope="col"><span>էլ հասցե</span> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($companies as $company)
                                            <tr>
                                                <th scope="row">{{$company->date}}</th>
                                                <td>{{$company->name}}</td>
                                                <td>{{$company->address}}</td>
                                                <td>{{$company->email}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @include('adminLayouts.footer')
                @push('scripts')
                    <script src="{{asset('js/chart.js')}}"></script>
                @endpush
            </div>
        </div>
@stop