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
      <title>Form Tambah Produk</title>
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
                        <h4>Form Tambah Product</h4>
                        <form action="/product/store" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group">
                                    <label for="category_id">Category Name</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                          @foreach ($categories as $category)
                                                <option value="{{           $category->category_id }}">
                                                      {{ $category->category_name }}
                                                </option>
                                          @endforeach
                                    </select>
                              </div>
                              <div class="form-group">
                                    <label for="brand_id">Brand Name</label>
                                    <select name="brand_id" id="brand_id" class="form-control">
                                          @foreach ($brands as $brand)
                                                <option value="{{ $brand->brand_id }}">
                                                      {{ $brand->brand_name }}
                                                </option>
                                          @endforeach
                                    </select>
                              </div>
                              <div class="form-group">
                                    <label for="product_name">Product Name</label>
                                    <input type="text" name="product_name" class="form-control" id="product_name" />
                              </div>
                              <div class="form-group">
                                    <label for="description	">Description</label>
                                    <textarea name="description" id="description" cols="30" rows="10"></textarea>
                              </div>
                              <div class="form-group">
                                    <label for="price	">Price</label>
                                    <input type="number" name="price" id="price" class="form-control">
                              </div>
                              <div class="form-group">
                                    <label for="stock	">Stock</label>
                                    <input type="number" name="stock" id="stock" class="form-control">
                              </div>
                              <div class="form-group">
                                    <label for="product_image">Product Image</label>
                                    <input type="file" name="product_image" class="form-control" id="product_image">
                              </div>
                              <div style="text-align:center">
                                    <button type="submit" class="btn btn-success">
                                          Simpan
                                    </button>
                                    <a href="/product" class="btn btn-danger">
                                          Kembali
                                    </a>
                              </div>
                        </form>
                  </div>
            </div>
      </div>
</body>
</html>
