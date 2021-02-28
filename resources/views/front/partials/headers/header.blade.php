<header class="header-main_area header-main_area-3">

    <div class="header-top_area">
        <div class="container">
            <div class="row d-flex justify-content-end">
                {{-- <div class="col-lg-6">
                    <div class="ht-left_area">
                        <div class="welcome_text">
                            <p>Free shipping on all domestic orders with coupon code
                                <span>"Earrings0920"</span>
                            </p>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-lg-6">
                    <div class="ht-right_area">
                        <div class="ht-menu">
                            <ul>
                                <li>
                                </li>

                                <li>
                                    <a href="javascript:void(0)">
                                        {{ Auth::check() ? Auth::user()->name : 'My Account' }}<i
                                            class="fa fa-chevron-down"></i></a>
                                    <ul class="ht-dropdown ht-my_account">
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
                            </ul>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    @include('front.partials.headers.header-principal')
    @include('front.partials.headers.header-scroll')
    @include('front.partials.headers.header-mobile')
</header>
