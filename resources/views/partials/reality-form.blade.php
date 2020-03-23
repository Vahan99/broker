<form action="{{route('realty.add')}}" method="post" accept-charset="utf-8">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="realityType" value="{{request('value')}}">
    <input type="hidden" name="user_id" value="{{Auth::id()}}">
    <div class="form-group">
        <div class="col-md-6">
            <label for="code">Կոդ</label>
            <input type="text" name="code" class="form-control">
        </div>
        @if($rules->validate('street', request('type')))
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
        @if($rules->validate('type', request('type')))
            <div class="col-md-6">
                <label for="type">Տեսակ</label>
                <select name="type" id="type" class="form-control">
                    @foreach($realtyData->realtyType() as $type)
                        <option value="{{$type['value']}}">{{$type['label']}}</option>
                    @endforeach
                </select>
            </div>
        @endif
        @if($rules->validate('region', request('type')))
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
        @if($rules->validate('subRegion', request('type')))
            <div class="col-md-6">
                <label for="realitySubRegion">Համայնք</label>
                <select name="subRegion" id="addRealitySubRegion" class="form-control">
                    @foreach($subRegions as $subRegion)
                        <option value="{!! $subRegion->id !!}">{!! $subRegion->name !!}</option>
                    @endforeach
                </select>
            </div>
        @endif
        @if($rules->validate('buildingNumber', request('type')))
            <div class="col-md-6">
                <label for="buildingNumber">Շենք</label>
                <input type="text" class="form-control" name="buildingNumber">
            </div>
        @endif
    </div>
    <div class="form-group">
        @if($rules->validate('apartamentNumber', request('type')))
        <div class="col-md-6">
            <label for="apartamentNumber">Բնակարան</label>
            <input type="text" class="form-control" name="apartamentNumber">
        </div>
        @endif
        @if($rules->validate('proect', request('type')))
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
        @if($rules->validate('buildingType', request('type')))
        <div class="col-md-6">
            <label for="realityBuildingType">Շինության տիպ</label>
            <select name="buildingType" id="realityBuildingType" class="form-control">
               @foreach($realtyData->buildingType() as $type)
                    <option value="{{$type['value']}}">{{$type['label']}}</option>
               @endforeach
            </select>
        </div>
        @endif
        @if($rules->validate('cosmetic', request('type')))
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
        @if($rules->validate('buildingFloors', request('type')))
        <div class="col-md-6">
            <label for="buildingFloorsMin">Հարկերի քանակ</label>
            <input type="number" min="0" name="buildingFloors" class="form-control"
                   id="buildingFloorsMin">
        </div>
        @endif
        @if($rules->validate('balcon', request('type')))
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
        @if($rules->validate('area', request('type')))
        <div class="col-md-6">
            <label for="areaMin">Մակերես</label>
            <input type="number" min="0" name="area" class="form-control" id="areaMin">
        </div>
        @endif
        @if($rules->validate('floors', request('type')))
        <div class="col-md-6">
            <label for="floorMin">Հարկ</label>
            <input type="number" min="0" name="floors" class="form-control" id="floorMin">
        </div>
        @endif
    </div>
    <div class="form-group">
        @if($rules->validate('rooms', request('type')))
        <div class="col-md-6">
            <label for="rooms">Սենյակ</label>
            <input type="number" min="0" name="rooms" class="form-control"
                   id="priceMin">
        </div>
        @endif
        @if($rules->validate('price', request('type')))
        <div class="col-md-6">
            <label for="priceMin">Արժեք ($)</label>
            <input type="number" min="0" name="price" class="form-control" id="priceMin">
        </div>
        @endif
    </div>
    <div class="form-group">
        @if($rules->validate('gardenArea', request('type')))
        <div class="col-md-6">
            <label for="gardenMin">Այգի/հողամաս/մետր</label>
            <input type="number" min="0" name="gardenArea" class="form-control"
                   id="gardenMin">
        </div>
        @endif
        @if($rules->validate('faceArea', request('type')))
        <div class="col-md-6">
            <label for="facePartMin">Ճակատային մաս/մետր</label>
            <input type="number" min="0" name="faceArea" class="form-control"
                   id="facePartMin">
        </div>
        @endif
    </div>
    <div class="form-group">
        @if($rules->validate('phone', request('type')))
        <div class="col-md-6">
            <label for="phone">Հեռ</label>
            <input type="text" name="phone" class="form-control" id="phone">
        </div>
        @endif
        @if($rules->validate('customerName', request('type')))
        <div class="col-md-6">
            <label for="customerName">Հաճ․ անուն</label>
            <input type="text" name="customerName" class="form-control"
                   id="customerName">
        </div>
        @endif
    </div>
    <div class="form-group">
    <div class="col-md-12">
        <label for="link">Հղում</label>
        <input type="text" name="link" id="link" class="form-control">
    </div>
    <div class="col-md-12">
        <label for="info">Հավելյալ Տեղեկատվություն</label>
        <textarea name="info" id="info" rows="10" class="form-control"></textarea>
    </div>
</div>
    <div class="col-md-6">
        <button type="submit" class="btn btn-primary m-t-10" id="addOrEditUserButton">Ավելացնել</button>
    </div>
</form>