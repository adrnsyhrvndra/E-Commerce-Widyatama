@extends('layouts.admin')

@section('title', 'Halaman Users')

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
                                          <h4 class="mb-sm-0 font-size-18">Halaman Data Users</h4>
                                          <div class="page-title-right">
                                          <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                                                <li class="breadcrumb-item"><a href="/user">Users</a></li>
                                                <li class="breadcrumb-item active">Edit Users</li>
                                          </ol>
                                          </div>
                                    </div>
                              </div>
                              </div>
                              <form action="/user/update/{{ $user->user_id }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                          <div class="col-12">
                                                <div class="card">
                                                <div class="card-header">
                                                      <h4 class="card-title">Edit Data Users</h4>
                                                      <p class="card-title-desc">
                                                            Ayo edit data user disini untuk memudahkan penjualan anda.
                                                      </p>
                                                </div>
                                                <div class="card-body">
                                                      <div class="row">
                                                            <div class="col-6">
                                                                  <div class="mb-3">
                                                                        <label for="username" class="form-label">Username</label>
                                                                        <input class="form-control" type="text" name="username" id="username" value="{{ $user->username }}" required>
                                                                  </div>
                                                            </div>
                                                            <div class="col-6">
                                                                  <div class="mb-3">
                                                                        <label for="email" class="form-label">Email</label>
                                                                        <input class="form-control" type="email" name="email" id="email" value="{{ $user->email }}" required>
                                                                  </div>
                                                            </div>
                                                            <div class="col-6">
                                                                  <div class="mb-3">
                                                                        <label for="full_name" class="form-label">Full Name</label>
                                                                        <input class="form-control" type="text" name="full_name" id="full_name" value="{{ $user->full_name }}" required>
                                                                  </div>
                                                            </div>
                                                            <div class="col-6">
                                                                  <div class="mb-3">
                                                                        <label for="phone_number" class="form-label">Phone Number</label>
                                                                        <input class="form-control" type="number" name="phone_number" id="phone_number" value="{{ $user->phone_number }}" required>
                                                                  </div>
                                                            </div>
                                                      </div>                                    
                                                      <div class="row justify-content-end mb-3 mt-2">
                                                            <div class="col-6 text-end">
                                                            <a href="/user" class="btn btn-danger waves-effect waves-light w-lg">
                                                                  <i class="mdi mdi-keyboard-backspace font-size-16 align-middle"></i>
                                                                  Kembali
                                                            </a>
                                                            <button type="submit" class="btn btn-success waves-effect waves-light w-lg">
                                                                  <i class="mdi mdi-checkbox-marked-circle-plus-outline font-size-16 align-middle"></i>
                                                                  Update Data Users
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