<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        Bienvenue sur la Dashboard d'Infotools
    </h1>

    <p class="mt-6 text-gray-500 leading-relaxed">
        Sélectionnez ci-dessous votre catégorie
    </p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8 p-6 lg:p-8">
    <div class="col-span-3">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Catégorie Clients -->
            <div class="bg-gray-200 bg-opacity-25 p-6 rounded-lg">
                <div class="flex items-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-6 h-6 stroke-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                    </svg>
                    <h2 class="ml-3 text-xl font-semibold text-gray-900">
                        <a href="{{ route('clients.index') }}">Clients</a>
                    </h2>
                </div>
                <a href="{{ route('clients.index') }}" class="inline-flex items-center font-semibold text-indigo-700">
                    Visionner les clients
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-5 h-5 ml-1 fill-indigo-500">
                        <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>

            <!-- Catégorie Factures -->
            <div class="bg-gray-200 bg-opacity-25 p-6 rounded-lg">
                <div class="flex items-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-6 h-6 stroke-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                    </svg>
                    <h2 class="ml-3 text-xl font-semibold text-gray-900">
                        <a href="{{ route('factures.index') }}">Facture</a>
                    </h2>
                </div>
                <a href="{{ route('factures.index') }}" class="inline-flex items-center font-semibold text-indigo-700">
                    Visionner les factures
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-5 h-5 ml-1 fill-indigo-500">
                        <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>

            <!-- Catégorie Produits -->
            <div class="bg-gray-200 bg-opacity-25 p-6 rounded-lg">
                <div class="flex items-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-6 h-6 stroke-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                    </svg>
                    <h2 class="ml-3 text-xl font-semibold text-gray-900">
                        <a href="{{ route('produits.index') }}">Produits</a>
                    </h2>
                </div>
                <a href="{{ route('produits.index') }}" class="inline-flex items-center font-semibold text-indigo-700">
                    Visionner les produits
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-5 h-5 ml-1 fill-indigo-500">
                        <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Colonne Rendez-vous -->
    <div class="bg-gray-200 bg-opacity-25 p-6 rounded-lg lg:col-span-1">
        <div class="flex items-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-6 h-6 stroke-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
            </svg>
            <h2 class="ml-3 text-xl font-semibold text-gray-900">
                <a href="{{ route('rdvs.index') }}">Rendez-vous</a>
            </h2>
        </div>
        <a href="{{ route('rdvs.index') }}" class="inline-flex items-center font-semibold text-indigo-700">
            Visionner les rendez-vous
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ml-1 w-5 h-5 fill-indigo-500">
                <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
            </svg>
        </a>
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200 mt-4">
            <h3 class="font-semibold text-lg">Vos prochains rendez-vous</h3>
            <!-- Exemple de contenu dynamique pour les rendez-vous -->
            @isset($prochainsRdvs)
                @if($prochainsRdvs->count() > 0)
                    <ul class="mt-2">
                        @foreach($prochainsRdvs as $rdv)
                            <li class="mt-2">
                                <strong>Date:</strong> {{ $rdv->dateRdv }}
                                <br>
                                <strong>Employé:</strong> {{ $rdv->employe->name }}
                                <br>
                                <strong>Client ID:</strong> {{ $rdv->idClient }}
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="mt-2">Vous n'avez pas de prochains rendez-vous.</p>
                @endif
            @endisset
        </div>
    </div>
</div>
