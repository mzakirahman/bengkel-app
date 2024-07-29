@extends('backend/item/layout')
@section('content')

        <div class="container-fluid">
            
            <!-- start page title -->
            <div class="py-3 py-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="page-title mb-0">RATING</h4>
                    </div>
                    <div class="col-lg-6">
                       <div class="d-none d-lg-block">
                        <ol class="breadcrumb m-0 float-end">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pengguna</a></li>
                            <li class="breadcrumb-item active">Rating</li>
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
                                                <th>No</th>
                                                <th width="20%">Rating</th>
                                                <th width="30%">Komentar</th>
                                                <th width="30%">Balasan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                    
                                    
                                        <tbody>
                                            @foreach($data AS $key=>$p)
                                            @php
                                                if($p->status=='0'){
                                                    $bg = 'bg-warning';
                                                    $tx = 'text-white';
                                                }else{
                                                    $bg = '';
                                                    $tx= '';
                                                }
                                            @endphp
                                            <tr class="{{$bg}}">
                                                <td class="{{$tx}}">{{++$key}}</td>
                                                <td class="{{$tx}}">
                                                    <i class="fa fa-star @if($p->rating>=1) text-danger @endif"></i>
                                                    <i class="fa fa-star @if($p->rating>=2) text-danger @endif"></i>
                                                    <i class="fa fa-star @if($p->rating>=3) text-danger @endif"></i>
                                                    <i class="fa fa-star @if($p->rating>=4) text-danger @endif"></i>
                                                    <i class="fa fa-star @if($p->rating>=5) text-danger @endif"></i>
                                                </td>
                                                <td class="{{$tx}}">{{ $p->komentar }}</td>
                                                <td class="{{$tx}}">{{ $p->balasan_komentar }}</td>
                                                <td class="{{$tx}}">
                                                    <button  class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#edit{{$p->id}}">Balas</button>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="edit{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="editLabel">Balasan</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ url('bengkel/ratingUpdate') }}" method="POST" enctype="multipart/form-data" role="form">
                                                                @csrf
                                                                
                                                                <input type="hidden" name="id" id="" value="{{$p->id}}">
                                                                <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="mb-4">
                                                                        <label for="" class="form-label">Balasan</label>
                                                                        <textarea type="text" name="balasan_komentar" class="form-control" required>{{$p->balasan_komentar}}</textarea>
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
                                            @endforeach
                                            
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
                    <form action="{{ url('bengkel/barangAct') }}" method="POST" enctype="multipart/form-data" role="form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="" class="form-label">Nama Barang</label>
                                    <input type="text" name="nm_barang" class="form-control" placeholder="Ketik..." required>
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
