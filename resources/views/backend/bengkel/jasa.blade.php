@extends('backend/item/layout')
@section('content')

        <div class="container-fluid">
            
            <!-- start page title -->
            <div class="py-3 py-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="page-title mb-0">JASA SERVICE</h4>
                    </div>
                    <div class="col-lg-6">
                       <div class="d-none d-lg-block">
                        <ol class="breadcrumb m-0 float-end">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Data Master</a></li>
                            <li class="breadcrumb-item active">Jasa Service</li>
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
                                    <table id="" class="table table-bordered dt-responsive w-100" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="80%">Nama Jasa</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                    
                                    
                                        <tbody>
                                            <tr>
                                                <td>{!! $data->service !!}</td>
                                                <td>
                                                    <button  class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit">Edit</button>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="editLabel">Edit Data</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ url('bengkel/jasaUpdate') }}" method="POST" enctype="multipart/form-data" role="form">
                                                                @csrf
                                                                
                                                                <input type="hidden" name="id" id="" value="{{ session('id') }}">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="mb-4">
                                                                            <label for="" class="form-label">Nama Jasa</label>
                                                                            <textarea type="text" name="service" class="form-control" rows="10" cols="30" required>{{ $data->service }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->

                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container -->


    <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Tambah Data</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('bengkel/jasaInsert') }}" method="POST" enctype="multipart/form-data" role="form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="" class="form-label">Nama Jasa</label>
                                    <textarea type="text" name="nm_jasa" class="form-control" rows="5" cols="10" placeholder="Ketik..." required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select" required>
                                        <option value="">Pilih Status</option>
                                        <option value="1">Aktif</option>
                                        <option value="0">Nonaktif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
