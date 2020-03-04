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
                                <h4 class="page-title breadcrumb">Products List</h4>
                            </div>
                        </div>
                        <div class="card-box">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Category</label>
                                        <select class="form-control" id="prodCatName" name="cat_id" >
                                            @foreach($categories as $key => $category)
                                                <option value="{{ $category->id}}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div> 
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Sub Category</label>
                                        <select class="form-control" id="prodSubCatName" name="sub_cat_id">
                                            @foreach($subCategories as $key => $subCategory)
                                                <option value="{{ $subCategory->id}}">{{ $subCategory->name }}</option>
                                            @endforeach
                                        </select>
                                    </div> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="p-20">
                                        <table class="table table-striped m-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Product Name</th>
                                                    <th>Subcategory Name</th>
                                                    <th>Category Name</th>
                                                    <th>Edit</th>
                                                    <th>Delet</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($products as $product)
                                                <tr>
                                                    <td scope="row">{!! $loop->index + 1 !!}</td>
                                                    <td>{!! $product->name !!}</td>
                                                    <td>{!! $product->sub_cat_id !!}</td>
                                                    <td>{!! $product->cat_id !!}</td>
                                                    <td>
                                                        <a href="/menu/edit-product/{!! $product->id !!}" class="btn btn-primary btn-rounded waves-effect waves-light"><i class="glyphicon glyphicon-pencil"></i></a>
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="hallId" value="{!! $product->id !!}">
                                                        <button class="btn btn-danger btn-rounded waves-effect waves-light prodDleteModalOpen"
                                                                data-toggle="modal" 
                                                                data-target="#myModal4">
                                                            <i class="glyphicon glyphicon-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    {{ $products->links() }}
                                </div>
                            </div>  
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Are you sure? </h4>
                              </div>
                              <div class="modal-body" id='prodDeleteModalBody'>
                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger" id="dleteProdButton">Delete</button>
                              </div>
                            </div>
                          </div>
                        </div>
                    
            @include('adminLayouts.footer')
      </div>
  </div>
@stop