@extends('layouts.store')

@section('title', 'Halaman Edit Alamat')

@section('content')

      <div class="boxed_wrapper">
            <header class="main-header">
                  <div class="header-lower">
                      <div class="auto-container">
                          <div class="outer-box">
                              <figure class="logo-box">
                                    <img width="110" src="images/LOGO_TOKO_UTAMA_COLORED.png" alt="">
                              </figure>
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
                                              <li>
                                                  <a href="/">All Products</a>
                                              </li>
                                              <li class="current">
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
            </header>
            <section class="shop-page-section shop-page-1">
                  <div class="auto-container">
                        <h4>Edit Alamat</h4>
                        <form 
                              action="/addresses/update/{{ $address->address_id }}" 
                              method="POST" 
                              enctype="multipart/form-data" 
                              style="
                                    display: grid; 
                                    grid-template-columns: repeat(2, 1fr); 
                                    column-gap: 20px; 
                                    row-gap: 15px;
                                    margin-top:30px;"
                        >
                        @csrf
                        @method('put')

                        <div class="form-group">
                              <label for="address_label">Address Label</label>
                              <input 
                                    type="text" 
                                    name="address_label" 
                                    class="form-control" 
                                    id="address_label" 
                                    value="{{ $address->address_label }}"
                              />
                        </div>

                        <div class="form-group">
                              <label for="receipt_name">Receipt Name</label>
                              <input 
                                    type="text" 
                                    name="receipt_name" 
                                    class="form-control" 
                                    id="receipt_name" 
                                    value="{{ $address->receipt_name }}"
                              />
                        </div>

                        <div class="form-group">
                              <label for="province">Province</label>
                              <select name="province" id="province" class="form-control w-100">
                                    <option value="" disabled selected>Pilih</option>
                                    <option value="Aceh" @if($address->province == 'Aceh') selected @endif>Aceh</option>
                                    <option value="Bali" @if($address->province == 'Bali') selected @endif>Bali</option>
                                    <option value="Banten" @if($address->province == 'Banten') selected @endif>Banten</option>
                                    <option value="Bengkulu" @if($address->province == 'Bengkulu') selected @endif>Bengkulu</option>
                                    <option value="Gorontalo" @if($address->province == 'Gorontalo') selected @endif>Gorontalo</option>
                                    <option value="Jakarta" @if($address->province == 'Jakarta') selected @endif>Jakarta</option>
                                    <option value="Jambi" @if($address->province == 'Jambi') selected @endif>Jambi</option>
                                    <option value="Jawa Barat" @if($address->province == 'Jawa Barat') selected @endif>Jawa Barat</option>
                                    <option value="Jawa Tengah" @if($address->province == 'Jawa Tengah') selected @endif>Jawa Tengah</option>
                                    <option value="Jawa Timur" @if($address->province == 'Jawa Timur') selected @endif>Jawa Timur</option>
                                    <option value="Kalimantan Barat" @if($address->province == 'Kalimantan Barat') selected @endif>Kalimantan Barat</option>
                                    <option value="Kalimantan Selatan" @if($address->province == 'Kalimantan Selatan') selected @endif>Kalimantan Selatan</option>
                                    <option value="Kalimantan Tengah" @if($address->province == 'Kalimantan Tengah') selected @endif>Kalimantan Tengah</option>
                                    <option value="Kalimantan Timur" @if($address->province == 'Kalimantan Timur') selected @endif>Kalimantan Timur</option>
                                    <option value="Kalimantan Utara" @if($address->province == 'Kalimantan Utara') selected @endif>Kalimantan Utara</option>
                                    <option value="Kepulauan Riau" @if($address->province == 'Kepulauan Riau') selected @endif>Kepulauan Riau</option>
                              </select>
                        </div>

                        <div class="form-group">
                              <label for="city_or_regency">City or Regency</label>
                              <input 
                                    type="text" 
                                    name="city_or_regency" 
                                    class="form-control" 
                                    id="city_or_regency" 
                                    value="{{ $address->city_or_regency }}"
                              />
                        </div>

                        <div class="form-group">
                              <label for="district">District</label>
                              <input 
                                    type="text" 
                                    name="district" 
                                    class="form-control" 
                                    id="district" 
                                    value="{{ $address->district }}"
                              />
                        </div>

                        <div class="form-group">
                              <label for="postal_code">Postal Code</label>
                              <input 
                                    type="text" 
                                    name="postal_code" 
                                    class="form-control" 
                                    id="postal_code" 
                                    value="{{ $address->postal_code }}"
                              />
                        </div>

                        <div class="form-group" style="grid-column: span 2;">
                              <label for="full_address">Full Address</label>
                              <textarea 
                                    name="full_address" 
                                    class="form-control" 
                                    id="full_address" 
                                    rows="3"
                              >{{ $address->full_address }}</textarea>
                        </div>

                        <div class="form-group" style="grid-column: span 2;">
                              <label for="address_note">Address Note</label>
                              <textarea 
                                    name="address_note" 
                                    class="form-control" 
                                    id="address_note" 
                                    rows="3"
                              >{{ $address->address_note }}</textarea>
                        </div>

                        <div style="grid-column: span 2; text-align: center;">
                              <button type="submit" class="btn btn-success">Simpan</button>
                              <a href="/" class="btn btn-danger">Kembali</a>
                        </div>
                        </form>
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