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
                                <h4 class="page-title breadcrumb">Add Event</h4>
                            </div>
                        </div>
                        @if($error)
                        <p class="alert-danger">{{ $error-message }}</p>
                        @endif
                        @if(!$edit)
                        <form enctype="multipart/form-data" id="upload_form" role="form" method="POST" action="" >
                            <input type="hidden" name="_token" value="{{ csrf_token()}}">
                            <div class="row m-t-20">
                                <div class="col-sm-3 m-t-20">
                                    <div class="form-group">
                                        <label for="videoLink">Event Video link</label>
                                        <input type="text" id="eventVideoLink" class="form-control" name="link">
                                    </div>
                                </div>
                                <div class="col-sm-4 m-t-20">
                                    <div class="form-group">
                                        <label for="eventHallName">Check Hall</label>
                                        <select class="form-control" id="eventHallName" name="hall_id">
                                            @foreach($halls as $key => $hall)
                                                <option value="{{ $hall->id}}">{{ $hall->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>   
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="eventName">Event Name</label>
                                        <input type="text" name="name" id="eventName" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label>Time Picker</label>
                                    <div class="input-group m-b-15">

                                        <div class="bootstrap-timepicker">
                                            <input id="timepicker" type="text" class="form-control event_timepicker" name="time">
                                        </div>
                                        <span class="input-group-addon bg-custom b-0 text-white"><i class="glyphicon glyphicon-time"></i></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">Date Picker</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control event_datepicker" name="date" placeholder="mm/dd/yyyy" id="datepicker">
                                            <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label">Event Image Upload</label>
                                        <input type="file" id="event_image" class="filestyle" name="image" data-input="false" onchange="previewImage(this,'#eventImgPreview')">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <img src="http://artlife-market.ru/download/8defaultImage.png" alt="" class="img-responsive" id="eventImgPreview">
                                </div>
                            </div>
                            <div class="col-sm-12 m-b-20">
                                <label class="control-label">Event Description</label>
                                <textarea name="descr" class="form-control" id="eventDescr"></textarea>       
                            </div>
                            <div class="col-sm-12 m-t-20">
                                <button type="submit" class="btn btn-primary btn-rounded waves-effect waves-light">Submit</button>
                            </div>
                        </form>
                        @else
                        <form enctype="multipart/form-data" role="form" method="POST" action="" >
                            <input type="hidden" name="_token" value="{{ csrf_token()}}">
                            <div class="row m-t-20">
                                <div class="col-sm-4 m-t-20">
                                    <div class="form-group">
                                        <label for="catName">Check Thumbnail Type</label>
                                        <select class="form-control" id="eventCatName1" name="type">
                                            <option value="1">Photo</option>
                                            <option value="2">Video</option>
                                        </select>
                                    </div>   
                                </div>
                                <div class="col-sm-4 m-t-20">
                                    <div class="form-group">
                                        <label for="catName">Check Hall</label>
                                        <select class="form-control" id="eventHallName1" name="hall_id">
                                            @foreach($halls as $key => $hall)
                                                <option value="{{ $hall->id}}" {!! $event->hall_id === $hall->id ? 'selected' : '' !!}>{{ $hall->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>   
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="eventName1">Event Name</label>
                                        <input type="text" name="name" id="eventName1" class="form-control" value="{!! $event->name !!}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label>Time Picker</label>
                                    <div class="input-group m-b-15">

                                        <div class="bootstrap-timepicker">
                                            <input id="timepicker" type="text" name="time" class="form-control event_timepicker1" value=" {!! $event->time !!}">
                                        </div>
                                        <span class="input-group-addon bg-custom b-0 text-white"><i class="glyphicon glyphicon-time"></i></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">Date Picker</label>
                                        <div class="input-group">
                                            <input type="text" name="date" class="form-control event_datepicker1" placeholder="mm/dd/yyyy" id="datepicker" value="{!! $event->date !!}">
                                            <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="videoLink">Event Video link</label>
                                        <input type="text" id="eventVideoLink1" class="form-control" name="link" value="{!! $event->link !!}">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label">Event Image Upload</label>
                                        <input type="file" id="event_image_1" class="filestyle" name="image" data-input="false" onchange="previewImage(this,'#eventImgPreview1')">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <img src="{!! Storage::url($event->image) !!}" alt="" class="img-responsive" id="eventImgPreview1">
                                </div>
                            </div>
                            <div class="col-sm-12 m-b-20">
                                <label class="control-label">Event Description</label>
                                <textarea name="descr" class="form-control" id="eventDescr1">{!! $event->descr !!}</textarea>       
                            </div>
                            <div class="col-sm-12 m-t-20">
                                <input type="hidden" name="event_id" value="{!! $event->id !!}">
                                <button type="submit" class="btn btn-primary btn-rounded waves-effect waves-light">Submit</button>
                            </div>
                        </form>
                        @endif        
                        
                    
            @include('adminLayouts.footer')
      </div>
  </div>
@stop