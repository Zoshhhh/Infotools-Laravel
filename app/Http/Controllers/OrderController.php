<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Client;
use App\Models\Product;

class OrderController extends Controller
{
    /**
     * Affiche la liste des commandes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Récupère les clients qui ont des commandes
        $clients = Client::whereHas('orders')->get();

        if ($request->has('client_id') && $request->get('client_id') != '') {
            $orders = Order::where('client_id', $request->get('client_id'))->get();
        } else {
            $orders = Order::all();
        }

        // Renvoie la vue avec les commandes et les clients
        return view('order.index', compact('orders', 'clients'));
    }
    /**
     * Affiche le formulaire de création d'une nouvelle commande.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $products = Product::all();

        return view('order.create', compact('clients', 'products'));
    }

    /**
     * Stocke une nouvelle commande en base.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'client_id' => 'required|exists:clients,client_id', // Ensure this matches your database schema
            'product_id' => 'required|exists:products,product_id', // Ensure this matches your database schema
            'quantity' => 'required|integer|min:1',
            'date' => 'required|date',
        ]);

        // Retrieve the product to calculate the total amount
        $product = Product::findOrFail($request->product_id);
        $amount = $product->price * $request->quantity; // Calculate the amount based on product price and quantity

        // Create a new Order instance and assign the validated data along with the calculated amount
        $order = new Order([
            'client_id' => $request->client_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'date' => $request->date,
            'amount' => $amount, // Use the calculated amount
        ]);

        // Save the new order to the database
        $order->save();

        // Redirect back to the orders index page with a success message
        return redirect()->route('order.index')->with('success', 'La commande a été créée avec succès.');
    }



    /**
     * Affiche une commande spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);

        return view('order.show', compact('order'));
    }

    /**
     * Affiche le formulaire de modification d'une commande spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $clients = Client::all();
        $products = Product::all();

        return view('order.edit', compact('order', 'clients', 'products'));
    }

    /**
     * Met à jour une commande spécifique en base.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,client_id',
            'product_id' => 'required|exists:products,product_id',
            'quantity' => 'required|integer',
            'date' => 'required|date',
            'amount' => 'required|numeric|between:0,999999.99',
        ]);


        $order = Order::findOrFail($id);
        $order->update($request->all());

        return redirect()->route('order.index')
            ->with('success', 'Commande mise à jour avec succès');
    }

    /**
     * Supprime une commande spécifique de la base.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('order.index')
            ->with('success', 'Commande supprimée avec succès');
    }
}
