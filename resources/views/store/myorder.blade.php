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

        img.profile-img {
            width: 50px;
            height: 50px;
            object-fit: cover;
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
                        <a class="nav-link" href="/addresses">Manage Addresses</a>
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
            <div class="col-md-12">
                <h2>My Orders</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Image</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if ($orderItem->count() > 0)
                            @foreach ($orderItem as $order)
                                <tr>
                                    <td>{{ $order->order_item_id }}</td>
                                    <td>{{ $order->product->product_name }}</td>
                                    <td>
                                        <img src="data:image/jpeg;base64,{{ base64_encode($order->product->product_image) }}" alt="Brand Logo" class="profile-img">
                                    </td>
                                    <td>{{ $order->price }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>{{ $order->price * $order->quantity }}</td>
                                    <td>{{ $order->order->order_status }}</td>
                                    <td>
                                        <form action="/order/delete/{{ $order->order_item_id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus Pesanan</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8">Tidak ada pesanan</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <!-- Total price -->
                <h5>
                    Total price Rp
                    @if ($orderItem->count() > 0)
                        {{ $order->order->total_price }}
                    @else
                        0
                    @endif
                </h5>
                <form action="/payment/store" method="POST">
                    @csrf

                    @if ($orderItem->count() > 0)
                        <input type="hidden" name="order_id" value={{$order->order->order_id}}>
                    @endif
                    
                    <input type="hidden" name="total_price_payment" id="hidden-total-price" value="{{ $orderItem->count() > 0 ? $order->order->total_price : '' }}">
                    <button class="btn btn-primary">Checkout Barang</button>
                </form>
            </div>
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