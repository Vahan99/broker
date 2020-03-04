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
                                <h4 class="page-title breadcrumb">Halls List</h4>
                            </div>
                        </div>
                        <div class="card-box">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="p-20">
                                        <p class="alert-danger" id="errorMessage"></p>
                                        <table class="table table-striped m-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Hall Name</th>
                                                    <th>Edit</th>
                                                    <th>Delet</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($halls as $hall)
                                                <tr>
                                                    <th scope="row">{!! $loop->index + 1 !!}</th>
                                                    <td>{!! $hall->name !!}</td>
                                                    <td>
                                                        <a href="/halls/edit-hall/{!! $hall->id !!}" class="btn btn-primary btn-rounded waves-effect waves-light"><i class="glyphicon glyphicon-pencil"></i></a>
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="hallId" value="{!! $hall->id !!}">
                                                        <button class="btn btn-danger btn-rounded waves-effect waves-light hallDleteModalOpen"
                                                                data-toggle="modal" 
                                                                data-target="#myModal">
                                                            <i class="glyphicon glyphicon-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>  
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Are you sure? </h4>
                              </div>
                              <div class="modal-body" id='hallsDeleteModalBody'>
                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger" id="dleteHallButton">Delete</button>
                              </div>
                            </div>
                          </div>
                        </div>
                    
            @include('adminLayouts.footer')
      </div>
  </div>
@stop