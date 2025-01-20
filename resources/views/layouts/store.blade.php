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
      <link href="{{ asset('administrator/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="{{ asset('administrator/assets/css/preloader.min.css') }}" type="text/css" />
      <link href="{{ asset('administrator/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
      <link href="{{ asset('administrator/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('administrator/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
      <link href="{{ asset('administrator/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('administrator/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('administrator/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('administrator/assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
</head>

<div id="layout-wrapper">
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <div class="navbar-brand-box">
                        <a href="index.html" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ asset('images/ONLY ICON.png') }}" alt="Logo Icon" height="24">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('images/LOGO_TOKO_UTAMA_COLORED.png') }}" alt="Logo" height="24">
                            </span>
                        </a>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <a href="/mycart" class="btn btn-light bg-light-subtle border me-2">
                        <i class="mdi mdi-cart font-size-18 align-middle"></i>
                        <span class="d-none d-xl-inline-block ms-1 fw-medium">My Cart</span>
                    </a>
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item bg-light-subtle border-start border-end"
                            id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="rounded-circle header-profile-user"
                                src="data:image/jpeg;base64,{{ base64_encode(Auth::user()->profile_picture) }}">
                            <span class="d-none d-xl-inline-block ms-1 fw-medium">{{ Auth::user()->full_name }}</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <!-- Profile Link -->
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="mdi mdi-account-circle font-size-16 align-middle me-1"></i> Profile
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/addresses">
                                    <i class="mdi mdi-map-marker font-size-16 align-middle me-1"></i> Address
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/myorders">
                                    <i class="mdi mdi-cart font-size-16 align-middle me-1"></i> Orders History
                                </a>
                            </li>
                            <div class="dropdown-divider"></div>
                            <!-- Logout Button -->
                            <li>
                                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
    </div>

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
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="{{ asset('store/js/script.js') }}"></script>
      <script src="{{ asset('administrator/assets/libs/jquery/jquery.min.js') }}"></script>
      <script src="{{ asset('administrator/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('administrator/assets/libs/metismenu/metisMenu.min.js') }}"></script>
      <script src="{{ asset('administrator/assets/libs/simplebar/simplebar.min.js') }}"></script>
      <script src="{{ asset('administrator/assets/libs/node-waves/waves.min.js') }}"></script>
      <script src="{{ asset('administrator/assets/libs/feather-icons/feather.min.js') }}"></script>
      <script src="{{ asset('administrator/assets/libs/pace-js/pace.min.js') }}"></script>
      <script src="{{ asset('administrator/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
      <script src="{{ asset('administrator/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
      <script src="{{ asset('administrator/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
      <script src="{{ asset('administrator/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
      <script src="{{ asset('administrator/assets/libs/jszip/jszip.min.js') }}"></script>
      <script src="{{ asset('administrator/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
      <script src="{{ asset('administrator/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
      <script src="{{ asset('administrator/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
      <script src="{{ asset('administrator/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
      <script src="{{ asset('administrator/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
      <script src="{{ asset('administrator/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
      <script src="{{ asset('administrator/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
      <script src="{{ asset('administrator/assets/js/pages/datatables.init.js') }}"></script>
      <script src="{{ asset('administrator/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
      <script src="{{ asset('administrator/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
      <script src="{{ asset('administrator/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}"></script>
      <script src="{{ asset('administrator/assets/js/pages/dashboard.init.js') }}"></script>
      <script src="{{ asset('administrator/assets/libs/dropzone/min/dropzone.min.js')}}"></script>
      <script src="{{ asset('administrator/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')}}"></script>
      <script src="{{ asset('administrator/assets/js/pages/form-editor.init.js')}}"></script>        <script src="{{ asset('administrator/assets/js/app.js') }}"></script>

</body>
</html>
