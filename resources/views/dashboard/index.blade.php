<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f9;
            font-family: 'Arial', sans-serif;
        }

        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #e0e0e0;
            padding: 10px 20px;
        }

        .navbar-brand {
            color: #333;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .navbar-nav .nav-link {
            color: #666;
        }

        .navbar-nav .nav-link:hover {
            color: #333;
        }

        .profile-container {
            display: flex;
            align-items: center;
            padding: 5px 15px;
            border-radius: 20px;
            background-color: #f9f9f9;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }

        .profile-text {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .profile-text span {
            font-size: 0.9rem;
            font-weight: 600;
            color: #333;
        }

        .profile-text small {
            font-size: 0.75rem;
            color: #666;
        }

        .card {
            border: none;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .card-title {
            font-weight: bold;
        }

        .card-text {
            color: #555;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">Dashboard</a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <div class="profile-container">
                        <img src="data:image/jpeg;base64,{{ base64_encode(Auth::user()->profile_picture) }}" alt="Profile" class="profile-img">
                        <div class="profile-text">
                            <span>{{ Auth::user()->full_name }}</span>
                            <small>{{ ucfirst(Auth::user()->role) }}</small>
                        </div>
                        <div class="dropdown ms-3">
                            <a class="dropdown-toggle nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                        @csrf
                                        <button class="dropdown-item text-danger" type="submit">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Welcome, {{ Auth::user()->full_name }}</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow-sm text-center">
                    <div class="card-body">
                        <h5 class="card-title">Manage Brands</h5>
                        <p class="card-text">Pantau dan kelola semua brand produk.</p>
                        <a href="/brand" class="btn btn-primary w-100">Go to Brand</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm text-center">
                    <div class="card-body">
                        <h5 class="card-title">Manage Category</h5>
                        <p class="card-text">Pantau dan kelola semua kategori produk.</p>
                        <a href="/categorie" class="btn btn-primary w-100">Go to Category</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm text-center">
                    <div class="card-body">
                        <h5 class="card-title">Manage Product</h5>
                        <p class="card-text">Pantau dan kelola semua produk.</p>
                        <a href="/product" class="btn btn-primary w-100">Go to Product</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
