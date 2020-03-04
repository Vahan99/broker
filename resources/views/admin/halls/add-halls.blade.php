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
                                <h4 class="page-title breadcrumb">Add Hall</h4>
                            </div>
                        </div>
                        <div class="card-box">
                            <div class="row">
                                <div class="col-sm-6">
                                    @if($error)
                                    <p class="alert-danger"><b>Error !</b> Something goes wrong , please try again</p>
                                    @endIf
                                    <form class="form-horizontal addOrEditHallForm" role="form" action="" method="post">    
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">                                
                                        <div class="form-group">
                                            <label>Hall Name</label>
                                            @if ($edit)
                                                <input type="text" name="name" class="form-control" placeholder="Hall Name" id="addOrEditHallInput" value="{!! $hall[0]->name !!}">
                                            @else
                                               <input type="text" name="name" class="form-control" placeholder="Hall Name" id="addOrEditHallInput">
                                            @endif
                                              
                                        </div>
                                        <button type="submit" class="btn btn-success" id="addOrEditHallButton">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    
            @include('adminLayouts.footer')
      </div>
  </div>
@stopadd-subcategory.blade.php