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
                                <h4 class="page-title breadcrumb">Made By</h4>
                            </div>
                        </div>

                        <div class="row">
                            <form role="form" action="" method="post" class="p-20" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" value="{{ $mader->id  ? $mader->id  : ''}}">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="madeby_name">Made By Name</label>
                                        <input type="text" class="form-control" id="madeby_name" name="name" value="{{ $mader->name ? $mader->name : '' }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="madeby_link">Made By Link</label>
                                        <input type="text" class="form-control" id="madeby_link" name="link" value="{{ $mader->link ? $mader->link : '' }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Made By image(logo) Upload</label>
                                        <input type="file" class="filestyle" name="image" data-input="false" onchange="previewImage(this,'#madeByImgPreview')">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <img src="{!! $mader->image ?  Storage::url($mader->image) :'http://artlife-market.ru/download/8defaultImage.png' !!}" alt="" class="img-responsive" id="madeByImgPreview">
                                </div> 
                                <div class="row m-t-20 ">
                                    <button type="submit" class="btn btn-primary btn-rounded waves-effect waves-light">Submit</button>
                                </div>
                            </form>
                        </div>
                    
            @include('adminLayouts.footer')
      </div>
  </div>
@stopadd-subcategory.blade.phpindex.blade.php