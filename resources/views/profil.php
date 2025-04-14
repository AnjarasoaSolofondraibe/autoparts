@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">👤 Mon profil</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Nom :</strong> {{ $user->name }}</p>
            <p><strong>Email :</strong> {{ $user->email }}</p>
            <p><strong>Inscrit le :</strong> {{ $user->created_at->format('d/m/Y') }}</p>

            {{-- Bouton modifier (à implémenter plus tard) --}}
            {{-- <a href="{{ route('profil.edit') }}" class="btn btn-outline-secondary mt-3">Modifier</a> --}}
        </div>
    </div>
</div>
@endsection
