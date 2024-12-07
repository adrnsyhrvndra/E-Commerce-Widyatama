<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Form Tambah Brands</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- Custom Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rethink+Sans:ital,wght@0,400..800;1,400..800&display=swap" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Rethink Sans', sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 5%;
        }

        .form-section {
            margin-top: 5%;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn {
            padding: 10px 20px;
        }

        .form-control {
            border-radius: 0.375rem;
        }

        .form-section h4 {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .form-section .form-group label {
            font-weight: bold;
        }

        .form-section .col-8 {
            max-width: 700px;
        }

        /* Custom file input style */
        .custom-file-label {
            padding: 0.5rem;
            border-radius: 0.375rem;
        }

        .custom-file-input:lang(en)~.custom-file-label::after {
            content: "Pilih file";
        }
    </style>

</head>

<body>
    <!-- Main container for the form -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="form-section">
                    <h4>Form Tambah Brands</h4>
                    <form action="/brand/store" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="brand_name">Brand Name</label>
                            <input type="text" name="brand_name" class="form-control" id="brand_name" required />
                        </div>
                        <div class="form-group">
                            <label for="brand_logo">Brand Logo</label>
                            <!-- Custom file input -->
                            <div class="custom-file">
                                <input type="file" name="brand_logo" class="custom-file-input" id="brand_logo" required>
                                <label class="custom-file-label" for="brand_logo">Pilih file</label>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="/brand" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script for custom file input label -->
    <script>
        // Update the file input label when a file is selected
        $('.custom-file-input').on('change', function() {
            var fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    </script>
</body>

</html>
