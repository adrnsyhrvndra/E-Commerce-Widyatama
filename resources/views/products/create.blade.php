@extends('layouts.admin')

@section('title', 'Halaman Tambah Product')

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
                                    <h4 class="mb-sm-0 font-size-18">Halaman Data Product</h4>
                                    <div class="page-title-right">
                                          <ol class="breadcrumb m-0">
                                          <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                                          <li class="breadcrumb-item"><a href="/product">Product</a></li>
                                          <li class="breadcrumb-item active">Tambah Product</li>
                                          </ol>
                                    </div>
                              </div>
                              </div>
                        </div>
                        <form action="/product/store" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="row">
                              <div class="col-12">
                                    <div class="card">
                                          <div class="card-header">
                                          <h4 class="card-title">Tambah Data Product</h4>
                                          <p class="card-title-desc">
                                                Ayo tambah data product disini untuk memudahkan penjualan anda.
                                          </p>
                                          </div>
                                          <div class="card-body">
                                          <div class="row">
                                                <div class="col-6">
                                                      <div class="mb-3">
                                                            <label for="category_id" class="form-label">Category Name</label>
                                                            <select name="category_id" id="category_id" class="form-select" required>
                                                                  @foreach ($categories as $category)
                                                                        <option value="{{ $category->category_id }}">
                                                                              {{ $category->category_name }}
                                                                        </option>
                                                                  @endforeach
                                                            </select>
                                                      </div>
                                                </div>
                                                <div class="col-6">
                                                      <div class="mb-3">
                                                            <label for="brand_id" class="form-label">Brand Name</label>
                                                            <select name="brand_id" id="brand_id" class="form-select" required>
                                                                  @foreach ($brands as $brand)
                                                                        <option value="{{ $brand->brand_id }}">
                                                                              {{ $brand->brand_name }}
                                                                        </option>
                                                                  @endforeach
                                                            </select>
                                                      </div>
                                                </div>
                                                <div class="col-6">
                                                      <div class="mb-3">
                                                            <label for="product_name">Product Name</label>
                                                            <input type="text" name="product_name" class="form-control" id="product_name" required>
                                                      </div>
                                                </div>
                                                <div class="col-6">
                                                      <div class="mb-3">
                                                            <label for="price">Price</label>
                                                            <input type="number" name="price" id="price" class="form-control" required>
                                                      </div>
                                                </div>
                                                <div class="col-6">
                                                      <div class="mb-3">
                                                            <label for="stock">Stock</label>
                                                            <input type="number" name="stock" id="stock" class="form-control" required>
                                                      </div>
                                                </div>
                                                <div class="col-6">
                                                      <div class="mb-3">
                                                            <label for="product_image">Product Image</label>
                                                            <input type="file" class="form-control" id="product_image" name="product_image">
                                                      </div>
                                                </div>
                                                <div class="col-6">
                                                      <div class="mb-3">
                                                            <label for="ckeditor-classic">Description</label>
                                                            <textarea type="text" id="ckeditor-classic" name="description" class="form-control"></textarea>
                                                      </div>
                                                </div>
                                          </div>
                                          <div class="row justify-content-end mb-3 mt-2">
                                                <div class="col-6 text-end">
                                                      <a href="/Product" class="btn btn-danger waves-effect waves-light w-lg">
                                                      <i class="mdi mdi-keyboard-backspace font-size-16 align-middle"></i>
                                                      Kembali
                                                      </a>
                                                      <button type="submit" class="btn btn-success waves-effect waves-light w-lg">
                                                      <i class="mdi mdi-checkbox-marked-circle-plus-outline font-size-16 align-middle"></i>
                                                      Tambah Data Product
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
      <script src="https://cdn.jsdelivr.net/npm/dropzone@5.7.0/dist/min/dropzone.min.js"></script>
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
