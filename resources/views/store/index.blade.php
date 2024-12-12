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
            <a class="navbar-brand" href="/">
                <img width="80" class="mb-4" src="{{ asset('storage/gambarStorage/WHITE_PNG.png') }}" alt="">
            </a>
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
                        <a class="nav-link" href="/addresses">Manage Addreses</a>
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

    <!-- Product Catalog -->
    <div class="container mt-5">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                            <img src="data:image/jpeg;base64,{{ base64_encode($product->product_image) }}" alt="Product Image" class="card-img-top" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->product_name }}</h5>
                            <div class="d-flex flex-row justify-content-start align-items-center gap-1">
                                  <img src="data:image/jpeg;base64,{{ base64_encode($product->brands->brand_logo) }}" class="rounded-circle" width="15" alt="">
                                  <h6 class="card-subtitle text-muted">{{ $product->brands->brand_name }}</h6>
                            </div>
                            <h6 class="card-subtitle mt-2 text-muted">{{ $product->categories->category_name }}</h6>
                            <p class="card-text">{{ Str::limit($product->description, 80) }}</p>
                            <p class="card-text text-success">Price: Rp{{ number_format($product->price, 2) }}</p>
                            <p class="card-text text-primary">Stock: {{ $product->stock }}</p>
                            <form action="/order/store" method="POST">
                                @csrf

                                @if ($order != null)
                                    <input type="hidden" name="order_id" value="{{ $order->order_id }}">
                                @endif

                                <input type="hidden" name="user_id" value="{{ Auth::user()->user_id }}">
                                <input type="hidden" name="address_id" value="{{ $addresses->address_id }}">
                                <input type="hidden" name="order_status" value="pending">
                                <input type="hidden" name="total_price" value="{{ $product->price }}">
                                <input type="hidden" name="order_date" value="{{ date('Y-m-d') }}">
                                <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                <input type="hidden" name="price" value="{{ $product->price }}">
                                <div class="d-flex flex-row justify-content-start align-items-center gap-2">
                                    <input type="number" name="quantity" class="form-control w-25" value="1" min="1" max="{{ $product->stock }}">
                                    <button type="submit" class="btn btn-primary">Order Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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