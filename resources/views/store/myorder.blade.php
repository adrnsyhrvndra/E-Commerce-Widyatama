@extends('layouts.store')

@section('title', 'Halaman Cart')

@section('content')

    <div class="boxed_wrapper">
        <section class="cart-section cart-page">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 table-column">
                        <div class="table-outer">
                            <table class="cart-table">
                                <thead class="cart-header">
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th class="prod-column">Product Name</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th class="price">Price</th>
                                        <th class="quantity">Quantity</th>
                                        <th>Subtotal</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($orderItem->count() > 0)
                                        @foreach ($orderItem as $order)
                                            <tr>
                                                <td colspan="4" class="prod-column">
                                                    <div class="column-box">
                                                        <div class="prod-thumb">
                                                            <img src="data:image/jpeg;base64,{{ base64_encode($order->product->product_image) }}" alt="">
                                                        </div>
                                                        <div class="prod-title">
                                                            {{ $order->product->product_name }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="price">
                                                    Rp {{ number_format($order->price, 0, ',', '.') }}
                                                </td>
                                                <td class="price">
                                                    {{ $order->quantity  }}
                                                </td>
                                                <td class="sub-total">
                                                    Rp {{ number_format($order->price * $order->quantity, 0, ',', '.') }}
                                                </td>
                                                <td class="sub-total">
                                                    @if($order->order->order_status == 'unpaid')
                                                        Belum Bayar
                                                    @elseif($order->order->order_status == 'packaged')
                                                        Dikemas
                                                    @elseif($order->order->order_status == 'shipped')
                                                        Dikirim
                                                    @elseif($order->order->order_status == 'completed')
                                                        Selesai
                                                    @elseif($order->order->order_status == 'cancelled')
                                                        Dibatalkan
                                                    @else
                                                        {{ $order->order->order_status }}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
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
