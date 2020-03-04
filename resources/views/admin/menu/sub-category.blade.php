@extends('adminLayouts.index')

@section('title', 'Menu Sub Category')

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
                                                    <th>Sub Category name</th>
                                                    <th>Category Name</th>
                                                    <th>Edit</th>
                                                    <th>Delet</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($subCategories as $subCategory)
                                                <tr>
                                                    <td scope="row">{!! $loop->index + 1 !!}</td>
                                                    <td>{!! $subCategory->name !!}</td>
                                                    <td>{!! $subCategory->cat_id !!}</td>
                                                    <td>
                                                        <a href="/menu/edit-subcat/{!! $subCategory->id !!}" class="btn btn-primary btn-rounded waves-effect waves-light"><i class="glyphicon glyphicon-pencil"></i></a>
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="hallId" value="{!! $subCategory->id !!}">
                                                        <button class="btn btn-danger btn-rounded waves-effect waves-light subCatDleteModalOpen"
                                                                data-toggle="modal" 
                                                                data-target="#myModal3">
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
                        <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Are you sure? </h4>
                              </div>
                              <div class="modal-body" id='subCatDeleteModalBody'>
                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger" id="dleteSubCatButton">Delete</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                    
            @include('adminLayouts.footer')
      </div>
  </div>
@stop