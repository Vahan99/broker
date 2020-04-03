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
                        <h4 class="page-title breadcrumb">Գնորդներ / Վարձակալներ</h4>
                    </div>
                    <div class="col-sm-3">
                        <label for="type">Տեսակ</label>
                        <select name="type" id="typeSelectr" class="form-control">
                            <option value="2" {!! $id == '2' ? 'selected' : '' !!}>Գնորդ</option>
                            <option value="3" {!! $id == '3' ? 'selected' : '' !!}>Վարձակալ</option>
                        </select>
                    </div>
                </div>
                <div class="">
                    @if($error)
                        <p class="alert-danger"><b>Error !</b> Something goes wrong , please try again</p>
                    @endIf
                    <p class="alert alert-success" id="successMessageHallBookingDelete" style="display:none"></p>
                    <div class="row m-t-20 tabelList">
                        <div class="col-sm-12 card-box">
                            <div class="table-responsive">
                                <table class="table table-bordered m-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Տեսակ</th>
                                        <th>Անուն</th>
                                        <th>Դիտել</th>
                                    </tr>
                                    </thead>
                                    <tbody id="subRegionTableBody">
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{!! $user->id !!}</td>
                                            @if($user->type == 2)
                                                <td>Գնորդ</td>
                                            @else
                                                <td>Վարձակալ</td>
                                            @endif
                                            <td>{{ $user->customerName}}</td>
                                            <td>
                                                <a href="/admin/client/{!! $user->id !!}"
                                                   class="btn btn-primary btn-rounded waves-effect waves-light"><i
                                                            class="glyphicon glyphicon-eye-open"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
                @include('adminLayouts.footer')
            </div>
        </div>
@stop