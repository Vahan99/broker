<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="{{ URL::asset('assets/sm-logo.png') }}">

    <title >@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/iconic/css/material-design-iconic-font.min.css') }}">

    <link href="{{ URL::asset('css/bootstrap1.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('css/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('css/responsive.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/util1.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/main1.css') }}">
</head>

<body class="fixed-left">
<div class="container">
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form class="login100-form validate-form" action="{{route('entry.reset.password')}}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <span class="login100-form-title" style="margin-bottom: 3rem">
                        <img src="{!! URL::asset('assets/logo.png') !!}" alt="" class="img-responsive" style="margin: 0 auto">
                    </span>
                    <p class="p-b-21" style="text-align: center">
                        ԱՆՇԱՐԺ ԳՈՒՅՔԻ ՏՎՅԱԼՆԵՐԻ ԿԱՌԱՎԱՐՄԱՆ ՀԱՄԱԿԱՐԳ
                    </p>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="password" name="password" placeholder="Նոր Գաղտնաբառ">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>
                    <div style="margin-top: 30px" class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <button class="login100-form-btn" type="submit">
                                Մուտք
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>