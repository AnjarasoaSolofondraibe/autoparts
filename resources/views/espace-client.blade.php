@extends('layouts.app')

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@section('content')
<div class="container py-5">
    <h2>Bienvenue, {{ Auth::user()->name }} 👤</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Nom :</strong> {{ $user->name }}</p>
            <p><strong>Email :</strong> {{ $user->email }}</p>
            <p><strong>Inscrit le :</strong> {{ $user->created_at->format('d/m/Y') }}</p>

            {{-- Bouton modifier (à implémenter plus tard) --}}
            <a href="{{ route('profil.edit') }}" class="btn btn-outline-secondary mt-3">Modifier</a> 
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-4">
            <a href="{{ route('client.commandes') }}" class="btn btn-outline-primary w-100 mb-3">🧾 Mes commandes</a>
        </div>
    </div>
</div>
@endsection

