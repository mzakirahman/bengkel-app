@extends('frontend/item/landing')
@section('content')
<section class="rev_slider_wrapper style-three">
    <div id="slider3" class="rev_slider"  data-version="5.0">
        <ul>
            <li data-transition="fade">
                <img src="{{ asset('assets/frontend/images/slides/image.png') }}"  alt="" width="1920" height="640" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1" >
                
                <div class="tp-caption  tp-resizeme" 
                    data-x="right" data-hoffset="170" 
                    data-y="top" data-voffset="130" 
                    data-transform_idle="o:1;"         
                    data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" 
                    data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
                    data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" 
                    data-splitin="none" 
                    data-splitout="none"
                    data-responsive_offset="on"
                    data-start="1500">
                    <div class="slide-content-box mar-right">
                        <h2><b>{!! strtoupper(master()->ket) !!}</b></h2>
                        <div class="button">
                            <a class="" href="{{ url('auth') }}">Login</a>       
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</section>
<!--End rev slider wrapper-->

<section class="welcome-area-v2">
    <div class="container">
        <div class="sec-title text-center">
            <h1>DAFTAR BENGKEL</h1>
            <span class="border center"></span>
        </div>
        <div class="row">
            @foreach($data AS $p)
            <div class="col-md-4">
                <div class="single-item">
                    <div class="icon-holder">
                        <img src="{{asset('assets/backend/images/bengkel/'.$p->gambar)}}" alt="">  
                    </div>
                    <div class="text-holder">
                        <h3>{{$p->nm_bengkel}}</h3>
                        <i class="fa fa-star @if($rate[$p->id]>=1) text-danger @endif"></i>
                        <i class="fa fa-star @if($rate[$p->id]>=2) text-danger @endif"></i>
                        <i class="fa fa-star @if($rate[$p->id]>=3) text-danger @endif"></i>
                        <i class="fa fa-star @if($rate[$p->id]>=4) text-danger @endif"></i>
                        <i class="fa fa-star @if($rate[$p->id]>=5) text-danger @endif"></i>
                        
                        <p> Alamat: <br>
                            Kec. {{$p->kec}}, Desa. {{$p->kel}}, {{$p->alamat}} <br><br>
                        </p>
                        <p>
                            <b>Jasa Layanan</b> <br>
                            {!!str_replace(",", "<br>", $p->service)!!}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
            <!--End single item-->
    
        </div>
    </div>
</section>

<!--Start welcome area-v2 -->
{{-- <section class="welcome-area-v2">
    <div class="container">
        <div class="sec-title text-center">
            <h1>FITUR APLIKASI</h1>
            <span class="border center"></span>
            <p>Cara kerja aplikasi pencarian bengkel dan pemesanan service sepeda motor</p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="single-item">
                    <div class="icon-holder">
                        <span class="flaticon-car-repair"></span>    
                    </div>
                    <div class="text-holder">
                        <h3>PENCARIAN BENGKEL</h3>
                        <p>Memudahkan untuk pencarian bengkel terdekat jika terjadi kerusakan sehingga menghemat waktu, tenaga dan biaya</p>
                    </div>
                    <div class="overlay-content">
                        <div class="icon-holder">
                            <span class="flaticon-car-repair"></span>   
                        </div>
                        <div class="text-holder">
                            <h3>PENCARIAN BENGKEL</h3>
                            <p>Memudahkan untuk pencarian bengkel terdekat jika terjadi kerusakan sehingga menghemat waktu, tenaga dan biaya</p>
                        </div>
                    </div>
                </div>
            </div> 
            <!--Start single item-->
            <div class="col-md-4">
                <div class="single-item">
                    <div class="icon-holder">
                        <span class="flaticon-tool-2"></span>    
                    </div>
                    <div class="text-holder">
                        <h3>PEMESANAN JASA PERBAIKAN</h3>
                        <p>Silahkan lakukan pemesanan jasa perbaikan melalui aplikasi dengan memberikan keterangan secara umum kerusakan</p>
                    </div>
                    <div class="overlay-content">
                        <div class="icon-holder">
                            <span class="flaticon-tool-2"></span>   
                        </div>
                        <div class="text-holder">
                            <h3>PEMESANAN JASA PERBAIKAN</h3>
                            <p>Silahkan lakukan pemesanan jasa perbaikan melalui aplikasi dengan memberikan keteragan secara umum kerusakan</p>
                        </div>
                    </div>
                </div>
            </div> 
            
            <div class="col-md-4">
                <div class="single-item">
                    <div class="icon-holder">
                        <span class="flaticon-tool-3"></span>    
                    </div>
                    <div class="text-holder">
                        <h3>MELAKUKAN PERBAIKAN KERUSAKAN</h3>
                        <p>Montir akan segera proses pesanan jasa anda dan menuju kelokasi dimana titik koordinat pemesan</p>
                    </div>
                    <div class="overlay-content">
                        <div class="icon-holder">
                            <span class="flaticon-tool-3"></span>    
                        </div>
                        <div class="text-holder">
                            <h3>MELAKUKAN PERBAIKAN KERUSAKAN</h3>
                            <p>Montir akan segera proses pesanan jasa anda dan menuju kelokasi dimana titik koordinat pemesan</p>
                        </div>
                    </div>
                </div>
            </div> 
            <!--End single item-->
    
        </div>
    </div>
</section> --}}
<!--End welcome area-v2 -->
@endsection