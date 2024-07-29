@extends('backend/item/layout')
@section('content')

<div class="px-3">

    <div class="container-fluid">

        <!-- start page title -->
        <div class="py-3 py-lg-4">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="page-title mb-0">Selamat Datang Bengkel [{{ session('nama') }}]</h4>
                </div>
                <div class="col-lg-6">
                   <div class="d-none d-lg-block">
                    <ol class="breadcrumb m-0 float-end">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Bengkel App</li>
                    </ol>
                   </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-3 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Pesanan Baru</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-4">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    {{$h->baru ?? 0}}
                                </h2>
                            </div>
                        </div>

                        <div class="progress shadow-sm" style="height: 5px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 100%;">
                            </div>
                        </div>
                    </div>
                    <!--end card body-->
                </div><!-- end card-->
            </div> <!-- end col-->

            <div class="col-md-3 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Pesanan Proses</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-4">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    {{$h->proses ?? 0}}
                                </h2>
                            </div>
                        </div>

                        <div class="progress shadow-sm" style="height: 5px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%;">
                            </div>
                        </div>
                    </div>
                    <!--end card body-->
                </div>
                <!--end card-->
            </div> <!-- end col-->

            <div class="col-md-3 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Pesanan Selesai</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-4">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    {{$h->selesai ?? 0}}
                                </h2>
                            </div>
                        </div>

                        <div class="progress shadow-sm" style="height: 5px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%;"></div>
                        </div>
                    </div>
                    <!--end card body-->
                </div><!-- end card-->
            </div> <!-- end col-->

            <div class="col-md-3 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Pesanan Ditolak</h5>
                        </div>
                        <div class="row d-flex align-items-center mb-4">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    {{$h->tolak ?? 0}}
                                </h2>
                            </div>
                        </div>

                        <div class="progress shadow-sm" style="height: 5px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 100%;"></div>
                        </div>
                    </div>
                    <!--end card body-->
                </div><!-- end card-->
            </div> <!-- end col-->

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <h4>Selamat Datang [{{session('nama')}}] <br>di {{master()->judul}}</h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>

@endsection