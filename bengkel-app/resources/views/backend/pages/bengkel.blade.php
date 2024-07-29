@extends('backend/item/layout')
@section('content')

        <div class="container-fluid">
            
            <!-- start page title -->
            <div class="py-3 py-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="page-title mb-0">BENGKEL</h4>
                    </div>
                    <div class="col-lg-6">
                       <div class="d-none d-lg-block">
                        <ol class="breadcrumb m-0 float-end">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Data Master</a></li>
                            <li class="breadcrumb-item active">Bengkel</li>
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
                                    <button type="button" class="btn btn-info btn-sm mb-3 float-end" data-bs-toggle="modal" data-bs-target="#bs-example-modal-lg">Tambah Data</button>
                                </div>
                            </div>
                            
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
                                    <table id="" class="table table-bordered dt-responsive w-100">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Bengkel</th>
                                                <th>Pemilik</th>
                                                <th>HP</th>
                                                <th>Email</th>
                                                <th>Kecamatan</th>
                                                <th>Kelurahan</th>
                                                <th>Alamat</th>
                                                <th>Latitude</th>
                                                <th>Longitude</th>
                                                <th>Status</th>
                                                <th>Gambar</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                    
                                    
                                        <tbody>
                                            @foreach ($data as $key=>$p)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $p->nm_bengkel }}</td>
                                                <td>{{ $p->pemilik }}</td>
                                                <td>{{ $p->hp }}</td>
                                                <td>{{ $p->email }}</td>
                                                <td>{{ $p->kec }}</td>
                                                <td>{{ $p->kel }}</td>
                                                <td>{{ $p->alamat }}</td>
                                                <td>{{ $p->lat }}</td>
                                                <td>{{ $p->lon }}</td>
                                                <td>
                                                    @if($p->status=='1')
                                                    <span class="badge bg-success">Aktif</span>
                                                    @else
                                                    <span class="badge bg-danger">Nonaktif</span>
                                                    @endif
                                                </td>
                                                <td><a href="{{ asset('assets/backend/images/bengkel/'.$p->gambar) }}" target="blank_">Lihat</a></td>
                                                <td>
                                                    <button  class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit{{ $p->id }}">Edit</button>
                                                    <a href="{{ url('admin/bengkelDelete/'.$p->id) }}" OnClick="return confirm('Anda yakin ingin menghapus data ini?');" class="btn btn-danger btn-sm">Hapus</a>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="edit{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="editLabel{{ $p->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="editLabel{{ $p->id }}">Edit Data</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ url('admin/bengkelUpdate') }}" method="POST" enctype="multipart/form-data" role="form">
                                                                @csrf
                                                                
                                                                <input type="hidden" name="id" id="" value="{{ $p->id }}">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-4">
                                                                            <label for="" class="form-label">Nama Bengkel</label>
                                                                            <input type="text" name="nm_bengkel" class="form-control" value="{{ $p->nm_bengkel }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-4">
                                                                            <label class="form-label">Nama Pemilik</label>
                                                                            <input type="text" name="pemilik" class="form-control" value="{{ $p->pemilik }}" required>
                                                                        </div>
                                                                    </di>
                                                                </div>
                                        
                                                                
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="mb-4">
                                                                            <label for="" class="form-label">Nomor HP</label>
                                                                            <input type="number" name="hp" class="form-control" value="{{ $p->hp }}" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="mb-4">
                                                                            <label class="form-label">Password</label>
                                                                            <input type="password" name="password" class="form-control" placeholder="Ketik...">
                                                                            <input type="hidden" name="password2" class="form-control" value="{{ $p->password }}">
                                                                        </div>
                                                                    </di>
                                                                </div>
                                        
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-4">
                                                                            <label class="form-label">Kecamatan</label>
                                                                            <select name="kec_id" id="kec_id{{$p->id}}" class="form-select" required>
                                                                                <option value="">Pilih Kecamatan</option>
                                                                                @foreach ($kec as $h)
                                                                                <option @if($p->kec_id==$h->id) selected @endif value="{{ $h->id }}">{{ $h->kec }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-4">
                                                                            <label class="form-label">Desa/Kelurahan</label>
                                                                            <select name="kel_id" id="kel_id{{$p->id}}" class="form-select" required>
                                                                                <option value="{{ $p->kel_id }}">{{ $p->kel }}</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="mb-4">
                                                                            <label for="" class="form-label">Alamat</label>
                                                                            <textarea type="text" name="alamat" class="form-control" placeholder="Ketik..." required>{{ $p->alamat }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-4">
                                                                            <label for="" class="form-label">Latitude</label>
                                                                            <input type="text" name="lat" class="form-control" value="{{ $p->lat }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-4">
                                                                            <label class="form-label">Longitude</label>
                                                                            <input type="text" name="lon" class="form-control" value="{{ $p->lon }}" required>
                                                                        </div>
                                                                    </di>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-4">
                                                                            <label class="form-label">Gambar</label>
                                                                            <input type="file" name="gambar" class="form-control" placeholder="Ketik...">
                                                                            <input type="hidden" name="gambar2" class="form-control" value="{{ $p->gambar }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-4">
                                                                            <label class="form-label">Status</label>
                                                                            <select name="status" class="form-select" required>
                                                                                <option value="">Pilih Status</option>
                                                                                <option @if($p->status=='1') selected @endif value="1">Aktif</option>
                                                                                <option @if($p->status=='2') selected @endif value="0">Nonaktif</option>
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
                    <form action="{{ url('admin/bengkelInsert') }}" method="POST" enctype="multipart/form-data" role="form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="" class="form-label">Nama Bengkel</label>
                                    <input type="text" name="nm_bengkel" class="form-control" placeholder="Ketik..." required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label class="form-label">Nama Pemilik</label>
                                    <input type="text" name="pemilik" class="form-control" placeholder="Ketik..." required>
                                </div>
                            </di>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="" class="form-label">Nomor HP</label>
                                    <input type="number" name="hp" class="form-control" placeholder="Ketik..." required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Ketik..." required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Ketik..." required>
                                </div>
                            </di>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label class="form-label">Kecamatan</label>
                                    <select name="kec_id" id="kec_id" class="form-select" required>
                                        <option value="">Pilih Kecamatan</option>
                                        @foreach ($kec as $h)
                                        <option value="{{ $h->id }}">{{ $h->kec }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label class="form-label">Desa/Kelurahan</label>
                                    <select name="kel_id" id="kel_id" class="form-select" required>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="" class="form-label">Alamat</label>
                                    <textarea type="text" name="alamat" class="form-control" placeholder="Ketik..." required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="" class="form-label">Latitude</label>
                                    <input type="text" name="lat" class="form-control" placeholder="Ketik..." required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label class="form-label">Longitude</label>
                                    <input type="text" name="lon" class="form-control" placeholder="Ketik..." required>
                                </div>
                            </di>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label class="form-label">Gambar</label>
                                    <input type="file" name="gambar" class="form-control" placeholder="Ketik...">
                                </div>
                            </div>
                            <div class="col-lg-6">
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
@push('js')
<script>
    
    $(document).ready(function(){
        $("#kec_id").change(function(event){
                var id = $(this).val();
                if(id!=''){
                    id = $(this).val();
                }else{
                    id = 0;
                }
                div ='';  
                $.getJSON("{{ url('kel') }}/"+id, function(jsonData){
                    
                        $.each(jsonData, function(i,opt){ 
                            div += '<option value="'+opt.id+'">'+opt.kel+'</option>';
                                
                        });
                        $("#kel_id").html(div);
                    
                });
            
        });  
    });


</script>
@foreach ($data as $p)
<script>
    
    $(document).ready(function(){
        $("#kec_id{{$p->id}}").change(function(event){
                var id = $(this).val();
                if(id!=''){
                    id = $(this).val();
                }else{
                    id = 0;
                }
                div ='';  
                $.getJSON("{{ url('kel') }}/"+id, function(jsonData){
                    
                        $.each(jsonData, function(i,opt){ 
                            div += '<option value="'+opt.id+'">'+opt.kel+'</option>';
                                
                        });
                        $("#kel_id{{$p->id}}").html(div);
                    
                });
            
        });  
    });


</script>
@endforeach
@endpush