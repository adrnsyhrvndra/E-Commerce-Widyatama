@extends('layouts.admin')

@section('title', 'Halaman Dashboard')

@section('content')

<div id="layout-wrapper">
    @include('layouts.partials.headerAdmin')
    @include('layouts.partials.sidebarAdmin')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                {{-- Header --}}
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Selamat Datang {{ Auth::user()->full_name }}</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Kartu Statistik --}}
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <span class="text-muted lh-1">Jumlah Pengguna</span>
                                        <h4 class="mb-0">{{ $jumlahUser }}</h4>
                                    </div>
                                    <div class="text-primary">
                                        <i class="mdi mdi-account-circle-outline font-size-24"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card card-h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <span class="text-muted lh-1">Pendapatan Total</span>
                                        <h4 class="mb-0">Rp{{ number_format($totalPendapatan, 0, ',', '.') }}</h4>
                                    </div>
                                    <div class="text-primary">
                                        <i class="mdi mdi-currency-usd font-size-24"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card card-h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <span class="text-muted lh-1">Total Order yang Selesai</span>
                                        <h4 class="mb-0">{{ $jumlahOrderCompleted }}</h4>
                                    </div>
                                    <div class="text-primary">
                                        <i class="mdi mdi-check-circle-outline font-size-24"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card card-h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <span class="text-muted lh-1">Produk Terjual</span>
                                        <h4 class="mb-0">{{ $produkTerjual }}</h4>
                                    </div>
                                    <div class="text-primary">
                                        <i class="mdi mdi-package-variant-closed font-size-24"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.partials.footerAdmin')
    </div>
</div>

@endsection
