<form action="{{route($action)}}" method="post" accept-charset="utf-8" class="realty-form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="realityType" value="{{request('value')}}">
    @if($rules->validate($action, 'user_id', request('type')))
        <input type="hidden" name="user_id" value="{{Auth::id()}}">
    @endif
    @isset($customers)
        {{--        <div class="form-group">--}}
        {{--            <div class="col-md-6">--}}
        {{--                <label for="code">Գույքի տեսակ</label>--}}
        {{--                <div class="dropdown">--}}
        {{--                    <button class="btn btn-default dropdown-toggle form-control" type="button" data-toggle="dropdown">{{$realtyData->types()[request('value')]['label']}}<span class="caret"></span></button>--}}
        {{--                    <ul class="dropdown-menu" style="width: 100%">--}}
        {{--                        @foreach($realtyData->types() as $type)--}}
        {{--                            <li><a href="?customer={{request('customer')}}&&type={{$type['name']}}&&value={{$type['value']}}">{{$type['label']}}</a></li>--}}
        {{--                        @endforeach--}}
        {{--                    </ul>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
            <div class="form-group">
                @if($rules->validate($action, 'customers', request('type')))
                    <div class="col-md-6">
                        <label for="customers">ՀաՃախորդներ</label>
                        <select name="customer_id" id="customers" class="form-control">
                            @foreach($customers as $customer)
                                <option value="{{$customer->id}}">{{$customer->name}}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
            </div>
        @endisset
        <div class="form-group">
            @if($rules->validate($action, 'phone', request('type')))
                <div class="col-md-6">
                    <label for="phone">Հեռ</label>
                    <input type="text" name="phone" class="form-control" id="phone">
                </div>
            @endif
            @if($rules->validate($action, 'customerName', request('type')) )
                <div class="col-md-6">
                    <label for="customerName">Հաճ․ անուն</label>
                    <input type="text" name="customerName" class="form-control" id="customerName">
                </div>
            @endif
        </div>
        <div class="form-group">
            @if($rules->validate($action, 'code', request('type')))
                <div class="col-md-6">
                    <label for="code">Կոդ</label>
                    <input type="text" name="code" class="form-control">
                </div>
            @endif

            @if($rules->validate($action, 'street', request('type')))
                <div class="col-md-6">
                    <div class="ms-container" id="ms-my_multi_select3">
                        <div class="ms-selectable">
                            <label for="street">Փողոց</label>
                            <input type="text" id="street" name="street" class="form-control" autocomplete="off" placeholder="Փողոց">
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="form-group">
            @if($rules->validate($action, 'type', request('type')))
                <div class="col-md-6">
                    <label for="type">Տեսակ</label>
                    <select name="type" id="type" class="form-control">
                        @foreach($realtyData->realtyType() as $type)
                            <option value="{{$type['value']}}">{{$type['label']}}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            @if($rules->validate($action, 'region', request('type')))
                <div class="col-md-6">
                    <label for="realityRegion">Մարզ</label>
                    <select name="region" id="addRealityRegion" class="form-control">
                        @foreach($regions as $region)
                            <option value="{!! $region->id !!}">{!! $region->name !!}</option>
                        @endforeach
                    </select>
                </div>
            @endif
        </div>
        <div class="form-group">
            @if($rules->validate($action, 'subRegion', request('type')))
                <div class="col-md-6">
                    <label for="realitySubRegion">Համայնք</label>
                    <select name="subRegion" id="addRealitySubRegion" class="form-control">
                        @foreach($subRegions as $subRegion)
                            <option value="{!! $subRegion->id !!}">{!! $subRegion->name !!}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            @if($rules->validate($action, 'buildingNumber', request('type')))
                <div class="col-md-6">
                    <label for="buildingNumber">Շենք</label>
                    <input type="text" class="form-control" name="buildingNumber">
                </div>
            @endif
        </div>
        <div class="form-group">
            @if($rules->validate($action, 'apartamentNumber', request('type')))
                <div class="col-md-6">
                    <label for="apartamentNumber">Բնակարան</label>
                    <input type="text" class="form-control" name="apartamentNumber">
                </div>
            @endif
            @if($rules->validate($action, 'proect', request('type')))
                <div class="col-md-6">
                    <label for="realityProect">Նախագիծ</label>
                    <select name="proect" id="realityProect" class="form-control">
                        @foreach($realtyData->projects() as $project)
                            <option value="{{$project['value']}}">{{$project['label']}}</option>
                        @endforeach
                    </select>
                </div>
            @endif
        </div>
        <div class="form-group">
            @if($rules->validate($action, 'buildingType', request('type')))
                <div class="col-md-6">
                    <label for="realityBuildingType">Շինության տիպ</label>
                    <select name="buildingType" id="realityBuildingType" class="form-control">
                        @foreach($realtyData->buildingType() as $type)
                            <option value="{{$type['value']}}">{{$type['label']}}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            @if($rules->validate($action, 'cosmetic', request('type')))
                <div class="col-md-6">
                    <label for="realityCosmetic">Հարդարում</label>
                    <select name="cosmetic" id="realityCosmetic" class="form-control">
                        @foreach($realtyData->decorations() as $decoration)
                            <option value="{{$decoration['value']}}">{{$decoration['label']}}</option>
                        @endforeach
                    </select>
                </div>
            @endif
        </div>
        <div class="form-group">
            @if($rules->validate($action, 'buildingFloors', request('type')))
                @isset($customers)
                    <div class="col-md-6">
                        <label>Հարկերի քանակ</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input min="0" type="number" name="buildingFloorsMin" class="form-control" placeholder="մին">
                            </div>
                            <div class="col-md-6">
                                <input  min="0" type="number" name="buildingFloorsMax" class="form-control" placeholder="մաքս">
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-6">
                        <label for="buildingFloorsMin">Հարկերի քանակ</label>
                        <input type="number" min="0" name="buildingFloors" class="form-control" id="buildingFloorsMin">
                    </div>
                @endisset
            @endif
            @if($rules->validate($action, 'balcon', request('type')))
                <div class="col-md-6">
                    <label for="realityBalcon">Պատշգամբ</label>
                    <select name="balcon" id="realityBalcon" class="form-control">
                        @foreach($realtyData->balconies() as $balcony)
                            <option value="{{$balcony['value']}}">{{$balcony['label']}}</option>
                        @endforeach
                    </select>
                </div>
            @endif
        </div>
        <div class="form-group">
            @if($rules->validate($action, 'area', request('type')))
                @isset($customers)
                    <div class="col-md-6">
                        <label>Մակերես</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input min="0" type="number" name="areaMin" class="form-control" placeholder="մին">
                            </div>
                            <div class="col-md-6">
                                <input  min="0" type="number" name="areaMax" class="form-control" placeholder="մաքս">
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-6">
                        <label for="areaMin">Մակերես</label>
                        <input type="number" min="0" name="area" class="form-control" id="areaMin">
                    </div>
                @endisset
            @endif
            @if($rules->validate($action, 'floors', request('type')))
                @isset($customers)
                    <div class="col-md-6">
                        <label>Հարկ</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input min="0" type="number" name="floorMin" class="form-control" placeholder="մին">
                            </div>
                            <div class="col-md-6">
                                <input  min="0" type="number" name="floorMax" class="form-control" placeholder="մաքս">
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-6">
                        <label for="floorMin">Հարկ</label>
                        <input type="number" min="0" name="floors" class="form-control" id="floorMin">
                    </div>
                @endisset
            @endif
        </div>
        <div class="form-group">
            @if($rules->validate($action, 'rooms', request('type')))
                @isset($customers)
                    <div class="col-md-6">
                        <label>Սենյակ</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input min="0" type="number" name="roomsMin" class="form-control" placeholder="մին">
                            </div>
                            <div class="col-md-6">
                                <input  min="0" type="number" name="roomsMax" class="form-control" placeholder="մաքս">
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-6">
                        <label for="rooms">Սենյակ</label>
                        <input type="number" min="0" name="rooms" class="form-control" id="priceMin">
                    </div>
                @endisset
            @endif
            @if($rules->validate($action, 'price', request('type')))
                @isset($customers)
                    <div class="col-md-6">
                        <label>Արժեք ($)</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input min="0" type="number" name="priceMin" class="form-control" placeholder="մին">
                            </div>
                            <div class="col-md-6">
                                <input  min="0" type="number" name="priceMax" class="form-control" placeholder="մաքս">
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-6">
                        <label for="priceMin">Արժեք ($)</label>
                        <input type="number" min="0" name="price" class="form-control" id="priceMin">
                    </div>
                @endisset
            @endif
        </div>
        <div class="form-group">
            @if($rules->validate($action, 'gardenArea', request('type')))
                @isset($customers)
                    <div class="col-md-6">
                        <label>Այգի/հողամաս/մետր</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input min="0" type="number" name="gardenMin" class="form-control" placeholder="մին">
                            </div>
                            <div class="col-md-6">
                                <input  min="0" type="number" name="gardenMax" class="form-control" placeholder="մաքս">
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-6">
                        <label for="gardenMin">Այգի/հողամաս/մետր</label>
                        <input type="number" min="0" name="gardenArea" class="form-control" id="gardenMin">
                    </div>
                @endisset
            @endif
            @if($rules->validate($action, 'faceArea', request('type')))
                @isset($customers)
                    <div class="col-md-6">
                        <label>Ճակատային մաս/մետր</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input min="0" type="number" name="facePartMin" class="form-control" placeholder="մին">
                            </div>
                            <div class="col-md-6">
                                <input  min="0" type="number" name="facePartMax" class="form-control" placeholder="մաքս">
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="col-md-6">
                        <label for="facePartMin">Ճակատային մաս/մետր</label>
                        <input type="number" min="0" name="faceArea" class="form-control" id="facePartMin">
                    </div>
                @endisset
            @endif
        </div>
        <div class="form-group">
            @if($rules->validate($action, 'link', request('type')))
                <div class="col-md-12">
                    <label for="link">Հղում</label>
                    <input type="text" name="link" id="link" class="form-control">
                </div>
            @endif
            @if($rules->validate($action, 'info', request('type')))
                <div class="col-md-12">
                    <label for="info">Հավելյալ Տեղեկատվություն</label>
                    <textarea name="info" id="info" rows="10" class="form-control"></textarea>
                </div>
            @endif
        </div>
        <div class="col-md-6" style="padding-top: 23px">
            <input type="submit" class="btn btn-primary form-control" id="addOrEditUserButton" value="Ավելացնել">
        </div>
</form>