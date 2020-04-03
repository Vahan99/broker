@extends('adminLayouts.index')
@section('title', 'Admin Dashboard')
@section('content')
    <div class="row">
        <!-- Start content -->
        <input type="hidden" name="_token" value="{!! csrf_token() !!}" id="token">
        <div class="row content" style="padding: 0 8rem">
            <div class="row m-t-20">
                <div class="col-sm-4">
                    <h4 class="page-title breadcrumb">Տպագրել</h4>
                </div>
            </div>
            <div>
                <p class="alert alert-success" id="successMessageHallBookingDelete" style="display:none"></p>
                <div class="row m-t-20 tabelListPrint">
                    <div class="col-sm-12 card-box">
                        <div class="table-responsive">
                            @if(count($reality) > 0)
                                <table class="table table-striped m-0">
                                    <thead  id="subRegionTableHeade">
                                    <tr>
                                        <th>Կոդ</th>
                                        <th>Սենյակներ</th>
                                        <th>Համայնք</th>
                                        <th>Փողոց</th>
                                        <th>Հարկեր</th>
                                        <th>Հարկ</th>
                                        <th>Մակերես</th>
                                        <th>Արժեք</th>
                                    </tr>
                                    </thead>
                                    <tbody id="subRegionTableBody">
                                    @foreach ($reality as $r)
                                        <tr class="{!! $r->status == '2' ? 'pink' : '' !!}">
                                            <td>{{$r->code}}</td>
                                            <td>{!! $r->rooms !!}</td>
                                            <td>
                                                @foreach($subRegions as $subRegion)
                                                    @if($subRegion->id == $r->subRegion)
                                                        {!! $subRegion->name !!}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{!! $r->street !!}</td>
                                            <td>{!! $r->buildingFloors !!}</td>
                                            <td>{!! $r->floors !!}</td>
                                            <td>{!! $r->area !!}</td>
                                            <td>{!! $r->price !!}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>Տվյալներ չեն գտնվել</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12">
                        @if(count($reality) > 0)
                            {{ $reality->links() }}
                        @endif
                    </div>
                    <div class="c0l-sm-8 text-left">
                        <a  class="btnprn btn btn-primary btn-rounded waves-effect waves-light">Տպել</a>
                    </div>
                </div>
            </div>
            @include('adminLayouts.footer')
        </div>
@stop