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
                            @if(!$companies->count())
                                <div class="alert alert-warning">
                                    <strong>Զգուշացում!</strong> Խնդրում ենք ավելացնել ընկերությունն.
                                </div>
                            @endif
                            <h3 style="margin: 2.5rem 0">{{isset($comapny_admin) ? 'Փոփոխել Ադմինին' : 'Ավելացնել Ադմին'}}</h3>
                            <form action="{{isset($company_admin) ? route('company.edit', ['id' => $company_admin->id]) : route('company.admin.store')}}" method="post" accept-charset="utf-8">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="name">Անուն</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">էլ-հասցե</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Հասցե</label>
                                    <input type="text" name="address" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Հեռախոսահամար</label>
                                    <input type="number" name="phone" class="form-control" required>
                                </div>
                                @if(!isset($company_admin))
                                    <div class="form-group">
                                        <label for="phone">Կցել  Ընկերություն</label>
                                        <select name="company_id"class="form-control" required>
                                            @foreach($companies as $company)
                                                <option value="{{$company->id}}">{{$company->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Գախտնաբառ</label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                @endif
                                <button type="submit" class="btn btn-primary" id="addOrEditUserButton">{{isset($company_admin) ? 'Փոփոխել' : 'Ավելացնել'}}</button>
                            </form>
                        </div>
                    </div>
                </div>
                @include('adminLayouts.footer')
            </div>
        </div>
@stop
