@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Colonne image -->
        <div class="col-md-5">
            <img src="{{ asset('images/produits/' . $produit->image) }}" alt="{{ $produit->nom }}" class="img-fluid rounded shadow object-fit-cover" style="height: 360px;">
        </div>

        <!-- Colonne infos -->
        <div class="col-md-7">
            <h2 class="mb-3">{{ $produit->nom }}</h2>
            <p class="text-muted">{{ $produit->description }}</p>

            <h4 class="text-success fw-bold">{{ number_format($produit->prix, 0) }} ariary</h4>

            <form action="{{ route('panier.ajouter', $produit->id) }}" method="POST" class="mt-4">
                @csrf
                <button type="submit" class="btn btn-primary btn-lg">
                    Ajouter au panier
                </button>
            </form>

            <a href="{{ route('catalogue') }}" class="btn btn-link mt-3">← Retour au catalogue</a>
        </div>
    </div>
</div>
@endsection
