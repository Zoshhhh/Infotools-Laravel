<x-app-layout>
    <div class="flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl w-full space-y-8 p-2 bg-gray-800 shadow overflow-hidden sm:rounded-lg">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-black leading-tight">
                    {{ __('Créer un rendez-vous') }}
                </h2>
            </x-slot>

            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Erreur !</strong> Il y a des problèmes avec les données saisies.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li class="text-red-500">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('appointment.store') }}" method="POST" class="bg-gray-800 p-6 rounded">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-white">
                    <!-- Date et Heure -->
                    <div class="form-group">
                        <label for="date_time" class="block text-sm font-bold mb-2">Date et Heure</label>
                        <input type="datetime-local" name="date_time" id="date_time" value="{{ old('date_time') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <!-- Lieu -->
                    <div class="form-group">
                        <label for="location" class="block text-sm font-bold mb-2">Lieu</label>
                        <input type="text" name="location" id="location" value="{{ old('location') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Adresse du rendez-vous" required>
                    </div>

                    <!-- Statut -->
                    <div class="form-group">
                        <label for="status" class="block text-sm font-bold mb-2">Statut</label>
                        <select name="status" id="status" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="Planned">Planifié</option>
                            <option value="Realized">Réalisé</option>
                            <option value="Canceled">Annulé</option>
                        </select>
                    </div>

                    <!-- ID Client -->
                    <div class="form-group">
                        <label for="client_id" class="block text-sm font-bold mb-2">Client / Prospect</label>
                        <select name="client_id" id="client_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">Sélectionner un client</option>
                            @foreach($clients as $client)
                            <option value="{{ $client->client_id }}">{{ $client->first_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex justify-end mt-4">
                    <button type="submit" class="inline-flex items-center px-4 py-2 ml-4 bg-gray-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-500 disabled:opacity-25 transition ease-in-out duration-150">
                        Créer
                    </button>
                    <a href="{{ route('appointments.index') }}" class="inline-flex items-center px-4 py-2 ml-4 bg-gray-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-500 disabled:opacity-25 transition ease-in-out duration-150">
                        Retour
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
