@extends('layouts.store')

@section('title', 'Halaman Pengaturan Alamat')

@section('content')

    <style>
        #addressesTable {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
            font-size: 14px;
            color: #333;
            margin-top: 20px;
        }

        #addressesTable thead {
            background-color: #2C2F6A;
            color: white;
            text-transform: uppercase;
            font-weight: bold;
        }

        #addressesTable thead th {
            padding: 12px;
            text-align: left;
            border-bottom: 2px solid #ddd;
            font-size: 12px;
        }

        #addressesTable tbody tr {
            border-bottom: 1px solid #ddd;
            transition: background-color 0.3s ease;
        }

        #addressesTable tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #addressesTable tbody tr:hover {
            background-color: #dedede;
        }

        #addressesTable td, #addressesTable th {
            padding: 10px 15px;
            text-align: left;
            vertical-align: middle;
        }

        .text-success {
            color: #28a745;
            font-weight: bold;
        }

        .text-danger {
            color: #dc3545;
            font-weight: bold;
        }

        .btn {
            font-size: 12px;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-success {
            background-color: #4CAF50;
            color: white;
        }

        .btn-success:hover {
            background-color: #45a049;
        }

        .btn-danger {
            background-color: #f44336;
            color: white;
        }

        .btn-danger:hover {
            background-color: #e53935;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .modal-content {
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #ddd;
        }

        .modal-title {
            font-size: 18px;
            font-weight: bold;
        }

        .modal-footer button {
            font-size: 14px;
        }
    </style>

    <div class="boxed_wrapper">
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <div class="navbar-brand-box">
                        <a href="index.html" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="images/ONLY ICON.png" alt="Logo Icon" height="24">
                            </span>
                            <span class="logo-lg">
                                <img src="images/LOGO_TOKO_UTAMA_COLORED.png" alt="Logo" height="24">
                            </span>
                        </a>
                    </div>
                </div>
                <div class="d-flex">
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
        <section class="shop-page-section shop-page-1">
            <div class="auto-container">
                <div class="row">
                    <div class="col-12">
                        <h4>Data Alamat</h4>
                        <table id="addressesTable" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Address Label</th>
                                    <th>Receipt Name</th>
                                    <th>Province</th>
                                    <th>City Or Regency</th>
                                    <th>District</th>
                                    <th>Postal Code</th>
                                    <th>Full Address</th>
                                    <th>Addres Note</th>
                                    <th>Alamat Utama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user->addresses as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->address_label }}</td>
                                        <td>{{ $item->receipt_name }}</td>
                                        <td>{{ $item->province }}</td>
                                        <td>{{ $item->city_or_regency }}</td>
                                        <td>{{ $item->district }}</td>
                                        <td>{{ $item->postal_code }}</td>
                                        <td>{{ $item->full_address }}</td>
                                        <td>{{ $item->address_note }}</td>
                                        <td>
                                            @if ($item->is_primary_address === '1')
                                                <span class="text-success">Ya</span>
                                            @else
                                                <span class="text-danger">Tidak</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div style="display: flex; flex-direction: column; row-gap: 9px;">
                                                <div>
                                                    @if ($item->is_primary_address === '0')
                                                        <form action="/addresses/updateMainAddress/{{ $item->address_id }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('put')
                                                            <button
                                                                type="submit"
                                                                class="btn btn-sm btn-primary"
                                                                {{ $hasPrimaryAddress ? 'disabled' : '' }}>
                                                                Set Alamat Utama
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form action="/addresses/removeMainAddress/{{ $item->address_id }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('put')
                                                            <button
                                                                type="submit"
                                                                class="btn btn-sm btn-danger">
                                                                Hapus Alamat Utama
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                                <a href="/addresses/edit/{{ $item->address_id }}" class="btn btn-sm btn-success">Edit</a>
                                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus{{ $item->address_id }}">Hapus</button>
                                                <div class="modal fade" id="modalHapus{{ $item->address_id }}" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
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
                                                                <form action="/addresses/delete/{{ $item->address_id }}" method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit" class="btn btn-danger">Ya</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="/addresses/form"> <button type="submit" class="btn btn-sm btn-primary"> Tambah Alamat </button></a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#addressesTable').DataTable({
                "language": {
                    "lengthMenu": "Tampilkan _MENU_ data per halaman",
                    "zeroRecords": "Data tidak ditemukan",
                    "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                    "infoEmpty": "Tidak ada data yang tersedia",
                    "infoFiltered": "(disaring dari _MAX_ total data)",
                    "search": "Cari:",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": ">>",
                        "previous": "<<"
                    }
                }
            });
        });
    </script>
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