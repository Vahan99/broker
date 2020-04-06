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
                    @if (!$edit)
                        <div class="col-sm-12">
                            <h4 class="page-title breadcrumb">Ավելացնել աշխատակից</h4>
                        </div>
                    @endIf
                    @if ($edit)
                        <div class="col-sm-12">
                            <h4 class="page-title breadcrumb">Փոփոխել Գործակալի տվյալները</h4>
                        </div>
                    @endIf
                    @if ($edit)
                        <div class="col-sm-3" style="margin-bottom: 10px">
                            <button type="button" class="btn btn-success" id="resPasButton">Փոխել գաղտնաբառը</button>
                        </div>
                    @endIf
                </div>
                <div class="card-box" id="editUserArea" style="display: block">
                    @if($error)
                        <p class="alert-danger"><b>Error !</b> Something goes wrong , please try again</p>
                    @endIf
                    <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-6">
                            @if (!$edit)
                                <form action="" method="post" accept-charset="utf-8">
                                    <input type="hidden" name="admin" value="2">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <label for="userName">Գործակալի անուն</label>
                                        <input type="text" name="name" class="form-control {{$errors->has('name') ? 'error' : ''}}" >
                                        <span class="error-span">{{$errors->first('name')}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="userEmail">Գործակալի էլ-հասցե</label>
                                        <input type="email" name="email" class="form-control {{$errors->has('email') ? 'error' : ''}}" >
                                        <span class="error-span">{{$errors->first('email')}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="userEmail">Գործակալի հեռախոսահամար</label>
                                        <input type="text" name="phone" class="form-control {{$errors->has('phone') ? 'error' : ''}}" >
                                        <span class="error-span">{{$errors->first('phone')}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="userEmail">Գործակալի հասցե</label>
                                        <input type="text" name="address" class="form-control {{$errors->has('address') ? 'error' : ''}}" >
                                        <span class="error-span">{{$errors->first('address')}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="userName">Գործակալի գաղտնաբառ</label>
                                        <input type="password" name="password" class="form-control" >
                                    </div>
                                    <button type="submit" class="btn btn-primary" id="addOrEditUserButton">Ավելացնել</button>
                                </form>
                            @else
                                <p class="alert-danger" id="resetErrormessage"></p>
                                <form action="" method="post" accept-charset="utf-8">
                                    <input type="hidden" name="admin" value="2">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="resPassHiddenToken">
                                    <div class="form-group">
                                        <label for="userName">Գործակալի անուն</label>
                                        <input type="text" name="name" class="form-control {{$errors->has('name') ? 'error' : ''}}" value="{!! $user[0]->name !!}">
                                        <span class="error-span">{{$errors->first('name')}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="userEmail">Գործակալի էլ-հասցե</label>
                                        <input type="email" name="email" class="form-control {{$errors->has('email') ? 'error' : ''}}" value="{!! $user[0]->email !!}">
                                        <span class="error-span">{{$errors->first('email')}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="userEmail">Գործակալի հասցե</label>
                                        <input type="text" name="address" class="form-control {{$errors->has('address') ? 'error' : ''}}" value="{!! $user[0]->address ? $user[0]->address : '' !!}">
                                        <span class="error-span">{{$errors->first('address')}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="userRole">Պաշտոն</label>
                                        <select class="form-control" name="admin" id="" onchange="changeSkill(this)">
                                            @if($admin == 1)
                                                <option value="3" {!! $user[0]->admin == 3 ? 'selected' : '' !!}>Սուպեր ադմինի օգնական</option>
                                                <option value="0" {!! $user[0]->admin == 0 ? 'selected' : '' !!}>Ադմին</option>
                                            @endif
                                            @if($admin == 3)
                                                <option value="0" {!! $user[0]->admin == 0 ? 'selected' : '' !!}>Ադմին</option>
                                            @endif
                                            @if($admin != 1 )
                                                <option value="2" {!! $user[0]->admin == 2 ? 'selected' : '' !!}>Գործակալ</option>
                                            @endif
                                        </select>
                                    </div>
                                    @if(($admin == 3 && ($user[0]->admin == 2 || $user[0]->admin == 0 ))  || ($admin == 1 && ($user[0]->admin == 2 || $user[0]->admin == 3 || $user[0]->admin == 0)))
                                        <div class="form-group" id="adminListOnAdding1" style="{!! ($admin == 3 && $user[0]->admin == 2)  || ($admin == 1 && $user[0]->admin == 2) ? 'display: block' : 'display: none' !!}">
                                            <label for="addUserAdmins">Ադմին</label>
                                            <select name="admin_id" id="addUserAdmins" class="form-control">
                                                <option value="">Ընտրել ադմին</option>
                                                @foreach($admins as $a)
                                                    <option value="{!! $a->id !!}" {!! $user[0]->admin_id == $a->id ? 'selected' : '' !!}>{!! $a->name !!}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="">Գործակալի հեռախոսահամար</label>
                                        <input type="text" name="phone" class="form-control" value="{!! $user[0]->phone !!}">
                                    </div>
                                    <button type="submit" class="btn btn-primary" id="addOrEditUserButton">Փոփոխել</button>
                                </form>
                            @endIf
                        </div>


                    </div>
                </div>
                @if ($edit)
                    <div class="card-box" id="updatePass" style="display: none">
                        <div class="row">
                            <div id="resetError" class=" alert-danger hide"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">

                            </div>
                            <div class="col-sm-6">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label for="userName">Գործակալի նոր գաղտնաբառ</label>
                                    <input type="password" name="respassword" class="form-control" id="resPassInput">
                                </div>
                                <button type="" class="btn btn-primary" id="resetPassButton" disabled="disabled">Փոփոխել</button>
                            </div>
                        </div>
                    </div>
                @endIf
                <script>
                    function changeSkill(that) {
                        console.log(document.getElementById('adminListOnAdding'),document.getElementById('adminListOnAdding1'))
                        if(that.value == 2){
                            @if (!$edit)
                            document.getElementById('adminListOnAdding').style.display = 'block'
                            @else
                            document.getElementById('adminListOnAdding1').style.display = 'block'
                            @endif
                        }else{
                            @if (!$edit)
                            document.getElementById('adminListOnAdding').style.display = 'none'
                            @else
                            document.getElementById('adminListOnAdding1').style.display = 'none'
                            @endif
                        }
                    }
                </script>
                @include('adminLayouts.footer')
            </div>
        </div>
@stop
