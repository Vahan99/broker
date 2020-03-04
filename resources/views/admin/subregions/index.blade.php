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
                        <h4 class="page-title breadcrumb">Համայնքներ</h4>
                    </div>
                </div>
                <div class="">
                    @if($error)
                        <p class="alert-danger"><b>Error !</b> Something goes wrong , please try again</p>
                    @endIf
                    <p class="alert alert-success" id="successMessageHallBookingDelete" style="display:none"></p>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="region">Ընտրել մարզ</label>
                                <select name="" id="regionSelect" class="form-control">
                                    @foreach($regions as $key => $region)
                                        <option value="{!! $region->id !!}" {!!  $region->id == $id ? 'selected' : '' !!}>{!! $region->name !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row m-t-20">
                        <div class="col-sm-12 card-box">
                            <div class="table-responsive">
                                <table class="table table-bordered m-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Համայնքների անուն</th>
                                        @if($admin)
                                            <th>Փոփոխել</th>
                                            {{--<th>Ջնջել</th>--}}
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody id="subRegionTableBody">
                                    @foreach ($subRegions as $subRegion)
                                        <tr>
                                            <td>{!! $subRegion->id !!}</td>
                                            <td>{{$subRegion->name}}</td>
                                            <td>
                                                <a href="/admin/regions/edit-region/{!! $subRegion->id !!}" class="btn btn-primary btn-rounded waves-effect waves-light"><i class="glyphicon glyphicon-pencil"></i></a>
                                            </td>
                                            {{--<td>--}}
                                                {{--<input type="hidden" name="hallId" value="{!! $subRegion->id !!}">--}}
                                                {{--<button class="btn btn-danger btn-rounded waves-effect waves-light regionDeleteModalOpen"--}}
                                                        {{--data-toggle="modal"--}}
                                                        {{--data-target="#myModal12">--}}
                                                    {{--<i class="glyphicon glyphicon-trash"></i>--}}
                                                {{--</button>--}}
                                            {{--</td>--}}
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        {{ $subRegions->links() }}
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="myModal12" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel12">Դուք համոզված եք? </h4>
                            </div>
                            <div class="modal-body" id='regionBookDeleteModalBody'>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Փակել</button>
                                <button type="button" class="btn btn-danger" id="dleteRegionBookButton">Ջնջել</button>
                            </div>
                        </div>
                    </div>
                </div>
                @include('adminLayouts.footer')
            </div>
        </div>
@stop