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
                        <h4 class="page-title breadcrumb">Ադմիններ</h4>
                    </div>
                </div>
                <div class="row">
                    <p id="errorMessageUserDelete"></p>
                </div>
                <div class="card-box">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="p-20">
                                <table class="table table-bordered m-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Անուն</th>
                                        <th>Հասցե</th>
                                        <th>Էլ-հասցե</th>
                                        <th>Հեռախոսահամար</th>
                                        <th>Ստեղծվել է</th>
                                        <th>Վիճակ</th>
                                        <th>Ընկերությունն</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($admins as $key => $admin)
                                        <tr style="color: black;" class="{{$key % 2 == 0 ? 'odd' : ''}}">
                                            <th scope="row">{!! $loop->index + 1 !!}</th>
                                            <td>{!! $admin->name !!}</td>
                                            <td>{!! $admin->address !!}</td>
                                            <td>{!! $admin->email !!}</td>
                                            <td>{!! $admin->phone !!}</td>
                                            <td>{!! $admin->date !!}</td>
                                            <td>{!! $admin->status ? 'Ակտիվ' : 'Պասիվ'!!}</td>
                                            <td>{!! $admin->getCompany()->name!!}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @include('adminLayouts.footer')
            </div>
        </div>
@stop