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
                        <h4 class="page-title breadcrumb">Ավելացնել Գույք</h4>
                    </div>
                </div>
                <div class="container">
                    <div class="col-md-4">
                        <div class="container-category-left m-t-40">
                            <ul class="nav nav-pills nav-stacked">
                                @foreach($realtyData->types() as $type)
                                    <li role="presentation" class="{{request('type') == $type['name'] ? 'active' : ''}}">
                                        <a href="?type={{$type['name']}}&&value={{$type['value']}}">{{$type['label']}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @isset(request()['type'])
                        <div class="col-md-8">
                            @include('partials.reality-form')
                        </div>
                    @endisset
                </div>
                @include('adminLayouts.footer')
            </div>
        </div>
    </div>
@stop