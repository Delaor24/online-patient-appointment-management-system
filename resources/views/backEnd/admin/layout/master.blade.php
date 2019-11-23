<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin | @yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
 {{--    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css"> --}}
     
    <link href="{{asset('css/css.css')}}" rel="stylesheet">
    <link href="{{asset('css/icon.css')}}" rel="stylesheet">
    <!-- Bootstrap Core Css -->
    <link href="{{asset('backEnd')}}/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">




    

    <!-- Custom Css -->
    <link href="{{asset('backEnd')}}/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('backEnd')}}/css/themes/all-themes.css" rel="stylesheet" />

     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
     <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/datePicker/css/bootstrap-datepicker.css')}}">

    <!-- Toastr css -->
    <link rel="stylesheet" type="text/css" href="{{asset('toastr/toastr.min.css')}}">

    @stack('css')
</head>


<body class="theme-blue">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    @include('backEnd.admin.layout.partial.nav')
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        @include('backEnd.admin.layout.partial.leftSidebar')
        <!-- #END# Left Sidebar -->

    </section>

    <section class="content">

        @yield('content')


    </section>

    <!-- Jquery Core Js -->
    <script src="{{asset('backEnd')}}/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{asset('backEnd')}}/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="{{asset('backEnd')}}/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{asset('backEnd')}}/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('backEnd')}}/plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{asset('backEnd')}}/plugins/jquery-countto/jquery.countTo.js"></script>



 

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{asset('backEnd')}}/plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="{{asset('backEnd')}}/js/admin.js"></script>
    <script src="{{asset('backEnd')}}/js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="{{asset('backEnd')}}/js/demo.js"></script>
    <script src="{{asset('toastr/toastr.min.js')}}"></script>

     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>

     <script type="text/javascript" src="{{asset('frontEnd/datePicker/js/bootstrap-datepicker.js')}}"></script>

    {!! Toastr::message() !!}

    @stack('js')
</body>

</html>
