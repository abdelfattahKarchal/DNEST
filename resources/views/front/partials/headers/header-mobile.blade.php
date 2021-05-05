<!-- Mobile Menu -->
<div class="mobile-menu_wrapper" id="mobileMenu">
    <div class="offcanvas-menu-inner">
        <div class="container navScroll">
            <a href="#" class="btn-close"><i class="ion-android-close"></i></a>

            <nav class="offcanvas-navigation">
                <ul class="mobile-menu">
                    <li class="menu-item-has-children active"><a href="{{ route('index') }}"><span
                                class="mm-text">Home</span></a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="javascript:void(0)">
                            <span class="mm-text">Collections</span>
                        </a>
                        <ul class="sub-menu">
                            @foreach ($collections as $collection)
                                @if ($collection->active == 1)
                                    <li>
                                        <a href="{{ url('collections/' . $collection->id . '/products') }}">
                                            <span class="mm-text">{{ $collection->name }}</span>
                                        </a>
                                    </li>
                                @endif
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

            <nav class="offcanvas-navigation user-setting_area">
                <ul class="mobile-menu">
                    <li class="menu-item-has-children active">
                        <a href="#">
                            <span class="mm-text">{{ Auth::check() ? Auth::user()->name : 'My Account' }}</span>
                        </a>
                        <ul class="sub-menu">
                            @if (!Auth::check())
                                <li><a href="{{ route('login') }}">Sign In</a></li>
                                <li><a href="{{ route('register') }}">Sign Up</a></li>
                            @else
                                <li><a href="{{ route('login.form') }}">My Profile</a></li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        Sign Out</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            @endif

                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- end Mobile Menu -->
