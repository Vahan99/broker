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
                                <h4 class="page-title breadcrumb">Event booking List</h4>
                            </div>
                        </div>
                        <div class="">
                            <p class="alert alert-danger" id="errorMessageEventBookingDelete" style="display:none"></p>
                            <p class="alert alert-success" id="successMessageEventBookingDelete" style="display:none"></p>
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
                                            @foreach ($eventBookings as $eventBooking)
                                            <tr> 
                                                <td style="text-align: center;">
                                                    <input type="hidden" name="eventId" value="{!! $eventBooking->id !!}">
                                                    <button class="eventBookDeleteModalOpen btn btn-danger btn-xs btn-icon fa fa-times" data-toggle="modal" data-target="#myModal125"></button>
                                                </td>
                                                <td>{{$eventBooking->name}}</td>
                                                <td>{{$eventBooking->createdAt}}</td>
                                                <td>
                                                    <input type="hidden" name="eventId" value="{!! $eventBooking->id !!}">
                                                    <button type="button" class="btn btn-primary readEventBooking" data-toggle="modal" data-target="#myModal135">Read Message</button>
                                                </td>
                                                <td>
                                                    <span class="label label-table {{ $eventBooking->status === 1 ? 'label-success' : 'label-danger' }} " id="eventBookStatus{{ $eventBooking->id }}">{{ $eventBooking->status === 0 ? 'Unreaded' : 'Readed' }}</span>
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
                        <div class="modal fade" id="myModal125" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel12">Are you sure? </h4>
                              </div>
                              <div class="modal-body" id='eventBookDeleteModalBody'>
                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger" id="dleteEventBookButton">Delete</button>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="modal fade" id="myModal135" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel135">Event reserve </h4>
                              </div>
                              <div class="modal-body" id='eventBookReadModalBody'>
                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default closeEventBookingReadModal" data-dismiss="modal" >Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
            @include('adminLayouts.footer')
      </div>
  </div>
@stop