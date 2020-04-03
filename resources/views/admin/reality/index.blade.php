@extends('adminLayouts.index')
@section('title', 'Admin Dashboard')
@section('content')
    @include('adminLayouts.header')
    @include('adminLayouts.sidebar')
    @include('responsive.menu')
    <div class="content-page" id="reality-filter">
        <!-- Start content -->
        <input type="hidden" name="_token" value="{!! csrf_token() !!}" id="token">
        <div class="content">
            <div class="container">
                <div class="row m-t-20">
                    <div class="col-sm-4">
                        <h4 class="page-title breadcrumb">Անշարժ գույքերի ցուցակ</h4>
                    </div>
                </div>
                <div class="">
                    <form>
                        <p class="alert alert-success" id="successMessageHallBookingDelete" style="display:none"></p>
                        <div class="row search-box m-t-20">
                        <div class="col-sm-2">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="ms-container" id="ms-my_multi_select3">
                                        <div class="ms-selectable">
                                            <label for="code">Կոդ</label>
                                            <input type="text" class="form-control onchange" id="codeSearch" name="code">
                                            <ul class="ms-list" tabindex="-1">
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="hp_code">
                                            HP կոդ
                                        </label>
                                        <input type="text" name="hp_code" id="hp_code" class="form-control onchange">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="floorMin">Հարկեր ս․</label>
                                        <input type="number" min="0" class="form-control" id="floorMin" name="floorMin">
                                        <p class="align-content-center no-margin p-t-5">
                                            <span style="font-size: 13px;">Առաջին հ.</span>
                                            <input style="margin-left: 5px" type="checkbox" id="firstFloor" name="firstFloor">
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group m-l-10">
                                        <label for="floorMax">Հարկեր վ․</label>
                                        <input type="number" min="0" class="form-control" id="floorMax" name="floorMax">
                                        <p  class="align-content-center no-margin p-t-5">
                                            <span style="font-size: 13px;">Վերջին հ.</span>
                                            <input style="margin-left: 5px" type="checkbox" id="lastFloor" name="lastFloor">
                                        </p>
                                    </div>
                                </div>
                                <div class="glyphicon glyphicon-play-circle" style="cursor: pointer; padding: 3rem 0;" data-min="floorMin" data-max="floorMax"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="buildingFloorsMin">Շենք ք. ս․</label>
                                            <input type="number" min="0" class="form-control" id="buildingFloorsMin" name="buildingFloorsMin">
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group m-l-10">
                                            <label for="buildingFloorsMax">Շենք ք. վ․</label>
                                            <input type="number" min="0" class="form-control" id="buildingFloorsMax" name="buildingFloorsMax">
                                        </div>
                                    </div>
                                    <div class="glyphicon glyphicon-play-circle" style="cursor: pointer; padding: 3rem 0;" data-min="buildingFloorsMin" data-max="buildingFloorsMax"></div>
                                </div>
                            </div>
                        <div class="col-sm-2">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="roomsMin">Սեն. ս․</label>
                                        <input type="number" min="0" class="form-control" id="roomsMin" name="roomsMin">
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group m-l-10">
                                        <label for="roomsMax">Սեն. վ․</label>
                                        <input type="number" min="0" class="form-control" id="roomsMax" name="roomsMax">
                                    </div>
                                </div>
                                <div class="glyphicon glyphicon-play-circle" style="cursor: pointer; padding: 3rem 0;" data-min="roomsMin" data-max="roomsMax"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="areaMin">Մակ․ ս․</label>
                                        <input type="number" min="0" class="form-control" id="areaMin" >
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group m-l-10">
                                        <label for="areaMax">Մակ․ վ․</label>
                                        <input type="number" min="0" class="form-control" id="areaMax" >
                                    </div>
                                </div>
                                <div class="glyphicon glyphicon-play-circle" style="cursor: pointer; padding: 3rem 0;" data-min="areaMin" data-max="areaMax"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="priceMin">Արժ. ս․</label>
                                        <input type="number" min="0" class="form-control" id="priceMin" name="priceMin">
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group m-l-10">
                                        <label for="priceMax">Արժ. վ․</label>
                                        <input type="number" min="0" class="form-control" id="priceMax" name="priceMax">
                                    </div>
                                </div>
                                <div class="glyphicon glyphicon-play-circle" style="cursor: pointer; padding: 3rem 0;" data-min="priceMin" data-max="priceMax"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row m-t-20">
                                @if(!Auth::user()->parent)
                                    <div class="col-sm-2">
                                        <div class="custom-select onchange" style="width:200px;">
                                        </div>
                                        <label for="type">Բրոքեռներ</label>
                                        <select name="broker" id="type" class="form-control onchange" >
                                            <option value="all" >Բոլորը</option>
                                            @foreach(Auth::user()->brokers as $broker)
                                                <option value="{{$broker->id}}" >{{$broker->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                <div class="col-sm-2">
                                    <div class="custom-select" style="width:200px;">
                                    </div>
                                    <label for="type">Տեսակ</label>
                                    <select name="type" id="type" class="form-control onchange" >
                                        <option value="1" >Վաճառք</option>
                                        <option value="0" >Վարձակալություն</option>
                                        <option value="2" >Գնորդ</option>
                                        <option value="3" >Վարձակալ</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <label for="realityType">Գույքի տեսակ</label>
                                    <select name="realityType" id="realityType" class="form-control onchange" >
                                        <option value="all">Բոլորը</option>
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
                                <div class="col-sm-2">
                                    <label for="realityReg">Մարզ</label>
                                    <select name="realityReg" id="realityReg" class="form-control onchange" >
                                        <option value="all">Բոլորը</option>
                                        @foreach($regions as $region)
                                            <option value="{!! $region->id !!}">{!! $region->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-{{!Auth::user()->parent ? '2' : '4'}}">
                                    <label for="realitySubReg">Համայնք</label>
                                    <select name="subRegions[]"  id="realitySubReg" class="select2 select2-multiple onchange"
                                             multiple="multiple" multiple data-placeholder="Համայնք">
                                        @foreach($subRegions as $subRegion)
                                            <option value="{!! $subRegion->id !!}">{!! $subRegion->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <div class="ms-container" id="ms-my_multi_select3">
                                        <div class="ms-selectable">
                                            <label for="street">Փողոց</label>
                                            <input type="text"
                                                   id="streetSearch"
                                                   name="street"
                                                   class="form-control onchange"
                                                   autocomplete="off"
                                                   onblur="triggerFunction()"
                                                   placeholder="Փողոց">
                                            <ul class="ms-list" tabindex="-1">
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row m-t-20">

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row m-t-20 text-center filter-buttons">
                                    <input type="reset" id="clearFiltr" value="Մաքրել" class="btn btn-success filter-buttons">
                                    <button type="button" class="btn btn-success" id="otherSearch" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <span class="glyphicon glyphicon-chevron-down"></span>
                                        Ընդլայնված որոնում
                                    </button>
                            </div>
                        </div>
                        <div class="col-sm-12 m-t-20 collapse" id="collapseExample">
                            <div class="row m-t-20">
                                <div class="col-sm-2">
                                    <label for="realityProect">Նախագիծ</label>
                                    <select name="proect" id="realityProect" class="form-control onchange">
                                        <option value="all">Բոլորը</option>
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
                                <div class="col-sm-2">
                                    <label for="realityBuildingType">Շենքի տիպ</label>
                                    <select name="buildingType" id="realityBuildingType" class="form-control onchange">
                                        <option value="all">Բոլորը</option>
                                        <option value="0">Պանելային</option>
                                        <option value="1">Քարե</option>
                                        <option value="2">Մոնոլիտ</option>
                                        <option value="3">Աղյուսե</option>
                                        <option value="4">Փայտե</option>
                                        <option value="5">Կասետային</option>
                                        <option value="6">Այլ</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <label for="realityCosmetic">Հարդարում</label>
                                    <select name="cosmetic" id="realityCosmetic" class="form-control onchange">
                                        <option value="all">Բոլորը</option>
                                        <option value="0">Պետական</option>
                                        <option value="1">Զրոյական</option>
                                        <option value="2">Վերանորոգած</option>
                                        <option value="3">Կապ․ վեր․</option>
                                        <option value="4">Մասամբ վեր․</option>
                                        <option value="5">Չբնակեցված վեր․</option>
                                        <option value="6">Հին կապիտալ</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <label for="realityBalcon">Պատշգամբ</label>
                                    <select name="balcon" id="realityBalcon" class="form-control onchange">
                                        <option value="all">Բոլորը</option>
                                        <option value="0">Բաց</option>
                                        <option value="1">Փակ</option>
                                        <option value="2">Բաց և փակ</option>
                                        <option value="3">Շքապատշգամբ</option>
                                        <option value="4">Չունի</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <label for="buildingNumber">Շենք</label>
                                    <input type="text" class="form-control onchange" name="buildingNumber" id="buildingNumber">
                                </div>
                                <div class="col-sm-2">
                                    <label for="apartamentNumber">Բնակարան</label>
                                    <input type="text" class="form-control onchange" name="apartamentNumber" id="apartamentNumber">
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="gardenMin">Այգի/հող./մետր ս․</label>
                                                <input type="number" min="0" class="form-control" id="gardenMin" name="gardenMin">
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group m-l-10">
                                                <label for="gardenMax">Այգի/հող./մետր վ․</label>
                                                <input type="number" min="0" class="form-control" id="gardenMax" name="gardenMax">
                                            </div>
                                        </div>
                                        <div class="glyphicon glyphicon-play-circle" style="cursor: pointer; padding: 3rem 0;" data-min="gardenMin" data-max="gardenMax"></div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="facePartMin">Ճակատ. մաս/մետր ս․</label>
                                                <input type="number" min="0" class="form-control" id="facePartMin" name="facePartMin">
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group m-l-10">
                                                <label for="facePartMax">Ճակատ. մաս/մետր վ․</label>
                                                <input type="number" min="0" class="form-control" id="facePartMax" name="facePartMax">
                                            </div>
                                        </div>
                                        <div class="glyphicon glyphicon-play-circle" style="cursor: pointer; padding: 3rem 0;" data-min="facePartMin" data-max="facePartMax"></div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group m-l-10">
                                        <label for="phone">Հեռ</label>
                                        <input type="text" class="form-control onchange" id="phone" name="phone">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group m-l-10">
                                        <label for="customerName">Հաճ․ անուն</label>
                                        <input type="text" class="form-control onchange" id="customerName" name="customerName">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
{{--                    <div class="table-load row m-t-20 show text-center">--}}
{{--                        <div class="loader" style="margin: 0 auto;"></div>--}}
{{--                    </div>--}}
                    <div class="table-block row m-t-20 tabelList">
                        @include('admin.reality.table')
                    </div>

                </div>
            <!-- Modal -->
                @include('adminLayouts.footer')
            </div>
        </div>
        <span class="print">
            <button class="printNumbers">0</button>
        </span>
@stop
