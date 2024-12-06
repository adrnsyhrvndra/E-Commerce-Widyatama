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

    <!-- Product Catalog -->
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-12">
                <h4 class="mb-5">Manage Addreses - {{ Auth::user()->full_name }}</h4>
                <form 
                    class="d-flex flex-column gap-4" 
                    action="{{ isset($address) ? '/addresses/update/' . $address->address_id : '/addresses/store' }}"
                    method="POST" 
                    enctype="multipart/form-data"
                >
                    @csrf
                    @if(isset($address))
                        @method('PUT')
                    @endif
                    <input type="hidden" name="user_id" value="{{ Auth::user()->user_id }}">
                    <div class="form-group">
                        <label for="address_label">Address Label</label>
                        <input 
                            type="text" 
                            name="address_label" 
                            class="form-control" 
                            id="address_label" 
                            value="{{ old('address_label', $address->address_label ?? '') }}" 
                        />
                    </div>
                    <div class="form-group">
                        <label for="receipt_name">Receipt Name</label>
                        <input 
                            type="text" 
                            name="receipt_name" 
                            class="form-control" 
                            id="receipt_name"
                            value="{{ old('receipt_name', $address->receipt_name ?? '') }}" 
                        />
                    </div>
                    <div class="form-group">
                        <label for="province">Province</label>
                        <select name="province" id="province" class="form-control">
                            <option value="" disabled selected>Pilih Provinsi</option>
                            <option value="Aceh" {{ (isset($address) && $address->province == 'Aceh') ? 'selected' : '' }}>
                                Aceh
                            </option>
                            <option value="Bali" {{ (isset($address) && $address->province == 'Bali') ? 'selected' : '' }}>
                                Bali
                            </option>
                            <option value="Banten" {{ (isset($address) && $address->province == 'Banten') ? 'selected' : '' }}>
                                Banten
                            </option>
                            <option value="Bengkulu" {{ (isset($address) && $address->province == 'Bengkulu') ? 'selected' : '' }}>
                                Bengkulu
                            </option>
                            <option value="Gorontalo" {{ (isset($address) && $address->province == 'Gorontalo') ? 'selected' : '' }}>
                                Gorontalo
                            </option>
                            <option value="Jakarta" {{ (isset($address) && $address->province == 'Jakarta') ? 'selected' : '' }}>
                                Jakarta
                            </option>
                            <option value="Jambi" {{ (isset($address) && $address->province == 'Jambi') ? 'selected' : '' }}>
                                Jambi
                            </option>
                            <option value="Jawa Barat" {{ (isset($address) && $address->province == 'Jawa Barat') ? 'selected' : '' }}>
                                Jawa Barat
                            </option>
                            <option value="Jawa Tengah" {{ (isset($address) && $address->province == 'Jawa Tengah') ? 'selected' : '' }}>
                                Jawa Tengah
                            </option>
                            <option value="Jawa Timur" {{ (isset($address) && $address->province == 'Jawa Timur') ? 'selected' : '' }}>
                                Jawa Timur
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
                            value="{{ old('city_or_regency', $address->city_or_regency ?? '') }}"
                        />
                    </div>
                    <div class="form-group">
                        <label for="district">District</label>
                        <input 
                            type="text" 
                            name="district" 
                            class="form-control" 
                            id="district"
                            value="{{ old('district', $address->district ?? '') }}"
                        />
                    </div>
                    <div class="form-group">
                        <label for="postal_code">Postal Code</label>
                        <input 
                            type="text" 
                            name="postal_code" 
                            class="form-control" 
                            id="postal_code" 
                            value="{{ old('postal_code', $address->postal_code ?? '') }}"
                        />
                    </div>
                    <div class="form-group">
                        <label for="full_address">Full Address</label>
                        <textarea name="full_address" cols="30" rows="5" class="form-control" id="full_address">{{ old('full_address', $address->full_address ?? '') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="address_note">Address Note</label>
                        <textarea name="address_note" cols="30" rows="5" class="form-control" id="address_note">{{ old('address_note', $address->address_note ?? '') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>