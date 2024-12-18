@extends('layouts.store')

@section('title', 'Halaman Pemilihan Metode Pembayaran')

@section('content')

      <div class="boxed_wrapper">
            <section class="error-section centred sec-pad">
                  <div class="auto-container">
                        <div class="inner-box">
                              <img src="/images/LOGO_TOKO_UTAMA_COLORED.png" width="150" alt="" />
                              <h3 style="color: black; margin-top:30px;">Pilih Metode Pembayaran!</h3>
                              <form action="/payment/update/{{ $payment_id }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div style="display:flex; flex-direction: column; justify-content: center; align-items: center; row-gap: 20px; margin-top: 25px;">
                                          <select name="payment_method" id="payment_method" class="form-control w-50">
                                                <option value="credit_card">Credit Card</option>
                                                <option value="bank_transfer">Bank Transfer</option>
                                                <option value="cash_on_delivery">Cash on Delivery</option>
                                          </select>
                                          <div class="btn-box mt-3">
                                                <button type="submit" class="theme-btn-two">Pilih Metode Pembayaran<i class="flaticon-right-1"></i></button>
                                          </div>
                                    </div>
                              </form>
                        </div>
                  </div>
            </section>
      </div>

@endsection
