<!DOCTYPE html>
<html lang="en" data-layout="horizontal" data-menu-color="dark" data-topbar-color="light">

<head>
    @include('backend/item/css')
</head>

<body>

    <!-- Begin page -->
    <div class="layout-wrapper">

        @include('frontend/item/header')

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="page-content">

            <!-- ========== Topbar Start ========== -->
            @include('frontend/item/top')
            <!-- ========== Topbar End ========== -->

            @yield('content')

            @include('frontend/item/footer')

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->
    @include('backend/item/js')
</body>

</html>