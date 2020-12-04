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
                            <li class="dropdown-holder"><a href="javascript:void(0)">Collection</a>
                                <ul class="hm-dropdown">
                                    @foreach ($collections as $collection)
                                     @if ($collection->active == 1)
                                         <li><a
                                                href="{{ url('collections/' . $collection->id . '/products') }}">{{ $collection->name }}</a>
                                        </li>
                                     @endif
                                        
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
                                            class="badge badge-light card-counter">{{ count(session()->get('productsCardSession') ?? []) }}</span></sup></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>