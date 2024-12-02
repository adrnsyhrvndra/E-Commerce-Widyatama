<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom Local Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rethink+Sans:ital,wght@0,400..800;1,400..800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Rethink Sans', sans-serif;
        }
    </style>
    <title>E-Commerce Widyatama</title>
</head>

<body style="padding-bottom: 100px">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 w-full"
                style="background-image: url('https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                <div class="text-center">
                    <h4 class="text-white text-center fs-1" style="padding-top: 130px; padding-bottom: 130px;">Klinik
                        Pasien</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 90px">
        <div class="row">
            <div class="col-10">
                <h4>Data Product</h4>
            </div>
            <div class="col-2">
                <a href="/product/create" class="btn btn-primary">Tambah Product</a>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Brand Name</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Stok Barang</th>
                            <th scope="col">Gambar Produk</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $index => $item)
                            <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                          {{ $item->categories->category_name }}
                                    </td>
                                    <td>
                                          {{ $item->brands->brand_name }}
                                    </td>
                                    <td>
                                          {{ $item->product_name }}
                                    </td>
                                    <td>
                                          {{ $item->description }}
                                    </td>
                                    <td>
                                          {{ $item->price }}
                                    </td>
                                    <td>
                                          {{ $item->stock }}
                                    </td>
                                    <td>
                                          {{ $item->product_image }}
                                    </td>
                                    <td>
                                          <a href="/product/edit/{{ $item->product_id }}" class="btn btn-success">
                                                Edit
                                          </a>
                                          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus{{ $item->category_id }}">
                                                Hapus
                                          </button>
                                          <div class="modal fade" id="modalHapus{{ $item->product_id }}" tabindex="-1"
                                          aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                                <div class="modal-content">
                                                      <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                      </div>
                                                      <div class="modal-body">
                                                      Apakah anda yakin ingin menghapus data ini?
                                                      </div>
                                                      <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                                  Tidak
                                                            </button>
                                                            <form action="/product/destroy/{{ $item->product_id }}" method="post">
                                                                  @csrf
                                                                  @method('delete')
                                                                  <button type="submit" class="btn btn-danger">
                                                                        Ya
                                                                  </button>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</body>
</html>
