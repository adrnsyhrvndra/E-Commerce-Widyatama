@extends('layouts.admin')

@section('title', 'Halaman Order Status')

@section('content')

    <div id="layout-wrapper">
        @include('layouts.partials.headerAdmin')
        @include('layouts.partials.sidebarAdmin')
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Halaman Data Order Status</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Order Status</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Atur Data Order Status</h4>
                                    <p class="card-title-desc">
                                        Ayo atur data order status disini untuk memudahkan penjualan anda.
                                    </p>
                                </div>
                                <div class="card-body">
                                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Customer</th>
                                            <th>Produk Yang Dibeli</th>
                                            <th>Jumlah Produk Yang Dibeli</th>
                                            <th>Total Pembelian</th>
                                            <th>Status Order</th>
                                            <th>Update Status Order</th>
                                            <th>Alamat Lengkap</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                                @foreach ($order as $item)
                                                    @if ($item->order_status !== 'pending') <!-- Menyaring status pending -->
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td style="display: flex; flex-direction: row; align-items: center; justify-content: center; column-gap: 10px;">
                                                                  <img width="34" src="data:image/jpeg;base64,{{ base64_encode($item->user->profile_picture) }}" alt="Brand Logo" class="profile-img rounded-circle">
                                                                  {{ $item->user->full_name }}
                                                            </td>
                                                            <td>
                                                                  @foreach ($item->orderItems as $product)
                                                                        <ul>
                                                                              <li>
                                                                                    {{ $product->product->product_name }} = Rp{{ number_format($product->price, 2) }}
                                                                              </li>
                                                                        </ul>
                                                                  @endforeach
                                                            </td>
                                                            <td>
                                                                  @foreach ($item->orderItems as $product)
                                                                        <ul>
                                                                              <li>
                                                                                    {{ $product->quantity }}
                                                                              </li>
                                                                        </ul>
                                                                  @endforeach
                                                            </td>
                                                            <td>Rp{{ number_format($item->total_price, 2) }}</td>
                                                            <td>
                                                                  @if ($item->order_status === 'unpaid')
                                                                        <button type="button" class="btn btn-danger waves-effect waves-light w-lg">Belum Bayar</button>
                                                                  @elseif ($item->order_status === 'packaged')
                                                                        <button type="button" class="btn btn-primary waves-effect waves-light w-lg">Dikemas</button>
                                                                  @elseif ($item->order_status === 'shipped')
                                                                        <button type="button" class="btn btn-success waves-effect waves-light w-lg">Dikirim</button>
                                                                  @elseif ($item->order_status === 'completed')
                                                                        <button type="button" class="btn btn-success waves-effect waves-light w-lg">Selesai</button>
                                                                  @else
                                                                        <button type="button" class="btn btn-danger waves-effect waves-light w-lg">Dibatalkan</button>
                                                                  @endif
                                                            </td>
                                                            <td>
                                                                  <form method="POST" action="/orderAdmin/update/{{ $item->order_id }}" class="row gx-3 gy-2 align-items-center mb-4 mb-lg-0">
                                                                        @csrf
                                                                        @method('put')
                                                                        <div class="col-8">
                                                                              <select class="form-select" name="order_status">
                                                                                    <option value="unpaid" {{ $item->order_status === 'unpaid' ? 'selected' : '' }}>Belum Bayar</option>
                                                                                    <option value="packaged" {{ $item->order_status === 'packaged' ? 'selected' : '' }}>Dikemas</option>
                                                                                    <option value="shipped" {{ $item->order_status === 'shipped' ? 'selected' : '' }}>Dikirim</option>
                                                                                    <option value="completed" {{ $item->order_status === 'completed' ? 'selected' : '' }}>Selesai</option>
                                                                                    <option value="cancelled" {{ $item->order_status === 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
                                                                              </select>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                              <button type="submit" class="btn btn-primary">Update Status Order</button>
                                                                        </div>
                                                                  </form>
                                                            </td>
                                                            <td>
                                                                  {{ $item->address->full_address }}
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.partials.footerAdmin')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
