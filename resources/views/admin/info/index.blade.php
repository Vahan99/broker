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
                                <h4 class="page-title breadcrumb">Information</h4>
                            </div>
                        </div>
                        <div class="card-box">
                            <div class="row">
                                <div class="col-lg-12"> 
                                    <ul class="nav nav-tabs tabs">
                                        <li class="active tab">
                                            <a href="#aboutTextInfo" data-toggle="tab" aria-expanded="false"> 
                                                <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                                <span class="hidden-xs">About us text</span> 
                                            </a> 
                                        </li> 
                                        <li class="tab"> 
                                            <a href="#contactsInfo" data-toggle="tab" aria-expanded="false"> 
                                                <span class="visible-xs"><i class="fa fa-user"></i></span> 
                                                <span class="hidden-xs">Contacts</span> 
                                            </a> 
                                        </li> 
                                        <li class="tab"> 
                                            <a href="#dailyInfo" data-toggle="tab" aria-expanded="true"> 
                                                <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
                                                <span class="hidden-xs">Daily Info</span> 
                                            </a> 
                                        </li>
                                    </ul> 
                                    <div class="tab-content"> 
                                        <div class="tab-pane active" id="aboutTextInfo"> 
                                            <div class="row">
                                                <div class="col-sm-2">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="hidden" name="_token" id="token1" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="info_id" id="info_id" value="{!! $info->id ? $info->id : '' !!}">
                                                    <div class="form-group">
                                                        <label for="aboutUs">About Us</label>
                                                        <textarea name="about_us" class="form-control" id="aboutUsTextarea" placeholder="About Us Description">{!! $info->about ? $info->about : '' !!}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="aboutUs">Facebook Link</label>
                                                        <input type="text" name="fb_link" class="form-control" id="fb_link" placeholder="Facebook Link" value="{!! $info->facebook ? $info->facebook : '' !!}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inst_link">Instagram Link</label>
                                                        <input type="text" name="inst_link" class="form-control" id="inst_link" placeholder="Instagram Link" value="{!! $info->instagram ? $info->instagram : '' !!}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="gmail">Gmail</label>
                                                        <input type="text" name="gmail" class="form-control" id="gmail" placeholder="Gmail" value=" {!! $info->gmail ? $info->gmail : '' !!}">
                                                    </div>
                                                    <button type="button" class="btn btn-primary" id="aboutUsSaveButton">Save About Us text</button>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="tab-pane" id="contactsInfo">
                                            <div class="row text-right">
                                                <button type="button" class="btn btn-success" id="appendAddressButton">Append Address</button>
                                                <hr>
                                            </div>
                                            <div class="row addressInfoArea">
                                                @foreach($address as $key =>  $add)
                                               <fieldset class="col-sm-4 " >
                                                    <legend>Address {!! $add->id !!}</legend>
                                                        <div class="addressInpuArea">
                                                            <input type="hidden" name="add_id" class="add_id" value="{!! $add->id ? $add->id : '' !!}">
                                                            <label for="address1">Addres</label>
                                                            <input id="address1" type="test" class="form-control address" name="adrress{!! $add->id !!}" value="{!! $add->address !!}"> 
                                                            <hr>
                                                            <label for="add{!! $add->id !!}Phone1">Phone 1 for addres {!! $add->id !!}</label>
                                                            <input id="add{!! $add->id !!}Phone1" type="text" name="add_{!! $add->id !!}_phone_1" class="form-control phone1" value="{!! $add->phone1 !!}" placeholder="Phone 1 for addres {!! $add->id !!}">
                                                            <hr>
                                                            <label for="add{!! $add->id !!}Phone2">Phone 2 for addres {!! $add->id !!}</label>
                                                            <input id="add{!! $add->id !!}Phone2" type="text" name="add_{!! $add->id !!}_phone_2" class="form-control phone2" value="{!! $add->phone2 !!}" placeholder="Phone 2 for addres {!! $add->id !!}">
                                                            <hr>
                                                            <label for="add{!! $add->id !!}Phone3">Phone 3 for addres {!! $add->id !!}</label>
                                                            <input id="add{!! $add->id !!}Phone3" type="text" name="add_1_phone_3" class="form-control phone3" value="{!! $add->phone3 !!}" placeholder="Phone 3 for addres {!! $add->id !!}">
                                                            <hr>
                                                            <div class="form-group">
                                                                <label for="hallName">Halls</label>
                                                                <select class="form-control halls" id="hallName_{!! $add->id !!}" name="hall_id">
                                                                    @foreach($halls as $key => $hall)
                                                                        <option value="{{ $hall->id}}" {!! $hall->id === $add->hall_id ? 'selected' : '' !!} >{{ $hall->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="m-t-5">
                                                                <label for="add{!! $add->id !!}Lat1">Latitude</label>
                                                                <input id="add{!! $add->id !!}Lat1" type="text" name="add_{!! $add->id !!}_lat" class="form-control lat" placeholder="Latitude for addres {!! $add->id !!}" value="{!! $add->latit !!}">
                                                                <i class="glyphicon glyphicon-info-sign" title="get from google maps url from your current space search"></i>    
                                                            </div>
                                                            
                                                            <div class="m-t-5">
                                                                <label for="add{!! $add->id !!}Long1">Longitude</label>
                                                                <input id="add{!! $add->id !!}Long1" type="text" name="add_{!! $add->id !!}_long" class="form-control long" value="{!! $add->longit !!}" placeholder="Longitude for addres {!! $add->id !!}" >
                                                                <i class="glyphicon glyphicon-info-sign" title="get from google maps url from your current space search"></i>   
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="text-center m-t-5">
                                                            <button type="button" 
                                                                    class="btn btn-danger removeAddres" 
                                                                    data-toggle="modal" 
                                                                    data-target="#myModal6" 
                                                                    id='removeAddres_{!! $add->id !!}'>Remove Addres 1</button>
                                                            <button type="button" class="btn btn-primary saveAddress" id='addAddres_{!! $add->id !!}'>Save Address 1</button>
                                                        </div>
                                                </fieldset>
                                                <input type="hidden" name="_token" id="token1" value="{{ csrf_token() }}">

                                                @endforeach
                                                
                                            </div>
                                            <div class="modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">Are you sure? </h4>
                                                  </div>
                                                  <div class="modal-body" id='gelleriaDeleteModalBody'>
                                                    Delete Address?
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-danger" id="deleteAddressButton">Delete</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            
                                            
                                        </div> 
                                        <div class="tab-pane" id="dailyInfo">
                                            <div class="row">
                                                <div class="form-group">
                                                    <label for="dailyInfoDisplayCheckBox" id="dailyInfoDisplayCheckBox1">Dsiplay Daily Info
                                                        <a href="javascript:;" >
                                                            <input id="dailyInfoDisplayCheckBox" value="{!! $daily_infos->status !!}" type="checkbox"
                                                            data-plugin="switchery" 
                                                            data-color="#1AB394" 
                                                            data-secondary-color="#ED5565"
                                                            {!! $daily_infos->status === 1 ? 'checked' : '' !!} />
                                                        </a>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-8">
                                                   <div class="form-group">
                                                        <label class="col-sm-12">Sun.<input id="sun_text" class="form-control" value="{!! $daily_infos->sun_text !!}" type="text" name="sun_daily_info" placeholder="Sunduy Info" ></label>
                                                        <label class="col-sm-12">Time<input id="sun_time" value="{!! $daily_infos->sun_time !!}" class="form-control" type="text" name="sun_daily_info_time" placeholder="Sunduy Info Time ex.(11:00-22:00)"></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-12">Mon.<input id="mon_text" class="form-control" value="{!! $daily_infos->mon_text !!}" type="text" name="mon_daily_info" placeholder="Monday Info"></label>
                                                        <label class="col-sm-12">Time<input id="mon_time" class="form-control" value="{!! $daily_infos->mon_time !!}" type="text" name="mon_daily_info_time" placeholder="Monday Info Time ex.(11:00-22:00)"></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-12">Tues.<input id="tues_text" class="form-control" value="{!! $daily_infos->tues_text !!}" type="text" name="tues_daily_info" placeholder="Tuesday Info"></label>
                                                        <label class="col-sm-12">Time<input id="tues_time" class="form-control" value="{!! $daily_infos->tues_time !!}" type="text" name="tues_daily_info_time" placeholder="Tuesday Info Time ex.(11:00-22:00)"></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-12">Wedn.<input id="wedn_text" class="form-control" value="{!! $daily_infos->wedn_text !!}" type="text" name="wedn_daily_info" placeholder="Wednesday Info"></label>
                                                        <label class="col-sm-12">Time<input id="wedn_time" class="form-control" value="{!! $daily_infos->wedn_time !!}" type="text" name="wedn_daily_info_time" placeholder="Wednesday Info Time ex.(11:00-22:00)"></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-12">Thurs.<input id="thurs_text" class="form-control" value="{!! $daily_infos->thurs_text !!}" type="text" name="thurs_daily_info" placeholder="Thursday Info"></label>
                                                        <label class="col-sm-12">Time<input id="thurs_time" class="form-control" value="{!! $daily_infos->thurs_time !!}" type="text" name="thurs_daily_info_time" placeholder="Thursday Info Time ex.(11:00-22:00)"></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-12">Frid.<input id="frid_text" class="form-control" value="{!! $daily_infos->frid_text !!}" type="text" name="frid_daily_info" placeholder="Friday Info"></label>
                                                        <label class="col-sm-12">Time<input id="frid_time" class="form-control" value="{!! $daily_infos->frid_time !!}" type="text" name="frid_daily_info_time" placeholder="Friday Info Time ex.(11:00-22:00)"></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-12">Sat.<input id="sut_text" class="form-control" value="{!! $daily_infos->sut_text !!}" type="text" name="sat_daily_info" placeholder="Saturday Info"></label>
                                                        <label class="col-sm-12">Time<input id="sut_time" class="form-control" value="{!! $daily_infos->sut_time !!}" type="text" name="set_daily_info_time" placeholder="Saturday Info Time ex.(11:00-22:00)"></label>
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="row">
                                                <input type="hidden" name="daily_info_id" id="daily_info_id" value="{!! $daily_infos->id !!}">
                                                <button type="button" class="btn btn-primary" id="saveDailyInfo">Save Daily Info</button>
                                            </div>
                                        </div>
                                    </div> 
                                </div> 
                            </div>
                        </div>
                    
            @include('adminLayouts.footer')
      </div>
  </div>
@stop