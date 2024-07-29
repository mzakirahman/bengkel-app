<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-menu-color="brand" data-topbar-color="light">

<head>
    @include('backend/item/css')
</head>

<body>

    <div class="layout-wrapper">

        @include('backend/item/sidebar')

        <div class="page-content">

            @include('backend/item/header')

            @yield('content')

            {{-- @include('backend/item/footer') --}}

        </div>

    </div>

    @include('backend/item/js')

</body>

</html>