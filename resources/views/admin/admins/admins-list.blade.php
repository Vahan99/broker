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
                    <h4 class="page-title breadcrumb">Աշխատակիցներ</h4>
                </div>
            </div>
            <div class="row">
                <p id="errorMessageUserDelete"></p>
            </div>
            <div class="card-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="p-20">
                            <table class="table table-bordered m-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Աշխատակցի անուն</th>
                                        @if($admin == 1 || $admin == 0 || $admin == 3)
                                        <th>Ստատուս</th>
                                        @endif
                                        <th>Աշխատակցի Էլ-հասցե</th>
                                        @if($admin == 1 || $admin == 3)
                                        <th>Ադմին</th>
                                        @endif
                                        <th>Հասցե</th>
                                        <th>Գույքի քանակ</th>
                                        @if($admin == 1 || $admin == 0 || $admin == 3)
                                            <th>Աշխատակցի պաշտոն</th>
                                            <th>Փոփոխել</th>
                                        @endif
                                        <th>Ջնջել</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr style="color: black; background: {!! $user->admin == 1 ? '#761c19' : ($user->admin == 3 ? '#ebe980' : ($user->admin == 0 ? '#81c868' : '#8080eb')) !!}">
                                        <th scope="row">{!! $loop->index + 1 !!}</th>
                                        <td>{!! $user->name !!}</td>
                                        @if($admin == 1 || $admin == 0 || $admin == 3)
                                        <td>
                                            @if(($admin == 1 && $user->admin != 1) || ($admin == 0 && $user->admin != 0) || ($admin == 3 && $user->admin != 3))
                                            <input type="hidden" name="userId" value="{!! $user->id !!}">
                                            <select name="userStatus" class="form-control changeUserStatus">
                                                <option value="1" {!! $user->status == 1 ? 'selected' : '' !!}>Ակտիվ</option>
                                                <option value="2" {!! $user->status == 2 ? 'selected' : '' !!}>Դադարեցված</option>
                                            </select>
                                            @else
                                            <span>-</span>
                                            @endif
                                        </td>
                                        @endif
                                        <td>{!! $user->email !!}</td>
                                        @if($admin == 1 || $admin == 3)
                                        <td>
                                            @foreach ($users as $u)
                                                @if($u->id == $user->admin_id)
                                                    {!! $u->name !!}
                                                @endif
                                            @endforeach
                                            
                                        </td>
                                        @endif
                                        <td>{!! $user->address !!}</td>
                                        <td>
                                            @foreach($count as $c)
                                                @if($user->id == $c['id'])
                                                    {!! $c['count'] !!}
                                                @endif
                                            @endforeach
                                        </td>
                                        @if($admin == 1 || $admin == 0 || $admin == 3)
                                            @if($user->admin == 1)
                                                <td>Սուպեր Ադմին</td>
                                            @elseif($user->admin == 3)
                                                <td>Սուպեր ադմինի օգնական</td>
                                            @elseif($user->admin == 0)
                                                <td>Ադմին</td>
                                            @else
                                                <td>Գործակալ</td>
                                            @endif
                                            @if(($admin == 1 && $user->admin == 1) || ($admin != 1 && $user->admin == 2) || ($admin == 1 && $user->admin == 0) || ($admin == 1 && $user->admin == 3) || ($admin == 0 && $user->admin != 0) || ($admin == 3 && $user->admin != 3))
                                            <td>
                                                <a href="/admin/gorcakal/edit-user/{!! $user->id !!}" class="btn btn-primary btn-rounded waves-effect waves-light"><i class="glyphicon glyphicon-pencil"></i></a>
                                            </td>
                                            @else
                                                <td>-</td>
                                            @endif
                                            @if(($admin == 1 && $user->admin != 1) || ($admin == 0 && $user->admin != 0) || ($admin == 3 && $user->admin != 3))
                                            <td>
                                                <input type="hidden" name="hallId" value="{!! $user->id !!}">
                                                <button class="btn btn-danger btn-rounded waves-effect waves-light userDleteModalOpen {!! $user->admin == 2 ? 'gorcakal' : '' !!}"
                                                        data-toggle="modal"
                                                        data-target="#myModal1">
                                                    <i class="glyphicon glyphicon-trash"></i>
                                                </button>
                                            </td>
                                            @else
                                            <td>-</td>
                                            @endif
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Դուք համոզված եք? </h4>
                  </div>
                  <div class="modal-body" id='userDeleteModalBody'>
                      <div class="form-group">
                          <label for="koding1">Մուտքագրել կոդը</label>
                          <input type="text" id="koding1" class="form-control">
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Փակել</button>
                    <button type="button" class="btn btn-danger" id="dleteUserButton" disabled="disabled">Ջնջել</button>
                  </div>
                </div>
              </div>
            </div>

    @include('adminLayouts.footer')
    </div>
</div>
@stop