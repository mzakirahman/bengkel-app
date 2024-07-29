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
                <a href="{{ url('bengkel/dashboard') }}" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="fa fa-home"></i></span>
                    <span class="menu-text"> Dashboard </span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ url('bengkel/profil') }}" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="fa fa-user"></i></span>
                    <span class="menu-text"> Profil </span>
                </a>
            </li>

            <li class="menu-title">Transaksi</li>

            <li class="menu-item">
                <a href="{{ url('bengkel/transaksi-baru') }}" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="fa fa-list"></i></span>
                    <span class="menu-text">Pesanan Baru </span>
                    <span class="badge bg-warning rounded ms-auto">{{transaksiBaru()}}</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ url('bengkel/transaksi-proses') }}" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="fa fa-refresh"></i></span>
                    <span class="menu-text">Pesanan Proses </span>
                    <span class="badge bg-primary rounded ms-auto">{{transaksiProses()}}</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ url('bengkel/transaksi-selesai') }}" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="fa fa-check"></i></span>
                    <span class="menu-text">Pesanan Selesai </span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ url('bengkel/transaksi-tolak') }}" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="fa fa-times"></i></span>
                    <span class="menu-text">Pesanan Ditolak </span>
                </a>
            </li>

            <li class="menu-title">Data Master</li>

            <li class="menu-item">
                <a href="{{ url('bengkel/jasa') }}" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="fa fa-list"></i></span>
                    <span class="menu-text"> Jasa service </span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ url('bengkel/barang') }}" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="fa fa-th"></i></span>
                    <span class="menu-text"> Barang </span>
                </a>
            </li>

            <li class="menu-title">Penilaian Layanan</li>
            <li class="menu-item">
                <a href="{{ url('bengkel/rating') }}" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="fa fa-star"></i></span>
                    <span class="menu-text"> Rating </span>
                    <span class="badge bg-danger rounded ms-auto">{{rating()}}</span>
                </a>
            </li>

            

        </ul>
    </div>
</div>