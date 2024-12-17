<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/iofrm-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/iofrm-theme4.css') }}">
</head>
<body>
      @yield('content')
      <script src="{{ asset('auth/js/jquery.min.js') }}"></script>
      <script src="{{ asset('auth/js/popper.min.js') }}"></script>
      <script src="{{ asset('auth/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('auth/js/main.js') }}"></script>
</body>
</html>

