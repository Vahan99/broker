@extends('adminLayouts.index')

@section('title', 'Galleria List')

@section('content')
        
            @include('adminLayouts.header')
            @include('adminLayouts.sidebar')

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <div class="row m-t-20">
                            <div class="col-sm-12">
                                <h4 class="page-title breadcrumb">Galleria List</h4>
                            </div>
                        </div>
                        <div class="row m-t-20">
                            <div class="col-sm-4 m-t-20">
                                <div class="form-group">
                                    <label for="catName">Check Galeeria Type</label>
                                    <select class="form-control" id="galeriaType" name="cat_id">
                                        <option value="1">Photo</option>
                                        <option value="2">Video</option>
                                        <option value="3">Slider Images</option>
                                    </select>
                                </div>   
                            </div>
                        </div>
                        <div class="row m-t-20">
                            @foreach ($galleria as $gal)
                            <div class="col-sm-3 card-box">
                                <div>
                                    <img src="{!! Storage::url($gal->image) !!}" class="img-responsive" alt="">
                                </div>
                                <div class="m-t-15 text-center">
                                    <a href="/galleria/edit-galleria/{!! $gal->id !!}" class="btn btn-primary btn-rounded waves-effect waves-light"><i class="glyphicon glyphicon-pencil"></i></a>
                                    <input type="hidden" name="galeriaId" value="{!! $gal->id !!}">
                                    <button class="btn btn-danger btn-rounded waves-effect waves-light galleriaDleteModalOpen"
                                            data-toggle="modal" 
                                            data-target="#myModal5">
                                        <i class="glyphicon glyphicon-trash"></i>
                                    </button>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-sm-12">
                            {{ $galleria->links() }}
                        </div>

                        <div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Are you sure? </h4>
                              </div>
                              <div class="modal-body" id='gelleriaDeleteModalBody'>
                                Delete image?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger" id="dleteGalImageButton">Delete</button>
                              </div>
                            </div>
                          </div>
                        </div>
            @include('adminLayouts.footer')
      </div>
  </div>
@stop