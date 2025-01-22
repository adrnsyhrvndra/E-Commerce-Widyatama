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
                                        <span class="text-muted lh-1">Jumlah Produk</span>
                                        <h4 class="mb-0">{{ $jumlahProduk }}</h4>
                                    </div>
                                    <div class="text-primary">
                                        <i class="mdi mdi-package-variant-closed font-size-24"></i>
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
                                        <span class="text-muted lh-1">Jumlah Brand Produk</span>
                                        <h4 class="mb-0">{{ $jumlahBrand }}</h4>
                                    </div>
                                    <div class="text-primary">
                                        <i class="mdi mdi-box font-size-24"></i>
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
                                        <span class="text-muted lh-1">Jumlah Kategori Produk</span>
                                        <h4 class="mb-0">{{ $jumlahCategorie }}</h4>
                                    </div>
                                    <div class="text-primary">
                                        <i class="mdi mdi-cube-send font-size-24"></i>
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
                                        <span class="text-muted lh-1">Total Order yang Pending</span>
                                        <h4 class="mb-0">{{ $jumlahOrderPending }}</h4>
                                    </div>
                                    <div class="text-warning">
                                        <i class="mdi mdi-lan-pending font-size-24"></i>
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
                                        <span class="text-muted lh-1">Total Order yang Unpaid</span>
                                        <h4 class="mb-0">{{ $jumlahOrderUnpaid }}</h4>
                                    </div>
                                    <div class="text-danger">
                                        <i class="mdi mdi-gesture-swipe-down font-size-24"></i>
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
                                        <span class="text-muted lh-1">Total Order yang Paid</span>
                                        <h4 class="mb-0">{{ $jumlahOrderPaid }}</h4>
                                    </div>
                                    <div class="text-success">
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
                                        <span class="text-muted lh-1">Total Order yang Cancel</span>
                                        <h4 class="mb-0">{{ $jumlahOrderCanceled }}</h4>
                                    </div>
                                    <div class="text-danger">
                                        <i class="mdi mdi-cancel font-size-24"></i>
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
