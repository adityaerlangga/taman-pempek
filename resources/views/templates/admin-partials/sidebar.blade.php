<div class="app-sidebar">
    <div class="logo hide-sidebar-toggle-button">
        <a href="#" class="logo-icon"></a>
        <div class="sidebar-user-switcher user-activity-online">
            <a href="#">
                <img src="/admin-assets/images/avatars/avatar1.jpg">
                <span class="activity-indicator"></span>
                <span class="user-info-text">Admin<br><span class="user-state-info">Taman Pempek</span></span>
            </a>
        </div>
    </div>
    <div class="app-menu">
        <ul class="accordion-menu">
            <li class="sidebar-title">
                Menu
            </li>
            <li class="{{ Request::is('admin') ? 'active-page' : '' }}">
                <a href="/admin" class="active"><i class="material-icons-two-tone">dashboard</i>Dashboard</a>
            </li>
            <li class="{{ Request::is('product_categories') ? 'active-page' : '' }}">
                <a href="/product_categories"><i class="material-icons-two-tone">category</i>Categories</a>
            </li>
            <li class="{{ Request::is('products') ? 'active-page' : '' }}">
                <a href="/products"><i class="material-icons-two-tone">view_list</i>Products</a>
            </li>
            <li class="{{ Request::is('order') ? 'active-page' : '' }}">
                {{-- <a href="/order"><i class="material-icons-two-tone">inbox</i>Orders<span
                        class="badge rounded-pill badge-danger float-end">87</span></a> --}}
                <a href="/order"><i class="material-icons-two-tone">inbox</i>Orders</a>
            </li>
            {{-- <li class="sidebar-title">
                HALAMAN WEBSITE
            </li>
            <li class="{{ Request::is('page/home') ? 'active-page' : '' }}">
                <a href="/page/home" class="active"><i class="material-icons-two-tone">language</i>Home</a>
            </li>
            <li class="{{ Request::is('page/layanan-kami') ? 'active-page' : '' }}">
                <a href="/page/layanan" class="active"><i class="material-icons-two-tone">language</i>Layanan Kami</a>
            </li>
            <li class="{{ Request::is('page/tentang-kami') ? 'active-page' : '' }}">
                <a href="/page/tentang" class="active"><i class="material-icons-two-tone">language</i>Tentang Kami</a>
            </li>
            <li class="{{ Request::is('page/artikel') ? 'active-page' : '' }}">
                <a href="/page/artikel" class="active"><i class="material-icons-two-tone">language</i>Artikel</a>
            </li> --}}
            <li class="sidebar-title">
                OTHER
            </li>
            <li>
                <a href="/logout" class="active"><i class="material-icons-two-tone">logout</i>Logout</a>
            </li>
        </ul>
    </div>
</div>
