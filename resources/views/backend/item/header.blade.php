<div class="navbar-custom">
    <div class="topbar">
        <div class="topbar-menu d-flex align-items-center gap-lg-2 gap-1">

            <!-- Brand Logo -->
            <div class="logo-box">
                <!-- Brand Logo Light -->
                <a href="index.html" class="logo-light">
                    <img src="{{ asset('assets/logo.png') }}" alt="logo" class="logo-lg" height="22">
                    <img src="{{ asset('assets/logo.png') }}" alt="small logo" class="logo-sm" height="22">
                </a>

                <!-- Brand Logo Dark -->
                <a href="index.html" class="logo-dark">
                    <img src="{{ asset('assets/logo.png') }}" alt="dark logo" class="logo-lg" height="22">
                    <img src="{{ asset('assets/logo.png') }}" alt="small logo" class="logo-sm" height="22">
                </a>
            </div>

            <!-- Sidebar Menu Toggle Button -->
            <button class="button-toggle-menu">
                <i class="mdi mdi-menu"></i>
            </button>
        </div>

        <ul class="topbar-menu d-flex align-items-center gap-4">

            <li class="d-none d-md-inline-block">
                <a class="nav-link" href="" data-bs-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen font-size-24"></i>
                </a>
            </li>

            <li class="nav-link" id="theme-mode">
                <i class="bx bx-moon font-size-24"></i>
            </li>

            <li class="dropdown">
                <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{ asset('assets/users.png') }}" alt="user-image" class="rounded-circle">
                    <span class="ms-1 d-none d-md-inline-block">
                        {{ session('nama') }} <i class="mdi mdi-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                   
                    <a href="{{ url('logout') }}" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </li>

        </ul>
    </div>
</div>