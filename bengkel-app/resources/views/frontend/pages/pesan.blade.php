@extends('frontend/item/layout')
@section('content')

        <div class="container-fluid">
            <div class="py-3 py-lg-4">
                <div class="row">
                    <div id="map" style="height: 400px; width: 100%;"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <table class="table" width="100%">
                        <tr>
                            <th width="20%">Nama Bengkel</th>
                            <td>: {{$data->nm_bengkel}}</td>
                        </tr>
                        <tr>
                            <th>Pemilik</th>
                            <td>: {{$data->pemilik}}</td>
                        </tr>
                        <tr>
                            <th>No. HP</th>
                            <td>: {{$data->hp}}</td>
                        </tr>
                        <tr>
                            <th>Kecamatan</th>
                            <td>: {{$data->kec}}</td>
                        </tr>
                        <tr>
                            <th>Desa/Kelurahan</th>
                            <td>: {{$data->kel}}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>: {{$data->alamat}}</td>
                        </tr>
                    </table>
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
                                    <form action="{{ url('app/pesanAct') }}" method="POST" enctype="multipart/form-data" role="form">
                                        @csrf
                                        <input type="hidden" name="lat" id="lat">
                                        <input type="hidden" name="lon" id="lon">
                                        <input type="hidden" name="bengkel_id" value="{{$data->id}}">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-4">
                                                    <h4><i class="fa fa-calendar"></i> {{tanggal_indonesia_lengkap(date('Y-m-d'))}}. Pukul {{date('H:i:s')}} WIB</h4>
                                                    
                                                </div>
                                            </di>
                                            <div class="col-lg-12">
                                                <div class="mb-4">
                                                    <label class="form-label">Keterangan Kerusakan</label>
                                                    <textarea type="text" name="ket" class="form-control" rows="10" cols="10" placeholder="Ketik..." required></textarea>
                                                </div>
                                            </di>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-4">
                                                    <label class="form-label">Foto Kerusakan</label>
                                                    <input type="file" name="gambar" class="form-control" placeholder="Ketik..." required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <button type="submit" class="btn btn-primary">Kirim</button>
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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIKL4_UhAFEs4fxihEqrOdj22JC3GfEgo&libraries=geometry"></script>
@endsection



@push('js')
<script type="text/javascript">

$(document).ready(function() {
        // Custom Overlay untuk label jarak
        function DistanceLabel(map, position, text) {
            this.position = position;
            this.text = text;
            this.div = null;
            this.setMap(map);
        }

        DistanceLabel.prototype = new google.maps.OverlayView();

        DistanceLabel.prototype.onAdd = function() {
            var div = document.createElement('div');
            div.className = 'distance-label';
            div.innerHTML = this.text;
            this.div = div;

            var panes = this.getPanes();
            panes.overlayLayer.appendChild(div);
        };

        DistanceLabel.prototype.draw = function() {
            var overlayProjection = this.getProjection();
            var position = overlayProjection.fromLatLngToDivPixel(this.position);
            var div = this.div;

            div.style.left = (position.x - 30) + 'px'; // Offset horizontal
            div.style.top = (position.y - 20) + 'px';  // Offset vertikal
        };

        DistanceLabel.prototype.onRemove = function() {
            this.div.parentNode.removeChild(this.div);
            this.div = null;
        };
        navigator.geolocation.watchPosition(function(position) {
        var lat1 = position.coords.latitude;
        var lon1 = position.coords.longitude;
        document.getElementById("lat").value=lat1;
        document.getElementById("lon").value=lon1;

            // Koordinat dua titik lokasi
            var location1 = {lat: lat1, lng: lon1}; // Koordinat Jakarta
            var location2 = {lat: {{$data->lat}}, lng: {{$data->lon}}}; // Koordinat Surabaya

            // Buat peta dengan pusat di antara kedua titik
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 7, // Zoom awal
                center: {lat: (location1.lat + location2.lat) / 2, lng: (location1.lng + location2.lng) / 2} // Pusat peta di tengah-tengah kedua titik
            });

            // Buat marker untuk kedua titik lokasi
            var marker1 = new google.maps.Marker({
                position: location1,
                map: map,
                title: 'Lokasi',
                icon: '../../assets/marker.gif'
            });

            var marker2 = new google.maps.Marker({
                position: location2,
                map: map,
                title: 'Bengkel'
            });

            // Buat garis lurus antara dua titik lokasi
            var line = new google.maps.Polyline({
                path: [location1, location2],
                geodesic: true,
                strokeColor: '#0000FF', // Ubah warna garis menjadi biru
                strokeOpacity: 1.0,
                strokeWeight: 2
            });

            // Tampilkan garis pada peta
            line.setMap(map);

            // Hitung jarak antara dua titik
            var distanceInMeters = google.maps.geometry.spherical.computeDistanceBetween(
                new google.maps.LatLng(location1.lat, location1.lng),
                new google.maps.LatLng(location2.lat, location2.lng)
            );

            // Ubah jarak dari meter ke kilometer
            var distanceInKilometers = distanceInMeters / 1000;

            // Pembulatan jarak
            var distanceInMetersRounded = Math.round(distanceInMeters);
            var distanceInKilometersRounded = distanceInKilometers.toFixed(2);

            // Tentukan posisi tengah dari garis
            var midLat = (location1.lat + location2.lat) / 2;
            var midLng = (location1.lng + location2.lng) / 2;
            var midPosition = new google.maps.LatLng(midLat, midLng);

            // Buat label jarak
            var label = new DistanceLabel(map, midPosition, 'Jarak: ' + distanceInMetersRounded + ' m (' + distanceInKilometersRounded + ' km)');

            // Set bounds untuk memusatkan peta pada kedua titik
            var bounds = new google.maps.LatLngBounds();
            bounds.extend(location1);
            bounds.extend(location2);
            map.fitBounds(bounds); // Perbesar peta agar kedua titik terlihat
        
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
});
    </script>
@endpush