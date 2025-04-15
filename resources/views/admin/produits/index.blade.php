@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Produits</h2>
    <a href="{{ route('admin.produits.create') }}" class="btn btn-success mb-3">Ajouter un produit</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Image</th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produits as $produit)
                <tr>
                    <td>@if ($produit->image) <img src="{{ asset('images/produits/' . $produit->image) }}" width="60"> @endif</td>
                    <td>{{ $produit->nom }}</td>
                    <td>{{ $produit->prix }} €</td>
                    <td>{{ $produit->stock }}</td>
                    <td>
                        <a href="{{ route('admin.produits.edit', $produit) }}" class="btn btn-sm btn-warning">✏️</a>
                        <form action="{{ route('admin.produits.destroy', $produit) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ?')">🗑️</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $produits->links() }}
</div>
@endsection