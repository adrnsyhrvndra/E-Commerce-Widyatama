@extends('layouts.store')

@section('title', 'Halaman Beranda')

@section('content')

    <div class="boxed_wrapper">
        <!-- main header -->
        <header class="main-header">
            <div class="header-lower">
                <div class="auto-container">
                    <div class="outer-box">
                        <figure class="logo-box"><a href="index.html"><img width="110" src="images/LOGO_TOKO_UTAMA_COLORED.png" alt=""></a></figure>
                        <div class="menu-area">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler">
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                            </div>
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <li class="current">
                                            <a href="/">All Products</a>
                                        </li>
                                        <li>
                                            <a href="/addresses">Manage Addreses</a>
                                        </li>    
                                        <li>
                                            
                                        </li>    
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <ul class="menu-right-content clearfix">
                            <li class="shop-cart">
                                <a href="/myorders"><i class="flaticon-shopping-cart-1"></i><span>3</span></a>
                            </li>
                            <li class="shop-cart">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="bg-danger" style="padding-left:18px; padding-right:18px; padding-top:2px; padding-bottom:2px; border-radius:3px; color:white;">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!--sticky Header-->
            <div class="sticky-header">
                <div class="auto-container">
                    <div class="outer-box clearfix">
                        <div class="logo-box pull-left">
                            <figure class="logo"><a href="index.html"><img src="assets/images/small-logo.png" alt=""></a></figure>
                        </div>
                        <div class="menu-area pull-right">
                            <nav class="main-menu clearfix"></nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- shop-page-section -->
        <section class="shop-page-section shop-page-1">
            <div class="auto-container">
                <div class="item-shorting clearfix">
                    <div class="left-column pull-left clearfix">
                        <div class="filter-box">
                            <div class="dropdown">
                                <button class="search-box-btn" type="button" id="dropdownMenu5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flaticon-list-2"></i>Filter</button>
                            </div>
                        </div>
                        <div class="text"><p>Showing 1–12 of 50 Results</p></div>
                        <div class="short-box clearfix">
                            <p>Short by</p>
                            <div class="select-box">
                                <select class="wide">
                                <option data-display="9">9</option>
                                <option value="1">5</option>
                                <option value="2">7</option>
                                <option value="4">15</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="right-column pull-right clearfix">
                        <div class="short-box clearfix">
                            <p>Short by</p>
                            <div class="select-box">
                                <select class="wide">
                                <option data-display="Popularity">Popularity</option>
                                <option value="1">New Collection</option>
                                <option value="2">Top Sell</option>
                                <option value="4">Top Ratted</option>
                                </select>
                            </div>
                        </div>
                        <div class="menu-box">
                            <a href="shop.html"><i class="flaticon-menu"></i></a>
                            <a href="shop.html"><i class="flaticon-list"></i></a>
                        </div>
                    </div>
                </div>
                <div class="our-shop">
                    <div class="row clearfix">
                        @foreach ($products as $product)
                            <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                                <div class="shop-block-one">
                                    <div class="inner-box">
                                        <figure class="image-box">
                                            <img src="data:image/jpeg;base64,{{ base64_encode($product->product_image) }}" alt="">
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
                                                    <ul class="info-list clearfix" style="text-align: center; background-color:#474B8E; color:white; border-radius: 5px; font-size: 8px;">
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