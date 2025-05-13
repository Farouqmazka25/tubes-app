<nav class="navbar navbar-expand navbar-dark shadow mb-4" style="background-color: #141B24;">
    <div class="container-fluid">
        <!-- Sidebar Toggle (Only visible on mobile) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle me-3 text-white">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Right -->
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle d-flex align-items-center text-white" href="#" id="userDropdown">
                    <span class="me-2 d-none d-lg-inline text-white small">
                        {{ Auth::user()->name ?? 'Admin' }}
                    </span>
                    <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}" style="width: 36px; height: 36px;">
                </a>
            </li>
        </ul>
    </div>
</nav>
        