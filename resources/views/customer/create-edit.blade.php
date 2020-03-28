@extends('adminLayouts.index')
@section('title', 'Admin Dashboard')
@section('content')
    @include('adminLayouts.header')
    @include('adminLayouts.sidebar')
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/choose-type.css')}}">
    @endpush
    <div class="content-page" id="reality-filter">
        <div class="content">
            <div class="container">
                <div class="row m-t-20">
                    <div class="col-sm-4">
                        <h4 class="page-title breadcrumb">
                            Ավելացնել {{request('customer') == 0 || request('customer') == 1 ? $customerData->types()[request('customer')]['label'] : 'Հաճախորդ'}}
                        </h4>
                    </div>
                </div>
                <div class="container">
                    <div class="col-md-4">
                        <div class="container-category-left m-t-40">
                            <ul class="nav nav-pills nav-stacked">
                                @foreach($customerData->types() as $type)
                                    <li role="presentation" class="{{request('customer') == $type['value'] ? 'active' : ''}}">
                                        <a href="?customer={{$type['value']}}">{{$type['label']}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <form action="{{route($action)}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="user_id" value="{{Auth::id()}}">
                            <input type="hidden" name="customer" value="{{request('customer')}}">
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="name">Անուն</label>
                                        <input name="name" type="text" id="name" class="form-control {{$errors->has('name') ? 'error' : ''}}" value="{{old('name')}}">
                                        <span class="error-span">{{$errors->first('name')}}</span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="surname">Ազգանուն</label>
                                        <input name="surname" type="text" id="surname" class="form-control {{$errors->has('surname') ? 'error' : ''}}" value="{{old('surname')}}">
                                        <span class="error-span">{{$errors->first('surname')}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="phone">Հեռախոս (քաղ․)</label>
                                        <input name="first_phone" type="text" id="phone" class="form-control phone {{$errors->has('first_phone') ? 'error' : ''}}" value="(+374) {{old('first_phone')}}" max="16" min="16">
                                        <span class="error-span">{{$errors->first('first_phone')}}</span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone">Հեռախոս (բջջ․)</label>
                                        <input name="last_phone" type="text" id="phone" class="form-control phone {{$errors->has('last_phone') ? 'error' : ''}}" value="(+374) {{old('last_phone')}}">
                                        <span class="error-span">{{$errors->first('last_phone')}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="email">Էլ Հասցե</label>
                                        <input name="email" type="email" id="email" class="form-control {{$errors->has('email') ? 'error' : ''}}" value="{{old('email')}}">
                                        <span class="error-span">{{$errors->first('email')}}</span>
                                    </div>
                                    <div class="col-md-6" style="padding-top: 23px">
                                        <input type="submit" class="btn btn-primary form-control" id="addOrEditUserButton" value="Ավելացնել">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @include('adminLayouts.footer')
            </div>
        </div>
    </div>
@stop