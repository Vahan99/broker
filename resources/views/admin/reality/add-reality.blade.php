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
                    @if (!$edit)
                        <div class="col-sm-12">
                            <h4 class="page-title breadcrumb">Ավելացնել Գույք</h4>
                        </div>
                    @endIf
                    @if ($edit)
                        <div class="col-sm-12">
                            <h4 class="page-title breadcrumb">Փոփոխել Գույքի տվյալները</h4>
                        </div>
                    @endIf
                </div>
                <div class="card-box" id="editUserArea" style="display: block">
                    @if($error)
                        <p class="alert-danger"><b>Error !</b>{!! $errormessage !!}</p>
                    @endIf
                    <div class="row">
                        <div class="col-sm-12">
                            @if (!$edit)
                                <form action="" method="post" accept-charset="utf-8">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row">
                                        @if($admin == 1 || $admin == 3)
                                        <div class="col-sm-3 b-r">
                                            <label for="addRealityAdmin">Ադմին</label>
                                            <select name="admin_id" id="addRealityAdmin" class="form-control">
                                                <option value="-1">Բոլորը</option>
                                                @foreach($admins as $admin)
                                                    <option value="{!! $admin->id !!}">{!! $admin->name !!}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @endif
{{--                                        <div class="col-sm-3 b-r">--}}
{{--                                            <label for="addRealityUsers">Գործակալ</label>--}}
{{--                                            <select name="user" id="addRealityUsers" class="form-control">--}}
{{--                                                @foreach($users as $user)--}}
{{--                                                    <option value="{!! $user->id !!}">{!! $user->name !!}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
                                        <div class="col-sm-3 b-r">
                                            <label for="type">Տեսակ</label>
                                            <select name="type" id="type1" class="form-control">
                                                <option value="1">Վաճառք</option>
                                                <option value="0">Վարձակալություն</option>
                                                
                                                <option value="2">Գնորդ</option>
                                                <option value="3">Վարձակալ</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3 b-r">
                                            <label for="code">Կոդ</label>
                                            <input type="text" name="code" class="form-control">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="realityType">Գույքի տեսակ</label>
                                            <select name="realityType" id="realityType" class="form-control">
                                                <option value="-1">Բոլորը</option>
                                                <option value="0">Բնակարան</option>
                                                <option value="1">Տուն</option>
                                                <option value="2">Առանձնատուն</option>
                                                <option value="3">Ամառանոց</option>
                                                <option value="4">Գրասենյակ</option>
                                                <option value="5">Ռեստորան</option>
                                                <option value="6">Խանութ</option>
                                                <option value="7">Հողատարածք</option>
                                                <option value="8">Վարսավիրանոց</option>
                                                <option value="9">Ավտոտեխսպասարկում</option>
                                                <option value="10">Այլ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-2 b-r">
                                            <label for="realityRegion">Մարզ</label>
                                            <select name="region" id="addRealityRegion" class="form-control">
                                                <option value="-1">Բոլորը</option>
                                                @foreach($regions as $region)
                                                    <option value="{!! $region->id !!}">{!! $region->name !!}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-3 b-r">
                                            <label for="realitySubRegion">Համայնք</label>
                                            <select name="subRegion" id="addRealitySubRegion" class="form-control">
                                                <option value="-1">Բոլորը</option>
                                                @foreach($subRegions as $subRegion)
                                                    <option value="{!! $subRegion->id !!}">{!! $subRegion->name !!}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-3 b-r">
                                            <div class="ms-container" id="ms-my_multi_select3">
                                                <div class="ms-selectable">
                                                    <label for="street">Փողոց</label>
                                                    <input type="text"
                                                           id="street"
                                                           name="street"
                                                           class="form-control"
                                                           autocomplete="off"
                                                           placeholder="Փողոց">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 b-r">
                                            <label for="buildingNumber">Շենք</label>
                                            <input type="text" class="form-control" name="buildingNumber">
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="apartamentNumber">Բնակարան</label>
                                            <input type="text" class="form-control" name="apartamentNumber">
                                        </div>
                                    </div>
                                    
                                    <hr/>
                                    <div class="row">
                                        
                                        <div class="col-sm-3 b-r">
                                            <label for="realityProect">Նախագիծ</label>
                                            <select name="proect" id="realityProect" class="form-control">
                                                <option value="-1">Բոլորը</option>
                                                <option value="0">Ստալին փ/ծ</option>
                                                <option value="1">Ստալին բ/ծ</option>
                                                <option value="2">Խռուշյչովյան</option>
                                                <option value="3">հետ Խռուշչովյան</option>
                                                <option value="4">Երևանյան</option>
                                                <option value="5">Չեխական</option>
                                                <option value="6">Բադալյան</option>
                                                <option value="7">Մոսկովյան</option>
                                                <option value="8">Վրացական</option>
                                                <option value="9">Հատուկ</option>
                                                <option value="10">Նորակառույց</option>
                                                <option value="11">Հանրակացարան</option>
                                                <option value="12">Այլ</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3 b-r">
                                            <label for="realityBuildingType">Շենքի տիպ</label>
                                            <select name="buildingType" id="realityBuildingType" class="form-control">
                                                <option value="-1">Բոլորը</option>
                                                <option value="0">Պանելային</option>
                                                <option value="1">Քարե</option>
                                                <option value="2">Մոնոլիտ</option>
                                                <option value="3">Աղյուսե</option>
                                                <option value="4">Փայտե</option>
                                                <option value="5">Կասետային</option>
                                                <option value="6">Այլ</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3 b-r">
                                            <label for="realityCosmetic">Հարդարում</label>
                                            <select name="cosmetic" id="realityCosmetic" class="form-control">
                                                <option value="-1">Բոլորը</option>
                                                <option value="0">Պետական</option>
                                                <option value="1">Զրոյական</option>
                                                <option value="2">Վերանորոգած</option>
                                                <option value="3">Կապ․ վեր․</option>
                                                <option value="4">Մասամբ վեր․</option>
                                                <option value="5">Չբնակեցված վեր․</option>
                                                <option value="6">Հին կապիտալ</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="realityBalcon">Պատշգամբ</label>
                                            <select name="balcon" id="realityBalcon" class="form-control">
                                                <option value="-1">Բոլորը</option>
                                                <option value="0">Բաց</option>
                                                <option value="1">Փակ</option>
                                                <option value="2">Բաց և փակ</option>
                                                <option value="3">Շքապատշգամբ</option>
                                                <option value="4">Չունի</option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row">
                                        <div class="col-sm-3 b-r">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="floorMin">Հարկ</label>
                                                        <input type="number" min="0" name="floors" class="form-control"
                                                               id="floorMin">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group m-l-10">
                                                        <p  class="align-content-center">
                                                            <span>Առաջին հարկ</span>
                                                            <span class="text-right" style="width: 20%">
                                                                <input type="checkbox" name="firstFloor" id="firstFloor">
                                                            </span>
                                                        </p>
                                                        <br>
                                                        <p class="align-content-center">
                                                            <span>Վերջին հարկ</span>
                                                            <span class="text-right" style="width: 24%">
                                                                <input type="checkbox" name="lastFloor" id="lastFloor">
                                                            </span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 b-r">
                                            <div class="form-group">
                                                <label for="areaMin">Մակերես</label>
                                                <input type="number" min="0" name="area" class="form-control" id="areaMin">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 b-r">
                                            <div class="form-group">
                                                <label for="rooms">Սենյակ</label>
                                                <input type="number" min="0" name="rooms" class="form-control"
                                                       id="priceMin">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="priceMin">Արժեք ($)</label>
                                                <input type="number" min="0" name="price" class="form-control"
                                                       id="priceMin">
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row">
                                        <div class="col-sm-4 b-r">
                                            <div class="form-group">
                                                <label for="buildingFloorsMin">Հարկերի քանակ</label>
                                                <input type="number" min="0" name="buildingFloors" class="form-control"
                                                       id="buildingFloorsMin">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 b-r">
                                            <div class="form-group">
                                                <label for="gardenMin">Այգի/հողամաս/մետր</label>
                                                <input type="number" min="0" name="gardenArea" class="form-control"
                                                       id="gardenMin">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="facePartMin">Ճակատային մաս/մետր</label>
                                                <input type="number" min="0" name="faceArea" class="form-control"
                                                       id="facePartMin">
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row">
                                        <div class="col-sm-3 b-r">
                                            <div class="form-group m-l-10">
                                                <label for="phone">Հեռ</label>
                                                <input type="text" name="phone" class="form-control" id="phone">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group m-l-10">
                                                <label for="customerName">Հաճ․ անուն</label>
                                                <input type="text" name="customerName" class="form-control"
                                                       id="customerName">
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="link">Հղում</label>
                                                <input type="text" name="link" id="link" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="info">Հավելյալ Տեղեկատվություն</label>
                                                <textarea name="info" id="info" rows="10" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary" id="addOrEditUserButton">Ավելացնել
                                    </button>
                                </form>
                            @else
                                <p class="alert-danger" id="resetErrormessage"></p>
                                <form action="" method="post" accept-charset="utf-8">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="resPassHiddenToken">
                                    <div class="row">
                                        @if($admin == 1 || $admin == 3)
                                            <div class="col-sm-3 b-r">
                                                <label for="editRealityAdmin">Ադմին</label>
                                                <select name="admin_id" id="editRealityAdmin" class="form-control">
                                                    <option value="-1">Բոլորը</option>
                                                    @foreach($admins as $admin)
                                                        <option value="{!! $admin->id !!}">{!! $admin->name !!}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
{{--                                        <div class="col-sm-3 b-r">--}}
{{--                                            <label for="realityRegion">Գործակալ</label>--}}
{{--                                            <select name="user" id="editRealityUsers" class="form-control">--}}
{{--                                                @foreach($users as $user)--}}
{{--                                                    <option value="{!! $user->id !!}" {!! $reality->user_id == $user->id ? 'selected' : '' !!}>{!! $user->name !!}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
                                        <div class="col-sm-3">
                                            <label for="type">Տեսակ</label>
                                            <select name="type" id="type" class="form-control">
                                                <option value="0" {!! $reality->type == '0' ? 'selected' : '' !!}>
                                                    Վարձակալություն
                                                </option>
                                                <option value="1" {!! $reality->type == '1' ? 'selected' : '' !!}>Վաճառք
                                                </option>
                                                <option value="2" {!! $reality->type == '2' ? 'selected' : '' !!}>Գնորդ
                                                </option>
                                                <option value="3" {!! $reality->type == '3' ? 'selected' : '' !!}>Վարձակալ
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="code">Կոդ</label>
                                            <input type="text" name="code" class="form-control"
                                                   value="{!! $reality->code !!}">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-2 b-r">
                                            <label for="realityType">Գույքի տեսակ</label>
                                            <select name="realityType" id="realityType" class="form-control">
                                                <option value="-1" {!! $reality->realityType == '-1' ? 'selected' : '' !!}>
                                                    Բոլորը
                                                </option>
                                                <option value="0" {!! $reality->realityType == '0' ? 'selected' : '' !!}>
                                                    Բնակարան
                                                </option>
                                                <option value="1" {!! $reality->realityType == '1' ? 'selected' : '' !!}>
                                                    Տուն
                                                </option>
                                                <option value="2" {!! $reality->realityType == '2' ? 'selected' : '' !!}>
                                                    Առանձնատուն
                                                </option>
                                                <option value="3" {!! $reality->realityType == '3' ? 'selected' : '' !!}>
                                                    Ամառանոց
                                                </option>
                                                <option value="4" {!! $reality->realityType == '4' ? 'selected' : '' !!}>
                                                    Գրասենյակ
                                                </option>
                                                <option value="5" {!! $reality->realityType == '5' ? 'selected' : '' !!}>
                                                    Ռեստորան
                                                </option>
                                                <option value="6" {!! $reality->realityType == '6' ? 'selected' : '' !!}>
                                                    Խանութ
                                                </option>
                                                <option value="7" {!! $reality->realityType == '7' ? 'selected' : '' !!}>
                                                    Հողատարածք
                                                </option>
                                                <option value="8" {!! $reality->realityType == '8' ? 'selected' : '' !!}>
                                                    Վարսավիրանոց
                                                </option>
                                                <option value="9" {!! $reality->realityType == '9' ? 'selected' : '' !!}>
                                                    Ավտոտեխսպասարկում
                                                </option>
                                                <option value="10" {!! $reality->realityType == '10' ? 'selected' : '' !!}>
                                                    Այլ
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2 b-r">
                                            <label for="realityProect">Նախագիծ</label>
                                            <select name="proect" id="realityProect" class="form-control">
                                                <option value="-1" {!! $reality->proect == '-1' ? 'selected' : '' !!}>
                                                    Բոլորը
                                                </option>
                                                <option value="0" {!! $reality->proect == '0' ? 'selected' : '' !!}>Ստալին
                                                    փ/ծ
                                                </option>
                                                <option value="1" {!! $reality->proect == '1' ? 'selected' : '' !!}>Ստալին
                                                    բ/ծ
                                                </option>
                                                <option value="2" {!! $reality->proect == '2' ? 'selected' : '' !!}>
                                                    Խռուշյչովյան
                                                </option>
                                                <option value="3" {!! $reality->proect == '3' ? 'selected' : '' !!}>հետ
                                                    Խռուշչովյան
                                                </option>
                                                <option value="4" {!! $reality->proect == '4' ? 'selected' : '' !!}>
                                                    Երևանյան
                                                </option>
                                                <option value="5" {!! $reality->proect == '5' ? 'selected' : '' !!}>
                                                    Չեխական
                                                </option>
                                                <option value="6" {!! $reality->proect == '6' ? 'selected' : '' !!}>
                                                    Բադալյան
                                                </option>
                                                <option value="7" {!! $reality->proect == '7' ? 'selected' : '' !!}>
                                                    Մոսկովյան
                                                </option>
                                                <option value="8" {!! $reality->proect == '8' ? 'selected' : '' !!}>
                                                    Վրացական
                                                </option>
                                                <option value="9" {!! $reality->proect == '9' ? 'selected' : '' !!}>Հատուկ
                                                </option>
                                                <option value="10" {!! $reality->proect == '10' ? 'selected' : '' !!}>
                                                    Նորակառույց
                                                </option>
                                                <option value="11" {!! $reality->proect == '11' ? 'selected' : '' !!}>
                                                    Հանրակացարան
                                                </option>
                                                <option value="12" {!! $reality->proect == '12' ? 'selected' : '' !!}>Այլ
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2 b-r">
                                            <label for="realityBuildingType">Շենքի տիպ</label>
                                            <select name="buildingType" id="realityBuildingType" class="form-control">
                                                <option value="-1" {!! $reality->buildingType == '-1' ? 'selected' : '' !!}>
                                                    Բոլորը
                                                </option>
                                                <option value="0" {!! $reality->buildingType == '0' ? 'selected' : '' !!}>
                                                    Պանելային
                                                </option>
                                                <option value="1" {!! $reality->buildingType == '1' ? 'selected' : '' !!}>
                                                    Քարե
                                                </option>
                                                <option value="2" {!! $reality->buildingType == '2' ? 'selected' : '' !!}>
                                                    Մոնոլիտ
                                                </option>
                                                <option value="3" {!! $reality->buildingType == '3' ? 'selected' : '' !!}>
                                                    Աղյուսե
                                                </option>
                                                <option value="4" {!! $reality->buildingType == '4' ? 'selected' : '' !!}>
                                                    Փայտե
                                                </option>
                                                <option value="5" {!! $reality->buildingType == '5' ? 'selected' : '' !!}>
                                                    Կասետային
                                                </option>
                                                <option value="6" {!! $reality->buildingType == '6' ? 'selected' : '' !!}>
                                                    Այլ
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2 b-r">
                                            <label for="realityCosmetic">Հարդարում</label>
                                            <select name="cosmetic" id="realityCosmetic" class="form-control">
                                                <option value="-1" {!! $reality->cosmetic == '-1' ? 'selected' : '' !!}>
                                                    Բոլորը
                                                </option>
                                                <option value="0" {!! $reality->cosmetic == '0' ? 'selected' : '' !!}>
                                                    Պետական
                                                </option>
                                                <option value="1" {!! $reality->cosmetic == '1' ? 'selected' : '' !!}>
                                                    Զրոյական
                                                </option>
                                                <option value="2" {!! $reality->cosmetic == '2' ? 'selected' : '' !!}>
                                                    Վերանորոգած
                                                </option>
                                                <option value="3" {!! $reality->cosmetic == '3' ? 'selected' : '' !!}>Կապ․
                                                    վեր․
                                                </option>
                                                <option value="4" {!! $reality->cosmetic == '4' ? 'selected' : '' !!}>Մասամբ
                                                    վեր․
                                                </option>
                                                <option value="5" {!! $reality->cosmetic == '5' ? 'selected' : '' !!}>
                                                    Չբնակեցված վեր․
                                                </option>
                                                <option value="6" {!! $reality->cosmetic == '6' ? 'selected' : '' !!}>Հին
                                                    կապիտալ
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="realityBalcon">Պատշգամբ</label>
                                            <select name="balcon" id="realityBalcon" class="form-control">
                                                <option value="-1" {!! $reality->balcon == '-1' ? 'selected' : '' !!}>
                                                    Բոլորը
                                                </option>
                                                <option value="0" {!! $reality->balcon == '0' ? 'selected' : '' !!}>Բաց
                                                </option>
                                                <option value="1" {!! $reality->balcon == '1' ? 'selected' : '' !!}>Փակ
                                                </option>
                                                <option value="2" {!! $reality->balcon == '2' ? 'selected' : '' !!}>Բաց և
                                                    փակ
                                                </option>
                                                <option value="3" {!! $reality->balcon == '3' ? 'selected' : '' !!}>
                                                    Շքապատշգամբ
                                                </option>
                                                <option value="4" {!! $reality->balcon == '4' ? 'selected' : '' !!}>Չունի
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row">
                                        <div class="col-sm-2 b-r">
                                            <label for="realityRegion">Մարզ</label>
                                            <select name="region" id="editRealityRegion" class="form-control">
                                                <option value="-1">Բոլորը</option>
                                                @foreach($regions as $region)
                                                    <option value="{!! $region->id !!}"
                                                            {!! $region->id == $reality->region ? 'selected' : '' !!}>
                                                        {!! $region->name !!}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-3 b-r">
                                            <label for="realitySubRegion">Համայնք</label>
                                            <select name="subRegion" id="editRealitySubRegion" class="form-control">
                                                <option value="-1">Բոլորը</option>
                                                @foreach($subRegions as $subRegion)
                                                    <option value="{!! $subRegion->id !!}"
                                                            {!! $subRegion->id == $reality->subRegion ? 'selected' : '' !!}>
                                                        {!! $subRegion->name !!}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-3 b-r">
                                            <div class="ms-container" id="ms-my_multi_select3">
                                                <div class="ms-selectable">
                                                    <label for="street">Փողոց</label>
                                                    <input type="text"
                                                           id="street"
                                                           name="street"
                                                           class="form-control"
                                                           autocomplete="off"
                                                           placeholder="Փողոց"
                                                           value="{!! $reality->street !!}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 b-r">
                                            <label for="buildingNumber">Շենք</label>
                                            <input type="text" class="form-control"
                                                   value="{!! $reality->buildingNumber !!}"
                                                   name="buildingNumber">
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="apartamentNumber">Բնակարան</label>
                                            <input type="text" class="form-control"
                                                   value="{!! $reality->apartamentNumber !!}"
                                                   name="apartamentNumber">
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row">
                                        <div class="col-sm-3 b-r">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="floorMin">Հարկ</label>
                                                        <input type="number" min="0" name="floors" class="form-control"
                                                               value="{!! $reality->floors !!}"
                                                               id="floorMin">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group m-l-10">
                                                        <p  class="align-content-center">
                                                            <span>Առաջին հարկ</span>
                                                            <span class="text-right" style="width: 20%">
                                                                <input type="checkbox" name="firstFloor"
                                                                       {!! $reality->firstFloor == 1 ? 'checked' : '' !!}
                                                                       id="firstFloor">
                                                            </span>
                                                        </p>
                                                        <br>
                                                        <p class="align-content-center">
                                                            <span>Վերջին հարկ</span>
                                                            <span class="text-right" style="width: 24%">
                                                                <input type="checkbox" name="lastFloor"
                                                                       {!! $reality->lastFloor == 1 ? 'checked' : '' !!}
                                                                       id="lastFloor">
                                                            </span>
                                                        </p>
                                                        {{--<label for="firstFloor">Առաջին հարկ</label>--}}
                                                        {{--<input type="checkbox" name="firstFloor"--}}
                                                               {{--{!! $reality->firstFloor == 1 ? 'checked' : '' !!}--}}
                                                               {{--id="firstFloor">--}}
                                                        {{--<br>--}}
                                                        {{--<label for="lastFloor">Վերջի հարկ</label>--}}
                                                        {{--<input type="checkbox" name="lastFloor"--}}
                                                               {{--{!! $reality->lastFloor == 1 ? 'checked' : '' !!}--}}
                                                               {{--id="lastFloor">--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 b-r">
                                            <div class="form-group">
                                                <label for="areaMin">Մակերես</label>
                                                <input type="number" min="0" name="area" class="form-control"
                                                       value="{!! $reality->area !!}"
                                                       id="areaMin">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 b-r">
                                            <div class="form-group">
                                                <label for="rooms">Սենյակ</label>
                                                <input type="number" min="0" name="rooms" class="form-control"
                                                       value="{!! $reality->rooms !!}"
                                                       id="priceMin">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="priceMin">Արժեք</label>
                                                <input type="number" min="0" name="price" class="form-control"
                                                       value="{!! $reality->price !!}"
                                                       id="priceMin">
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row">
                                        <div class="col-sm-4 b-r">
                                            <div class="form-group">
                                                <label for="buildingFloorsMin">Հարկերի քանակ</label>
                                                <input type="number" min="0" name="buildingFloors" class="form-control"
                                                       value="{!! $reality->buildingFloors !!}"
                                                       id="buildingFloorsMin">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 b-r">
                                            <div class="form-group">
                                                <label for="gardenMin">Այգի/հողամաս/մետր</label>
                                                <input type="number" min="0" name="gardenArea" class="form-control"
                                                       value="{!! $reality->gardenArea !!}"
                                                       id="gardenMin">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="facePartMin">Ճակատային մաս/մետր</label>
                                                <input type="number" min="0" name="faceArea" class="form-control"
                                                       value="{!! $reality->faceArea !!}"
                                                       id="facePartMin">
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row">
                                        {{--<div class="col-sm-3 b-r">--}}
                                        {{--<div class="form-group m-l-10">--}}
                                        {{--<label for="code">Կոդ</label>--}}
                                        {{--<input type="text" class="form-control" id="code" >--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-sm-3 b-r">--}}
                                        {{--<div class="form-group m-l-10">--}}
                                        {{--<label for="employer">Գործակալ </label>--}}
                                        {{--<input type="text" class="form-control" id="employer" >--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        <div class="col-sm-3 b-r">
                                            <div class="form-group m-l-10">
                                                <label for="phone">Հեռ</label>
                                                <input type="text" name="phone" class="form-control" id="phone"
                                                       value="{!! $reality->phone !!}">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group m-l-10">
                                                <label for="customerName">Հաճ․ անուն</label>
                                                <input type="text" name="customerName" class="form-control"
                                                       id="customerName" value="{!! $reality->customerName !!}">
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="link">Հղում</label>
                                                <input type="text" name="link" id="link" class="form-control"
                                                       value="{!! $reality->link !!}">
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="info">Հավելյալ Տեղեկատվություն, Enter կոճակը օգտագործելու համար օգտագործել Shift + Enter,<br> հղում օգտագործելու համար օգտվել այս նմուշից՝ &#60;a href&#61;&#39;Ձեր հղումն այստեղ&#39; target&#61;&#39;_blank&#39; &#62;Հղում&#60;&#47;a&#62;</label>
                                                <textarea name="info" id="info" rows="10"
                                                          class="form-control">{!! $reality->info !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary" id="addOrEditUserButton">Փոփոխել</button>
                                </form>
                            @endIf
                        </div>
                    </div>
                </div>
                @include('adminLayouts.footer')
            </div>
        </div>
@stop