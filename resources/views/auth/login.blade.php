<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-menu-color="brand" data-topbar-color="light">

<head>
    @include('backend/item/css')
</head>

<body class="bg-primary d-flex justify-content-center align-items-center min-vh-100 p-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-md-5">
                <div class="card">
                    <div class="card-body p-4">

                        <div class="text-center w-75 mx-auto auth-logo mb-4">
                            <a href="index.html" class="logo-dark">
                                <span><img src="{{ asset('assets/logo.png') }}" alt="" height="70"></span>
                            </a>

                            <a href="index.html" class="logo-light">
                                <span><img src="{{ asset('assets/logo.png') }}" alt="" height="70"></span>
                            </a>
                        </div>
                        <p align="center">{{ master()->judul }}</p>

                        @if (Session::get('success'))
                                    <div class="alert alert-success" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
                                        <strong>Selamat!</strong> {{ Session::get('success') }}
                                    </div>
                                    @endif

                                    @if (Session::get('error'))
                                    <div class="alert alert-danger" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
                                        <strong>Maaf!</strong> {{ Session::get('error') }}
                                    </div>
                                    @endif

                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                        <form action="{{ url('loginAct') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="form-label" for="emailaddress">Email</label>
                                <input class="form-control" type="email" name="email" id="emailaddress" required="" placeholder="Masukkan email anda">
                            </div>

                            <div class="form-group mb-3">
                                <a href="pages-recoverpw.html" class="text-muted float-end"><small></small></a>
                                <label class="form-label" for="password">Password</label>
                                <input class="form-control" type="password" name="password" required="" id="password" placeholder="Masukkan password anda">
                            </div>

                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary w-100" type="submit"> Log In </button>
                            </div>

                        </form>
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        {{-- <p class="text-white-50"> <a href="pages-register.html" class="text-white-50 ms-1">Forgot your password?</a></p> --}}
                        <p class="text-white-50">Belum punya akun? <a href="{{ url('regis') }}" class="text-white font-weight-medium ms-1">Registrasi</a></p>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>

    @include('backend/item/js')

</body>

</html>