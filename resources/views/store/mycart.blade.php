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
                                                        <form action="/order/delete/{{ $order->order_item_id }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit">
                                                                <div class="remove-btn">
                                                                    <i class="flaticon-close"></i>
                                                                </div>
                                                            </button>
                                                        </form>
                                                        <div class="prod-thumb">
                                                            <img src="data:image/jpeg;base64,{{ base64_encode($order->product->product_image) }}" alt="">
                                                        </div>
                                                        <div class="prod-title">
                                                            {{ $order->product->product_name }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="price">
                                                    Rp{{ number_format($order->price, 0, ',', '.') }}
                                                </td>
                                                <td class="price">
                                                    {{ $order->quantity  }}
                                                </td>
                                                <td class="sub-total">
                                                    Rp{{ number_format($order->price * $order->quantity, 0, ',', '.') }}
                                                </td>
                                                <td class="sub-total">
                                                    {{ $order->order->order_status }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="cart-total mt-5">
                    <div class="row">
                        <div class="col-xl-5 col-lg-12 col-md-12 offset-xl-7 cart-column">
                            <div class="total-cart-box clearfix">
                                <h4>Cart Totals</h4>
                                <ul class="list clearfix">
                                    @if ($orderItem->count() > 0)
                                        <li>
                                            Rp{{ number_format($order->order->total_price, 0, ',', '.') }}
                                        </li>
                                    @endif
                                </ul>
                                <form action="/payment/store" method="POST">
                                    @csrf
                                    @if ($orderItem->count() > 0)
                                        <input type="hidden" name="order_id" value="{{ $order->order->order_id }}">
                                    @endif
                                    <input type="hidden" name="total_price_payment" id="hidden-total-price" value="{{ $orderItem->count() > 0 ? $order->order->total_price : '' }}">
                                    <button style="width: 100%; display:block;" class="theme-btn-two">Checkout Barang<i class="flaticon-right-1"></i></button>
                                </form>
                            </div>
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
