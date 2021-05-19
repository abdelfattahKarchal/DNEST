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
                                <h6>Livraison à domicile</h6>
                               {{--  <p>Livraison le jour désigné</p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="shipping-item">
                            <div class="shipping-icon">
                                <img src="{{asset('front/assets/images/shipping-icon/2.png')}}" alt="Hiraola's Shipping Icon">
                            </div>
                            <div class="shipping-content">
                                <h6>Payement à la livraison</h6>
                                {{-- <p>Made for your delivery date</p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="shipping-item">
                            <div class="shipping-icon">
                                <img src="{{asset('front/assets/images/shipping-icon/3.png')}}" alt="Hiraola's Shipping Icon">
                            </div>
                            <div class="shipping-content">
                                <h6>Certification & Garantie</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="shipping-item">
                            <div class="shipping-icon">
                                <img src="{{asset('front/assets/images/shipping-icon/4.png')}}" alt="Hiraola's Shipping Icon">
                            </div>
                            <div class="shipping-content">
                                <h6>Service après vente</h6>
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
    <x-front.best-product :bestProducts="$best_products"></x-front.best-product>
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

    <!-- Begin Hiraola's Brand Area -->
    <div class="brand-area">
        <div class="container">
            <div class="brand-slider_nav">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hiraola-section_title">
                            <h4>Partenaires</h4>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-5">
                        <div class="brand-slider" style="border-right: 0px; border-left: 0px; border-top: 0px; border-bottom: 0px;">
                            <div class="slide-item" style="border-right: 0px !important;">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('front/assets/images/partners/logo-artisanat.png') }}" alt="artisanat">
                                </a>
                            </div>
                            <div class="slide-item" style="border-right: 0px !important;">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('front/assets/images/partners/initiativenational.png') }}" alt="initiative national" height="131px">
                                </a>
                            </div>
                            <div class="slide-item" style="border-right: 0px !important;">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('front/assets/images/partners/carrefour.png') }}" alt="carrefour">
                                </a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hiraola's Brand Area End Here -->

    <!-- Begin Latest Blog Area -->
    @include('front.partials.lastblog')
    <!-- end Latest Blog Area -->

    <div style="margin: 100px;"></div>

    <!-- Begin  Modal show product -->
    <x-front.modal-show-product></x-front.modal-show-product>
    <!-- end Modal show product -->
    </div>
@endsection


