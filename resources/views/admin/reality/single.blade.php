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
                    <div class="col-sm-9">
                        @if($admin != 2)
                        @if($admin != 1)
                        <a href="/admin/reality/edit-reality/{!! $reality->id !!}"
                           class="btn btn-primary btn-rounded waves-effect waves-light"><i
                                    class="glyphicon glyphicon-pencil"></i></a>
                        <input type="hidden" name="realityId" value="{!! $reality->id !!}">
                        <button class="btn btn-danger btn-rounded waves-effect waves-light realityDeleteModalOpen"
                                data-toggle="modal"
                                data-target="#myModal12">
                            <i class="glyphicon glyphicon-trash"></i>
                        </button>
                        @endif
                        @endif
                    </div>
                </div>
                <div class="card-box" id="editUserArea" style="display: block">
                    <div class="row">
                        {{--<p><b>Գործակալ ։ </b>{!! $users->name !!}</p>--}}
                        <div class="col-sm-6">
                            <p><b>Տեսակ : </b>
                                @if($reality->type == '0')
                                    <span>Վարձակալություն</span>
                                @elseif($reality->type == '1')
                                    <span>Վաճառք</span>
                                @elseif($reality->type == '2')
                                    <span>Գնորդ</span>
                                @elseif($reality->type == '3')
                                    <span>Վարձակալ</span>
                                @endif
                            </p>
                            <p><b>Կոդ : </b>{!! $reality->code !!}</p>
                            
                            <p><b>Գույքի տեսակ : </b>
                                @if($reality->realityType == '-1')
                                    <span>Բոլորը</span>
                                @elseif($reality->realityType == '0')
                                    <span>Բնակարան</span>
                                @elseif($reality->realityType == '1')
                                    <span>Տուն</span>
                                @elseif($reality->realityType == '2')
                                    <span>Առանձնատուն</span>
                                @elseif($reality->realityType == '3')
                                    <span>Ամառանոց</span>
                                @elseif($reality->realityType == '4')
                                    <span>Գրասենյակ</span>
                                @elseif($reality->realityType == '5')
                                    <span>Ռեստորան</span>
                                @elseif($reality->realityType == '6')
                                    <span>Խանութ</span>
                                @elseif($reality->realityType == '7')
                                    <span>Հողատարածք</span>
                                @elseif($reality->realityType == '8')
                                    <span>Վարսավիրանոց</span>
                                @elseif($reality->realityType == '9')
                                    <span>Ավտոտեխսպասարկում</span>
                                @elseif($reality->realityType == '10')
                                    <span>Այլ</span>
                                @endif
                            </p>
                            <p><b>Մարզ : </b>
                                @foreach($regions as $region)
                                    @if($region->id == $reality->region)
                                        <span>{!! $region->name !!}</span>
                                    @endif
                                @endforeach
                            </p>
                            <p><b>Համայնք : </b>
                                @foreach($subRegions as $subRegion)
                                    @if($subRegion->id == $reality->subRegion)
                                        <span>{!! $subRegion->name !!}</span>
                                    @endif
                                @endforeach
                            </p>
                            <!--<p><b> : </b>-->
                            <!--    @foreach($subRegions as $subRegion)-->
                            <!--        @if($reality->subRegion != -1 && $subRegion->id == $reality->subRegion)-->
                            <!--            <span>{!! $subRegion->name !!}․</span>-->
                            <!--        @endif-->
                            <!--    @endforeach-->
                            <!--</p>-->
                            <p><b>Փողոց : </b>{!! $reality->street !!}</p>
                            <p><b>Շենք : </b>{!! $reality->buildingNumber !!}</p>
                            <p><b>Բնակարան : </b>{!! $reality->apartamentNumber !!}</p>
                            <p><b>Նախագիծ : </b>
                                @if($reality->realityType == '-1')
                                    <span>Բոլորը</span>
                                @elseif($reality->proect == '0')
                                    <span>Ստալին փ/ծ</span>
                                @elseif($reality->proect == '1')
                                    <span>Ստալին բ/ծ</span>
                                @elseif($reality->proect == '2')
                                    <span>Խռուշյչովյան</span>
                                @elseif($reality->proect == '3')
                                    <span>հետ Խռուշչովյան</span>
                                @elseif($reality->proect == '4')
                                    <span>Երևանյան</span>
                                @elseif($reality->proect == '5')
                                    <span>Չեխական</span>
                                @elseif($reality->proect == '6')
                                    <span>Բադալյան</span>
                                @elseif($reality->proect == '7')
                                    <span>Մոսկովյան</span>
                                @elseif($reality->proect == '8')
                                    <span>Վրացական</span>
                                @elseif($reality->proect == '9')
                                    <span>Հատուկ</span>
                                @elseif($reality->proect == '10')
                                    <span>Նորակառույց</span>
                                @elseif($reality->proect == '11')
                                    <span>Հանրակացարան</span>
                                @elseif($reality->proect == '12')
                                    <span>Այլ</span>
                                @endif
                            </p>
                            <p><b>Շենքի տիպ : </b>
                                @if($reality->buildingType == '-1')
                                    <span>Բոլորը</span>
                                @elseif($reality->buildingType == '0')
                                    <span>Պանելային</span>
                                @elseif($reality->buildingType == '1')
                                    <span>Քարե</span>
                                @elseif($reality->buildingType == '2')
                                    <span>Մոնոլիտ</span>
                                @elseif($reality->buildingType == '3')
                                    <span>Աղյուսե</span>
                                @elseif($reality->buildingType == '4')
                                    <span>Փայտե</span>
                                @elseif($reality->buildingType == '5')
                                    <span>Կասետային</span>
                                @elseif($reality->buildingType == '6')
                                    <span>Այլ</span>
                                @endif
                            </p>
                            <p><b>Հարդարում : </b>
                                @if($reality->cosmetic == '-1')
                                    <span>Բոլորը</span>
                                @elseif($reality->cosmetic == '0')
                                    <span>Պետական</span>
                                @elseif($reality->cosmetic == '1')
                                    <span>Զրոյական</span>
                                @elseif($reality->cosmetic == '2')
                                    <span>Վերանորոգած</span>
                                @elseif($reality->cosmetic == '3')
                                    <span>Կապ․ վեր․</span>
                                @elseif($reality->cosmetic == '4')
                                    <span>Մասամբ վեր․</span>
                                @elseif($reality->cosmetic == '5')
                                    <span>Չբնակեցված վեր․</span>
                                @elseif($reality->cosmetic == '6')
                                    <span>Հին կապիտալ</span>
                                @endif
                            </p>
                            <p><b>Պատշգամբ : </b>
                                @if($reality->balcon == '-1')
                                    <span>Բոլորը</span>
                                @elseif($reality->balcon == '0')
                                    <span>Բաց</span>
                                @elseif($reality->balcon == '1')
                                    <span>Փակ</span>
                                @elseif($reality->balcon == '2')
                                    <span>Բաց և փակ</span>
                                @elseif($reality->balcon == '3')
                                    <span>Շքապատշգամբ․</span>
                                @elseif($reality->balcon == '4')
                                    <span>Չունի</span>
                                @endif
                            </p>
                            
                        </div>
                        <div class="col-sm-6">
                            <p><b>Հարկ : </b>{!! $reality->floors !!}</p>
                            <p><b>Շենքի Հարկերը : </b>{!! $reality->buildingFloors !!}</p>
                            <p><b>Առաջին հարկ : </b>{!! $reality->firstFloor == 1 ? '&#10004;' : '-' !!}</p>
                            <p><b>Վերջին հարկ : </b>{!! $reality->lastFloor == 1 ? '&#10004;' : '-' !!}</p>
                            <p><b>Մակերես : </b>{!! $reality->area !!}</p>
                            <p><b>Սենյակ : </b>{!! $reality->rooms !!}</p>
                            <p><b>Այգի/հողամաս/մետր : </b>{!! $reality->gardenArea !!}</p>
                            <p><b>Ճակատային մաս/մետր : </b>{!! $reality->faceArea !!}</p>
                            <p><b>Արժեք : </b>{!! $reality->price !!}</p>
                            <p><b>Հաճ․ Հեռ : </b>{!! $reality->phone !!}</p>
                            <p><b>Հաճ․ անուն : </b>{!! $reality->customerName !!}</p>
                            <p><b>Հավելյալ Տեղեկատվություն : </b>{!! $reality->info !!}</p>
                            <p><b>Ստեղծվել է : </b>{!! $reality->created_at !!}</p>
                            <p><b>Թարմացվել է : </b>{!! $reality->updated_at !!}</p>
                        </div>

                    </div>
                </div>

                <div class="modal fade" id="myModal12" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel12">Դուք համոզված եք? </h4>
                            </div>
                            <div class="modal-body" id='regionBookDeleteModalBody'>
                                <div class="form-group">
                                    <label for="koding223">Մուտքագրել կոդը</label>
                                    <input type="text" id="koding223" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Փակել</button>
                                <button type="button" class="btn btn-danger" id="dleteRealityButton" disabled="disabled">Ջնջել</button>
                            </div>
                        </div>
                    </div>
                </div>

                @include('adminLayouts.footer')
            </div>
        </div>
@stop