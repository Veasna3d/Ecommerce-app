<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="position-fixed">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/dashboard') }}">
                    <i class="mdi mdi-home menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/orders') }}">
                    <i class="mdi mdi-folder-download menu-icon"></i>
                    <span class="menu-title">Orders</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('admin/category*') ? 'active':'' }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#category"
                    aria-expanded="{{ Request::is('admin/category*' ? 'true':'false') }}" aria-controls="category">

                    <i class="mdi mdi-package-variant menu-icon"></i>
                    <span class="menu-title">Category</span>
                    <i class="menu-arrow"></i>
                </a>

                <div class="collapse {{ Request::is('admin/category*' ? 'show':'') }}" id="category">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link {{ Request::is('admin/category/create') ? 'active':'' }}" href="{{ url('admin/category/create') }}">Add
                                Category</a></li>
                        <li class="nav-item"> <a class="nav-link {{ Request::is('admin/category') || Request::is('admin/category/*/edit') ? 'active':'' }}" href="{{ url('admin/category') }}">View Category</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item {{ Request::is('admin/products*') ? 'active':'' }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#product" aria-expanded="{{ Request::is('admin/products*' ? 'true':'false') }}"
                aria-controls="product">
                    <i class="mdi mdi-store menu-icon"></i>
                    <span class="menu-title">Product</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="product">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link {{ Request::is('admin/products/create') ? 'active':'' }}" href="{{ url('admin/products/create') }}">Add
                                Product</a></li>
                        <li class="nav-item"> <a class="nav-link {{ Request::is('admin/products') || Request::is('admin/products/*/edit') ? 'active':'' }}" href="{{ url('admin/products') }}">View Product</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/brands') }}">
                    <i class="mdi mdi-bank menu-icon"></i>
                    <span class="menu-title">Brands</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/colors') }}">
                    <i class="mdi  mdi-cube menu-icon"></i>
                    <span class="menu-title">Color</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/sliders') }}">
                    <i class="mdi mdi-grid-large menu-icon"></i>
                    <span class="menu-title">Carousel</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                    <i class="mdi mdi-account menu-icon"></i>
                    <span class="menu-title">Security</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="auth">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ url('admin/users') }}"> Users </a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/settings') }}">
                    <i class="mdi mdi-settings menu-icon"></i>
                    <span class="menu-title">Setting</span>
                </a>
            </li>
        </ul>
    </div>

</nav>
