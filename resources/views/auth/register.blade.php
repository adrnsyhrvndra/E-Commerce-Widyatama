@extends('layouts.auth')

@section('title', 'Halaman Register')

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
                            Daftar sekarang untuk pengalaman belanja terbaik, mudah, cepat, dan penuh keuntungan.
                        </p>
                        <div class="page-links">
                            <a href="/login">Login</a><a href="/register" class="active">Register</a>
                        </div>
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                            <input class="form-control" type="text" name="username" placeholder="Username" required>
                            <input class="form-control" type="email" name="email" placeholder="Email" required>
                            <input class="form-control" type="text" name="full_name" placeholder="Full Name" required>
                            <input class="form-control" type="number" name="phone_number" placeholder="Phone Number" required>
                            <input type="file" class="form-control" id="profile_picture" placeholder="Profile Picture" name="profile_picture">
                            <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                            <input type="password" class="form-control" id="password_confirmation" placeholder="Password Confirmation" name="password_confirmation" required>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Register</button> 
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
