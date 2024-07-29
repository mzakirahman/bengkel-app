@extends('frontend/item/layout')
@section('content')
<div class="px-3">

    <!-- Start Content-->
    <div class="container-fluid">
        
        <div class="row py-3 py-lg-4">
            <div class="col-md-6 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
                                <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('assets/backend/images/media/1.png') }}" alt="..." class="d-block img-fluid">
                                    
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('assets/backend/images/media/2.png') }}" alt="..." class="d-block img-fluid">
                                    
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </a>
                        </div>
                    </div>
                    <!--end card body-->
                </div><!-- end card-->
            </div> <!-- end col-->

            

            <div class="col-md-6 col-xl-6">
                <div class="row">


                    <div class="card-group">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{url('app/transaksi-baru')}}">
                                    <div class="mb-4">
                                        <span class="badge badge-soft-warning float-end">Baru</span>
                                        <h5 class="card-title mb-0">Pesanan Jasa</h5>
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
                                </a>
                            </div>
                        </div>
    
                        <div class="card">
                            <div class="card-body">
                                <a href="{{url('app/transaksi-proses')}}">
                                    <div class="mb-4">
                                        <span class="badge badge-soft-primary float-end">Proses</span>
                                        <h5 class="card-title mb-0">Pesanan Jasa</h5>
                                    </div>
                                    <div class="row d-flex align-items-center mb-4">
                                        <div class="col-8">
                                            <h2 class="d-flex align-items-center mb-0">
                                                {{$h->proses ?? 0}}
                                            </h2>
                                        </div>
                                    </div>
            
                                    <div class="progress shadow-sm" style="height: 5px;">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 100%;"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-group">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{url('app/transaksi-selesai')}}">
                                    <div class="mb-4">
                                        <span class="badge badge-soft-success float-end">Selesai</span>
                                        <h5 class="card-title mb-0">Pesanan Jasa</h5>
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
                                </a>
                            </div>
                        </div>
    
                        <div class="card">
                            <div class="card-body">
                                <a href="{{url('app/transaksi-tolak')}}">
                                    <div class="mb-4">
                                        <span class="badge badge-soft-danger float-end">Ditolak</span>
                                        <h5 class="card-title mb-0">Pesanan Jasa</h5>
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
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="py-3 py-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="page-title mb-0">Selamat Datang <b><i>{{session('nama')}}</i></b> <br> di {{ master()->judul }}</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div id="dvMap" style="width: 100%; height: 600px"></div>
                    </div>
                </div>
            </div>

            
        </div>
        <!-- end row-->

    </div> <!-- container -->

</div> <!-- content -->

<script type="text/javascript" src="{{asset('assets/backend/js/geo.js')}}"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIKL4_UhAFEs4fxihEqrOdj22JC3GfEgo"></script>
@endsection

@push('js')
<script type="text/javascript">
    navigator.geolocation.watchPosition(function(position) {
        
        let lat = position.coords.latitude;
        let lng = position.coords.longitude;

        let posisi_2 = new google.maps.LatLng(lat, lng);
        var rad = [
            {
                "radius": '0 Meter'
            },
            @foreach ($data as $p)
            {
                "radius": google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng('{{$p->lat}}', '{{$p->lon}}'), posisi_2).toFixed(0)+' Meter'
            },    
            @endforeach
            ];
            
            
        var markers = [
        {
            "title": '{{session("nama")}}',
            "pemilik": '{{session("nama")}}',
            "kec": '{{session("nama")}}',
            "kel": '{{session("nama")}}',
            "alamat": '{{session("nama")}}',
            "gambar": '{{session("nama")}}',
            "lat": lat,
            "lng": lng,
            "status": '1'
        },
        @foreach($data AS $p)      
        {
            "id": '{{$p->id}}',
            "title": '{{$p->nm_bengkel}}',
            "pemilik": '{{$p->pemilik}}',
            "kec": '{{$p->kec}}',
            "kel": '{{$p->kel}}',
            "alamat": '{{$p->alamat}}',
            "gambar": '{{$p->gambar}}',
            "lat": '{{$p->lat}}',
            "lng": '{{$p->lon}}',
            "status": '0'
        },
        @endforeach
        ];
        
            var mapOptions = {
                center: new google.maps.LatLng(lat, lng),
                zoom: 13,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
    
            var kondisi='';
            //Create and open InfoWindow.
            var infoWindow = new google.maps.InfoWindow();
            
            for (var i = 0; i < markers.length; i++) {
                var data_radius = rad[i];
                var data = markers[i];
                var myLatlng = new google.maps.LatLng(data.lat, data.lng);
                if(data.status=='1'){
                    var marker = new google.maps.Marker({
                        position: myLatlng,
                        map: map,
                        title: data.title,
                        icon: '../assets/marker.gif'
                    }); 
                }else{
                        var marker = new google.maps.Marker({
                        position: myLatlng,
                        map: map,
                        title: data.title
                    });
                }
    
                (function (marker, data, data_radius) {
                    if(data.status!='1'){
                    google.maps.event.addListener(marker, "click", function (e) {
                        infoWindow.setContent("<div style = 'width:200px;min-height:40px'><h4><strong>"+data.title+"</strong></h4><a href='{{url('app/pesan')}}/"+data.id+"' class='btn btn-primary btn-sm'>Pilih Bengkel</a><hr><strong>Jarak:</strong> "+data_radius.radius+"<br><strong>Pemilik:</strong> "+data.pemilik+"<br><strong>Kecamatan:</strong> "+data.kec+"<br><strong>Desa/Kelurahan:</strong> "+data.kel+"<br><strong>Alamat:</strong> "+data.alamat+"<br><br><img src=../assets/backend/images/bengkel/"+data.gambar+" width='150'></div>");
                        infoWindow.open(map, marker);
                    });
                }
                })(marker, data, data_radius);
            }
        
    }, function(error) {
        switch(error.code) {
            case error.PERMISSION_DENIED:
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Aktifkan Lokasi Maps Anda!"
            }).then((result) => {
                window.location.href = window.location.href;
            });
            break;
            case error.POSITION_UNAVAILABLE:
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Lokasi Tidak Ditemukan!"
            }).then((result) => {
                window.location.href = window.location.href;
            });
            break;
            case error.TIMEOUT:
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Waktu akses Telah Habis!"
            }).then((result) => {
                window.location.href = window.location.href;
            });
            break;
            case error.UNKNOWN_ERROR:
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Telah Terjadi Kesalahan!"
            }).then((result) => {
                window.location.href = window.location.href;
            });
            break;
        }
    });
     
        
        


        
        

        
        
    </script>
@endpush
