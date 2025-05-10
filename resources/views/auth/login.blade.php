@extends('layouts.app')

@section('content')
<style>
    body {
        background-color:rgb(255, 255, 255);
    }

    .card-login {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgb(255, 255, 255  );
    }       

    .form-section {
        background-color:#151C48;
        color: white;
        padding: 50px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .form-section input.form-control {
        background-color: transparent;
        border: 1px solid #777;
        color: white;
    }

    .form-section input::placeholder {
        color: #aaa;
    }

    .btn-gradient {
        background: linear-gradient(to right, #ff6a00, #ee0979);
        border: none;
        color: white;
    }

   .btn-gradient {
    background: linear-gradient(to right, #FF6A00, #EE0979);
    color: white;
    }

    .btn-outline-custom {
        border: 1px solid #ff4081;
        color: #ff4081;
    }

    .btn-outline-custom:hover {
        background-color: #ff4081;
        color: white;
    }

    .gradient-bg {
        background: linear-gradient(to right, #ff6a00, #ee0979);
        color: white;
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
            <div class="text-center">
                <img src="{{ asset('img/logomykonos .jpeg') }}" class="logo" alt="Logo">

            </div>

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <p class="mb-3 fw-semibold">adittt tolongin dittttt </p>
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
                    <input type="text" name="email" class="form-control" placeholder="email   " required>
                </div>

                <div class="mb-4">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>

                <button class="btn btn-gradient w-100 mb-3" type="submit">LOG IN</button>

                <div class="text-center mb-3">
                    <a href="#" class="text-decoration-none text-muted">Forgot password?</a>
                </div>

                <div class="text-center">
                    <span class="text-muted">Don't have an account?</span><br>
                    
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
