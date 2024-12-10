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

    <!-- Custom Local Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Rethink+Sans:ital,wght@0,400..800;1,400..800&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Rethink Sans', sans-serif;
        }
        .product-img {
            width: 80px;
            height: 80px;
            border-radius: 10%;
            object-fit: cover;
            margin-right: 10px;
        }
    </style>
</head>

<body class="bg-light">

    <!-- Content Section -->
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4>Kelola Produk</h4>
            <div>
                <a href="/product/create" class="btn btn-primary">Tambah Produk</a>
                <a href="/admin" class="btn btn-danger">Kembali Ke Beranda</a>
            </div>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <table id="productTable" class="table table-striped table-hover">
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
                                <td>{{ $item->brands->brand_name }}</td>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->stock }}</td>
                                <td>
                                    <img src="data:image/jpeg;base64,{{ base64_encode($item->product_image) }}" alt="Brand Logo" class="product-img">
                                </td>
                                <td>
                                    <a href="/product/edit/{{ $item->product_id }}"
                                        class="btn btn-sm btn-success">Edit</a>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalHapus{{ $item->product_id }}">
                                        Hapus
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalHapus{{ $item->product_id }}" tabindex="-1"
                                        aria-labelledby="modalHapusLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus data ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tidak</button>
                                                    <form action="/product/destroy/{{ $item->product_id }}"
                                                        method="post">
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
        $(document).ready(function() {
            $('#productTable').DataTable();
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
