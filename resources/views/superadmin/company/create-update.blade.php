@extends('adminLayouts.index')
@section('title', 'Admin Dashboard')
@section('content')
    @include('adminLayouts.header')
    @include('adminLayouts.sidebar')
    <div class="content-page">
        <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="card-box" id="editUserArea" style="display: block">
                <div class="row">
                    <div class="col-sm-6">
                        <p class="alert-danger" id="resetErrormessage"></p>
                        <h3 style="margin: 2.5rem 0">{{isset($company) ? 'Փոփոխել ընկերությունը' : 'Ավելացնել Ընկերությունն'}}</h3>
                        <form action="{{isset($company) ? route('company.edit', ['id' => $company->id]) : route('company.store')}}" method="post" accept-charset="utf-8">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="name">Անուն</label>
                                <input type="text" name="name" class="form-control" value="{{isset($company->name) ? $company->name : ''}}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">էլ-հասցե</label>
                                <input type="email" name="email" class="form-control" value="{{isset($company->email) ? $company->email : ''}}" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Հասցե</label>
                                <input type="text" name="address" class="form-control" value="{{isset($company->address) ? $company->address : ''}}" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Հեռախոսահամար</label>
                                <input type="number" name="phone" class="form-control" value="{{isset($company->phone) ? $company->phone : ''}}" required>
                            </div>
                            <div class="form-group">
                                <label for="tax_id">Հ․Վ․Հ․Հ</label>
                                <input type="text" name="tax_id" class="form-control" value="{{isset($company->tax_id) ? $company->tax_id : ''}}">
                            </div>
                            <button type="submit" class="btn btn-primary" id="addOrEditUserButton">{{isset($company) ? 'Փոփոխել' : 'Ավելացնել'}}</button>
                        </form>
                    </div>
                </div>
            </div>
            @include('adminLayouts.footer')
        </div>
    </div>
@stop
