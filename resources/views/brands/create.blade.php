@extends('layouts.admin')

@section('title', 'Halaman Tambah Brand')

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
                                <h4 class="mb-sm-0 font-size-18">Halaman Data Brand</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="/brand">Brand</a></li>
                                        <li class="breadcrumb-item active">Tambah Brand</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="/brand/store" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Tambah Data Brand</h4>
                                        <p class="card-title-desc">
                                            Ayo tambah data brand disini untuk memudahkan penjualan anda.
                                        </p>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="brand_name" class="form-label">Brand Name</label>
                                                    <input class="form-control" type="text" name="brand_name" id="brand_name" required>
                                                </div>
                                            </div>
                                            <div class="col-6">              
                                                <div class="mb-3">
                                                    <label for="brand_logo" class="form-label">Brand Logo</label>
                                                    <input type="file" class="form-control" name="brand_logo" id="brand_logo" onchange="previewImage()" accept="image/*">
                                                </div>
                                                <div class="mb-3">
                                                    <h6>Preview Logo Brand</h6>
                                                    <img id="preview" class="rounded" width="200" src="#" alt="Preview Brand Logo" style="display: none; border: 1px solid #ccc; padding: 5px;">
                                                </div>
                                            </div>
                                        </div>                                    
                                        <div class="row justify-content-end mb-3 mt-2">
                                            <div class="col-6 text-end">
                                                <a href="/brand" class="btn btn-danger waves-effect waves-light w-lg">
                                                    <i class="mdi mdi-keyboard-backspace font-size-16 align-middle"></i>
                                                    Kembali
                                                </a>
                                                <button type="submit" class="btn btn-success waves-effect waves-light w-lg">
                                                    <i class="mdi mdi-checkbox-marked-circle-plus-outline font-size-16 align-middle"></i>
                                                    Tambah Data Brand
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @include('layouts.partials.footerAdmin')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Preview Image Function
        function previewImage() {
            const input = document.getElementById('brand_logo');
            const preview = document.getElementById('preview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = "block";
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

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
