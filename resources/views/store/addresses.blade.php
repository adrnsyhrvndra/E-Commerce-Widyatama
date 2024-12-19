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
        <header class="main-header">
            <div class="header-lower">
                <div class="auto-container">
                    <div class="outer-box">
                        <figure class="logo-box"><a href="index.html"><img width="110" src="images/LOGO_TOKO_UTAMA_COLORED.png" alt=""></a></figure>
                        <div class="menu-area">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler">
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                            </div>
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <li>
                                            <a href="/">All Products</a>
                                        </li>
                                        <li class="current">
                                            <a href="/addresses">Manage Addreses</a>
                                        </li>    
                                        <li>
                                            
                                        </li>    
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <ul class="menu-right-content clearfix">
                            <li class="shop-cart">
                                <a href="/myorders"><i class="flaticon-shopping-cart-1"></i><span>3</span></a>
                            </li>
                            <li class="shop-cart">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="bg-danger" style="padding-left:18px; padding-right:18px; padding-top:2px; padding-bottom:2px; border-radius:3px; color:white;">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
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
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12">
                        <h4>Tambah Alamat</h4>
                    </div>
                    <div class="col-12 mt-4">
                        <form
                            style="
                                display: grid;
                                grid-template-columns: repeat(2, 1fr);
                                column-gap: 20px;
                                row-gap: 15px;
                            " 
                            action="{{'/addresses/store'}}"
                            method="POST" 
                            enctype="multipart/form-data"
                        >
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->user_id }}">

                            <div class="form-group">
                                <label for="address_label">Address Label</label>
                                <input 
                                    type="text" 
                                    name="address_label" 
                                    class="form-control" 
                                    id="address_label"
                                />
                            </div>

                            <div class="form-group">
                                <label for="receipt_name">Receipt Name</label>
                                <input 
                                    type="text" 
                                    name="receipt_name" 
                                    class="form-control" 
                                    id="receipt_name"
                                />
                            </div>

                            <div class="form-group">
                                <label for="province">Province</label>
                                <select name="province" id="province" class="form-control w-100">
                                    <option value="" disabled selected>Pilih Provinsi</option>
                                    <option value="Aceh">Aceh</option>
                                    <option value="Bali">Bali</option>
                                    <option value="Banten">Banten</option>
                                    <option value="Bengkulu">Bengkulu</option>
                                    <option value="Gorontalo">Gorontalo</option>
                                    <option value="Jakarta">Jakarta</option>
                                    <option value="Jambi">Jambi</option>
                                    <option value="Jawa Barat">Jawa Barat</option>
                                    <option value="Jawa Tengah">Jawa Tengah</option>
                                    <option value="Jawa Timur">Jawa Timur</option>
                                    <option value="Kalimantan Barat">Kalimantan Barat</option>
                                    <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                                    <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                                    <option value="Kalimantan Timur">Kalimantan Timur</option>
                                    <option value="Kalimantan Utara">Kalimantan Utara</option>
                                    <option value="Kepulauan Riau">Kepulauan Riau</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="city_or_regency">City or Regency</label>
                                <input 
                                    type="text" 
                                    name="city_or_regency" 
                                    class="form-control" 
                                    id="city_or_regency"
                                />
                            </div>

                            <div class="form-group">
                                <label for="district">District</label>
                                <input 
                                    type="text" 
                                    name="district" 
                                    class="form-control" 
                                    id="district"
                                />
                            </div>

                            <div class="form-group">
                                <label for="postal_code">Postal Code</label>
                                <input 
                                    type="text" 
                                    name="postal_code" 
                                    class="form-control" 
                                    id="postal_code"
                                />
                            </div>

                            <div class="form-group" style="grid-column: span 2;">
                                <label for="full_address">Full Address</label>
                                <textarea name="full_address" cols="30" rows="5" class="form-control" id="full_address"></textarea>
                            </div>

                            <div class="form-group" style="grid-column: span 2;">
                                <label for="address_note">Address Note</label>
                                <textarea name="address_note" cols="30" rows="5" class="form-control" id="address_note"></textarea>
                            </div>

                            <button 
                                type="submit" 
                                class="btn btn-primary mt-3 py-3" 
                                style="font-size: 17px; grid-column: span 2;"
                            >
                                Simpan
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
                        "next": "Berikutnya",
                        "previous": "Sebelumnya"
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