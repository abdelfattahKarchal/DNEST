<!-- debut header scroll -->
<div class="header-bottom_area header-bottom_area-2 header-sticky stick white--color">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-4 col-sm-4">
                        <div class="header-logo">
                            <a href="{{ route('index') }}">
                                <img src="{{ asset('front/assets/images/logo/logo-header.png') }}" alt="The DNest jewelery"
                                    class="m-1">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 d-none d-lg-block position-static d-lg-flex justify-content-center">
                        <div class="main-menu_area">
                            <nav>
                                <ul>
                                    <li class="dropdown-holder"><a href="{{ route('index') }}">Home</a></li>
                                    <li class="dropdown-holder"><a href="javascript:void(0)">Collection</a>
                                        <ul class="hm-dropdown">
                                            @foreach ($collections as $collection)
                                                @if ($collection->active == 1)
                                                    <li>
                                                        <a
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
                        <div class="header-right_area main-menu_area">
                            <nav>
                                <ul>
                                    <li class="dropdown-holder">
                                        <a href="javascript:void(0)" class="wishlist-btn">
                                            <i class="ion-person" style="font-size: 1.5rem;"></i>
                                            {{ Auth::user()->name ?? null }}
                                        </a>
                                        <ul class="hm-dropdown">
                                            @if (!Auth::check())
                                                <li><a href="{{ route('register.form') }}">Register</a></li>
                                                <li><a href="{{ route('login.form') }}">Login</a></li>
                                            @else
                                                <li><a href="{{ route('login.form') }}">My Profile</a></li>
                                                <li>
                                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                        Sign Out</a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                        class="d-none">
                                                        @csrf
                                                    </form>
                                                </li>
                                            @endif
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{ route('orders.index') }}">
                                            <i class="ion-bag" style="font-size: 1.5rem;">
                                                <sup>
                                                    <span
                                                        class="badge badge-light card-counter">{{ count(session()->get('productsCardSession') ?? []) }}</span>
                                                </sup>
                                            </i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#mobileMenu"
                                            class="mobile-menu_btn toolbar-btn color--white d-lg-none d-block">
                                            <i class="ion-navicon" style="font-size: 1.5rem;"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
        
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{-- <div class="header-bottom_area header-bottom_area-2 header-sticky stick white--color">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-4">
                <div class="header-logo">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset('front/assets/images/logo/logo-header.png') }}" alt="The DNest jewelery"
                            class="m-1">
                    </a>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-flex justify-content-center position-static">
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
                <div class="main-menu_area header-right_area">
                    <nav>
                        <ul>
                            <li class="dropdown-holder"><a href="javascript:void(0)"><i class="ion-person"></i>
                                {{ Auth::user()->name ?? null}}
                            </a>
                               <ul class="hm-dropdown">
                                   @if (!Auth::check())
                                       <li><a href="{{ route('register.form') }}">Register</a></li>
                                       <li><a href="{{ route('login.form') }}">Login</a></li>
                                   @else
                                       <li><a href="{{ route('login.form') }}">My Profile</a></li>
                                       <li>
                                           <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                                Sign Out</a>
                                           <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                           </form>
                                       </li>
                                   @endif
                               </ul>
                            </li>
                            <li>
                                <a href=" {{ route('orders.index') }} ">
                                    <i class="ion-bag"><sup> <span
                                                class="badge badge-light card-counter">{{ count(session()->get('productsCardSession') ?? []) }}</span></sup></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div> --}}