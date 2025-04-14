@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4"> Modifier mon profil</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('profil.update') }}" method="POST">
        @csrf
    
        <!-- Nom -->
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-control">
        </div>
    
        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Adresse e-mail</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="form-control">
        </div>
    
        <!-- Mot de passe -->
        <div class="mb-3">
            <label for="password" class="form-label">Nouveau mot de passe (laisser vide pour ne pas changer)</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
    
        <!-- Confirmation -->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>
    
        <!-- Boutons -->
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('espace.client') }}" class="btn btn-secondary ms-2">Annuler</a>
    </form>
    
</div>
@endsection
