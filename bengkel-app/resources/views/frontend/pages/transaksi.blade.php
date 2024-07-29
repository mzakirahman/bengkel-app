@extends('frontend/item/layout')
@section('content')

        <div class="container-fluid">
            
            <!-- start page title -->
            <div class="py-3 py-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="page-title mb-0">TRANSAKSI</h4>
                    </div>
                    <div class="col-lg-6">
                       <div class="d-none d-lg-block">
                        <ol class="breadcrumb m-0 float-end">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Transaksi</a></li>
                            <li class="breadcrumb-item active">Daftar Pesanan</li>
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
                                    <table id="" class="table table-bordered w-100">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Bengkel</th>
                                                <th>Keterangan</th>
                                                <th>Balasan</th>
                                                <th>Biaya</th>
                                                <th>Status</th>
                                                
                                                <th>Rating</th>
                                                <th>Gambar</th>
                                            </tr>
                                        </thead>
                                    
                                    
                                        <tbody>
                                            @foreach ($data as $key=>$p)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $p->nm_bengkel }}</td>
                                                <td>{{ $p->ket }}</td>
                                                <td>
                                                    @if($p->balas=='')
                                                    -
                                                    @else
                                                    {{ $p->balas }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($p->biaya==0)
                                                    -
                                                    @else
                                                    Rp. {{ number_format($p->biaya) }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($p->status=='0')
                                                    <span class="badge bg-warning">Belum Ditanggapi</span>
                                                    @elseif($p->status=='1')
                                                    <span class="badge bg-primary">Proses Menuju Ketempat</span>
                                                    @elseif($p->status=='2')
                                                    <span class="badge bg-success">Selesai</span>
                                                    
                                                    @elseif($p->status=='99')
                                                    <span class="badge bg-danger">Ditolak</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{url('app/rating/'.$p->bengkel_id)}}" class="btn btn-warning btn-sm">
                                                    @if(!empty($p->rating))
                                                    @for($i=0;$i<$p->rating;$i++)
                                                    <i class="bx bx-star"></i>
                                                    @endfor
                                                    @else
                                                    Penilaian
                                                    @endif
                                                    </a>
                                                </td>
                                                <td>
                                                    <img src="{{asset('assets/backend/images/transaksi/'.$p->gambar)}}" alt="" width="30">
                                                </td>
                                            </tr>
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

@endsection
