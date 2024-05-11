<x-app-layout>
    <div class="flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl w-full space-y-8 p-4">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Détail du rendez-vous') }}
                </h2>
            </x-slot>

            <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Rendez-vous #{{ $appointment->appointment_id }}
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Informations détaillées sur le rendez-vous.
                    </p>
                </div>
                <div class="border-t border-gray-200 pt-5">
                    <dl class="sm:divide-y sm:divide-gray-200">
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-gray-500">
                                ID du client
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $appointment->client_id }}
                            </dd>
                        </div>

                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-gray-500">
                                ID du prospect
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $appointment->prospect_id }}
                            </dd>
                        </div>

                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-gray-500">
                                ID du commercial
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $appointment->salesperson_id }}
                            </dd>
                        </div>

                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-gray-500">
                                Emplacement
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $appointment->location }}
                            </dd>
                        </div>

                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-gray-500">
                                Statut
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <div style="
                                     @if($appointment->status === 'Planned')
                                         background-color: rgba(255, 255, 0, 0.75);
                                     @elseif($appointment->status === 'Realized')
                                         background-color: rgba(0, 128, 0, 0.75); 
                                     @elseif($appointment->status === 'Canceled')
                                         background-color: rgba(255, 0, 0, 0.75); 
                                     @endif
                                     border-radius: 10px;
                                     padding: 4px 12px;
                                     width: 100px; 
                                     text-align: center; 
                                     display: inline-block;">
                                    @if($appointment->status === 'Planned')
                                    Planifié
                                    @elseif($appointment->status === 'Realized')
                                    Réalisé
                                    @elseif($appointment->status === 'Canceled')
                                    Annulé
                                    @endif
                                </div>
                            </dd>
                        </div>


                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-gray-500">
                                Date et Heure
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $appointment->date_time->format('d/m/Y H:i:s') }}
                            </dd>
                        </div>

                    </dl>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <a href="{{ url()->previous() }}"
                        class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 disabled:opacity-25 transition ease-in-out duration-150">
                        Retour
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>