    {{-- resources/views/clients/show.blade.php --}}
    @extends('layouts.app')

    @section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Détails du Client</h1>

        <div class="bg-gray-50 p-6 shadow rounded-lg">
        <div class="flex items-center space-x-4 mb-6">
            <i class="fas fa-user-circle text-blue-600 text-3xl"></i>
            <h2 class="text-2xl font-bold text-gray-800">{{ $client->nomCli }} {{ $client->prenomCli }}</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-4 text-gray-700">
            <p><i class="fas fa-id-badge text-blue-500"></i> <strong>ID :</strong> {{ $client->idCli }}</p>
            <p><i class="fas fa-envelope-open-text text-green-500"></i> <strong>Email :</strong> {{ $client->mailCli }}</p>
            <p><i class="fas fa-phone-alt text-yellow-500"></i> <strong>Téléphone :</strong> {{ $client->telCli }}</p>
            <p><i class="fas fa-map-marked-alt text-red-500"></i> <strong>Adresse :</strong> {{ $client->rueCli }}, {{ $client->cpCli }}, {{ $client->villeCli }}</p>
            <p><i class="fas fa-business-time text-purple-500"></i> <strong>Prospect :</strong> {{ $client->prospect ? 'Oui' : 'Non' }}</p>
            <p><i class="fas fa-calendar-plus text-pink-500"></i> <strong>Date de création :</strong> {{ $client->created_at }}</p>
            <p><i class="fas fa-calendar-check text-indigo-500"></i> <strong>Date de mise à jour :</strong> {{ $client->updated_at }}</p>
        </div>
    </div>


        <div class="mt-4">
        <a href="{{ route('clients.index') }}" style="background-color: #3498db; border-radius: 8px; color: white; padding: 8px 15px; text-decoration: none; transition: background-color 0.3s ease-in-out; display: inline-block;">
        Retour à la liste des clients
        </a>





        
        </div>
    </div>
    @endsection
