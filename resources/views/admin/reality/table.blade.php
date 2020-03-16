<div class="col-sm-12 card-box">
    <div class="table-responsive">
        @if(count($reality) > 0)
            <table class="table table-bordered m-0">
                <thead  id="subRegionTableHeade">
                <tr>
                    <th>#</th>
                    <th>Կոդ</th>
                    <th>Համայնք</th>
                    <th>Փողոց</th>
                    <th>Սեն.</th>
                    <th>Շենք</th>
                    <th>Բնակ.</th>
                    @if($admin == 2 || $admin == 0)
                        <th>Տիպ</th>
                    @endif
                    <th>Հարկեր</th>
                    <th>Հարկ</th>
                    <th>Մակ.</th>
                    <th>Արժեք ($)</th>
                    <th>Հաճ․ Հեռ</th>
                    <th>Հաճ․ անուն</th>
                    <th>Հղում</th>
                    <th>Դիտել</th>
                @if($admin == 1 || $admin == 0 || $admin == 3)
                        <th>Գործակալ</th>
                        <th>Ստատուս</th>
                    @endif
                    <th class="last">
                        <i class="fa fa-print printNumbers" aria-hidden="true">0</i>
                    </th>
                </tr>
                </thead>
                <tbody id="subRegionTableBody">
                @foreach ($reality as $key => $r)
                    <tr class="{{$key % 2 == 0 ? 'odd' : ''}}">
                        <td>{!! $key !!}</td>
                        <td>{{$r->code}}</td>
                        <td>
                            @foreach($subRegions as $subRegion)
                                @if($subRegion->id == $r->subRegion)
                                    {!! $subRegion->name !!}
                                @endif
                            @endforeach
                        </td>
                        <td>{!! $r->street !!}</td>
                        <td>{!! $r->rooms !!}</td>
                        <td>{!! $r->buildingNumber ? $r->buildingNumber : 0 !!}</td>
                        <td>{!! $r->apartamentNumber ? $r->apartamentNumber : 0 !!}</td>
                        @if($admin == 2 || $admin == 0)
                            <td>
                                @if($r->buildingType == -1)
                                    <span>-</span>
                                @elseif($r->buildingType == 0)
                                    <span>Պանելային</span>
                                @elseif($r->buildingType == 1)
                                    <span>Քարե</span>
                                @elseif($r->buildingType == 2)
                                    <span>Մոնոլիտ</span>
                                @elseif($r->buildingType == 3)
                                    <span>Աղյուսե</span>
                                @elseif($r->buildingType == 4)
                                    <span>Փայտե</span>
                                @elseif($r->buildingType == 5)
                                    <span>Կասետային</span>
                                @elseif($r->buildingType == 6)
                                    <span>Այլ</span>
                                @endif
                            </td>
                        @endif
                        <td>{!! $r->buildingFloors !!}</td>
                        <td>{!! $r->floors !!}</td>
                        <td>{!! $r->area !!}</td>
                        <td>{!! $r->price !!}</td>
                        <td>{!! $r->phone !!}</td>
                        <td>{!! $r->customerName !!}</td>
                        <td>{!! $r->link ? '<a href="'.$r->link.'" target="_blank">Հղում</a>' : '-' !!}</td>
                        <td>
                            <a href="/admin/reality/single-reality/{!! $r->id !!}"
                               class="btn btn-primary btn-rounded waves-effect waves-light">
                                <i class="glyphicon glyphicon-eye-open"></i>
                            </a>
                        </td>
                        @if($admin == 1 || $admin == 0 || $admin == 3)
                            @foreach ($users as $user)
                                @if($user->id == $r->user_id)
                                    <td>{!! $user->name !!}</td>
                                @endif
                            @endforeach
                            <td>
                                <input type="hidden" name="realityId" value="{!! $r->id !!}">
                                <select name="realityStatus" class="form-control changeRealityStatus">
                                    <option value="1" {!! $r->status == '1' ? 'selected' : '' !!}>Ակտիվ</option>
                                    <option value="2" {!! $r->status == '2' ? 'selected' : '' !!}>Դադարեցված</option>
                                    <option value="3" {!! $r->status == '3' ? 'selected' : '' !!}>Արխիվ</option>
                                </select>
                            </td>
                        @endif
                        <td class="last">
                            <input type="hidden" name="realityId" value="{!! $r->id !!}">
                            <input type="checkbox" class="checkForPrint" id="checkForPrint_{!! $r->id !!}">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>Տվյալներ չեն գտնվել</p>
        @endif
    </div>
    @if(count($reality) > 0)
        <div class="col-sm-12">
                {{ $reality->links() }}
        </div>
    @endif
</div>
