{{-- resources/views/factures/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Détails de la Facture</h1>

    <div class="bg-gray-50 p-6 shadow rounded-lg">
        <div class="flex items-center space-x-4 mb-6">
            <i class="fas fa-file-invoice-dollar text-green-600 text-3xl"></i>
            <h2 class="text-2xl font-bold text-gray-800">Facture #{{ $facture->idFacture }}</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-4 text-gray-700">
            <p><i class="fas fa-user text-blue-500"></i> <strong>Client :</strong> {{ $facture->client->nomCli }} {{ $facture->client->prenomCli }}</p>
            <p><i class="fas fa-calendar-day text-yellow-500"></i> <strong>Date :</strong> {{ $facture->created_at }}</p>
            <p><i class="fas fa-dollar-sign text-green-500"></i> <strong>Montant :</strong> {{ $facture->montant }}€</p>
            <!-- Ajoutez ici d'autres informations pertinentes de la facture -->
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('factures.index') }}" style="background-color: #3498db; border-radius: 8px; color: white; padding: 8px 15px; text-decoration: none; transition: background-color 0.3s ease-in-out; display: inline-block;">
            Retour à la liste des factures
        </a>
    </div>

    <form action="{{ route('factures.destroy', ['idFacture' => $factures->idFacture]) }}" method="POST" style="display: inline;">
       @csrf
       @method('DELETE')
        <button type="submit" class="btn" style="background-color: #e74c3c; border-radius: 8px; color: white; padding: 8px 15px; text-decoration: none; transition: background-color 0.3s ease-in-out;">
            Supprimer
        </button>
    </form>


</div>
@endsection
