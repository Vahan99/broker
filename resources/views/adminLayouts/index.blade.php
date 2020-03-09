<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="{!! URL::asset('assets/sm-logo.png') !!}">

        <title>MAgent</title>


        <!--Morris Chart CSS -->
		    <link rel="stylesheet" href="{{ URL::asset('css/morris.css') }}">

        <link href="{{ URL::asset('css/bootstrap1.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('css/core.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('css/components.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('css/icons.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ URL::asset('css/pages.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('css/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('css/responsive.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ URL::asset('css/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('switchery/dist/switchery.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('footable/css/footable.core.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('css/admin_style.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('js/select2/select2.css') }}" rel="stylesheet" type="text/css">

        <script src="{{ URL::asset('js/modernizr.min.js') }}"></script>
        <style type="text/css" >
            img {
                border: 1px solid #ddd;
                border-radius: 4px;
                padding: 5px;
            }
            .field-items{
                display: inline-table;
                width: 100%;
                background-color: #eef6f9;
                border-bottom: 1px dotted #ff0000;
            }
            #even_list_table td.switchery-demo.checked .switchery small{
                left: 20px!important; 
                transition: background-color 0.4s, left 0.2s!important; 
                background-color: rgb(255, 255, 255)!important;
            }
            #even_list_table td.switchery-demo.checked .switchery{
                box-shadow: rgb(26, 179, 148) 0px 0px 0px 16px inset!important;
                border-color: rgb(26, 179, 148)!important; 
                background-color: rgb(26, 179, 148)!important; 
                transition: border 0.4s, box-shadow 0.4s, background-color 1.2s!important;
            }

            #even_list_table td.switchery-demo .switchery small{
                left: 0px!important; 
                transition: background-color 0.4s, left 0.2s!important;
            }
            #even_list_table td.switchery-demo .switchery{
                box-shadow: rgb(237, 85, 101) 0px 0px 0px 0px inset!important; 
                border-color: rgb(237, 85, 101)!important; 
                background-color: rgb(237, 85, 101)!important; 
                transition: border 0.4s, box-shadow 0.4s!important;
            }
            .pink{
                background-color: pink!important;
            }

            .loader {
                border: 16px solid #f3f3f3;
                border-radius: 50%;
                border-top: 16px solid #3498db;
                width: 120px;
                height: 120px;
                -webkit-animation: spin 2s linear infinite; /* Safari */
                animation: spin 2s linear infinite;
            }

            /* Safari */
            @-webkit-keyframes spin {
                0% { -webkit-transform: rotate(0deg); }
                100% { -webkit-transform: rotate(360deg); }
            }

            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }

        </style>

        <link href="{{ URL::asset('css/custom-select.css') }}" rel="stylesheet" type="text/css" />
    </head>


    <body class="fixed-left">
    	 @yield('content')
        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
         <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
         <script src="{{ URL::asset('js/select2/select2.min.js') }}" type="text/javascript"></script>

         <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('js/detect.js') }}"></script>
        <script src="{{ URL::asset('js/fastclick.js') }}"></script>
        <script src="{{ URL::asset('js/jquery.slimscroll.js') }}"></script>
        <script src="{{ URL::asset('js/jquery.blockUI.js') }}"></script>
        <script src="{{ URL::asset('js/waves.js') }}"></script>
        <script src="{{ URL::asset('js/wow.min.js') }}"></script>
        <script src="{{ URL::asset('js/jquery.nicescroll.js') }}"></script>
        <script src="{{ URL::asset('js/jquery.scrollTo.min.js') }}"></script>

        <script src="{{ URL::asset('js/jquery.peity.min.js') }}"></script>

        <!-- jQuery  -->
        <script src="{{ URL::asset('js/jquery.waypoints.js') }}"></script>
        <script src="{{ URL::asset('js/jquery.counterup.min.js') }}"></script>



        <script src="{{ URL::asset('js/morris.min.js') }}"></script>
        <script src="{{ URL::asset('js/raphael-min.js') }}"></script>
        <script src="{{ URL::asset('js/moment.js') }}"></script>
        <script src="{{ URL::asset('js/jquery.knob.js') }}"></script>
        <script src="{{ URL::asset('js/jquery.dashboard.js') }}"></script>

        <script src="{{ URL::asset('js/bootstrap-filestyle.min.js') }}"></script>
        <script src="{{ URL::asset('js/dist/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ URL::asset('js/bootstrap-timepicker.min.js') }}"></script>
        <script src="{{ URL::asset('js/daterangepicker.js') }}"></script>
        <script src="{{ URL::asset('footable/js/footable.all.min.js') }}"></script>
        
        <script src="{{ URL::asset('switchery/dist/switchery.min.js') }}"></script>
        <script src="{{ URL::asset('js/jquery.footable.js') }}"></script>

        <script src="{{ URL::asset('notifyjs/dist/notify.min.js') }}"></script>
        <script src="{{ URL::asset('notifications/notify-metro.js') }}"></script>

        <script src="{{ URL::asset('js/jquery.core.js') }}"></script>
        <script src="{{ URL::asset('js/jquery.app.js') }}"></script>
        <script src="{{ URL::asset('js/script.js') }}"></script>
        <script src="{{ URL::asset('js/print.js') }}"></script>



        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });

                $(".knob").knob();

                jQuery('#date-range').datepicker({
                    toggleActive: true,
                    orientation: 'top'
                });
                jQuery('#datepicker').datepicker();
                jQuery('#timepicker').timepicker({
                    defaultTIme : false
                });


            });
        </script>




    </body>
</html>