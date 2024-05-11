
<x-app-layout>
    <div class="flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl w-full space-y-8 p-4">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-black leading-tight">
                    {{ __('Détail de la commande') }}
                </h2>
            </x-slot>

            <div class="bg-gray-800 shadow overflow-hidden sm:rounded-lg p-6">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-white">
                        Commande #{{ $order->order_id }}
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Détails de la commande.
                    </p>
                </div>
                <div class="border-t border-gray-700">
                    <dl class="sm:divide-y sm:divide-gray-700">
                        <!-- ID de la commande -->
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-gray-400">
                                ID de la commande
                            </dt>
                            <dd class="mt-1 text-sm text-gray-300 sm:mt-0 sm:col-span-2">
                                {{ $order->order_id }}
                            </dd>
                        </div>

                        <!-- ID du client -->
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-gray-400">
                                ID du client
                            </dt>
                            <dd class="mt-1 text-sm text-gray-300 sm:mt-0 sm:col-span-2">
                                {{ $order->client_id }}
                            </dd>
                        </div>

                        <!-- ID du produit -->
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-gray-400">
                                ID du produit
                            </dt>
                            <dd class="mt-1 text-sm text-gray-300 sm:mt-0 sm:col-span-2">
                                {{ $order->product_id }}
                            </dd>
                        </div>

                        <!-- Quantité -->
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-gray-400">
                                Quantité
                            </dt>
                            <dd class="mt-1 text-sm text-gray-300 sm:mt-0 sm:col-span-2">
                                {{ $order->quantity }}
                            </dd>
                        </div>

                        <!-- Date de la commande -->
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-gray-400">
                                Date de la commande
                            </dt>
                            <dd class="mt-1 text-sm text-gray-300 sm:mt-0 sm:col-span-2">
                                {{ $order->date }}
                            </dd>
                        </div>

                        <!-- Montant total -->
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-gray-400">
                                Montant total
                            </dt>
                            <dd class="mt-1 text-sm text-gray-300 sm:mt-0 sm:col-span-2">
                                {{ number_format($order->amount, 2, ',', ' ') }} €
                            </dd>
                        </div>

                        <!-- Date de création -->
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-gray-400">
                                Date de création
                            </dt>
                            <dd class="mt-1 text-sm text-gray-300 sm:mt-0 sm:col-span-2">
                                {{ $order->created_at->format('d/m/Y H:i:s') }}
                            </dd>
                        </div>

                        <!-- Date de mise à jour -->
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-gray-400">
                                Dernière mise à jour
                            </dt>
                            <dd class="mt-1 text-sm text-gray-300 sm:mt-0 sm:col-span-2">
                                {{ $order->updated_at->format('d/m/Y H:i:s') }}
                            </dd>
                        </div>
                    </dl>
                </div>

                <div class="px-4 py-3 bg-gray-800 text-right sm:px-6">
                <a href="{{ route('orders.download', $order->order_id) }}" class="inline-flex items-center px-4 py-2 bg-gray-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-500 disabled:opacity-25 transition ease-in-out duration-150">
                    Télécharger le PDF
                </a>
                
                <a href="{{ url()->previous() }}" class="inline-flex items-center px-4 py-2 ml-4 bg-gray-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-500 disabled:opacity-25 transition ease-in-out duration-150">
                    Retour
                </a>
            </div>

            </div>
        </div>  
    </div>
</x-app-layout>
