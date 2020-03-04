@extends('adminLayouts.index')

@section('title', 'Admin Dashboard')

@section('content')
        
            @include('adminLayouts.header')
            @include('adminLayouts.sidebar')

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title breadcrumb">Menu Category List</h4>
                            </div>
                        </div>
                        <div class="card-box">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="p-20">
                                        <table class="table table-striped m-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Category name</th>
                                                    <th>Hall Name</th>
                                                    <th>Edit</th>
                                                    <th>Delet</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($categories as $category)
                                                <tr>
                                                    <td scope="row">{!! $loop->index + 1 !!}</td>
                                                    <td>{!! $category->name !!}</td>
                                                    <td>{!! $category->hall_id !!}</td>
                                                    <td>
                                                        <a href="/menu/edit-cat/{!! $category->id !!}" class="btn btn-primary btn-rounded waves-effect waves-light"><i class="glyphicon glyphicon-pencil"></i></a>
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="hallId" value="{!! $category->id !!}">
                                                        <button class="btn btn-danger btn-rounded waves-effect waves-light catDleteModalOpen"
                                                                data-toggle="modal" 
                                                                data-target="#myModal2">
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
                        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Are you sure? </h4>
                              </div>
                              <div class="modal-body" id='catDeleteModalBody'>
                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger" id="dleteCatButton">Delete</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                    
            @include('adminLayouts.footer')
      </div>
  </div>
@stop