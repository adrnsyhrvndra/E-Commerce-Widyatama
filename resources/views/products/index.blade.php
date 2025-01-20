@extends('layouts.admin')

@section('title', 'Halaman Produk')

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
                                <h4 class="mb-sm-0 font-size-18">Halaman Data Produk</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Produk</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h4 class="card-title mb-0">Atur Data Produk</h4>
                                            <p class="card-title-desc mb-0">
                                                Ayo atur data produk disini untuk memudahkan penjualan anda.
                                            </p>
                                        </div>
                                        <a href="/product/create" class="btn btn-success waves-effect waves-light w-lg">
                                            <i class="mdi mdi-checkbox-marked-circle-plus-outline font-size-16 align-middle me-2"></i>
                                            Tambah Produk
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kategori</th>
                                            <th>Brand</th>
                                            <th>Nama Produk</th>
                                            <th>Deskripsi</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Gambar Produk</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($product as $index => $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->categories->category_name }}</td>
                                                    <td>
                                                        <div style="display: flex; align-items: center; justify-content: center; flex-direction: row; column-gap: 8px">
                                                            {{ $item->brands->brand_name }}
                                                        </div>
                                                    </td>
                                                    <td>{{ $item->product_name }}</td>
                                                    <td>
                                                        <div class="product-description">{{ strip_tags($item->description) }}</div>
                                                    </td>
                                                    <td>{{ "Rp " . number_format($item->price, 0, ',', '.') }}</td>
                                                    <td>{{ $item->stock }}</td>
                                                    <td>
                                                        <img width="60" src="data:image/jpeg;base64,{{ base64_encode($item->product_image) }}" alt="Product Image" class="product-img">
                                                    </td>
                                                    <td>
                                                        <a href="/product/edit/{{ $item->product_id }}" class="btn btn-sm btn-success">Edit</a>
                                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus{{ $item->product_id }}">Hapus</button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="modalHapus{{ $item->product_id }}" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Hapus Data</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Apakah Anda yakin ingin menghapus data ini?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                                                        <form action="/product/destroy/{{ $item->product_id }}" method="post">
                                                                            @csrf
                                                                            @method('delete')
                                                                            <button type="submit" class="btn btn-danger">Ya</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.partials.footerAdmin')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}"
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: "{{ session('error') }}"
            });
        @endif
    </script>

@endsection

@section('styles')
    <style>
        .product-description {
            max-width: 100px;  
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        table td, table th {
            padding: 8px;
            text-align: center;
        }
        
        table {
            table-layout: fixed;
        }
        
        table th, table td {
            min-width: 80px;
        }
    </style>
@endsection
