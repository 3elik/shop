<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/favicon/site.webmanifest') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
<header class="p-3 navbar navbar-expand-lg navbar-dark bg-dark text-white">
    <div class="container">
        <a href="/" class="d-flex align-items-center mb-2 me-3 mb-lg-0 text-white text-decoration-none">
            <i class="fa fa-shopping-bag fa-2x"></i>
        </a>
        <button class="navbar-toggler collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarHeader"
                aria-controls="navbarHeader"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse "  id="navbarHeader">

            <div class="w-100 d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                <ul class="nav navbar-nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{ route('catalog.index') }}" class="nav-link px-2 text-white">Catalog</a></li>{{--text-secondary --}}
                    <li><a href="#" class="nav-link px-2 text-white">Delivery</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Contacts</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">About</a></li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
                </form>

                <div class="text-end d-flex">
                    <a href="{{ route('basket.index') }}" class="me-3 text-decoration-none d-flex align-items-center text-white">
                        <i class="fa fa-shopping-basket fa-2x"></i>
                    </a>
                    <button type="button" class="btn btn-outline-light me-2">Login</button>
                    <button type="button" class="btn btn-warning">Sign-up</button>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container py-5 sidebar">
    <div class="row">
        <div class="col-md-3">
            @include('layout.part.roots')
            @include('layout.part.brands')
        </div>
        <div class="col-md-9">
            @yield('content')
        </div>
    </div>
</div>
<footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">© 2017–2021 Company Name</p>
    <ul class="list-inline">
        <li class="list-inline-item"><a href="#">Privacy</a></li>
        <li class="list-inline-item"><a href="#">Terms</a></li>
        <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
</footer>
</body>
</html>
