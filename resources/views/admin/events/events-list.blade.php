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
                                <h4 class="page-title breadcrumb">Event List</h4>
                            </div>
                        </div>
                        <div class="card-box">
                            <p class="alert-danger" id="errorMessageEventDelete"></p>
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="hidden" name="_token" id="token2" value="{{ csrf_token() }}">
                                    <div class="p-20">
                                        <table class="table table-striped m-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Event Name</th>
                                                    <th>Hall Name</th>
                                                    <th>Event Date</th>
                                                    <th>Show/Hide</th>
                                                    <th>Edit</th>
                                                    <th>Delet</th>
                                                </tr>
                                            </thead>
                                            <tbody id="even_list_table">
                                                @foreach ($events as $event)
                                                <tr>
                                                    <td scope="row">{!! $loop->index + 1 !!}</td>
                                                    <td>{{ $event->name }}</td>
                                                    <td>{{ $event->hall_id }}</td>
                                                    <td>{{ $event->date }}</td>
                                                    <td class="switchery-demo {!! $event->status === 1 ? 'checked' : '' !!}">
                                                        <input type="hidden" name="event_id" value="{!! $event->id !!}">
                                                        <label  class="eventStatusCheckBox">Dsiplay Event
                                                        <a href="javascript:;" >
                                                            <input value="{!! $event->status !!}" type="checkbox"
                                                            data-plugin="switchery" 
                                                            data-color="#1AB394" 
                                                            data-secondary-color="#ED5565"
                                                            {!! $event->status === 1 ? 'checked' : '' !!} />
                                                        </a>
                                                    </label>
                                                    </td>
                                                    <td>
                                                        <a href="/events/edit-event/{!! $event->id !!}" class="btn btn-primary btn-rounded waves-effect waves-light"><i class="glyphicon glyphicon-pencil"></i></a>
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="event_id" value="{!! $event->id !!}">
                                                        <button class="btn btn-danger btn-rounded waves-effect waves-light eventDleteModalOpen"
                                                                data-toggle="modal" 
                                                                data-target="#myModal7">
                                                            <i class="glyphicon glyphicon-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="col-sm-12">
                                            {{ $events->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>

                         <!-- Modal -->
                        <div class="modal fade" id="myModal7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Are you sure? </h4>
                              </div>
                              <div class="modal-body" id='eventDeleteModalBody'>
                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger" id="dleteEventButton">Delete</button>
                              </div>
                            </div>
                          </div>
                        </div>
                    
            @include('adminLayouts.footer')
      </div>
  </div>
@stopadd-subcategory.blade.php