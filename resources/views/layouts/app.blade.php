            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="utf-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
                <meta name="description" content="" />
                <meta name="author" content="" />
                <title>@yield('title', 'Lelang Parfum')</title>
                <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
                <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
                <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

                <style>
                    html, body {
                        height: 100%;
                    }
                    body {
                        display: flex;
                        flex-direction: column;
                    }
                    main {
                        flex: 1;
                    }
                </style>
            </head>
            <body>
                {{-- Navbar --}}
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container px-4 px-lg-5">
                        <a class="navbar-brand" href="#">Lelang Parfum</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">

                            {{-- Menu Kiri --}}
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                                @auth
                                    <li class="nav-item"><a class="nav-link {{ Route::is('dashboard.user') ? 'active' : '' }}" href="{{ route('dashboard.user') }}">Home</a></li>
                                    <li class="nav-item"><a class="nav-link {{ Route::is('orders.index') ? 'active' : '' }}" href="{{ route('orders.index') }}">Riwayat</a></li>
                                @endauth
                                <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                            </ul>

                            {{-- Menu Kanan --}}
                            <div class="d-flex align-items-center gap-2">
                                @auth
                                    {{-- Cart (jika bukan halaman cart) --}}
                                    @unless(Route::is('cart.index'))
                                        <a class="btn btn-outline-dark" href="{{ route('cart.index') }}">
                                            <i class="bi-cart-fill me-1"></i>
                                            Cart
                                            <span class="badge bg-dark text-white ms-1 rounded-pill">{{ $cartCount ?? 0 }}</span>
                                        </a>
                                    @endunless

                                    {{-- Tombol Logout --}}
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger" type="submit">Keluar</button>
                                    </form>
                                @endauth

                                @guest
                                    <a href="{{ route('login.form') }}" class="btn btn-primary">Login</a>
                                @endguest
                            </div>

                        </div>
                    </div>
                </nav>

                {{-- Main Content --}}
                <main>
                    @yield('content')
                </main>

                {{-- Footer --}}
                <footer class="py-4 bg-dark text-white mt-auto">
                    <div class="container text-center">
                        <p class="mb-0">&copy; Lelang Parfum {{ date('Y') }}</p>
                    </div>
                </footer>

                {{-- Scripts --}}
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
                <script src="{{ asset('js/scripts.js') }}"></script>
            </body>
            </html>
