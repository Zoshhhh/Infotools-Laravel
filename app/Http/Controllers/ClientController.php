<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Appointment;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = Client::all(); 
        return view('client.index', compact('client')); 
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'telephone' => 'required|string|max:20',
            'adresse' => 'required|string|max:255',
            'type' => 'required|boolean',
        ]);

        Client::create([
            'last_name' => $request->nom,
            'first_name' => $request->prenom,
            'email' => $request->email,
            'phone' => $request->telephone,
            'address' => $request->adresse,
            'type' => $request->type,
        ]);

        return redirect()->route('client.index')->with('success', 'Client créé avec succès.');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $client = Client::findOrFail($id); // Trouve le client ou renvoie une erreur 404
        return view('client.show', compact('client')); // Assurez-vous que cette vue existe dans resources/views/clients
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('client.edit', compact('client')); // Assurez-vous que cette vue existe
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
            'adresse' => 'required',
            'type' => 'required|boolean',
        ]);

        $client = Client::findOrFail($id);
        $client->last_name = $request->nom;
        $client->first_name = $request->prenom;
        $client->email = $request->email;
        $client->phone = $request->telephone;
        $client->address = $request->adresse;
        $client->type = $request->type;

        $client->save();

        return redirect()->route('client.index')
            ->with('success', 'Client mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);

        // Delete associated appointments first
        $client->appointments()->delete();
        $client->orders()->delete();

        // Now delete the client
        $client->delete();

        return redirect()->route('client.index')
            ->with('success', 'Client supprimé avec succès.');
    }
}
