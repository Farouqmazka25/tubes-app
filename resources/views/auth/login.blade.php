@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@300;400;500;600&display=swap');

    body {
        background-color: #f8f9fa; /* abu muda */
        font-family: 'Poppins', sans-serif;
    }

    .card-login {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }       

    .form-section {
        background-color: #1e2a38; /* abu gelap */
        color: white;
        padding: 50px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .form-section input.form-control {
        background-color: rgba(255,255,255,0.05);
        border: 1px solid rgba(212,175,55,0.3);
        color: white;
        border-radius: 8px;
        padding: 12px 15px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-section input.form-control:focus {
        background-color: rgba(255,255,255,0.1);
        border-color: #d4af37;
        box-shadow: 0 0 15px rgba(212,175,55,0.2);
    }

    .form-section input::placeholder {
        color: rgba(255,255,255,0.6);
        font-size: 0.95rem;
    }

    .btn-gradient {
        background: linear-gradient(to right, #c5a572, #d4af37);
        border: none;
        color: white;
        transition: all 0.3s ease;
    }

    .btn-gradient:hover {
        background: linear-gradient(to right, #d4af37, #c5a572);
        transform: translateY(-2px);
        color: white;
    }

    .btn-outline-custom {
        border: 1px solid #d4af37;
        color: #d4af37;
    }

    .btn-outline-custom:hover {
        background-color: #d4af37;
        color: white;
    }

    .gradient-bg {
        background: linear-gradient(135deg, #1e2a38 0%, #2c3e50 100%);
        color: white;
        padding: 50px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }

    .welcome-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        background: linear-gradient(to right, #fff, #d4af37);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        letter-spacing: 0.5px;
        line-height: 1.2;
    }

    .welcome-text {
        font-size: 1.1rem;
        line-height: 1.8;
        font-weight: 300;
        color: #e0e0e0;
        margin-bottom: 2rem;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
    }

    .login-text {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        color: #d4af37;
        margin-bottom: 2rem;
        text-align: center;
        font-weight: 600;
    }

    .logo {
        width: 150px;
        height: 150px;
        margin: 0 auto 30px;
        position: relative;
    }

    .logo img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        filter: drop-shadow(0 0 10px rgba(212, 175, 55, 0.3));
    }

    .logo::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 160px;
        height: 160px;
        background: radial-gradient(circle, rgba(212, 175, 55, 0.2) 0%, rgba(212, 175, 55, 0) 70%);
        z-index: -1;
    }

    .perfume-image {
        max-width: 350px;
        margin: 20px auto;
        filter: contrast(1.1) brightness(0.95);
        transition: all 0.3s ease;
        position: relative;
    }

    .perfume-image img {
        width: 100%;
        height: auto;
        border-radius: 8px;
    }

    .perfume-image::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, rgba(30, 42, 56, 0.7), transparent);
        border-radius: 8px;
        z-index: 1;
    }

    .text-primary {
        color: #d4af37 !important;
    }

    @media (max-width: 768px) {
        .gradient-bg {
            text-align: center;
            padding: 30px;
        }
        .perfume-image {
            max-width: 280px;
        }
    }
</style>

<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="row card-login w-100" style="max-width: 1000px;">
        <!-- Login Form -->
        <div class="col-md-6 form-section">
            <div class="text-center">
                <div class="logo">
                    <img src="{{ asset('img/logo.png.png') }}" alt="Perfume Logo">
                </div>
            </div>

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <h2 class="login-text">Login</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $key => $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif 

                <div class="mb-3">
                    <input type="text" name="email" class="form-control" placeholder="Email" required>
                </div>

                <div class="mb-4">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>

                <button class="btn btn-gradient w-100 mb-3" type="submit">MASUK</button>

                <div class="text-center">
                    <span class="text-muted">Belum punya akun?</span><br>
                    <a href="{{ route('register.form') }}" class="text-decoration-none text-primary fw-bold">
                        Daftar di sini
                    </a>    
                </div>
            </form>
        </div>

        <!-- Right Side Info -->
        <div class="col-md-6 gradient-bg">
            <h1 class="welcome-title">Selamat Datang di MYKNOS</h1>
            <p class="welcome-text">
                Temukan berbagai produk berkualitas dengan harga terbaik. Nikmati pengalaman berbelanja yang aman dan nyaman. Bergabunglah sekarang dan dapatkan penawaran menarik untuk setiap pembelian Anda.
            </p>
            <div class="perfume-image">
                <img src="{{ asset('img/parfume.png.png') }}" alt="Perfume Display" class="img-fluid">
            </div>
        </div>
    </div>
</div>
@endsection
