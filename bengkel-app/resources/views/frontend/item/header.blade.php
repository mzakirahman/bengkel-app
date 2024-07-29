<div class="main-menu">

    <!-- Brand Logo -->
    <div class="logo-box">
        <!-- Brand Logo Light -->
        <a href="{{url('app/dashboard')}}" class="logo-light">
            <img src="{{ asset('assets/logo.png') }}" alt="logo" class="logo-lg" height="70">
            <img src="{{ asset('assets/logo.png') }}" alt="small logo" class="logo-sm" height="70">
        </a>

        <!-- Brand Logo Dark -->
        <a href="{{url('app/dashboard')}}" class="logo-dark">
            <img src="{{ asset('assets/logo.png') }}" alt="dark logo" class="logo-lg" height="70">
            <img src="{{ asset('assets/logo.png') }}" alt="small logo" class="logo-sm" height="70">
        </a>
    </div>

    <!--- Menu -->
    <ul class="app-menu">

        <li class="menu-item">
            <a href="{{url('app/dashboard')}}" class="menu-link waves-effect">
                <span class="menu-icon"><i class="bx bx-home-smile"></i></span>
                <span class="menu-text"> Dashboard</span>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{url('app/profil')}}" class="menu-link waves-effect">
                <span class="menu-icon"><i class="fa fa-user"></i></span>
                <span class="menu-text"> Profil </span>
            </a>
        </li>

        {{-- <li class="menu-item">
            <a href="{{url('app/bengkel')}}" class="menu-link waves-effect">
                <span class="menu-icon"><i class="fa fa-cog"></i></span>
                <span class="menu-text"> Bengkel </span>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{url('app/pesanan-baru')}}" class="menu-link waves-effect">
                <span class="menu-icon"><i class="fa fa-list"></i></span>
                <span class="menu-text"> Pesanan Jasa </span>
                <span class="badge bg-danger ms-auto">10</span>
            </a>
        </li> --}}
    </ul>
    <!--- End Menu -->
</div>