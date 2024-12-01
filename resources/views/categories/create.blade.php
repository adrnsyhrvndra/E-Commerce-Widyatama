<!DOCTYPE html>
<html>
<head>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
      <!-- Custom Local Font -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Rethink+Sans:ital,wght@0,400..800;1,400..800&display=swap" rel="stylesheet">
      <style>
            body {
                  font-family: 'Rethink Sans', sans-serif;
            }
      </style>
      <title>Form Tambah Categorie</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
      <script src="{{ asset('assets/jquery.js') }}"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</head>
<body style="padding-bottom: 100px">
      <div class="container-fluid">
            <div class="row">
                <div class="col-12 w-full" style="background-image: url('https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                    <div class="text-center">
                        <h4 class="text-white text-center fs-1" style="padding-top: 130px; padding-bottom: 130px;">Tambah Data Category</h4>
                    </div>
                </div>
            </div>
      </div>
      <div class="container-fluid">
            <div class="row justify-content-center" style="margin-top:13%">
                  <div class="col-8">
                        <h4>Form Tambah Category</h4>
                        <form action="/categorie/store" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group">
                                    <label for="category_name">Category Name</label>
                                    <input type="text" name="category_name" class="form-control" id="category_name" />
                              </div>
                              <div style="text-align:center">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <a href="/categorie" class="btn btn-danger">Kembali</a>
                              </div>
                        </form>
                  </div>
            </div>
      </div>
</body>
</html>
