<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #141B24;">

    <!-- Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboardadmin') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink text-light"></i>
        </div>
        <div class="sidebar-brand-text mx-3 text-white">Admin Panel</div>
    </a>

    <hr class="sidebar-divider my-0 bg-secondary">

    <!-- Dashboard -->
    <li class="nav-item {{ request()->routeIs('dashboardadmin') ? 'active' : '' }}">
        <a class="nav-link text-white {{ request()->routeIs('dashboardadmin') ? 'bg-secondary' : '' }}" href="{{ route('dashboardadmin') }}">
            <i class="fas fa-fw fa-tachometer-alt text-white"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider bg-secondary">

    <!-- Section: Manajemen -->
    <div class="sidebar-heading text-white-50">Manajemen</div>

    <!-- Produk -->
    <li class="nav-item {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
        <a class="nav-link text-white {{ request()->routeIs('admin.products.*') ? 'bg-secondary' : '' }}" href="{{ route('admin.products.index') }}">
            <i class="fas fa-fw fa-box text-white"></i>
            <span>Produk</span>
        </a>
    </li>

    <!-- Pesanan -->
    <li class="nav-item {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
        <a class="nav-link text-white {{ request()->routeIs('admin.orders.*') ? 'bg-secondary' : '' }}" href="{{ route('admin.orders.index') }}">
            <i class="fas fa-fw fa-file-invoice text-white"></i>
            <span>Pesanan</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block bg-secondary">

    <!-- Sidebar Toggle Button -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle" style="background-color: #27374D;"></button>
    </div>
</ul>
    