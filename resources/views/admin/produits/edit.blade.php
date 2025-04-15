@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>{{ isset($produit) ? 'Modifier' : 'Ajouter' }} un produit</h2>
    <form action="{{ isset($produit) ? route('admin.produits.update', $produit) : route('admin.produits.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($produit)) @method('PUT') @endif

        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control" value="{{ old('nom', $produit->nom ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ old('description', $produit->description ?? '') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="prix" class="form-label">Prix (€)</label>
            <input type="number" step="0.01" name="prix" class="form-control" value="{{ old('prix', $produit->prix ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" name="stock" class="form-control" value="{{ old('stock', $produit->stock ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
            @if(isset($produit) && $produit->image)
                <img src="{{ asset('storage/' . $produit->image) }}" width="80" class="mt-2">
            @endif
        </div>
        <button class="btn btn-primary">{{ isset($produit) ? 'Modifier' : 'Ajouter' }}</button>
    </form>
</div>
@endsection