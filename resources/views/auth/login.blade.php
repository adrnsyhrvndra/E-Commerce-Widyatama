@extends('layouts.auth')

@section('title', 'Halaman Login')

@section('content')
    <div class="form-body">
        <div class="website-logo">
            <a href="index.html">
                <div class="logo">
                    <img src="images/LOGO_TOKO_UTAMA_COLORED.png" alt="">
                </div>
            </a>
        </div>
        <div class="iofrm-layout">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="images/AUTH_ILLUSTRATION1.png" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>
                            Belanja Mudah, Masuk dan Mulai Sekarang!
                        </h3>
                        <p>
                            Masuk untuk menikmati kemudahan belanja online dengan cepat, aman, dan praktis.
                        </p>
                        <div class="page-links">
                            <a href="/login" class="active">Login</a><a href="/register">Register</a>
                        </div>
                        <form method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
                            @csrf
                            <input class="form-control" type="text" name="username" placeholder="Username" required>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Login</button> 
                                {{-- <a href="forget4.html">Forget password?</a> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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