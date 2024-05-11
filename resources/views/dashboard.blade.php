<x-app-layout>
    <div class="py-12 bg-gray-100 flex">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex-1">
            <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-gray-800 border-b border-gray-200">
                    <h2 class="font-semibold text-2xl leading-tight text-white">
                        {{ __('Dashboard') }}
                    </h2>

                    <div class="mt-8">
                        <div class="transition duration-500 ease-in-out transform hover:scale-105 mb-6">
                            <a href="{{ url('/product') }}"
                                class="block p-6 bg-gray-800 rounded-lg border border-gray-600 shadow-lg hover:border-blue-500">
                                <h5 class="text-lg font-medium mb-2 text-green-400 text-white">
                                    Produits
                                </h5>
                                <p class="text-gray-400 text-white">
                                    Gérez votre inventaire et consultez vos produits ici.
                                </p>
                            </a>
                        </div>

                        <div class="transition duration-500 ease-in-out transform hover:scale-105 mb-6">
                            <a href="{{ url('/appointment') }}"
                                class="block p-6 bg-gray-800 rounded-lg border border-gray-600 shadow-lg hover:border-green-500">
                                <h5 class="text-lg font-medium mb-2 text-green-400 text-white">
                                    Rendez-vous
                                </h5>
                                <p class="text-gray-400 text-white">
                                    Planifiez et consultez vos prochains rendez-vous.
                                </p>
                            </a>
                        </div>

                        <div class="transition duration-500 ease-in-out transform hover:scale-105">
                            <a href="{{ url('/order') }}"
                                class="block p-6 bg-gray-800 rounded-lg border border-gray-600 shadow-lg hover:border-red-500">
                                <h5 class="text-lg font-medium mb-2 text-green-400 text-white">
                                    Commandes
                                </h5>
                                <p class="text-gray-400 text-white">
                                    Accédez aux détails et au suivi des commandes des clients.
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex-1">
            <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-gray-800 border-b border-gray-200">
                    <h3 class="font-semibold text-xl leading-tight mb-6 text-white">Mes Prochains Rendez-vous</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                        @forelse ($appointments as $appointment)
                            <div class="transition duration-500 ease-in-out transform hover:scale-105">
                                <div class="p-10 bg-gray-800 rounded-lg border border-gray-200 h-80 w-full flex flex-col justify-between">
                                    <div>
                                        <h5 class="text-lg font-bold mb-2 text-green-400 text-white">
                                            Rendez-vous le {{ \Carbon\Carbon::parse($appointment->date_time)->format('d/m/Y') }}
                                        </h5>
                                        <p class="text-gray-700 mb-2 text-white">
                                            <strong>Heure :</strong> {{ \Carbon\Carbon::parse($appointment->date_time)->format('H:i') }}
                                        </p>
                                        <p class="text-gray-700 mb-3 text-white">
                                            <strong>Lieu :</strong> {{ $appointment->location }}
                                        </p>
                                    </div>
                                    <div class="text-gray-600 text-sm">
                                        <strong>Statut :</strong> {{ $appointment->status }}
                                    </div>
                                    <div class="text-right mt-4">
                                        <a href="{{ route('appointments.show', ['appointment' => $appointment->appointment_id]) }}"
                                           class="text-sm text-blue-600 hover:text-blue-900 text-white">Voir plus</a>
                                    </div>
                                </div>
                            </div>
                            @if($loop->iteration == 2) @break @endif
                        @empty
                            @for ($i = 0; $i < 2; $i++)
                                <div class="transition duration-500 ease-in-out transform hover:scale-105">
                                    <div class="p-10 bg-gray-800 rounded-lg border border-gray-200 h-80 w-full flex flex-col justify-between">
                                        <div>
                                            <h5 class="text-lg font-bold mb-2 text-green-400 text-white">
                                                Ici vos prochains RDV
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
