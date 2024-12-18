<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>@yield('title')</title>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
      <link href="{{ asset('store/css/font-awesome-all.css') }}" rel="stylesheet">
      <link href="{{ asset('store/css/flaticon.css') }}" rel="stylesheet">
      <link href="{{ asset('store/css/owl.css') }}" rel="stylesheet">
      <link href="{{ asset('store/css/bootstrap.css') }}" rel="stylesheet">
      <link href="{{ asset('store/css/jquery.fancybox.min.css') }}" rel="stylesheet">
      <link href="{{ asset('store/css/jquery-ui.css')}}" rel="stylesheet">
      <link href="{{ asset('store/css/jquery.bootstrap-touchspin.css')}}" rel="stylesheet">
      <link href="{{ asset('store/css/nice-select.css') }}" rel="stylesheet">
      <link href="{{ asset('store/css/animate.css') }}" rel="stylesheet">
      <link href="{{ asset('store/css/color.css') }}" rel="stylesheet">
      <link href="{{ asset('store/css/style.css') }}" rel="stylesheet">
      <link href="{{ asset('store/css/responsive.css') }}" rel="stylesheet">
</head>
<body>
      @yield('content')
      <script src="{{ asset('store/js/jquery.js') }}"></script>
      <script src="{{ asset('store/js/popper.min.js') }}"></script>
      <script src="{{ asset('store/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('store/js/owl.js') }}"></script>
      <script src="{{ asset('store/js/wow.js') }}"></script>
      <script src="{{ asset('store/js/validation.js') }}"></script>
      <script src="{{ asset('store/js/jquery.fancybox.js') }}"></script>
      <script src="{{ asset('store/js/TweenMax.min.js') }}"></script>
      <script src="{{ asset('store/js/appear.js') }}"></script>
      <script src="{{ asset('store/js/scrollbar.js') }}"></script>
      <script src="{{ asset('store/js/jquery.nice-select.min.js') }}"></script>
      <script src="{{ asset('store/js/isotope.js') }}"></script>
      <script src="{{ asset('store/js/jquery-ui.js') }}"></script>
      <script src="{{ asset('store/js/jquery.bootstrap-touchspin.js')}}"></script>

      <!-- main-js -->
      <script src="{{ asset('store/js/script.js') }}"></script>

</body>
</html>
