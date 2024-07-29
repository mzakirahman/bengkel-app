<div class="main-menu">
    <!-- Brand Logo -->
    <div class="logo-box">
        <!-- Brand Logo Light -->
        <a href="index.html" class="logo-light">
            <img src="{{ asset('assets/logo.png') }}" alt="logo" class="logo-lg" height="28">
            <img src="{{ asset('assets/logo.png') }}" alt="small logo" class="logo-sm" height="28">
        </a>

        <!-- Brand Logo Dark -->
        <a href="index.html" class="logo-dark">
            <img src="{{ asset('assets/logo.png') }}" alt="dark logo" class="logo-lg" height="28">
            <img src="{{ asset('assets/logo.png') }}" alt="small logo" class="logo-sm" height="28">
        </a>
    </div>

    <!--- Menu -->
    <div data-simplebar>
        <ul class="app-menu">

            <li class="menu-title">Menu</li>

            <li class="menu-item">
                <a href="{{ url('admin/dashboard') }}" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="fa fa-dashboard"></i></span>
                    <span class="menu-text"> Dashboard </span>
                </a>
            </li>

            <li class="menu-title">Data Master</li>

            <li class="menu-item">
                <a href="{{ url('admin/bengkel') }}" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-home-smile"></i></span>
                    <span class="menu-text"> Bengkel </span>
                </a>
            </li>

            <li class="menu-title">Data Pengguna</li>

            <li class="menu-item">
                <a href="{{ url('admin/administrator') }}" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-user"></i></span>
                    <span class="menu-text"> Admin </span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ url('admin/pengguna') }}" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-user"></i></span>
                    <span class="menu-text"> Pengguna </span>
                </a>
            </li>

        </ul>
    </div>
</div>