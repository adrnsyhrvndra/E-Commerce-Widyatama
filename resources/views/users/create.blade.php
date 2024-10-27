<!DOCTYPE html>
<html>
<head>
    <title>Form Tambah User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="{{ asset('assets/jquery.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</head>
<body style="width:95%">
    <div class="row justify-content-center" style="margin-top:13%">
        <div class="col-3">
            <h4>Form Tambah User</h4>
            <form method="post" action="/users/store">
                @csrf
                <div class="form-group">
                    <label>username</label>
                    <input type="text" name="username" class="form-control" />
                </div>
                <div class="form-group">
                    <label>password</label>
                    <input type="password" name="password" class="form-control" />
                </div>
                <div class="form-group">
                    <label>email</label>
                    <input type="email" name="email" class="form-control" />
                </div>
                <div class="form-group">
                    <label>full_name</label>
                    <input type="full_name" name="full_name" class="form-control" />
                </div>
                <div class="form-group">
                    <label>phone_number</label>
                    <input type="phone_number" name="phone_number" class="form-control" />
                </div>
                <div class="form-group">
                    <label>role</label>
                    <select class="form-control" name="role">
                        <option value="admin">Admin</option>
                        <option value="customer">Customer</option>
                    </select>
                </div>
                <div style="text-align:center">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
