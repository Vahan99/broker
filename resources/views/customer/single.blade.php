@extends('adminLayouts.index')
@section('title', 'Admin Dashboard')
@section('content')
    @include('adminLayouts.header')
    @include('adminLayouts.sidebar')
    @push('style')
        <link rel="stylesheet" href="{{asset('assets/css/choose-type.css')}}">
    @endpush
    <div class="content-page" id="reality-filter">
        <div class="content">
            <div class="container">
                <h4 class="page-title breadcrumb">Հաճախորդի տվյալներ</h4>
                <div class="container user-info">
                    <div class="row">
                        <div class="col-md-1">
                            <p><span class="fa fa-users"></span> Հաճախորդ:</p>
                        </div>
                        <div class="col-md-3">
                            <p>{{$customer->type}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1">
                            <p><span class="fa fa-user"></span> Անուն:</p>
                        </div>
                        <div class="col-md-5">
                            <p>{{$customer->fullName}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1">
                            <p><span class="fa fa-phone"></span> Հեռախոս:</p>
                        </div>
                        <div class="col-md-3">
                            <p>{{$customer->allPhones}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1">
                            <p><span class="fa fa-envelope-o"></span> Էլ․ հասցե:</p>
                        </div>
                        <div class="col-md-3">
                            <p>{{$customer->email}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @if($filters->count())
                <div class="container">
                    <h4 class="page-title breadcrumb">Պահանջվող գույքեր</h4>
                    <div class="container">
                        <div class="col-md-4" style="padding-left: 0">
                            <div class="container-category-left">
                                <ul class="nav nav-pills nav-stacked left-nav-container">
                                    @foreach($filters as $record)
                                        <li role="presentation" class="{{ isset($filter) && $filter->id == $record->id ? 'active' : ''}}">
                                            <a href="?filter={{$record->id}}">{{$record->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8 right-nav-container">
                            @isset($filter)
                                <div class="row info-content">
                                    @if($filter->buildingFloorsMin && $filter->buildingFloorsMax)
                                        <div class="col-md-6">
                                            <label>Հարկերի քանակ</label>
                                            <input type="text" class="form-control" value="{{ $filter->buildingFloorsMin .'-'. $filter->buildingFloorsMax}}" disabled>
                                        </div>
                                    @endif
                                    @if($filter->floorMin && $filter->floorMax)
                                        <div class="col-md-6">
                                            <label>Հարկ</label>
                                            <input type="text" class="form-control" value="{{ $filter->floorMin .'-'. $filter->floorMax}}" disabled>
                                        </div>
                                    @endif
                                    @if($filter->areaMin && $filter->areaMax)
                                        <div class="col-md-6">
                                            <label>Մակերես</label>
                                            <input type="text" class="form-control" value="{{ $filter->areaMin .'-'. $filter->areaMax}}" disabled>
                                        </div>
                                    @endif
                                    @if($filter->roomsMin && $filter->roomsMax)
                                        <div class="col-md-6">
                                            <label> Սենյակ</label>
                                            <input type="text" class="form-control" value="{{ $filter->roomsMin .'-'.$filter->roomsMax}}" disabled>
                                        </div>
                                    @endif
                                    @if($filter->priceMin && $filter->priceMax)
                                        <div class="col-md-6">
                                            <label>Արժեք ($)</label>
                                            <input type="text" class="form-control" value="{{ $filter->priceMin .'-'.$filter->priceMax }}" disabled>
                                        </div>
                                    @endif
                                    @if($filter->gardenMin && $filter->gardenMax)
                                        <div class="col-md-6">
                                            <label> Այգի/հողամաս/մետր</label>
                                            <input type="text" class="form-control" value="{{ $filter->gardenMin .'-' .$filter->gardenMax}}" disabled>
                                        </div>
                                    @endif
                                    @if($filter->facePartMin && $filter->facePartMax)
                                        <div class="col-md-6">
                                            <label>Ճակատային մաս/մետր</label>
                                            <input type="text" class="form-control" value="{{ $filter->facePartMin .'-'.$filter->facePartMax}}" disabled>
                                        </div>
                                    @endif
                                    @if($filter->type)
                                        <div class="col-md-6">
                                            <label>Տեսակ</label>
                                            <input type="text" class="form-control" value="{{ isset($realtyData->realtyType()[$filter->type]) ? $realtyData->realtyType()[$filter->type]['label'] : ''}}" disabled>
                                        </div>
                                    @endif
                                    @if($filter->realityType)
                                        <div class="col-md-6">
                                            <label>Գույքի տեսակ</label>
                                            <input type="text" class="form-control" value="{{ isset($realtyData->types()[$filter->realityType]) ? $realtyData->types()[$filter->realityType]['label'] : ''}}" disabled>
                                        </div>
                                    @endif
                                    @if($filter->proect)
                                        <div class="col-md-6">
                                            <label>Նախագիծ</label>
                                            <input type="text" class="form-control" value="{{ isset($realtyData->projects()[$filter->proect]) ? $realtyData->projects()[$filter->proect]['label'] : ''}}" disabled>
                                        </div>
                                    @endif
                                    @if($filter->buildingType)
                                        <div class="col-md-6">
                                            <label>Շինության տիպ</label>
                                            <input type="text" class="form-control" value="{{ isset($realtyData->buildingType()[$filter->buildingType]) ? $realtyData->buildingType()[$filter->buildingType]['label'] : ''}}" disabled>
                                        </div>
                                    @endif
                                    @if($filter->cosmetic)
                                        <div class="col-md-6">
                                            <label>Հառդարում</label>
                                            <input type="text" class="form-control" value="{{ isset($realtyData->decorations()[$filter->cosmetic]) ? $realtyData->decorations()[$filter->cosmetic]['label'] : ''}}" disabled>
                                        </div>
                                    @endif
                                    @if($filter->balcon)
                                        <div class="col-md-6">
                                            <label>Բալկոն</label>
                                            <input type="text" class="form-control" value="{{ isset($realtyData->balconies()[$filter->balcon]) ? $realtyData->balconies()[$filter->balcon]['label'] : '' }}" disabled>
                                        </div>
                                    @endif
                                    @if($filter->region)
                                        <div class="col-md-6">
                                            <label>Մարզ</label>
                                            <input type="text" class="form-control" value="{{ $filter->regionName }}" disabled>
                                        </div>
                                    @endif
                                    @if($filter->subRegion)
                                        <div class="col-md-6">
                                            <label>Համայնք</label>
                                            <input type="text" class="form-control" value="{{ $filter->subRegionName }}" disabled>
                                        </div>
                                    @endif
                                    @if($filter->street)
                                        <div class="col-md-6">
                                            <label>Փողոց</label>
                                            <input type="text" class="form-control" value="{{ $filter->street }}" disabled>
                                        </div>
                                    @endif
                                    @if($filter->buildingNumbe)
                                        <div class="col-md-6">
                                            <label>Շենք</label>
                                            <input type="text" class="form-control" value="{{ $filter->buildingNumber }}" disabled>
                                        </div>
                                    @endif
                                    @if($filter->apartamentNumber)
                                        <div class="col-md-6">
                                            <label>Բնակարան</label>
                                            <input type="text" class="form-control" value="{{ $filter->apartamentNumber }}" disabled>
                                        </div>
                                    @endif
                                </div>
                            @endisset
                        </div>
                    </div>
                    @isset($reality)
                        <h4 class="page-title breadcrumb">Գտնված գույքեր</h4>
                        <div class="container">
                            <div class="table-block row m-t-20 tabelList">
                                @include('partials.reality-table')
                            </div>
                        </div>
                    @endisset
                </div>
            @endif
            @include('adminLayouts.footer')
        </div>
    </div>
@stop