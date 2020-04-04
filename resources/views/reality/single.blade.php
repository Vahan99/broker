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
                    <div class="col-sm-3">
                        <h4 class="page-title breadcrumb">Գույք</h4>
                    </div>
                </div>
                <div class="card-box" id="editUserArea" style="display: block">
                    <div class="row">
                        <div class="col-sm-6">
                            @if($reality->type)
                                <p><b>Տեսակ : </b><span>{{$realtyData->realtyType()[$reality->type]['label']}}</span></p>
                            @endif
                            @if($reality->code)
                                <p><b>Կոդ : </b>{!! $reality->code !!}</p>
                            @endif
                            @if($reality->realityType)
                                <p><b>Գույքի տեսակ : </b><span>{{$realtyData->types()[$reality->realityType]['label']}}</span></p>
                            @endif
                            @if($reality->region)
                                <p><b>Մարզ : </b>@foreach($regions as $region) @if($region->id == $reality->region)<span>{!! $region->name !!}</span>@endif @endforeach</p>
                            @endif
                            @if($reality->subRegion)
                                <p><b>Համայնք : </b>@foreach($subRegions as $subRegion) @if($subRegion->id == $reality->subRegion)<span>{!! $subRegion->name !!}</span>@endif @endforeach</p>
                            @endif
                            @if($reality->street )
                                <p><b>Փողոց : </b>{!! $reality->street !!}</p>
                            @endif
                            @if($reality->buildingNumber)
                                <p><b>Շենք : </b>{!! $reality->buildingNumber !!}</p>
                            @endif
                            @if($reality->apartamentNumber)
                                <p><b>Բնակարան : </b>{!! $reality->apartamentNumber !!}</p>
                            @endif
                            @if($reality->proect)
                                <p><b>Նախագիծ : </b> <span>{{$realtyData->projects()[$reality->proect]['label']}}</span></p>
                            @endif
                            @if($reality->buildingTyp)
                                <p><b>Շինության տիպ : </b> <span>{{$realtyData->buildingType()[$reality->buildingType]['label']}}</span></p>
                            @endif
                            @if($reality->cosmetic)
                                <p><b>Հարդարում : </b><span>{{$realtyData->decorations()[$reality->cosmetic]['label']}}</span></p>
                            @endif
                            @if($reality->balcon)
                                <p><b>Պատշգամբ : </b><span>{{$realtyData->balconies()[$reality->balcon]['label']}}Բոլորը</span></p>
                            @endif
                        </div>
                        <div class="col-sm-6">
                            @if($reality->floors)
                                <p><b>Հարկ : </b>{!! $reality->floors !!}</p>
                            @endif
                            @if($reality->buildingFloors)
                                <p><b>Շենքի Հարկերը : </b>{!! $reality->buildingFloors !!}</p>
                            @endif
                            @if($reality->firstFloor)
                                <p><b>Առաջին հարկ : </b>{!! $reality->firstFloor == 1 ? '&#10004;' : '-' !!}</p>
                            @endif
                            @if($reality->lastFloor)
                                <p><b>Վերջին հարկ : </b>{!! $reality->lastFloor == 1 ? '&#10004;' : '-' !!}</p>
                            @endif
                            @if($reality->area)
                                <p><b>Մակերես : </b>{!! $reality->area !!}</p>
                            @endif
                            @if($reality->rooms)
                                <p><b>Սենյակ : </b>{!! $reality->rooms !!}</p>
                            @endif
                            @if($reality->gardenArea)
                                <p><b>Այգի/հողամաս/մետր : </b>{!! $reality->gardenArea !!}</p>
                            @endif
                            @if($reality->faceArea)
                                <p><b>Ճակատային մաս/մետր : </b>{!! $reality->faceArea !!}</p>
                            @endif
                            @if($reality->price)
                                <p><b>Արժեք : </b>{!! $reality->price !!}</p>
                            @endif
                            @if($reality->phone)
                                <p><b>Հաճ․ Հեռ : </b>{!! $reality->phone !!}</p>
                            @endif
                            @if($reality->customerName)
                                <p><b>Հաճ․ անուն : </b>{!! $reality->customerName !!}</p>
                            @endif
                            @if($reality->info)
                                <p><b>Հավելյալ Տեղեկատվություն : </b>{!! $reality->info !!}</p>
                            @endif
                            @if($reality->created_at)
                                <p><b>Ստեղծվել է : </b>{!! $reality->created_at !!}</p>
                            @endif
                            @if($reality->updated_at)
                                <p><b>Թարմացվել է : </b>{!! $reality->updated_at !!}</p>
                            @endif
                        </div>
                    </div>
                </div>
                @include('adminLayouts.footer')
            </div>
        </div>
@stop