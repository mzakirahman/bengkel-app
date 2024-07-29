@extends('frontend/item/layout')
@section('content')

        <div class="container-fluid">
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
                                    <form action="{{ url('app/profilUpdate') }}" method="POST" enctype="multipart/form-data" role="form" class="rating">
                                        @csrf
                                        <input type="hidden" name="id" value="{{session('id')}}">
                                        <br>
                                        <label for="">Nama</label>
                                        <input type="text" name="nama" class="form-control" value="{{$p->nama}}" required>
                                        <br>
                                        <label for="">HP</label>
                                        <input type="text" name="hp" class="form-control" value="{{$p->hp}}" required>
                                        <br>
                                        <label for="">Alamat</label>
                                        <input type="text" name="alamat" class="form-control" value="{{$p->alamat}}" required>
                                        <br>
                                        <label for="">Password</label>
                                        <input type="password" name="password" class="form-control">
                                        <input type="hidden" name="password2" class="form-control" value="{{$p->password}}" required>
                                        <br>
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
