<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
     
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('accueil') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"><a class="nav-link" href="/catalogue">Catalogue</a></li>
                        <li class="nav-item"><a class="nav-link" href="/panier">Panier</a></li>
                        <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="/espace-client">Espace client</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer class="bg-dark text-light pt-5 pb-3 mt-5">
        <div class="container">
            <div class="row">
    
                <!-- À propos -->
                <div class="col-md-4 mb-3">
                    <h5 class="text-uppercase">AutoParts</h5>
                    <p>Vente de pièces détachées auto en ligne, au meilleur prix. Livraison rapide partout à Madagascar.</p>
                </div>
    
                <!-- Liens utiles -->
                <div class="col-md-4 mb-3">
                    <h5 class="text-uppercase">Liens utiles</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('accueil') }}" class="text-light text-decoration-none">Accueil</a></li>
                        <li><a href="{{ route('catalogue') }}" class="text-light text-decoration-none">Catalogue</a></li>
                        <li><a href="{{ route('panier.voir') }}" class="text-light text-decoration-none">Panier</a></li>
                        <li><a href="{{ route('contact') }}" class="text-light text-decoration-none">Contact</a></li>
                    </ul>
                </div>
    
                <!-- Newsletter -->
                <div class="col-md-4 mb-3">
                    <h5 class="text-uppercase">Newsletter</h5>
                    <form action="{{ route('newsletter.subscribe') }}" method="POST" class="d-flex">
                        @csrf
                        <input type="email" name="email" class="form-control me-2" placeholder="Votre e-mail" required>
                        <button class="btn btn-success">OK</button>
                    </form>
    
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
       var carousel = document.querySelector('#produitsPopulairesCarousel');
            if (carousel) {
                new bootstrap.Carousel(carousel, {
                    interval: 4000, // 4 secondes
                    ride: 'carousel',
                    pause: false,   // même au survol
                    wrap: true      // boucle infinie
                });
            }
    </script>
</body>
</html>
