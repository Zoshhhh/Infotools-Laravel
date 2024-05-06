@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-full mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 lg:p-8 bg-white border-b border-gray-200 min-w-full">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Liste des Factures') }}
                    </h2>

                    <a href="{{ route('clients.create') }}" class="btn" style="background-color: #3498db; border-radius: 8px; color: white; padding: 8px 15px; text-decoration: none; transition: background-color 0.3s ease-in-out;">
                            Créer une nouvelle facture
                    </a>
                </div>

                <form action="{{ route('factures.index') }}" method="GET" class="mb-4">
                    <input type="text" name="search" placeholder="Rechercher des factures..." class="mr-2">
                    <button type="submit">Rechercher</button>
                </form>

                <div class="my-6 overflow-x-auto">
                    <table class="w-full min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="py-3 px-6">ID Facture</th>
                                <th scope="col" class="py-3 px-6">Date</th>
                                <th scope="col" class="py-3 px-6">ID Client</th>
                                <th scope="col" class="py-3 px-6">Créé le</th>
                                <th scope="col" class="py-3 px-6">Mis à jour le</th>
                                <th scope="col" class="py-3 px-6">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($facture as $facture)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $facture->idFacture }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $facture->dateFact }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $facture->idCli }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $facture->created_at }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $facture->updated_at }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('factures.show', ['idFacture' => $facture->idFacture]) }}" class="btn" style="background-color: #3498db; border-radius: 8px; color: white; padding: 8px 15px; text-decoration: none; transition: background-color 0.3s ease-in-out;">
                                        Visionner
                                    </a>
                                    <form action="{{ route('factures.destroy', ['idFacture' => $facture->idFacture]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn" style="background-color: #e74c3c; border-radius: 8px; color: white; padding: 8px 15px; text-decoration: none; transition: background-color 0.3s ease-in-out;">
                                            Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
