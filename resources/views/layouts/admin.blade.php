<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--
    <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon size 16*16 logo -->
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('backoffice/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('backoffice/plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('backoffice/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{ asset('backoffice/plugins/morrisjs/morris.css') }}" rel="stylesheet" />
@yield('style')
    <!-- Custom Css -->
    <link href="{{ asset('backoffice/css/style.css') }}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('backoffice/css/themes/all-themes.css') }}" rel="stylesheet" />

    <title>THE D-NEST Administration</title>

    

</head>

<body class="theme-red">
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
@include('backoffice.partials.header')
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    @include('backoffice.partials.left-sidebar')
    <!-- #END# Left Sidebar -->

    <!-- Right Sidebar -->
    {{-- look right-bar in partials --}}
    <!-- #END# Right Sidebar -->
</section>

<section class="content">
    @yield('content')
</section>





    <!-- JS
    ============================================ -->

     <!-- Jquery Core Js -->
     <script src="{{ asset('backoffice/plugins/jquery/jquery.min.js') }}"></script>

     <!-- Bootstrap Core Js -->
     <script src="{{ asset('backoffice/plugins/bootstrap/js/bootstrap.js') }}"></script>
 
     <!-- Select Plugin Js -->
     <script src="{{ asset('backoffice/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
 
     <!-- Slimscroll Plugin Js -->
     <script src="{{ asset('backoffice/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
 
     <!-- Waves Effect Plugin Js -->
     <script src="{{ asset('backoffice/plugins/node-waves/waves.js') }}"></script>
 
     
    

    @yield('js')
     <!-- Custom Js -->
     <script src="{{ asset('backoffice/js/admin.js') }}"></script>
     {{-- <script src="{{ asset('backoffice/js/pages/forms/editors.js') }}"></script> --}}
 
     <!-- Demo Js -->
     <script src="{{ asset('backoffice/js/demo.js') }}"></script>
</body>

</html>
