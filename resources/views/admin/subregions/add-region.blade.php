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
                            <h4 class="page-title breadcrumb">Ավելացնել Համայնք</h4>
                        </div>
                    @endIf
                    @if ($edit)
                        <div class="col-sm-12">
                            <h4 class="page-title breadcrumb">Փոփոխել Համայնքը</h4>
                        </div>
                    @endIf
                </div>
                <div class="card-box" id="editUserArea" style="display: block">
                    @if($error)
                        <p class="alert-danger"><b>Error !</b> Something goes wrong , please try again</p>
                    @endIf
                    <div class="row">
                        @if (!$edit)
                            <form action="" method="post" accept-charset="utf-8">
                                <div class="row">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="region">Ընտրել մարզ</label>
                                            <select name="region_id" id="regionSelectAdd" class="form-control">
                                                @foreach($regions as $region)
                                                    <option value="{!! $region->id !!}">{!! $region->name !!}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Համայնքի անունը</label>
                                            <input type="text" name="name" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-1 text-right">
                                        <button type="submit" class="btn btn-primary" id="addOrEditUserButton">Ավելացնել</button>
                                    </div>
                                </div>
                            </form>
                        @else
                            <p class="alert-danger" id="resetErrormessage"></p>
                            <form action="" method="post" accept-charset="utf-8">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="resPassHiddenToken">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="region">Ընտրել մարզ</label>
                                            <select name="region_id" id="regionSelectAdd1" class="form-control">
                                                @foreach($regions as $region)
                                                    <option value="{!! $region->id !!}"
                                                            {!! $region->id === $subRegion->region_id ? 'selected' : '' !!}>
                                                        {!! $region->name !!}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Համայնքի անունը</label>
                                            <input type="text" name="name" class="form-control" value="{!! $subRegion->name !!}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <button type="submit" class="btn btn-primary" id="addOrEditUserButton">Փոփոխել</button>
                                    </div>
                                </div>
                            </form>
                        @endIf
                    </div>
                </div>

                @include('adminLayouts.footer')
            </div>
        </div>
@stop