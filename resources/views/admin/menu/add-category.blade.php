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
                                            <label for="catName">Category Name</label>
                                            <input type="text" class="form-control" name="catName" id="catName" placeholder="Category Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="hallName">Halls</label>
                                            <select class="form-control" id="hallName" name="hall_id">
                                                @foreach($halls as $key => $hall)
                                                    <option value="{{ $hall->id}}">{{ $hall->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @else
                                        <div class="form-group">
                                            <label for="catName">Category Name</label>
                                            <input type="text" class="form-control" name="catName" id="catName" placeholder="Category Name" value="{!! $category->name !!}">
                                        </div>
                                        <div class="form-group">
                                            <label for="hallName">Halls</label>
                                            <select class="form-control" id="hallName" name="hall_id">
                                                @foreach($halls as $key => $hall)
                                                    <option value="{{ $hall->id}}" {!! $hall->id === $category->hall_id ? 'selected' : '' !!}>{{ $hall->name }}</option>
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