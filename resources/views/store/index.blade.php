@extends('layouts.store')

@section('title', 'Halaman Beranda')

@section('content')

    <div class="boxed_wrapper">
        <!-- main header -->
        <!-- shop-page-section -->
        <section class="shop-page-section shop-page-1">
            <div class="auto-container">
                <div class="our-shop">
                    <div class="row clearfix">
                        @foreach ($products as $product)
                            <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                                <div class="shop-block-one">
                                    <div class="inner-box">
                                        <figure class="image-box">
                                            <img src="data:image/jpeg;base64,{{ base64_encode($product->product_image) }}" alt="Product Image" class="product-img">
                                            <form action="/order/store" method="POST">
                                                @csrf
                                                @if ($order != null)
                                                    <input type="hidden" name="order_id" value="{{ $order->order_id }}">
                                                @endif
                                                <input type="hidden" name="user_id" value="{{ Auth::user()->user_id }}">
                                                @if ($addresses != null)
                                                    <input type="hidden" name="address_id" value="{{ $addresses->address_id }}">
                                                @endif
                                                <input type="hidden" name="order_status" value="pending">
                                                <input type="hidden" name="total_price" value="{{ $product->price }}">
                                                <input type="hidden" name="order_date" value="{{ date('Y-m-d') }}">
                                                <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                                <input type="hidden" name="price" value="{{ $product->price }}">

                                                @if ($addresses != null)
                                                    <ul class="info-list clearfix" style="text-align: center; background-color:#474B8E; color:white; border-radius: 5px; font-size: 8px; flex: 1 1 0%; flex-direction: column; padding:7px; gap: 1rem;">
                                                        <input type="number" name="quantity" class="form-control" value="1" min="1" max="{{ $product->stock }}">
                                                        <button type="submit" style="margin-top:10px; width: 100%; background-color:white; color:#474B8E; padding-left:12px; padding-right:12px; border-radius:4px; padding-top:4px; padding-bottom:4px;">
                                                            Add to cart
                                                        </button>
                                                    </ul>
                                                @else
                                                    <ul class="info-list clearfix" style="text-align: center; background-color:#474B8E; color:white; border-radius: 6px; font-size: 16px;">
                                                        <li>Tambah Alamatmu terlebih dahulu untuk order</li>
                                                    </ul>
                                                @endif
                                            </form>
                                        </figure>
                                        <div class="lower-content">
                                            <a>
                                                {{ $product->product_name }}
                                            </a>
                                            <div style="flex: 1; flex-direction: row; align-items: center; justify-content: center">
                                                <img src="data:image/jpeg;base64,{{ base64_encode($product->brands->brand_logo) }}" class="rounded-circle" width="15" alt="">
                                                <a>
                                                    {{ $product->brands->brand_name }}
                                                </a>
                                            </div>
                                            <div style="margin-top:6px; padding-top: 4px; padding-bottom: 4px; padding-left: 16px; padding-right: 16px; background-color: #373B85; color:white; width:fit-content; border-radius: 150px">
                                                {{ $product->categories->category_name }}
                                            </div>
                                            <span class="price" style="font-size: 24px; color:#373B85; margin-top:20px; font-weight: bold;">
                                                Rp{{ number_format($product->price, 2) }}
                                            </span>
                                            <p style="margin-top:10px;">Stock: {{ $product->stock }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="pagination-wrapper centred">
                    <ul class="pagination clearfix">
                        <li><a href="/">Prev</a></li>
                        <li>{{ $products->links() }}</li>
                        <li><a href="/">Next</a></li>
                    </ul>
                </div>
            </div>
        </section>

    </div>
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