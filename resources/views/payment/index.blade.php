@extends('layouts.admin')

@section('title', 'Halaman Payment')

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
                                <h4 class="mb-sm-0 font-size-18">Halaman Data Payment</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Payment</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Atur Data Paymment</h4>
                                    <p class="card-title-desc">
                                        Ayo atur data payment disini untuk memudahkan penjualan anda.
                                    </p>
                                </div>
                                <div class="card-body">
                                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Order</th>
                                            <th>Customer</th>
                                            <th>Metode Pembayaran</th>
                                            <th>Tanggal Pembayaran</th>
                                            <th>Status Pembayaran Saat Ini</th>
                                            <th>Total Pembayaran</th>
                                            <th>Update Status Pembayaran</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                                @foreach ($payments as $item)
                                                      <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->order->order_id }}</td>
                                                            <td>{{ $item->order->user->full_name ?? '-' }}</td>
                                                            <td>
                                                                  @if ($item->payment_method === 'credit_card')
                                                                        <h6>Credit Card</h6>
                                                                  @elseif($item->payment_method === 'bank_transfer')                                                                        
                                                                        <h6>Bank Transfer</h6>
                                                                  @else                                                                        
                                                                        <h6>Cash On Delivery</h6>
                                                                  @endif
                                                            </td>
                                                            <td>
                                                                {{ \Carbon\Carbon::parse($item->payment_date)->format('d-m-Y') }}
                                                            </td>
                                                            <td>
                                                                @if ($item->payment_status === 'pending')

                                                                    <button type="button" class="btn btn-primary waves-effect waves-light w-lg">Pending</button>
                                                                      
                                                                @elseif ($item->payment_status === 'paid')
                                                                      
                                                                    <button type="button" class="btn btn-success waves-effect waves-light w-lg">Paid</button>

                                                                @else

                                                                    <button type="button" class="btn btn-danger waves-effect waves-light w-lg">Cancelled</button>
                                                                      
                                                                @endif
                                                            </td>
                                                            <td>
                                                                {{$item->total_price_payment}}
                                                            </td>
                                                            <td>
                                                                <form method="POST" action="/paymentAdmin/update/{{ $item->payment_id }}" class="row gx-3 gy-2 align-items-center mb-4 mb-lg-0">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="col-8">
                                                                        <select class="form-select" name="payment_status">
                                                                            <option value="pending" {{ $item->payment_status === 'pending' ? 'selected' : '' }}>
                                                                                Pending
                                                                            </option>
                                                                            <option value="paid" {{ $item->payment_status === 'paid' ? 'selected' : '' }}>
                                                                                Paid
                                                                            </option>
                                                                            <option value="cancelled" {{ $item->payment_status === 'cancelled' ? 'selected' : '' }}>
                                                                                Cancelled
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <button type="submit" class="btn btn-primary">Update Status Pembayaran</button>
                                                                    </div>
                                                                </form>                                                                  
                                                            </td>
                                                      </tr>
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