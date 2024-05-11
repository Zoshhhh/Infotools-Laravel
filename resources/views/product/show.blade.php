<x-app-layout>
    <div class="flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl w-full space-y-8 p-4">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-white leading-tight">
                    {{ __('Détail du produit') }}
                </h2>
            </x-slot>

            <div class="bg-gray-800 shadow overflow-hidden sm:rounded-lg p-6"> <!-- Changed background color here -->
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-white">
                        {{ $product->name }}
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-300">
                        Détails du produit.
                    </p>
                </div>
                <div class="mt-5 border-t border-gray-600 pt-5"> <!-- Changed border color here -->
                    <dl class="sm:divide-y sm:divide-gray-600">
                        <!-- ID du produit -->
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-gray-500">
                                ID du produit
                            </dt>
                            <dd class="mt-1 text-sm text-gray-300 sm:mt-0 sm:col-span-2">
                                {{ $product->product_id }}
                            </dd>
                        </div>

                        <!-- Description -->
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-gray-500">
                                Description
                            </dt>
                            <dd class="mt-1 text-sm text-gray-300 sm:mt-0 sm:col-span-2">
                                {{ $product->description }}
                            </dd>
                        </div>

                        <!-- Prix -->
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-gray-500">
                                Prix
                            </dt>
                            <dd class="mt-1 text-sm text-gray-300 sm:mt-0 sm:col-span-2">
                                {{ number_format($product->price, 2, ',', ' ') }} €
                            </dd>
                        </div>

                        <!-- Stock -->
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-gray-500">
                                Stock
                            </dt>
                            <dd class="mt-1 text-sm text-gray-300 sm:mt-0 sm:col-span-2">
                                {{ $product->stock }}
                            </dd>
                        </div>

                    </dl>
                </div>
                <div class="px-4 py-3 bg-gray-800 text-right sm:px-6 mt-5">
                    <a href="{{ url()->previous() }}" class="inline-flex items-center px-4 py-2 ml-4 bg-gray-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-500 disabled:opacity-25 transition ease-in-out duration-150">
                        Retour
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
