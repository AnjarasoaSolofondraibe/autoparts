@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Votre Panier</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(count($panier) > 0)
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Image</th>
                    <th>Produit</th>
                    <th>Prix unitaire</th>
                    <th>Quantité</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($panier as $id => $item)
                    @php $sousTotal = $item['prix'] * $item['quantite']; @endphp
                    <tr>
                        <td width="100">
                            <img src="{{ asset('images/produits/' . $item['image']) }}" class="img-fluid" width="80" alt="{{ $item['nom'] }}">
                        </td>
                        <td>{{ $item['nom'] }}</td>
                        <td>{{ number_format($item['prix'], 0) }} ar</td>
                        <td>{{ $item['quantite'] }}</td>
                        <td>{{ number_format($sousTotal, 0) }} ar</td>
                        <td>
                            <form action="{{ route('panier.supprimer', $id) }}" method="POST" onsubmit="return confirm('Supprimer ce produit ?');">
                                @csrf
                                <button class="btn btn-sm btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @php $total += $sousTotal; @endphp
                @endforeach
                <tr class="table-info">
                    <td colspan="4" class="text-end fw-bold">Total</td>
                    <td colspan="2" class="fw-bold">{{ number_format($total, 0) }} ariary</td>
                </tr>
            </tbody>
        </table>

        <form action="{{ route('panier.vider') }}" method="POST" class="mt-3">
            @csrf
            <button class="btn btn-outline-danger" onclick="return confirm('Vider le panier ?')">Vider le panier</button>
        </form>

    @else
        <div class="alert alert-info">
            Votre panier est vide.
        </div>
    @endif
</div>
@endsection
