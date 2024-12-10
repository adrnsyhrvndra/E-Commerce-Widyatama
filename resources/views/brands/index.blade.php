<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Commerce Widyatama</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- Custom Font -->
    <link href="https://fonts.googleapis.com/css2?family=Rethink+Sans:ital,wght@0,400..800;1,400..800&display=swap" rel="stylesheet">
    
    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Rethink Sans', sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 40px;
        }
        .card {
            border-radius: 8px;
        }
        .card-header {
            background-color: #343a40;
            color: white;
            font-weight: bold;
            font-size: 1.2rem;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .card-body {
            padding: 1.5rem;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-sm {
            font-size: 0.875rem;
        }
        .modal-header {
            background-color: #dc3545;
            color: white;
        }
        .modal-body {
            font-size: 1.1rem;
        }
        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4>Kelola Brand</h4>
            <div>
                <a href="/brand/create" class="btn btn-primary">Tambah Brand</a>
                <a href="/admin" class="btn btn-danger">Kembali Ke Beranda</a>
            </div>
        </div>
        <div class="card shadow-sm">
            <div class="card-header">
                Daftar Brand
            </div>
            <div class="card-body">
                <table id="brandTable" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Brand</th>
                            <th>Logo Brand</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brand as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->brand_name }}</td>
                                <td>
                                    <img src="data:image/jpeg;base64,{{ base64_encode($item->brand_logo) }}" alt="Brand Logo" class="profile-img">
                                </td>
                                <td>
                                    <a href="/brand/edit/{{ $item->brand_id }}" class="btn btn-sm btn-success">Edit</a>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus{{ $item->brand_id }}">Hapus</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalHapus{{ $item->brand_id }}" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
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
                                                    <form action="/brand/destroy/{{ $item->brand_id }}" method="post">
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

    <!-- Scripts -->
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
