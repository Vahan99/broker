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
                        <h4 class="page-title breadcrumb">Ընկերություններ</h4>
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
                                        <th>Հ․Վ․Հ․Հ</th>
                                        <th>Ստեղծվել է</th>
                                        <th>Գործողություն</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($companies as $key => $company)
                                        <tr style="color: black;" class="{{$key % 2 == 0 ? 'odd' : ''}}">
                                            <th scope="row">{!! $loop->index + 1 !!}</th>
                                            <td>{!! $company->name !!}</td>
                                            <td>{!! $company->address !!}</td>
                                            <td>{!! $company->email !!}</td>
                                            <td>{!! $company->phone !!}</td>
                                            <td>{!! $company->tax_id !!}</td>
                                            <td>{!! $company->date !!}</td>
                                            <td>
                                                <a href="{{route('company.update', ['id' => $company->id])}}" class="btn btn-primary btn-rounded waves-effect waves-light"><i class="glyphicon glyphicon-pencil"></i></a>
                                                <div class="material-switch pull-right" style="padding: 0 2rem 0 0">
                                                    <input data-id="{{$company->id}}" id="someSwitchOptionSuccess-{{$company->id}}" name="someSwitchOption001" type="checkbox" class="company-display " {{$company->display ? 'checked' : ''}} />
                                                    <label for="someSwitchOptionSuccess-{{$company->id}}" class="label-success"></label>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Դուք համոզված եք? </h4>
                            </div>
                            <div class="modal-body" id='userDeleteModalBody'>
                                <div class="form-group">
                                    <label for="koding1">Մուտքագրել կոդը</label>
                                    <input type="text" id="koding1" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Փակել</button>
                                <button type="button" class="btn btn-danger" id="dleteUserButton" disabled="disabled">Ջնջել</button>
                            </div>
                        </div>
                    </div>
                </div>

                @include('adminLayouts.footer')
            </div>
        </div>
@stop