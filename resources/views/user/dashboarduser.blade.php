@extends('layouts.app')

@section('title', 'Dashboard User')

@section('content')
    <!-- Header -->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Parfum Berkualitas</h1>
                <p class="lead fw-normal text-white-50 mb-0">Aroma Elegan untuk Hari Anda</p>
            </div>
        </div>
    </header>
    
     @if(session('success'))
    <div class="max-w-xl mx-auto mt-4">
        <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded shadow-sm text-sm flex items-center justify-between">
            <span>✅ {{ session('success') }}</span>
        </div>
    </div>
@endif
    <!-- Section: Products -->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach($products as $product)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image -->
                            <img class="card-img-top" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" />

                            <!-- Product details -->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">{{ $product->name }}</h5>
                                    <p class="mb-1">{{ Str::limit($product->description, 50) }}</p>
                                    <span class="fw-bold text-primary">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                                </div>
                            </div>

                            <!-- Product actions -->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-dark mt-auto">Add to cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection


