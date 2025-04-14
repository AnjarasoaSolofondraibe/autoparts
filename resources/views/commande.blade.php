@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4"> Mes commandes</h2>

    @if ($commandes->isEmpty())
        <div class="alert alert-info">Vous n'avez encore passé aucune commande.</div>
    @else
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>N° Commande</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($commandes as $commande)
                    <tr>
                        <td>{{ $commande->numero_commande }}</td>
                        <td>{{ $commande->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ number_format($commande->total, 2) }} €</td>
                        <td>
                            @php
                                switch ($commande->statut) {
                                    case 'en attente':
                                        $badge = 'secondary';
                                        break;
                                    case 'en préparation':
                                        $badge = 'warning';
                                        break;
                                    case 'expédiée':
                                        $badge = 'info';
                                        break;
                                    case 'livrée':
                                        $badge = 'success';
                                        break;
                                    default:
                                        $badge = 'dark';
                                }
                            @endphp
                            <span class="badge bg-{{ $badge }}">{{ ucfirst($commande->statut) }}</span>
                        </td>
                        <td>
                            <a href="#" class="btn btn-sm btn-outline-primary">Voir</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
