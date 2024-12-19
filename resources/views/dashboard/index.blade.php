@extends('layouts.admin')

@section('title', 'Halaman Dashboard')

@section('content')

    <div id="layout-wrapper">
        @include('layouts.partials.headerAdmin')
        @include('layouts.partials.sidebarAdmin')
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Selamat Datang {{ Auth::user()->full_name }}</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                        {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="card card-h-100">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Jumlah Data Brand</span>
                                            <h4 class="mb-3">
                                                <span class="counter-value" data-target="10">0</span>
                                            </h4>
                                        </div>
                                        <div class="col-4 text-center">
                                            <i class="mdi mdi-semantic-web text-primary" style="font-size: 42px"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="col-3">
                            <div class="card card-h-100">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Jumlah Data Brand</span>
                                            <h4 class="mb-3">
                                                <span class="counter-value" data-target="10">0</span>
                                            </h4>
                                        </div>
                                        <div class="col-4 text-center">
                                            <i class="mdi mdi-semantic-web text-primary" style="font-size: 42px"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="col-3">
                            <div class="card card-h-100">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Jumlah Data Brand</span>
                                            <h4 class="mb-3">
                                                <span class="counter-value" data-target="10">0</span>
                                            </h4>
                                        </div>
                                        <div class="col-4 text-center">
                                            <i class="mdi mdi-semantic-web text-primary" style="font-size: 42px"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="col-3">
                            <div class="card card-h-100">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Jumlah Data Brand</span>
                                            <h4 class="mb-3">
                                                <span class="counter-value" data-target="10">0</span>
                                            </h4>
                                        </div>
                                        <div class="col-4 text-center">
                                            <i class="mdi mdi-semantic-web text-primary" style="font-size: 42px"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> © Toko Utama.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by <a href="#!" class="text-decoration-underline">Toko Utama</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

@endsection
