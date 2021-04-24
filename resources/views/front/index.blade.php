@extends('layout.app')
@section('content')

    {{-- begin slider --}}
    <x-front.slider></x-front.slider>
    {{-- end slider --}}


    <div class="hiraola-banner_area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="banner-item img-hover_effect">
                        <a href="shop-left-sidebar.html">
                            <img class="img-full"
                                src="https://demo.hasthemes.com/hiraola-preview/hiraola/assets/images/banner/3_1.jpg"
                                alt="Hiraola's Banner">
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="banner-item img-hover_effect">
                        <a href="shop-left-sidebar.html">
                            <img class="img-full"
                                src="https://demo.hasthemes.com/hiraola-preview/hiraola/assets/images/banner/3_2.jpg"
                                alt="Hiraola's Banner">
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="banner-item img-hover_effect">
                        <a href="shop-left-sidebar.html">
                            <img class="img-full"
                                src="https://demo.hasthemes.com/hiraola-preview/hiraola/assets/images/banner/3_3.jpg"
                                alt="Hiraola's Banner">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Begin new Product -->
    <x-front.new-product :newProducts="$newProducts"></x-front.new-product>
    <!-- end new Product -->

    <div class="static-banner_area static-banner_area-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="static-banner-image static-banner-image-2"></div>
                    <div class="static-banner-content">
                        <p><span>-25% Off</span>This Week</p>
                        <h2>Featured Product</h2>
                        <h3>Meito Accessories 2019</h3>
                        <p class="schedule">
                            Starting at
                            <span> £1209.00</span>
                        </p>
                        <div class="hiraola-btn-ps_left">
                            <a href="shop-left-sidebar.html" class="hiraola-btn">Shopping Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Begin collection tab -->
    <x-front.new-collection :newCollections="$newCollections"></x-front.new-collection>
    <!-- end collection tab -->

    <div class="hiraola-banner_area-2 hiraola-banner_area-7">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner-item img-hover_effect">
                        <a href="shop-left-sidebar.html">
                            <img class="img-full"
                                src="https://demo.hasthemes.com/hiraola-preview/hiraola/assets/images/banner/3_4.jpg"
                                alt="Hiraola's Banner">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="banner-item img-hover_effect">
                        <a href="shop-left-sidebar.html">
                            <img class="img-full"
                                src="https://demo.hasthemes.com/hiraola-preview/hiraola/assets/images/banner/3_5.jpg"
                                alt="Hiraola's Banner">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Begin Latest Blog Area -->
    @include('front.partials.lastblog')
    <!-- end Latest Blog Area -->

    <div style="margin: 100px;"></div>

    <!-- Begin  Modal show product -->
    <x-front.modal-show-product></x-front.modal-show-product>
    <!-- end Modal show product -->
    </div>
@endsection


