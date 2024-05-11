<script>
    document.addEventListener('DOMContentLoaded', function() {
        const priceInput = document.getElementById('price');
        const stockInput = document.getElementById('stock');
        const amountDisplay = document.getElementById('calculated_amount');

        function updateAmount() {
            const price = parseFloat(priceInput.value) || 0;
            const quantity = parseInt(stockInput.value) || 0; // Simulating quantity from stock
            const amount = price * quantity;
            amountDisplay.value = amount.toFixed(2) + ' €'; // Dsisplay the calculated amount
        }

        // Attach the updateAmount to input events
        priceInput.addEventListener('input', updateAmount);
        stockInput.addEventListener('input', updateAmount);

        // Call updateAmount immediately to update on load
        updateAmount();
    });
</script>

<x-app-layout>
    <div class="flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl w-full space-y-8 p-2 bg-gray-800 shadow overflow-hidden sm:rounded-lg">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-white leading-tight">
                    {{ __('Modifier le produit') }}
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

            <form action="{{ route('products.update', $product->product_id) }}" method="POST" class="bg-gray-800 p-6 rounded">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-4">
                    <!-- Nom -->
                    <div class="form-group">
                        <label for="name" class="block text-sm font-bold mb-2 text-gray-300">Nom du produit</label>
                        <input type="text" name="name" id="name" value="{{ $product->name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <label for="description" class="block text-sm font-bold mb-2 text-gray-300">Description</label>
                        <textarea name="description" id="description" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $product->description }}</textarea>
                    </div>

                    <!-- Prix -->
                    <div class="form-group">
                        <label for="price" class="block text-sm font-bold mb-2 text-gray-300">Prix (€)</label>
                        <input type="number" name="price" id="price" value="{{ $product->price }}" step="0.01" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <!-- Stock -->
                    <div class="form-group">
                        <label for="stock" class="block text-sm font-bold mb-2 text-gray-300">Stock</label>
                        <input type="number" name="stock" id="stock" value="{{ $product->stock }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <!-- Montant calculé -->
                    <div class="form-group">
                        <label for="calculated_amount" class="block text-sm font-bold mb-2 text-gray-300">Montant du Stock</label>
                        <input type="text" id="calculated_amount" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" readonly>
                    </div>
                </div>

                <div class="flex justify-end mt-4">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-500 disabled:opacity-25 transition ease-in-out duration-150">
                        Sauvegarder
                    </button>
                    <a href="{{ route('product.index') }}" class="inline-flex items-center px-4 py-2 ml-4 bg-gray-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-500 disabled:opacity-25 transition ease-in-out duration-150">
                        Retour
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
