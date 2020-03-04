<div id="wrapper">
    <div class="topbar">
        <div class="topbar-left">
            <div class="text-center">
                <a href="index.html" class="logo">
                    <i class="icon-c-logo">
                        <img style="border: none;padding: 15px 0px;" src="{!! URL::asset('images/kamar-logo.png') !!}" class="img-responsive" alt="">
                    </i>
                    <span>KAMAR REALTY</span>
                </a>
            </div>
        </div>

        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                <div>
                    <div class="pull-left">
                        <button class="button-menu-mobile open-left">
                            <i class="ion-navicon"></i>
                        </button>
                        <span class="clearfix"></span>
                    </div>

                    <ul class="nav navbar-nav navbar-right pull-right">
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="{{ URL::asset('images/avatar-1.jpg') }}" alt="user-img" class="img-circle"> </a>
                            <ul class="dropdown-menu">
                                <li><a href="/admin/logout" id="logout"><i class="ti-power-off m-r-5"></i> Դուրս գալ համակարգից</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="pull-right p-5">
                        <p class="no-margin color-white"><small>{!! Auth::user()->name !!}</small></p>
                        <p class="no-margin color-white">
                        @if(Auth::user()->admin == 1)
                            <b>Սուպեր Ադմին</b>
                        @elseif(Auth::user()->admin == 3)
                            <b>Սուպեր ադմինի օգնական</b>
                        @elseif(Auth::user()->admin == 0)
                            <b>Ադմին</b>
                        @else
                            <b>Գործակալ</b>
                        @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
