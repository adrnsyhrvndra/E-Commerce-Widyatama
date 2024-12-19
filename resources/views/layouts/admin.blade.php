<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('administrator/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('administrator/assets/css/preloader.min.css') }}" type="text/css" />
        <link href="{{ asset('administrator/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="{{ asset('administrator/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('administrator/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    </head>
    <body>
        @yield('content')

        <script src="{{ asset('administrator/assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('administrator/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('administrator/assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('administrator/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('administrator/assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('administrator/assets/libs/feather-icons/feather.min.js') }}"></script>
        <!-- pace js -->
        <script src="{{ asset('administrator/assets/libs/pace-js/pace.min.js') }}"></script>

        <!-- apexcharts -->
        <script src="{{ asset('admin/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

        <!-- Plugins js-->
        <script src="{{ asset('administrator/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
        <script src="{{ asset('administrator/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}"></script>
        <!-- dashboard init -->
        <script src="{{ asset('administrator/assets/js/pages/dashboard.init.js') }}"></script>

        <script src="{{ asset('administrator/assets/js/app.js') }}"></script>
    </body>
</html>