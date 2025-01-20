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
                                        <li class="breadcrumb-item active">Users</li>
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
                                            <h4 class="card-title mb-0">Atur Data Users</h4>
                                            <p class="card-title-desc mb-0">
                                                Ayo atur data user disini untuk memudahkan penjualan anda.
                                            </p>
                                        </div>
                                        <a href="/user/create" class="btn btn-success waves-effect waves-light w-lg">
                                            <i class="mdi mdi-checkbox-marked-circle-plus-outline font-size-16 align-middle me-2"></i>
                                            Tambah Pengguna
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Full Name</th>
                                            <th>Phone Number</th>
                                            <th>Role</th>
                                            <th>Foto Profil User</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->username }}</td>
                                                    <td>{{ $item->email }}</td>
                                                    <td>{{ $item->full_name }}</td>
                                                    <td>{{ $item->phone_number }}</td>
                                                    <td>
                                                        @if ($item->role == 'admin')
                                                            <span class="badge bg-primary">Administrator</span>
                                                        @else
                                                            <span class="badge bg-danger">Customer</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <img width="60" src="data:image/jpeg;base64,{{ base64_encode($item->profile_picture) }}" alt="User Logo" class="profile-img rounded-circle">
                                                    </td>
                                                    <td>
                                                      @if ( $item->user_id != auth()->user()->user_id)
                                                            <a href="/user/edit/{{ $item->user_id }}" class="btn btn-sm btn-success">Edit</a>
                                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus{{ $item->user_id }}">Hapus</button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="modalHapus{{ $item->user_id }}" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
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
                                                                        <form action="/user/destroy/{{ $item->user_id }}" method="post">
                                                                              @csrf
                                                                              @method('delete')
                                                                              <button type="submit" class="btn btn-danger">Ya</button>
                                                                        </form>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                            </div>
                                                      @else
                                                            <h6>Disabled</h6>
                                                      @endif
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
