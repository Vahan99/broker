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
                                <h4 class="page-title breadcrumb">Galleria List</h4>
                            </div>
                        </div> 
                        @if($error)
                            <p class="alert-danger"><b>Error !</b> Something goes wrong , please try again</p>
                        @endIf
                        <form role="form" action="" method="post" class="p-20" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                            @if(!$edit)
                            <div class="row m-t-20">
                                
                                <div class="col-sm-4 m-t-20">
                                    <div class="form-group">
                                        <label for="catName">Check Galeeria Type</label>
                                        <select class="form-control" id="galleriraType" name="gallerira_type">
                                            <option value="1">Photo</option>
                                            <option value="2">Video</option>
                                            <option value="3">Slider Images</option>
                                        </select>
                                    </div>   
                                </div>
                                <div class="col-sm-4 m-t-20">
                                    <div class="form-group">
                                        <label for="catName">Check Hall</label>
                                        <select class="form-control" id="galleriaHall" name="galleria_hall_id">
                                            @foreach($halls as $key => $hall)
                                                <option value="{{ $hall->id}}">{{ $hall->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>   
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="videoLink">Video Link</label>
                                        <input type="text" class="form-control" id="group" name="galleria_video_link" value="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="videoLink">Galleria Name</label>
                                        <input type="text" class="form-control" id="group" name="galleria_name" value="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="videoLink">Galleria Description</label>
                                        <textarea class="form-control" id="group" name="galleria_desc" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Galleria Image Upload</label>
                                        <input type="file" class="filestyle" name="galleria_image" data-input="false" onchange="previewImage(this,'#galeriaImgPreview')">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <img src="http://artlife-market.ru/download/8defaultImage.png" alt="" class="img-responsive" id="galeriaImgPreview">
                                </div>
                            </div>   
                            @else
                            <div class="row m-t-20">
                               
                                <div class="col-sm-4 m-t-20">
                                    <div class="form-group">
                                        <label for="catName">Check Galeeria Type</label>
                                        <select class="form-control" id="galleriraType" name="gallerira_type" value="{!! $galleria->type !!}">
                                            <option value="1" {!! $galleria->id === 1 ? 'selected' : '' !!}>Photo</option>
                                            <option value="2" {!! $galleria->id === 2 ? 'selected' : '' !!}>Video</option>
                                        </select>
                                    </div>   
                                </div>
                                <div class="col-sm-4 m-t-20">
                                    <div class="form-group">
                                        <label for="catName">Check Hall</label>
                                        <select class="form-control" id="galleriaHall" name="galleria_hall_id">
                                            @foreach($halls as $key => $hall)
                                                <option value="{{ $hall->id}}" {!! $hall->id === $galleria->hall_id ? 'selected' : '' !!}>{{ $hall->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>   
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="videoLink">Video link</label>
                                        <input type="text" class="form-control" id="group" name="galleria_video_link"  value="{!! $galleria->link !!}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Galleria Image Upload</label>
                                        <input type="file" class="filestyle" name="galleria_image" data-input="false" onchange="previewImage(this,'#galeriaImgPreview')">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <img src="{!! Storage::url($galleria->image) !!}" alt="" class="img-responsive" id="galeriaImgPreview">
                                </div>
                            </div> 
                            @endif     
                            <div class="row m-t-20 ">
                                <button type="submit" class="btn btn-primary btn-rounded waves-effect waves-light">Submit</button>
                            </div>
                        </form>    
                    
            @include('adminLayouts.footer')
      </div>
  </div>
@stop