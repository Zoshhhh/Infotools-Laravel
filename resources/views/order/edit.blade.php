<x-app-layout>
    <div class="flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl w-full space-y-8 p-2 bg-gray-800 shadow overflow-hidden sm:rounded-lg">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-black leading-tight">
                    {{ __('Modifier la commande') }}
                </h2>
            </x-slot>

            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Erreur !</strong> Il y a des problèmes avec les données saisies.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li class="text-red-400">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('orders.update', $order) }}" method="POST" class="bg-gray-700 p-6 rounded">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-300">
                    {{-- Client --}}
                    <div class="form-group">
                        <label for="client_id" class="block text-sm font-bold mb-2">Client</label>
                        <select name="client_id" id="client_id" class="shadow border rounded w-full py-2 px-3 bg-gray-900 text-white leading-tight focus:outline-none focus:shadow-outline" required>
                            @foreach($clients as $client)
                            <option value="{{ $client->client_id }}" {{ $order->client_id == $client->client_id ? 'selected' : '' }}>
                                {{ $client->first_name }} {{ $client->last_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Produit --}}
                    <div class="form-group">
                        <label for="product_id" class="block text-sm font-bold mb-2">Produit</label>
                        <select name="product_id" id="product_id" class="shadow border rounded w-full py-2 px-3 bg-gray-900 text-white leading-tight focus:outline-none focus:shadow-outline" required>
                            @foreach($products as $product)
                            <option value="{{ $product->product_id }}" {{ $order->product_id == $product->product_id ? 'selected' : '' }}>
                                {{ $product->name }} - {{ $product->price }}€
                            </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Quantité --}}
                    <div class="form-group">
                        <label for="quantity" class="block text-sm font-bold mb-2">Quantité</label>
                        <input type="number" name="quantity" id="quantity" value="{{ $order->quantity }}" class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-900 text-white leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    {{-- Date --}}
                    <div class="form-group">
                        <label for="date" class="block text-sm font-bold mb-2">Date</label>
                        <input type="date" name="date" id="date" value="{{ \Carbon\Carbon::parse($order->date)->format('Y-m-d') }}" class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-900 text-white leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    {{-- Montant --}}
                    <div class="form-group">
                        <label for="amount" class="block text-sm font-bold mb-2">Montant</label>
                        <input type="text" name="amount" id="amount" value="{{ $order->amount }}" class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-900 text-white leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                </div>

                <div class="flex justify-end mt-4">
                    <button type="submit" class="inline-flex items-center px-4 py-2 ml-4 bg-gray-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-500 disabled:opacity-25 transition ease-in-out duration-150">
                        Modifier
                    </button>
                    <a href="{{ route('order.index') }}" class="inline-flex items-center px-4 py-2 ml-4 bg-gray-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-500 disabled:opacity-25 transition ease-in-out duration-150">
                        Retour
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
