@extends('backend/item/layout')
@section('content')

        <div class="container-fluid">
            
            <!-- start page title -->
            <div class="py-3 py-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="page-title mb-0">PROFIL</h4>
                    </div>
                    <div class="col-lg-6">
                       <div class="d-none d-lg-block">
                        <ol class="breadcrumb m-0 float-end">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Data</a></li>
                            <li class="breadcrumb-item active">Profil</li>
                        </ol>
                       </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body" style="overflow-x: scroll">
                            
                            <div class="row">
                                <div class="col-lg-12">
                                    @if (Session::get('success'))
                                    <div class="alert alert-success" role="alert">
                                        <a data-bs-dismiss="alert"><span aria-bs-hidden="true">&times;</span><span class="sr-only"></span></a>
                                        <strong>Selamat!</strong> {{ Session::get('success') }}
                                    </div>
                                    @endif

                                    @if (Session::get('error'))
                                    <div class="alert alert-danger" role="alert">
                                        <a data-bs-dismiss="alert"><span aria-bs-hidden="true">&times;</span><span class="sr-only"></span></a>
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
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="{{ url('bengkel/profilUpdate') }}" method="POST" enctype="multipart/form-data" role="form">
                                        @csrf
                                        
                                        <input type="hidden" name="id" id="" value="{{session('id')}}">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-4">
                                                    <label for="" class="form-label">Nama Bengkel</label>
                                                    <input type="text" name="nm_bengkel" class="form-control" value="{{$p->nm_bengkel}}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-4">
                                                    <label for="" class="form-label">Pemilik</label>
                                                    <input type="text" name="nm_bengkel" class="form-control" value="{{$p->pemilik}}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-4">
                                                    <label for="" class="form-label">HP</label>
                                                    <input type="text" name="nm_bengkel" class="form-control" value="{{$p->hp}}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-4">
                                                    <label for="" class="form-label">Password</label>
                                                    <input type="text" name="password" class="form-control" placeholder="Password Baru">
                                                    <input type="hidden" name="password2" class="form-control" value="{{$p->nm_bengkel}}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container -->

@endsection
