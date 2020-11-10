{{-- @dd($collections[0]->categories[0]->subCategories[0]->id)
--}}
<header class="header-main_area header-main_area-3">

    <div class="header-middle_area d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-middle_wrap">
                        <div class="header-contact_area">
                            <div class="contact-box border_right">
                                <span>Support phone 1</span>
                                <p><a href="callto://+123123321345"> (+123) 123 321 345</a></p>
                            </div>
                            <div class="contact-box">
                                <span>Support phone 2</span>
                                <p><a href="callto://+123123321345">(+123) 123 321 345</a></p>
                            </div>
                        </div>
                        <div class="header-logo">
                            <a href="index-33.html">
                                <!--<img src="https://demo.hasthemes.com/hiraola-preview/hiraola/assets/images/menu/logo/4.png" alt="Hiraola's Header Logo">-->
                                <img src="{{ asset('front/assets/images/logo/logo1.png') }}" alt="THE NEST LOGO"
                                    style="width: 150px;">
                            </a>
                        </div>
                        <div class="header-right_area">
                            <div class="header-contact_area">
                                <div class="contact-box border_right">
                                    <span>Support mail 1</span>
                                    <p><a href="mailto:abdelfattah59@gmail.com">fashe@example.com </a></p>
                                </div>
                                <div class="contact-box">
                                    <span>Support mail 2</span>
                                    <p><a href="mailto:abdelfattah59@gmail.com">fashe@example.com </a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- debut Menu -->
    <div class="header-bottom_area">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 d-lg-none d-block">
                    <div class="header-logo">
                        <a href="index-33.html">
                            <img src="{{ asset('front/assets/images/menu/logo/2.png') }}" alt="Hiraola's Header Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-9 d-none d-lg-flex justify-content-center position-static">
                    <div class="main-menu_area">
                        <nav>
                            <ul>
                                <li class="dropdown-holder"><a href="{{ route('index') }}">Home</a></li>
                                <li class="dropdown-holder"><a href=" {{ route('collections.index') }} ">Collection</a>
                                    <ul class="hm-dropdown">
                                        @foreach ($collections as $collection)
                                            <li><a
                                                    href="{{ url('collections/' . $collection->id . '/products') }}">{{ $collection->name }}</a>
                                            </li>
                                        @endforeach($collections as $collection)

                                    </ul>
                                </li>
                                <li><a href=" {{ route('blogs.index') }} ">Blog</a></li>
                                <li><a href=" {{ route('aboutUs') }} ">About Us</a></li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-3 col-md-8 col-sm-8">
                    <div class="header-right_area">
                        <ul>

                            {{-- <li>
                                <a href="#mobileMenu"
                                    class="mobile-menu_btn toolbar-btn color--white d-lg-none d-block">
                                    <i class="ion-navicon"></i>
                                </a>
                            </li> --}}
                            <li style="border-left: 1px solid rgba(0, 0, 0, 0.07);">
                                <a href=" {{ route('orders.index') }} ">
                                    <i class="ion-bag"><sup> <span
                                                class="badge badge-light card-counter">4</span></sup></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Menu -->
    <!-- debut header scroll -->
    <div class="header-bottom_area header-bottom_area-2 header-sticky stick white--color">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-4">
                    <div class="header-logo">
                        <a href="index-33.html">
                            <!-- <img src="https://demo.hasthemes.com/hiraola-preview/hiraola/assets/images/menu/logo/2.png"
                              alt="Hiraola's Header Logo">-->
                            <img src="{{ asset('front/assets/images/logo/logo1.png') }}" alt="The Nest jewelery"
                                style="width: 94px;height: 56px;">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 d-none d-lg-block position-static">
                    <div class="main-menu_area">
                        <nav>
                            <ul>
                                <li class="dropdown-holder"><a href="{{ route('index') }}">Home</a></li>
                                <li class="dropdown-holder"><a href="{{ route('collections.index') }}">Collection</a>
                                    <ul class="hm-dropdown">
                                        @foreach ($collections as $collection)
                                            <li><a
                                                    href="{{ url('collections/' . $collection->id . '/products') }}">{{ $collection->name }}</a>
                                            </li>
                                        @endforeach($collections as $collection)
                                    </ul>
                                </li>
                                <li><a href=" {{ route('blogs.index') }} ">Blog</a></li>
                                <li><a href=" {{ route('aboutUs') }} ">About Us</a></li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-3 col-md-8 col-sm-8">
                    <div class="header-right_area">
                        <ul>
                            <li>
                                <a href="#mobileMenu"
                                    class="mobile-menu_btn toolbar-btn color--white d-lg-none d-block">
                                    <i class="ion-navicon"></i>
                                </a>
                            </li>
                            <li style="border-left: 1px solid rgba(0, 0, 0, 0.07);">
                                <a href="{{ route('orders.index') }}">
                                    <i class="ion-bag"><sup> <span
                                                class="badge badge-light card-counter">4</span></sup></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Mobile Menu -->
    <div class="mobile-menu_wrapper" id="mobileMenu">
        <div class="offcanvas-menu-inner">
            <div class="container">
                <a href="#" class="btn-close"><i class="ion-android-close"></i></a>

                <nav class="offcanvas-navigation">
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children active"><a href="{{ route('index') }}"><span
                                    class="mm-text">Home</span></a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="shop-left-sidebar.html">
                                <span class="mm-text">Collections</span>
                            </a>
                            <ul class="sub-menu">
                                @foreach ($collections as $collection)
                                    <li>
                                        <a href="{{ url('collections/' . $collection->id . '/products') }}">
                                            <span class="mm-text">{{ $collection->name }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{ route('blogs.index') }}">
                                <span class="mm-text">Blog</span>
                            </a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{ route('aboutUs') }}">
                                <span class="mm-text">About AS</span>
                            </a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{ route('contact') }}">
                                <span class="mm-text">Contact</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- end Mobile Menu -->
</header>
