@extends('layout.app')
@section('content')

    {{-- begin slider --}}
    <x-front.slider></x-front.slider>
    {{-- end slider --}}


    <div class="hiraola-shipping_area hiraola-shipping_area-2">
        <div class="container">
            <div class="shipping-nav">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="shipping-item">
                            <div class="shipping-icon">
                                <img src="{{asset('front/assets/images/shipping-icon/1.png')}}" alt="Hiraola's Shipping Icon">
                            </div>
                            <div class="shipping-content">
                                <h6>Fast Delivery</h6>
                                <p>Designated day delivery</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="shipping-item">
                            <div class="shipping-icon">
                                <img src="{{asset('front/assets/images/shipping-icon/2.png')}}" alt="Hiraola's Shipping Icon">
                            </div>
                            <div class="shipping-content">
                                <h6>Freshyly Prepared Ingredients</h6>
                                <p>Made for your delivery date</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="shipping-item">
                            <div class="shipping-icon">
                                <img src="{{asset('front/assets/images/shipping-icon/3.png')}}" alt="Hiraola's Shipping Icon">
                            </div>
                            <div class="shipping-content">
                                <h6>98% Of Anta Clients</h6>
                                <p>Reach their personal goals set</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="shipping-item">
                            <div class="shipping-icon">
                                <img src="{{asset('front/assets/images/shipping-icon/4.png')}}" alt="Hiraola's Shipping Icon">
                            </div>
                            <div class="shipping-content">
                                <h6>Winner Of 15 Awards</h6>
                                <p>Healthy food and drink 2019</p>
                            </div>
                        </div>
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

    <!-- Begin best sellers -->
    <x-front.best-product :bestProducts="$newProducts"></x-front.best-product>
    <!-- end best sellers -->

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

    <!-- Begin collection tab -->
    <x-front.new-collection :newCollections="$newCollections"></x-front.new-collection>
    <!-- end collection tab -->

    <div class="brand-area">
        <div class="container">
            <div class="brand-slider_nav">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="brand-slider slick-initialized slick-slider">
                            <div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 3876px; transform: translate3d(-1140px, 0px, 0px);"><div class="slide-item slick-slide slick-cloned" data-slick-index="-5" aria-hidden="true" tabindex="-1" style="width: 198px;">
                                <a href="javascript:void(0)" tabindex="-1">
                                    <img src="{{asset('front/assets/images/brand/2.jpg')}}" alt="Uren's Brand Image">
                                </a>
                            </div><div class="slide-item slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true" tabindex="-1" style="width: 198px;">
                                <a href="javascript:void(0)" tabindex="-1">
                                    <img src="{{asset('front/assets/images/brand/3.jpg')}}" alt="Uren's Brand Image">
                                </a>
                            </div><div class="slide-item slick-slide slick-cloned" data-slick-index="-3" aria-hidden="true" tabindex="-1" style="width: 198px;">
                                <a href="javascript:void(0)" tabindex="-1">
                                    <img src="{{asset('front/assets/images/brand/4.jpg')}}" alt="Uren's Brand Image">
                                </a>
                            </div><div class="slide-item slick-slide slick-cloned" data-slick-index="-2" aria-hidden="true" tabindex="-1" style="width: 198px;">
                                <a href="javascript:void(0)" tabindex="-1">
                                    <img src="{{asset('front/assets/images/brand/5.jpg')}}" alt="Uren's Brand Image">
                                </a>
                            </div><div class="slide-item slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" tabindex="-1" style="width: 198px;">
                                <a href="javascript:void(0)" tabindex="-1">
                                    <img src="{{asset('front/assets/images/brand/6.jpg')}}" alt="Uren's Brand Image">
                                </a>
                            </div><div class="slide-item slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="0" style="width: 198px;">
                                <a href="javascript:void(0)" tabindex="0">
                                    <img src="{{asset('front/assets/images/brand/1.jpg')}}" alt="Uren's Brand Image">
                                </a>
                            </div><div class="slide-item slick-slide slick-active" data-slick-index="1" aria-hidden="false" tabindex="0" style="width: 198px;">
                                <a href="javascript:void(0)" tabindex="0">
                                    <img src="{{asset('front/assets/images/brand/2.jpg')}}" alt="Uren's Brand Image">
                                </a>
                            </div><div class="slide-item slick-slide slick-active" data-slick-index="2" aria-hidden="false" tabindex="0" style="width: 198px;">
                                <a href="javascript:void(0)" tabindex="0">
                                    <img src="{{asset('front/assets/images/brand/3.jpg')}}" alt="Uren's Brand Image">
                                </a>
                            </div><div class="slide-item slick-slide slick-active" data-slick-index="3" aria-hidden="false" tabindex="0" style="width: 198px;">
                                <a href="javascript:void(0)" tabindex="0">
                                    <img src="{{asset('front/assets/images/brand/4.jpg')}}" alt="Uren's Brand Image">
                                </a>
                            </div><div class="slide-item slick-slide slick-active" data-slick-index="4" aria-hidden="false" tabindex="0" style="width: 198px;">
                                <a href="javascript:void(0)" tabindex="0">
                                    <img src="{{asset('front/assets/images/brand/5.jpg')}}" alt="Uren's Brand Image">
                                </a>
                            </div><div class="slide-item slick-slide" data-slick-index="5" aria-hidden="true" tabindex="-1" style="width: 198px;">
                                <a href="javascript:void(0)" tabindex="-1">
                                    <img src="{{asset('front/assets/images/brand/6.jpg')}}" alt="Uren's Brand Image">
                                </a>
                            </div><div class="slide-item slick-slide slick-cloned" data-slick-index="6" aria-hidden="true" tabindex="-1" style="width: 198px;">
                                <a href="javascript:void(0)" tabindex="-1">
                                    <img src="{{asset('front/assets/images/brand/1.jpg')}}" alt="Uren's Brand Image">
                                </a>
                            </div><div class="slide-item slick-slide slick-cloned" data-slick-index="7" aria-hidden="true" tabindex="-1" style="width: 198px;">
                                <a href="javascript:void(0)" tabindex="-1">
                                    <img src="{{asset('front/assets/images/brand/2.jpg')}}" alt="Uren's Brand Image">
                                </a>
                            </div><div class="slide-item slick-slide slick-cloned" data-slick-index="8" aria-hidden="true" tabindex="-1" style="width: 198px;">
                                <a href="javascript:void(0)" tabindex="-1">
                                    <img src="{{asset('front/assets/images/brand/3.jpg')}}" alt="Uren's Brand Image">
                                </a>
                            </div><div class="slide-item slick-slide slick-cloned" data-slick-index="9" aria-hidden="true" tabindex="-1" style="width: 198px;">
                                <a href="javascript:void(0)" tabindex="-1">
                                    <img src="{{asset('front/assets/images/brand/4.jpg')}}" alt="Uren's Brand Image">
                                </a>
                            </div><div class="slide-item slick-slide slick-cloned" data-slick-index="10" aria-hidden="true" tabindex="-1" style="width: 198px;">
                                <a href="javascript:void(0)" tabindex="-1">
                                    <img src="{{asset('front/assets/images/brand/5.jpg')}}" alt="Uren's Brand Image">
                                </a>
                            </div><div class="slide-item slick-slide slick-cloned" data-slick-index="11" aria-hidden="true" tabindex="-1" style="width: 198px;">
                                <a href="javascript:void(0)" tabindex="-1">
                                    <img src="{{asset('front/assets/images/brand/6.jpg')}}" alt="Uren's Brand Image">
                                </a>
                            </div></div></div>
                        </div>
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


