<!DOCTYPE html>
<html>
<head>
    <title>Daftar Fakultas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="{{ asset('assets/jquery.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</head>
<body style="width:95%">
    <div class="row justify-content-center" style="margin-top:13%">
        <div class="col-4">
            <span class="float-left">{{ session('msg') }}</span>
            <a href="/users/create" class="btn btn-secondary float-right">Tambah</a>
            <br><br>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $d)
                    <tr>
                        <td>{{ $d->username }}</td>
                        <td>{{ $d->nama_lengkap }}</td>
                        <td>
                            <a href="/users/edit/{{ $d->id }}" class="btn btn-primary">Edit</a>
                            <form method="post" action="/users/destroy/{{ $d->id }}" style="display:inline" onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Hapus - {{ $d->id }}</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
