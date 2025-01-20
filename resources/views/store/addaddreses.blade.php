@extends('layouts.store')

@section('title', 'Halaman Pengaturan Alamat')

@section('content')

    <style>
        #addressesTable {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
            font-size: 14px;
            color: #333;
            margin-top: 20px;
        }

        #addressesTable thead {
            background-color: #2C2F6A;
            color: white;
            text-transform: uppercase;
            font-weight: bold;
        }

        #addressesTable thead th {
            padding: 12px;
            text-align: left;
            border-bottom: 2px solid #ddd;
            font-size: 12px;
        }

        #addressesTable tbody tr {
            border-bottom: 1px solid #ddd;
            transition: background-color 0.3s ease;
        }

        #addressesTable tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #addressesTable tbody tr:hover {
            background-color: #dedede;
        }

        #addressesTable td, #addressesTable th {
            padding: 10px 15px;
            text-align: left;
            vertical-align: middle;
        }

        .text-success {
            color: #28a745;
            font-weight: bold;
        }

        .text-danger {
            color: #dc3545;
            font-weight: bold;
        }

        .btn {
            font-size: 12px;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-success {
            background-color: #4CAF50;
            color: white;
        }

        .btn-success:hover {
            background-color: #45a049;
        }

        .btn-danger {
            background-color: #f44336;
            color: white;
        }

        .btn-danger:hover {
            background-color: #e53935;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .modal-content {
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #ddd;
        }

        .modal-title {
            font-size: 18px;
            font-weight: bold;
        }

        .modal-footer button {
            font-size: 14px;
        }
    </style>

    <div class="boxed_wrapper">
        <section class="shop-page-section shop-page-1">
            <div class="auto-container">
                <div class="row mt-5">
                    <div class="col-12">
                        <h4>Tambah Alamat</h4>
                    </div>
                    <div class="col-12 mt-4">
                        <form
                            style="
                                display: grid;
                                grid-template-columns: repeat(2, 1fr);
                                column-gap: 20px;
                                row-gap: 15px;
                            "
                            action="{{'/addresses/store'}}"
                            method="POST"
                            enctype="multipart/form-data"
                        >
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->user_id }}">

                            <div class="form-group">
                                <label for="address_label">Address Label</label>
                                <input
                                    type="text"
                                    name="address_label"
                                    class="form-control"
                                    id="address_label"
                                    required
                                />
                            </div>

                            <div class="form-group">
                                <label for="receipt_name">Receipt Name</label>
                                <input
                                    type="text"
                                    name="receipt_name"
                                    class="form-control"
                                    id="receipt_name"
                                    required
                                />
                            </div>

                            <div class="form-group">
                                <label for="province">Province</label>
                                <select name="province" id="province" class="form-control w-100">
                                    <option value="" disabled selected>Pilih Provinsi</option>
                                    <option value="Aceh">Aceh</option>
                                    <option value="Bali">Bali</option>
                                    <option value="Banten">Banten</option>
                                    <option value="Bengkulu">Bengkulu</option>
                                    <option value="Gorontalo">Gorontalo</option>
                                    <option value="Jakarta">Jakarta</option>
                                    <option value="Jambi">Jambi</option>
                                    <option value="Jawa Barat">Jawa Barat</option>
                                    <option value="Jawa Tengah">Jawa Tengah</option>
                                    <option value="Jawa Timur">Jawa Timur</option>
                                    <option value="Kalimantan Barat">Kalimantan Barat</option>
                                    <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                                    <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                                    <option value="Kalimantan Timur">Kalimantan Timur</option>
                                    <option value="Kalimantan Utara">Kalimantan Utara</option>
                                    <option value="Kepulauan Riau">Kepulauan Riau</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="city_or_regency">City or Regency</label>
                                <input
                                    type="text"
                                    name="city_or_regency"
                                    class="form-control"
                                    id="city_or_regency"
                                    required
                                />
                            </div>

                            <div class="form-group">
                                <label for="district">District</label>
                                <input
                                    type="text"
                                    name="district"
                                    class="form-control"
                                    id="district"
                                    required
                                />
                            </div>

                            <div class="form-group">
                                <label for="postal_code">Postal Code</label>
                                <input
                                    type="text"
                                    name="postal_code"
                                    class="form-control"
                                    id="postal_code"
                                    required
                                />
                            </div>

                            <div class="form-group" style="grid-column: span 2;">
                                <label for="full_address">Full Address</label>
                                <textarea name="full_address" cols="30" rows="5" class="form-control" id="full_address"></textarea>
                            </div>

                            <div class="form-group" style="grid-column: span 2;">
                                <label for="address_note">Address Note</label>
                                <textarea name="address_note" cols="30" rows="5" class="form-control" id="address_note"></textarea>
                            </div>

                            <button
                                type="submit"
                                class="btn btn-primary mt-3 py-3"
                                style="font-size: 17px; grid-column: span 2;"
                            >
                                Simpan
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#addressesTable').DataTable({
                "language": {
                    "lengthMenu": "Tampilkan _MENU_ data per halaman",
                    "zeroRecords": "Data tidak ditemukan",
                    "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                    "infoEmpty": "Tidak ada data yang tersedia",
                    "infoFiltered": "(disaring dari _MAX_ total data)",
                    "search": "Cari:",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": "Berikutnya",
                        "previous": "Sebelumnya"
                    }
                }
            });
        });
    </script>
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

@endsection