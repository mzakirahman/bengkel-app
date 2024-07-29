@extends('frontend/item/landing')
@section('content')

<div id="dvMap" style="width: 100%; height: 500px"></div>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIKL4_UhAFEs4fxihEqrOdj22JC3GfEgo"></script>
<script type="text/javascript">
    var markers = [
    <?php foreach($data AS $p): ?>       
    {
        "title": '<?php echo $p->nm_bengkel ?>',
        "pemilik": '<?php echo $p->pemilik ?>',
        "kec": '<?php echo $p->kec ?>',
        "kel": '<?php echo $p->kel ?>',
        "alamat": '<?php echo $p->alamat ?>',
        "gambar": '<?php echo $p->gambar ?>',
        "lat": '<?php echo $p->lat ?>',
        "lng": '<?php echo $p->lon ?>'
    },
    <?php endforeach; ?>
    ];
    window.onload = function () {
        LoadMap();
    }
    function LoadMap() {
        var mapOptions = {
            center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
            zoom: 13,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);

        var kondisi='';
        //Create and open InfoWindow.
        var infoWindow = new google.maps.InfoWindow();

        for (var i = 0; i < markers.length; i++) {
            var data = markers[i];
            var myLatlng = new google.maps.LatLng(data.lat, data.lng);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: data.title
            });

            (function (marker, data) {
                google.maps.event.addListener(marker, "click", function (e) {
                    infoWindow.setContent("<div style = 'width:200px;min-height:40px'><h4><strong>"+ data.title +"</strong></h4><hr><strong>Pemilik:</strong> "+data.pemilik+"<br><strong>Kecamatan:</strong> "+data.kec+"<br><strong>Desa/Kelurahan:</strong> "+data.kel+"<br><strong>Alamat:</strong> "+data.alamat+"<br><br><img src=assets/backend/images/bengkel/"+data.gambar+" width='200'></div>");
                    infoWindow.open(map, marker);
                });
            })(marker, data);
        }
    }
</script>
@endsection
