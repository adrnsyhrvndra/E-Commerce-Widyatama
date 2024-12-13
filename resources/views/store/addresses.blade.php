<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Commerce Store</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Font -->
    <link href="https://fonts.googleapis.com/css2?family=Rethink+Sans:ital,wght@0,400..800;1,400..800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Rethink Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Utama Store (Beta Version)</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/myorders">My Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/addresses">Manage Addreses</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- @php
        dd($address);
    @endphp --}}

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <table id="brandTable" class="table table-striped table-hover">
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
                                    @if ($item->is_primary_address === '0')
                                        <form action="/addresses/updateMainAddress/{{ $item->address_id }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <button 
                                                type="submit" 
                                                class="btn btn-sm btn-success"
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
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Product Catalog -->
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-12">
                <h4 class="mb-5">Manage Addreses - {{ Auth::user()->full_name }}</h4>
                <form 
                    class="d-flex flex-column gap-4" 
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
                        <select name="province" id="province" class="form-control">
                            <option value="" disabled selected>Pilih Provinsi</option>
                            <option value="Aceh">
                                Aceh
                            </option>
                            <option value="Bali">
                                Bali
                            </option>
                            <option value="Banten">
                                Banten
                            </option>
                            <option value="Bengkulu">
                                Bengkulu
                            </option>
                            <option value="Gorontalo">
                                Gorontalo
                            </option>
                            <option value="Jakarta">
                                Jakarta
                            </option>
                            <option value="Jambi">
                                Jambi
                            </option>
                            <option value="Jawa Barat">
                                Jawa Barat
                            </option>
                            <option value="Jawa Tengah">
                                Jawa Tengah
                            </option>
                            <option value="Jawa Timur">
                                Jawa Timur
                            </option>
                            <option value="Kalimantan Barat">
                                Kalimantan Barat
                            </option>
                            <option value="Kalimantan Selatan">
                                Kalimantan Selatan
                            </option>
                            <option value="Kalimantan Tengah">
                                Kalimantan Tengah
                            </option>
                            <option value="Kalimantan Timur">
                                Kalimantan Timur
                            </option>
                            <option value="Kalimantan Utara">
                                Kalimantan Utara
                            </option>
                            <option value="Kepulauan Riau">
                                Kepulauan Riau
                            </option>
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
                    <div class="form-group">
                        <label for="full_address">Full Address</label>
                        <textarea name="full_address" cols="30" rows="5" class="form-control" id="full_address"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="address_note">Address Note</label>
                        <textarea name="address_note" cols="30" rows="5" class="form-control" id="address_note"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#brandTable').DataTable({
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
</body>

</html>