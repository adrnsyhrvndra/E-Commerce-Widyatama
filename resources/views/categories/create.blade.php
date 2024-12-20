@extends('layouts.admin')

@section('title', 'Halaman Tambah Categorie')

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
                                <h4 class="mb-sm-0 font-size-18">Halaman Data Categorie</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="/categorie">Categorie</a></li>
                                        <li class="breadcrumb-item active">Tambah Categorie</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="/categorie/store" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Tambah Data Categorie</h4>
                                        <p class="card-title-desc">
                                            Ayo tambah data categorie disini untuk memudahkan penjualan anda.
                                        </p>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                                <div class="col-6">
                                                      <div class="mb-3">
                                                            <label for="category_name" class="form-label">Categorie Name</label>
                                                            <input class="form-control" type="text" name="category_name" id="category_name" required>
                                                      </div>
                                                </div>
                                        </div>                                    
                                        <div class="row justify-content-end mb-3 mt-2">
                                            <div class="col-6 text-end">
                                                <a href="/categorie" class="btn btn-danger waves-effect waves-light w-lg">
                                                    <i class="mdi mdi-keyboard-backspace font-size-16 align-middle"></i>
                                                    Kembali
                                                </a>
                                                <button type="submit" class="btn btn-success waves-effect waves-light w-lg">
                                                    <i class="mdi mdi-checkbox-marked-circle-plus-outline font-size-16 align-middle"></i>
                                                    Tambah Data Categorie
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

        Dropzone.autoDiscover = false;
        const dropzone = new Dropzone("#dropzone-area", {
            url: "/Categorie/upload-logo",
            maxFiles: 1,
            acceptedFiles: "image/*",
            addRemoveLinks: true,
            dictDefaultMessage: "Drop files here or click to upload.",
        });

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