<!DOCTYPE html>
<html>
<head>
    <title>Form Edit User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="{{ asset('assets/jquery.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</head>
<body style="width:95%">
    <div class="row justify-content-center" style="margin-top:13%">
        <div class="col-3">
            <h4>Form Edit User</h4>
            <!-- Ubah action ke route untuk update dan gunakan method PUT -->
            <form method="post" action="/users/update/{{ $user->id }}">
                @csrf
                @method('PUT') <!-- Gunakan PUT untuk mengupdate data -->

                <div class="form-group">
                    <label>Username</label>
                    <!-- Menampilkan nilai yang ada di database -->
                    <input type="text" name="username" class="form-control" value="{{ $user->username }}" />
                </div>

                <div class="form-group">
                    <label>Password (Isi jika ingin mengubah password)</label>
                    <input type="password" name="password" class="form-control" />
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" />
                </div>

                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="full_name" class="form-control" value="{{ $user->full_name }}" />
                </div>

                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="phone_number" class="form-control" value="{{ $user->phone_number }}" />
                </div>

                <div class="form-group">
                    <label>Role</label>
                    <select class="form-control" name="role">
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="customer" {{ $user->role == 'customer' ? 'selected' : '' }}>Customer</option>
                    </select>
                </div>

                <div style="text-align:center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
