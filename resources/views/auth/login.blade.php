@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f8f9fa; /* abu muda */
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
        background-color: transparent;
        border: 1px solid #ced4da;
        color: white;
    }

    .form-section input::placeholder {
        color: #dee2e6;
    }

    .btn-gradient {
        background: linear-gradient(to right, #6c757d, #adb5bd); /* abu netral */
        border: none;
        color: white;
    }

    .btn-outline-custom {
        border: 1px solid #6c757d;
        color: #6c757d;
    }

    .btn-outline-custom:hover {
        background-color: #6c757d;
        color: white;
    }

    .gradient-bg {
        background: linear-gradient(to right, #ced4da, #dee2e6); /* abu-abu soft */
        color: #212529;
        padding: 50px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .logo {
        max-height: 100px;
        margin-bottom: 20px;
    }

    @media (max-width: 768px) {
        .gradient-bg {
            text-align: center;
        }
    }
</style>

<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="row card-login w-100" style="max-width: 1000px;">
        
        <!-- Login Form -->
        <div class="col-md-6 form-section">
            <form action="{{ route('login') }}" method="POST">
                @csrf

                <p class="mb-3 fw-semibold text-center">Login</p>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $item)
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

                <button class="btn btn-gradient w-100 mb-3" type="submit">LOG IN</button>

                <div class="text-center">
                    <span class="text-muted">Don't have an account?</span><br>
                    <a href="{{ route('register.form') }}" class="text-decoration-none text-primary fw-bold">
                        Sign up here
                    </a>
                </div>
            </form>
        </div>

        <!-- Right Side Info -->
        <div class="col-md-6 gradient-bg">
            <h4 class="fw-bold">We are more than just a company</h4>
            <p class="mt-3">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip ex ea commodo consequat.
            </p>
        </div>
        
    </div>
</div>
@endsection
