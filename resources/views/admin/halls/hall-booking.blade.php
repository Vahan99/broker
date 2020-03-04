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
                                <h4 class="page-title breadcrumb">Hall booking List</h4>
                            </div>
                        </div>
                        <div class="">
                            <p class="alert alert-danger" id="errorMessageHallBookingDelete" style="display:none"></p>
                            <p class="alert alert-success" id="successMessageHallBookingDelete" style="display:none"></p>
                            <div class="row m-t-20">
                                <div class="col-sm-12 card-box">
                                    <div class="table-responsive">
                                        <table id="demo-foo-addrow" class="table table-striped m-b-0 table-hover toggle-circle" data-page-size="7">
                                        <thead>
                                            <tr>
                                                <th data-sort-ignore="true" class="min-width"></th>
                                                <th data-sort-initial="true" data-toggle="true">Name</th>
                                                <th>Date</th>
                                                <th data-hide="phone">Read</th>
                                                <th data-hide="phone, tablet">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($hallBokkings as $hallBokking)
                                            <tr> 
                                                <td style="text-align: center;">
                                                    <input type="hidden" name="hallId" value="{!! $hallBokking->id !!}">
                                                    <button class="hallBookDeleteModalOpen btn btn-danger btn-xs btn-icon fa fa-times" data-toggle="modal" data-target="#myModal12"></button>
                                                </td>
                                                <td>{{$hallBokking->lastName}}</td>
                                                <td>{{$hallBokking->createdAt}}</td>
                                                <td>
                                                    <input type="hidden" name="hallId" value="{!! $hallBokking->id !!}">
                                                    <button type="button" class="btn btn-primary readHallBooking" data-toggle="modal" data-target="#myModal13">Read Message</button>
                                                </td>
                                                <td>
                                                    <span class="label label-table {{ $hallBokking->status === 1 ? 'label-success' : 'label-danger' }} " id="hallBookStatus{{ $hallBokking->id }}">{{ $hallBokking->status === 0 ? 'Unreaded' : 'Readed' }}</span>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="6">
                                                    <div class="text-right">
                                                        <ul class="pagination pagination-split m-t-30"></ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    <!-- Modal -->
                        <div class="modal fade" id="myModal12" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel12">Are you sure? </h4>
                              </div>
                              <div class="modal-body" id='hallBookDeleteModalBody'>
                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger" id="dleteHallBookButton">Delete</button>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="modal fade" id="myModal13" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel13">Hall reserve </h4>
                              </div>
                              <div class="modal-body" id='hallBookReadModalBody'>
                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default closeHallBookingReadModal" data-dismiss="modal" >Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
            @include('adminLayouts.footer')
      </div>
  </div>
@stop