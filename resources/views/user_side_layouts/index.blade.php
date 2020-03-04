<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ URL::asset('user_side/img/logo.png') }}">

    <!-- Core Stylesheet -->
    <link href="{{ URL::asset('user_side/css/style.css') }}" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="{{ URL::asset('user_side/css/responsive/responsive.css') }}" rel="stylesheet">

</head>

<body>
	@yield('content')


    <!-- Jquery-2.2.4 js -->
    <script src="{{ URL::asset('user_side/js/jquery/jquery-2.2.4.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ URL::asset('user_side/js/bootstrap/popper.min.js') }}"></script>
    <!-- Bootstrap-4 js -->
    <script src="{{ URL::asset('user_side/js/bootstrap/bootstrap.min.js') }}"></script>
    <!-- All Plugins js -->
    <script src="{{ URL::asset('user_side/js/others/plugins.js') }}"></script>
    <!-- Active JS -->
    <script src="{{ URL::asset('user_side/js/active.js') }}"></script>
    <script src="{{ URL::asset('js/script.js') }}"></script>
    <!-- Google Maps js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDk9KNSL1jTv4MY9Pza6w8DJkpI_nHyCnk"></script>
    <script src="{{ URL::asset('user_side/js/google-map/map-active.js') }}"></script>
</body>
</html>