@extends('adminLayouts.index')

@section('title', 'Add Sub Category')

@section('content')
        
            @include('adminLayouts.header')
            @include('adminLayouts.sidebar')

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title breadcrumb">Add Menu Category</h4>
                            </div>

                        </div>
                        <div class="card-box">
                            @if($error)
                            <p class="alert-danger"><b>Error !</b> Something goes wrong , please try again</p>
                            @endIf
                            <div class="row">
                                <div class="col-sm-3">
                                    
                                </div>
                                <div class="col-sm-5">
                                    <form role="form" action="" method="post" class="p-20">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                        @if(!$edit)
                                        <div class="form-group">
                                            <label for="catName">Sub Category Name</label>
                                            <input type="text" class="form-control" name="subCatName" id="catName" placeholder="Category Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="catName">Categories</label>
                                            <select class="form-control" id="catName" name="cat_id">
                                                @foreach($categories as $key => $category)
                                                    <option value="{{ $category->id}}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @else
                                        <div class="form-group">
                                            <label for="catName">Sub Category Name</label>
                                            <input type="text" class="form-control" name="subCatName" id="catName" placeholder="Category Name" value="{!! $subCategory->name !!}">
                                        </div>
                                        <div class="form-group">
                                            <label for="catName1">Categories</label>
                                            <select class="form-control" id="catName1" name="cat_id">
                                                @foreach($categories as $key => $category)
                                                    <option value="{{ $category->id}}" {!! $category->id === $subCategory->cat_id ? 'selected' : '' !!}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @endif
                                        <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    
            @include('adminLayouts.footer')
      </div>
  </div>
@stopadd-subcategory.blade.php