<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{ asset('backoffice/images/user.png') }}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</div>
            <div class="email">{{ Auth::user()->email }}</div>
           
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{ request()->is('administrationhome') ? 'active' : '' }}">
                <a href="{{ url('/administrationhome') }}">
                    <i class="material-icons">dashboard</i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/users') }}">
                    <i class="material-icons">face</i>
                    <span>Users</span>
                </a>
            </li>
            <li class="header">Orders</li>
            <li class="{{ request()->is('orders/notconfirmed/list') ? 'active' : '' }}">
                <a href="{{ url('/orders/notconfirmed/list') }}">
                    <i class="material-icons">star_outline</i>
                    <span>Not confirmed</span>
                </a>
            </li>
            <li class="{{ request()->is('orders/inprogress/list') ? 'active' : '' }}">
                <a href="{{ url('/orders/inprogress/list') }}">
                    <i class="material-icons">star_half</i>
                    <span>In progress</span>
                </a>
            </li>
            <li class="{{ request()->is('orders/confirmed/list') ? 'active' : '' }}">
                <a href="{{ url('/orders/confirmed/list') }}">
                    <i class="material-icons">star</i>
                    <span>Confirmed</span>
                </a>
            </li>
            <li class="{{ request()->is('orders/canceled/list') ? 'active' : '' }}">
                <a href="{{ url('/orders/canceled/list') }}">
                    <i class="material-icons">cancel</i>
                    <span>Canceled</span>
                </a>
            </li>
            <li class="header">Collections</li>
            <li class="{{ request()->is('admin/collections') ? 'active' : '' }}">
                <a href="{{ url('/admin/collections') }}">
                    <i class="material-icons">collections</i>
                    <span>Collections</span>
                </a>
            </li>
            <li class="{{ request()->is('categories') ? 'active' : '' }}">
                <a href="{{ route('categories.index') }}">
                    <i class="material-icons">category</i>
                    <span>Categories</span>
                </a>
            </li>
            <li class="{{ request()->is('subcategories') ? 'active' : '' }}">
                <a href="{{ route('subcategories.index') }}">
                    <i class="material-icons">category</i>
                    <span>Sub categories</span>
                </a>
            </li>
            {{-- <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">swap_calls</i>
                    <span>Categories</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="pages/ui/alerts.html">categories list</a>
                    </li>
                    <li>
                        <a href="pages/ui/animations.html">sub caregories</a>
                    </li>
                    
                </ul>
            </li> --}}
            <li class="header">Products</li>
            <li class="{{ request()->is('products') ? 'active' : '' }}">
                <a href="{{ route('products.index') }}">
                    <i class="material-icons col-red">donut_large</i>
                    <span>Products list</span>
                </a>
            </li>

            <li class="header">Message</li>
            <li class="{{ request()->is('contacts') ? 'active' : '' }}">
                <a href="{{ route('contacts.index') }}">
                    <i class="material-icons">message</i>
                    <span>Messages list</span>
                </a>
            </li>
            
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2021 - 2022 <a href="javascript:void(0);">Admin - THE D-NEST</a>.
        </div>
        <div class="version">
            <b>Version: </b> 1.0
        </div>
    </div>
    <!-- #Footer -->
</aside>