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
                            <th scope="col">Select</th>
                        </tr>
                    </thead>
                    <tbody>
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
                                    <!-- Checkbox with data-price -->
                                    <input type="checkbox" class="order-checkbox" data-price="{{ $order->price * $order->quantity }}" name="order_status" value="delivered">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Total price -->
                <h5>Total price yang di select checkbox: Rp <span id="total-price">0</span></h5>
                <button class="btn btn-primary">Checkout Barang</button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Ambil semua checkbox
            const checkboxes = document.querySelectorAll('.order-checkbox');
            const totalPriceElement = document.getElementById('total-price');

            // Fungsi untuk menghitung total harga
            const calculateTotalPrice = () => {
                let totalPrice = 0;

                checkboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        // Tambahkan harga dari checkbox yang dicentang
                        totalPrice += parseFloat(checkbox.dataset.price);
                    }
                });

                // Update elemen total harga
                totalPriceElement.textContent = totalPrice.toLocaleString('id-ID');
            };

            // Tambahkan event listener ke setiap checkbox
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', calculateTotalPrice);
            });
        });
    </script>
</body>

</html>
