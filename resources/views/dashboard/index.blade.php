<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
      <div class="container my-5">
            <h2 class="text-center mb-4">Admin Dashboard</h2>
            <div class="row">
                  <div class="col-md-4">
                        <div class="card shadow-sm">
                              <div class="card-body text-center">
                                    <h5 class="card-title">Manage Brands</h5>
                                    <p class="card-text">Pantau dan kelola semua brand produk.</p>
                                    <a href="/brand" class="btn btn-primary w-100">Go to Brand</a>
                              </div>
                        </div>
                  </div>
                  <div class="col-md-4">
                        <div class="card shadow-sm">
                              <div class="card-body text-center">
                                    <h5 class="card-title">Manage Category</h5>
                                    <p class="card-text">Pantau dan kelola semua kategori produk.</p>
                                    <a href="/categorie" class="btn btn-primary w-100">Go to Category</a>
                              </div>
                        </div>
                  </div>
                  <div class="col-md-4">
                        <div class="card shadow-sm">
                              <div class="card-body text-center">
                                    <h5 class="card-title">Manage Product</h5>
                                    <p class="card-text">Pantau dan kelola semua produk.</p>
                                    <a href="/product" class="btn btn-primary w-100">Go to Product</a>
                              </div>
                        </div>
                  </div>
            </div>
            <div class="row mt-4 justify-content-center">
                  <div class="col-6">
                        <form method="POST" action="{{ route('logout') }}">
                              @csrf
                              <button class="text-center btn btn-danger w-100 py-2" type="submit">Logout</button>
                        </form>
                  </div>
            </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
