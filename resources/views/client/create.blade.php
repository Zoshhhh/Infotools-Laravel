<x-app-layout>
    <div class="flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl w-full space-y-8 p-2 bg-gray-800 shadow overflow-hidden sm:rounded-lg">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-black leading-tight">
                    {{ __('Créer un Client') }}
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

            <form action="{{ route('client.store') }}" method="POST" class="bg-gray-800 p-6 rounded">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-white">
                    <!-- Nom -->
                    <div class="form-group">
                        <label class="block text-sm font-bold mb-2" for="nom">Nom</label>
                        <input type="text" id="nom" name="nom" value="{{ old('nom') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Nom">
                    </div>

                    <!-- Prénom -->
                    <div class="form-group">
                        <label class="block text-sm font-bold mb-2" for="prenom">Prénom</label>
                        <input type="text" id="prenom" name="prenom" value="{{ old('prenom') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Prénom">
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label class="block text-sm font-bold mb-2" for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Email">
                    </div>

                    <!-- Téléphone -->
                    <div class="form-group">
                        <label class="block text-sm font-bold mb-2" for="telephone">Téléphone</label>
                        <input type="text" id="telephone" name="telephone" value="{{ old('telephone') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Téléphone">
                    </div>

                    <!-- Adresse -->
                    <div class="form-group">
                        <label class="block text-sm font-bold mb-2" for="adresse">Adresse</label>
                        <input type="text" id="adresse" name="adresse" value="{{ old('adresse') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Adresse">
                    </div>

                    <!-- Type -->
                    <div class="form-group">
                        <label class="block text-sm font-bold mb-2" for="type">Type</label>
                        <select name="type" id="type" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="0">Prospect</option>
                            <option value="1">Client</option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-end mt-4">
                    <button type="submit" class="inline-flex items-center px-4 py-2 ml-4 bg-gray-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-500 disabled:opacity-25 transition ease-in-out duration-150">
                        Créer
                    </button>
                    <a href="{{ route('client.index') }}" class="inline-flex items-center px-4 py-2 ml-4 bg-gray-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-500 disabled:opacity-25 transition ease-in-out duration-150">
                        Retour
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
