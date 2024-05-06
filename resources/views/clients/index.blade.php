@extends('layouts.app')
@section('content')
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200 min-w-full">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Liste des Clients') }}
                        </h2>
                        
                        <a href="{{ route('clients.create') }}" class="btn" style="background-color: #3498db; border-radius: 8px; color: white; padding: 8px 15px; text-decoration: none; transition: background-color 0.3s ease-in-out;">
                            Créer un nouveau client
                        </a>

                    </div>

                    <form action="{{ route('clients.index') }}" method="GET" class="mb-4">
                        <input type="text" name="search" placeholder="Rechercher des clients..." class="mr-2">
                        <button type="submit">Rechercher</button>
                    </form>

                    <div class="my-6 overflow-x-auto">
                        <table class="w-full min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3 px-6">Nom</th>
                                    <th scope="col" class="py-3 px-6">Prénom</th>
                                    <th scope="col" class="py-3 px-6">Email</th>
                                    <th scope="col" class="py-3 px-6">Téléphone</th>
                                    <th scope="col" class="py-3 px-6">Ville</th>
                                    <th scope="col" class="py-3 px-6">Rue</th>
                                    <th scope="col" class="py-3 px-6">Code Postal</th>
                                    <th scope="col" class="py-3 px-6">Prospect</th>
                                </tr>
                            </thead>

                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($clients as $client)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $client->nomCli }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $client->prenomCli }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $client->mailCli }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $client->telCli }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $client->villeCli }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $client->rueCli }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $client->cpCli }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $client->prospect ? 'Oui' : 'Non' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">

                                        <a class="btn" href="{{ route('clients.show', ['idCli' => $client->idCli]) }}" style="background-color: #3498db; border-radius: 8px; color: white; padding: 8px 10px; text-decoration: none; transition: background-color 0.3s ease-in-out; max-width: 100px; display: inline-block; text-align: center;">
                                            Visionner
                                        </a>

                                        <form action="{{ route('clients.destroy', ['idCli' => $client->idCli]) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn" style="background-color: #e74c3c; border-radius: 8px; color: white; padding: 8px 10px; text-decoration: none; transition: background-color 0.3s ease-in-out; max-width: 100px; display: inline-block; text-align: center;">
                                                Supprimer
                                            </button>
                                        </form>


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