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
                                <h4 class="page-title breadcrumb">Add Menu Product</h4>
                            </div>
                        </div>
                        <div class="card-box">
                            @if($error)
                            <p class="alert-danger"><b>Error !</b> Something goes wrong , please try again</p>
                            @endIf
                            <div class="row">
                                <div class="col-sm-8">
                                    <form role="form" action="" method="post" class="p-20" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                        <!--  -->
                                        @if(!$edit)
                                            <div class="col-sm-6 m-t-20">
                                                <div class="form-group">
                                                    <label for="prodName">Product Name</label>
                                                    <input type="text" class="form-control" id="prodName" name="prod_name" placeholder="Product Name">
                                                </div>    
                                            </div>
                                            <div class="col-sm-6 m-t-20">
                                                <div class="form-group">
                                                    <label>Product Price (€)</label>
                                                    <input type="text" name="prod_price" placeholder="Product Price" data-a-sign="€ " class="form-control autonumber">
                                                    <span class="font-13 text-muted">e.g. "€ 1,234,567,890,123"</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 m-t-20">
                                                <div class="form-group">
                                                    <label for="catName">Category Name</label>
                                                    <select class="form-control" id="catName" name="cat_id">
                                                        @foreach($categories as $key => $category)
                                                            <option value="{{ $category->id}}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>   
                                            </div>
                                            <div class="col-sm-6 m-t-20">
                                                <div class="form-group">
                                                    <label for="catName">Sub Category Name</label>
                                                    <select class="form-control" id="catName" name="sub_cat_id">
                                                        @foreach($subCategories as $key => $subCategory)
                                                            <option value="{{ $subCategory->id}}">{{ $subCategory->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>   
                                            </div>
                                            <div class="col-sm-8 m-t-20">
                                                <textarea id="textarea" class="form-control" maxlength="225" rows="2" placeholder="This textarea has a limit of 225 chars." name="prod_descr"></textarea>
                                            </div>
                                            <div class="col-sm-3 m-t-20">
                                                <div class="form-group">
                                                    <label class="control-label">Product Image Upload</label>
                                                    <input type="file" class="filestyle" name="prod_image" data-input="false" onchange="previewImage(this,'#productImgPreview')">
                                                </div> 
                                            </div>
                                        @else
                                            <div class="col-sm-6 m-t-20">
                                                <div class="form-group">
                                                    <label for="prodName">Product Name</label>
                                                    <input type="text" class="form-control" id="prodName" name="prod_name" placeholder="Product Name" value="{!! $product->name !!}">
                                                </div>    
                                            </div>
                                            <div class="col-sm-6 m-t-20">
                                                <div class="form-group">
                                                    <label>Product Price (€)</label>
                                                    <input type="text" name="prod_price" placeholder="Product Price" data-a-sign="€ " class="form-control autonumber" value="{!! $product->price !!}">
                                                    <span class="font-13 text-muted">e.g. "€ 1,234,567,890,123"</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 m-t-20">
                                                <div class="form-group">
                                                    <label for="catName">Category Name</label>
                                                    <select class="form-control" id="catName" name="cat_id">
                                                        @foreach($categories as $key => $category)
                                                            <option value="{{ $category->id}}" {!! $category->id === $product->cat_id ? 'selected' : '' !!}>{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>   
                                            </div>
                                            <div class="col-sm-6 m-t-20">
                                                <div class="form-group">
                                                    <label for="catName">Sub Category Name</label>
                                                    <select class="form-control" id="catName" name="sub_cat_id">
                                                        @foreach($subCategories as $key => $subCategory)
                                                            <option value="{{ $subCategory->id}}" {!! $category->id === $product->sub_cat_id ? 'selected' : '' !!}>{{ $subCategory->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>   
                                            </div>
                                            <div class="col-sm-8 m-t-20">
                                                <textarea id="textarea" class="form-control" maxlength="225" rows="2" placeholder="This textarea has a limit of 225 chars." name="prod_descr">{!! $product->description !!}</textarea>
                                            </div>
                                            <div class="col-sm-3 m-t-20">
                                                <div class="form-group">
                                                    <label class="control-label">Product Image Upload</label>
                                                    <input type="file" class="filestyle" name="prod_image" data-input="false" onchange="previewImage(this,'#productImgPreview')">
                                                </div> 
                                            </div>
                                        @endif
                                        <!--  -->
                                        <div class="col-sm-12 m-t-20">
                                            <button type="submit" class="btn btn-info waves-effect waves-light ">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                @if(!$edit)
                                <div class="col-sm-3">
                                    <img src=" http://artlife-market.ru/download/8defaultImage.png"  alt="" class="img-responsive" id="productImgPreview">
                                </div>
                                @else
                                <div class="col-sm-3">
                                    <img src="{!! Storage::url($product->image) !!}"  alt="" class="img-responsive" id="productImgPreview">
                                </div>
                                @endif

                            </div>
                        </div>
                    
            @include('adminLayouts.footer')
      </div>
  </div>
@stopadd-subcategory.blade.php