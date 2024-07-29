<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ master()->judul }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/responsive.css') }}">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/favicon.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('assets/favicon.png') }}" sizes="16x16">
</head>
<body>
<div class="boxed_wrapper">

<!--Start Preloader -->
<div class="preloader"></div>
<!--End Preloader --> 

<section class="mainmenu-area style-three stricky">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 clearfix">
                <!--Start mainmenu-->
                <nav class="main-menu pull-left">
                    <div class="navbar-header">   	
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse clearfix">
                        <ul class="navigation clearfix">
                            
                            <li><a href="{{ url('/') }}">Beranda</a></li>
                            <li><a href="{{ url('lokasi') }}">Lokasi Bengkel</a></li>
                            <li><a href="{{ url('auth') }}">Login</a></li>
                        </ul>
                    </div>
                </nav>
                <!--End mainmenu-->
                <!--Start mainmenu right box-->
                <div class="mainmenu-right-box pull-right">
                    <div class="contact-number">
                        <h3><span class="flaticon-technology"></span>Hubungi Kami: <span>{{ master()->hp }}</span></h3>
                    </div>
                </div> 
                <!--End mainmenu right box-->
            </div>   
        </div>
    </div>
</section>

@yield('content')

<!--Start footer bottom area-->
<section class="footer-bottom-area style-three">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="copyright-text">
                    <p>Copyright @ 2024 Aplikasi Pencarian Bengkel dan Service Sepeda Motor </p> 
                </div>
            </div>
        </div>
    </div>
</section>
<!--End footer bottom area-->

</div>

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-chevron-circle-up"></span></div>



<!-- main jQuery -->
<script src="{{ asset('assets/frontend/js/jquery-1.11.1.min.js') }}"></script>
<!-- Wow Script -->
<script src="{{ asset('assets/frontend/js/wow.js') }}"></script>
<!-- bootstrap -->
<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<!-- bx slider -->
<script src="{{ asset('assets/frontend/js/jquery.bxslider.min.js') }}"></script>
<!-- count to -->
<script src="{{ asset('assets/frontend/js/jquery.countTo.js') }}"></script>
<!-- owl carousel -->
<script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
<!-- validate -->
<script src="{{ asset('assets/frontend/js/validation.js') }}"></script>
<!-- mixit up -->
<script src="{{ asset('assets/frontend/js/jquery.mixitup.min.js') }}"></script>
<!-- easing -->
<script src="{{ asset('assets/frontend/js/jquery.easing.min.js') }}"></script>
<!-- gmap helper -->
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHzPSV2jshbjI8fqnC_C4L08ffnj5EN3A"></script> --}}
<!--gmap script-->
<script src="{{ asset('assets/frontend/js/gmaps.js') }}"></script>
<script src="{{ asset('assets/frontend/js/map-helper.js') }}"></script>
<!-- fancy box -->
<script src="{{ asset('assets/frontend/js/jquery.fancybox.pack.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.appear.js') }}"></script>
<!-- isotope script-->
<script src="{{ asset('assets/frontend/js/isotope.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.prettyPhoto.js') }}"></script> 
<script src="{{ asset('assets/frontend/js/jquery.bootstrap-touchspin.js') }}"></script>
<!-- jQuery timepicker js -->
<script src="{{ asset('assets/frontend/assets/timepicker/timePicker.js') }}"></script>
<!-- Bootstrap select picker js -->
<script src="{{ asset('assets/frontend/assets/bootstrap-sl-1.12.1/bootstrap-select.js') }}"></script>                               
<!-- Bootstrap bootstrap touchspin js -->
<!-- jQuery ui js -->
<script src="{{ asset('assets/frontend/assets/jquery-ui-1.11.4/jquery-ui.js') }}"></script>
<!-- Language Switche  -->
<script src="{{ asset('assets/frontend/assets/language-switcher/jquery.polyglot.language.switcher.js') }}"></script>
<!-- Html 5 light box script-->
<script src="{{ asset('assets/frontend/assets/html5lightbox/html5lightbox.js') }}"></script>


<!-- revolution slider js -->
<script src="{{ asset('assets/frontend/assets/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('assets/frontend/assets/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ asset('assets/frontend/assets/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script src="{{ asset('assets/frontend/assets/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
<script src="{{ asset('assets/frontend/assets/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script src="{{ asset('assets/frontend/assets/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('assets/frontend/assets/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script src="{{ asset('assets/frontend/assets/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ asset('assets/frontend/assets/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script src="{{ asset('assets/frontend/assets/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ asset('assets/frontend/assets/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>

<script src="{{ asset('assets/frontend/js/custom.js') }}"></script>



</body>
</html>