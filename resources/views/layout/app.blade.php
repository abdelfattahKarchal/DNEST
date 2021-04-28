<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon size 16*16 logo -->

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front/assets/images/favicon.ico') }}">

    <title>THE D-NEST JEWELRY</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <!-- CSS
 ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/vendor/bootstrap.min.css') }}">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/vendor/font-awesome.css') }}">
    <!-- Fontawesome Star -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/vendor/fontawesome-stars.css') }}">
    <!-- Ion Icon -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/vendor/ion-fonts.css') }}">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/slick.css') }}">
    <!-- Animation -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/animate.css') }}">
    <!-- jQuery Ui -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/jquery-ui.min.css') }}">
    <!-- Lightgallery -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/lightgallery.min.css') }}">
    <!-- Nice Select -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/nice-select.css') }}">
    <!-- Timecircles -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/timecircles.css') }}">


    <!-- Vendor & Plugins CSS (Please remove the comment from below vendor.min.css & plugins.min.css for better website load performance and remove css files from the above) -->
    <!--
    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>
    -->
    @yield('style')
    <!-- Main Style CSS (Please use minify version for better website load performance) -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/style.css') }}">
    <!--<link rel="stylesheet" href="assets/css/style.min.css">-->

</head>

<body>
    <div class="main-wrapper">
        <!-- Begin Loading Area -->
        {{-- <div class="loading">
            <div class="text-center">
                <img src="{{ asset('front/assets/images/logo/logo1_1.png') }}" alt="The DNest jewelery">
            </div>
            <div class="text-center middle">
                <div class="lds-ellipsis">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div> --}}
        <!-- Loading Area End Here -->
        @if (Session()->has('showNewsletter') && Session()->get('showNewsletter'))
            <x-front.newsletter></x-front.newsletter>
        @endif
        {{-- @if (Route::currentRouteName() == 'index')
            <x-front.newsletter></x-front.newsletter>
        @endif --}}
        <!-- Begin Hiraola's Newsletter Popup Area -->

        <!-- DNEST Offer -->
        {{-- <x-front.header-offer></x-front.header-offer> --}}
        <!-- Begin Hiraola's Header Main Area Three -->
        @include('front.partials.headers.header')
        {{-- <x-front.header></x-front.header> --}}
        @yield('content')

        <!-- Begin Hiraola's Footer Area -->
        @include('front.partials.footer')
        <!-- Hiraola's Footer Area End Here -->

    </div>

    <!-- JS
    ============================================ -->

    <!-- jQuery JS -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script> --}}
    <script src="{{ asset('front/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <!-- Modernizer JS -->
    <script src="{{ asset('front/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <!-- Popper JS -->
    <script src="{{ asset('front/assets/js/vendor/popper.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('front/assets/js/vendor/bootstrap.min.js') }}"></script>

    <!-- Slick Slider JS -->
    <script src="{{ asset('front/assets/js/plugins/slick.min.js') }}"></script>
    <!-- Countdown JS -->
    <script src="{{ asset('front/assets/js/plugins/countdown.js') }}"></script>
    <!-- Barrating JS -->
    <script src="{{ asset('front/assets/js/plugins/jquery.barrating.min.js') }}"></script>
    <!-- Counterup JS -->
    <script src="{{ asset('front/assets/js/plugins/jquery.counterup.js') }}"></script>
    <!-- Nice Select JS -->
    <script src="{{ asset('front/assets/js/plugins/jquery.nice-select.js') }}"></script>
    <!-- Sticky Sidebar JS -->
    <script src="{{ asset('front/assets/js/plugins/jquery.sticky-sidebar.js') }}"></script>
    <!-- Jquery-ui JS -->
    <script src="{{ asset('front/assets/js/plugins/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/jquery.ui.touch-punch.min.js') }}"></script>
    <!-- Lightgallery JS -->
    <script src="{{ asset('front/assets/js/plugins/lightgallery.min.js') }}"></script>
    <!-- Scroll Top JS -->
    <script src="{{ asset('front/assets/js/plugins/scroll-top.js') }}"></script>
    <!-- Theia Sticky Sidebar JS -->
    <script src="{{ asset('front/assets/js/plugins/theia-sticky-sidebar.min.js') }}"></script>
    <!-- Waypoints JS -->
    <script src="{{ asset('front/assets/js/plugins/waypoints.min.js') }}"></script>
    <!-- Instafeed JS -->
    <script src="{{ asset('front/assets/js/plugins/instafeed.min.js') }}"></script>
    <!-- ElevateZoom JS -->
    <script src="{{ asset('front/assets/js/plugins/jquery.elevateZoom-3.0.8.min.js') }}"></script>
    <!-- Timecircles JS -->
    <script src="{{ asset('front/assets/js/plugins/timecircles.js') }}"></script>

    <!-- Vendor & Plugins JS (Please remove the comment from below vendor.min.js & plugins.min.js for better website load performance and remove js files from avobe) -->
    <!--
    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>
    -->

    <!-- Main JS -->
    <script src="{{ asset('front/assets/js/main.js') }}"></script>

    <script>
        $(document).ready(function() {

            $('#newsletter-subscribe').click(function(e) {
                e.preventDefault();
                var email = $('#newsletter_mail').val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: "{{ url('newsletters') }}",
                    data: {
                        email: email,
                    },
                    success: function(data) {
                        $('#newsletter').hide();
                       /*  Swal.fire({
                            // position: 'top-end',
                            icon: 'success',
                            title: 'Your response has been saved',
                            showConfirmButton: false,
                            timer: 1500
                        }) */
                    },
                    error: function(data) {
                        $('.errorsMessage').empty();
                        $.each(data.responseJSON.errors, function(key, value) {
                            console.log(key + ": " + value);
                            $('<span>' + value + '</span> <br>').appendTo(
                                '.errorsMessage');
                        });
                        $('.errorsMessage').show();
                    }
                });
            });

            $('#newsletter-close').click(function(e) {
                e.preventDefault();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: "{{ url('newsletters/stop') }}",
                    data: {
                    },
                    success: function(data) {
                        $('#newsletter').hide();
                    },
                    error: function(data) {
                    }
                });
            });

        });

    </script>

    @yield('js')
</body>

</html>
