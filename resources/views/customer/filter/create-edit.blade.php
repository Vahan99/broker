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
         @include('partials.alert')
            <div class="container">
                <div class="row m-t-20">
                    <div class="col-sm-4">
                        <h4 class="page-title breadcrumb">Ավելացնել Ֆիլտրացիա</h4>
                    </div>
                </div>
                <div class="container">
                    <div class="col-md-4">
                        <div class="container-category-left m-t-40">
                            <ul class="nav nav-pills nav-stacked">
                                @foreach($realtyData->types() as $type)
                                    <li role="presentation" class="{{request('type') == $type['name'] ? 'active' : ''}}">
                                        <a href="?type={{$type['name']}}&&value={{$type['value']}}">{{$type['label']}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @isset(request()['type'])
                        <div class="col-md-8">
                            @include('partials.reality-form')
                        </div>
                    @endisset

                    <div class="col-md-12 card-box" style="margin-top: 5rem">
                        <div class="table-responsive">
                            @if(count($customerFilters) > 0)
                                <table class="table table-bordered m-0" style="font-size: 10px">
                                    <thead  id="subRegionTableHeade">
                                    <tr>
                                        <th title="#">#</th>
                                        <th title="Հարկերի քանակ">Հ․Ք</th>
                                        <th title="Հարկ">Հարկ</th>
                                        <th title="Մակերես">Մակերես</th>
                                        <th title="Սենյակ">Սենյակ</th>
                                        <th title="Արժեք ($)">Արժեք</th>
                                        <th title="Այգի/հողամաս/մետր">Ա․Հ․Մ</th>
                                        <th title="Ճակատային մաս/մետր">Ճ․Մ․Մ</th>
                                        <th title="Տեսակ">Տեսակ</th>
                                        <th title="Գույքի տեսակ">Գ․Տ</th>
                                        <th title="Նախագիծ">Նախագիծ</th>
                                        <th title="Շինության տիպ">Շ․Տ</th>
                                        <th title="Հառդարում">Հառդարում</th>
                                        <th title="Բալկոն">Բալկոն</th>
                                        <th title="Մարզ">Մարզ</th>
                                        <th title="Համայնք">Համայնք</th>
                                        <th title="Փողոց">Փողոց</th>
                                        <th title="Շենք">Շենք</th>
                                        <th title="Բնակարան">Բնակարան</th>
                                    </tr>
                                    </thead>
                                    <tbody id="subRegionTableBody">
                                    @foreach ($customerFilters as $key => $filter)
                                        <tr class="{{$key % 2 == 0 ? 'odd' : ''}}">
                                            <td>{{ $filter->id }}</td>
                                            <td>{{ $filter->buildingFloorsMin .'-'. $filter->buildingFloorsMax}}</td>
                                            <td>{{ $filter->floorMin .'-'. $filter->floorMax}}</td>
                                            <td>{{ $filter->areaMin .'-'. $filter->areaMax}}</td>
                                            <td>{{ $filter->roomsMin .'-'.$filter->roomsMax}}</td>
                                            <td>{{ $filter->priceMin .'-'.$filter->priceMax }}</td>
                                            <td>{{ $filter->gardenMin .'-' .$filter->gardenMax}}</td>
                                            <td>{{ $filter->facePartMin .'-'.$filter->facePartMax}}</td>
                                            <td>{{ isset($realtyData->realtyType()[$filter->type]) ? $realtyData->realtyType()[$filter->type]['label'] : ''}}</td>
                                            <td>{{ isset($realtyData->types()[$filter->realityType]) ? $realtyData->types()[$filter->realityType]['label'] : ''}}</td>
                                            <td>{{ isset($realtyData->projects()[$filter->proect]) ? $realtyData->projects()[$filter->proect]['label'] : ''}}</td>
                                            <td>{{ isset($realtyData->buildingType()[$filter->buildingType]) ? $realtyData->buildingType()[$filter->buildingType]['label'] : ''}}</td>
                                            <td>{{ isset($realtyData->decorations()[$filter->cosmetic]) ? $realtyData->decorations()[$filter->cosmetic]['label'] : ''}}</td>
                                            <td>{{ isset($realtyData->balconies()[$filter->balcon]) ? $realtyData->balconies()[$filter->balcon]['label'] : '' }}</td>
                                            <td>{{ $filter->region }}</td>
                                            <td>{{ $filter->subRegion }}</td>
                                            <td>{{ $filter->street }}</td>
                                            <td>{{ $filter->buildingNumber }}</td>
                                            <td>{{ $filter->apartamentNumber }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>Տվյալներ չեն գտնվել</p>
                            @endif
                        </div>
                    </div>
                </div>
                @include('adminLayouts.footer')
            </div>
        </div>
    </div>
@stop