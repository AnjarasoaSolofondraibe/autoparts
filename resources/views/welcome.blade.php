@extends('layouts.app')

@section('content')
<div class="container py-5">

    {{-- Hero section --}}
    <div class="row align-items-center mb-5">
        <div class="col-md-6">
            <h1 class="display-5 fw-bold">Bienvenue chez AutoParts</h1>
            <p class="lead">Pièces de rechange fiables, service rapide, satisfaction garantie.</p>
            <div class="mt-4 d-flex gap-3">
                <a href="{{ route('catalogue') }}" class="btn btn-primary btn-lg">Voir le catalogue</a>
                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-lg">Se connecter</a>
                @else
                    <a href="{{ route('espace.client') }}" class="btn btn-outline-secondary btn-lg">Mon compte</a>
                @endguest
            </div>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('images/autoparts.png') }}" alt="Auto Parts" class="img-fluid rounded shadow">
        </div>
    </div>

    {{-- Catégories principales --}}
    <h2 class="mb-4">🔧 Nos Catégories</h2>
    <div class="row text-center mb-5">
        <div class="col-md-4 mb-3">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <i class="bi bi-gear display-4 text-primary mb-3"></i>
                    <h5 class="card-title">Moteur</h5>
                    <p class="card-text">Courroies, filtres, pièces d’allumage, et plus.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <i class="bi bi-car-front display-4 text-success mb-3"></i>
                    <h5 class="card-title">Carrosserie</h5>
                    <p class="card-text">Rétroviseurs, pare-chocs, feux et accessoires.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <i class="bi bi-battery-charging display-4 text-warning mb-3"></i>
                    <h5 class="card-title">Électricité</h5>
                    <p class="card-text">Batteries, alternateurs, faisceaux, ampoules.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Produits populaires --}}
    <h2 class="mb-4">🔥 Produits populaires</h2>
    <div class="row">
        @foreach ($populaires as $produit)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('produits/' . $produit->image) }}" class="card-img-top" alt="{{ $produit->nom }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $produit->nom }}</h5>
                        <p class="card-text">{{ $produit->categorie }}</p>
                        <p class="text-success fw-bold">{{ number_format($produit->prix, 2) }} €</p>
                    </div>
                    <div class="card-footer d-flex justify-content-end gap-2">
                        <a href="{{ route('produits.show', $produit->id) }}" class="btn btn-sm btn-outline-info">Voir</a>
                        <form action="{{ route('panier.ajouter', $produit->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-sm btn-primary">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <h3 class="text-center mb-4">Produits Populaires</h3>

    <div id="produitsPopulairesCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($populaires->chunk(4) as $chunkIndex => $chunk)
                <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                    <div class="row justify-content-center">
                        @foreach ($chunk as $produit)
                            <div class="col-md-3">
                                <div class="card mb-3">
                                    <img src="{{ asset('images/' . $produit->image) }}" class="card-img-top" alt="{{ $produit->nom }}">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">{{ $produit->nom }}</h5>
                                        <p class="card-text">{{ number_format($produit->prix, 2) }} €</p>
                                        <a href="{{ route('produits.show', $produit->id) }}" class="btn btn-primary btn-sm">Voir</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#produitsPopulairesCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true">1</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#produitsPopulairesCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true">2</span>
        </button>
    </div>

    {{-- Newsletter / contact --}}
    <div class="bg-light p-5 mt-5 rounded shadow-sm">
        <h3 class="mb-3">📬 Abonnez-vous à notre newsletter</h3>
        <p>Recevez les nouveautés et promotions directement dans votre boîte mail.</p>
        <form action="#" method="POST" class="row g-3 mt-3">
            <div class="col-md-8">
                <input type="email" class="form-control" placeholder="Votre adresse e-mail" required>
            </div>
            <div class="col-md-4">
                <button class="btn btn-success w-100">S’abonner</button>
            </div>
        </form>
    </div>

</div>
@endsection

<script>
    var carousel = document.querySelector('#produitsPopulairesCarousel');
    var carouselInstance = new bootstrap.Carousel(carousel, {
        interval: 5000,
        ride: 'carousel'
    });
</script>
