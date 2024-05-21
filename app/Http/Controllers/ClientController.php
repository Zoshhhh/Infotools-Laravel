<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Appointment;

class ClientController extends Controller
{
    /**
     * Affiche une liste de toutes les ressources (clients).
     */
    public function index()
    {
        $client = Client::all(); // Récupère tous les clients
        return view('client.index', compact('client')); // Retourne la vue avec les données des clients
    }

    /**
     * Affiche le formulaire de création d'une nouvelle ressource (client).
     */
    public function create()
    {
        return view('client.create'); // Retourne la vue pour créer un nouveau client
    }

    /**
     * Stocke une nouvelle ressource (client) dans la base de données.
     */
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
     * Affiche une ressource spécifique (client) en utilisant son ID.
     */
    public function show($id)
    {
        $client = Client::findOrFail($id); // Trouve le client par ID ou génère une erreur 404
        return view('client.show', compact('client')); // Retourne la vue pour afficher le client
    }

    /**
     * Affiche le formulaire pour éditer une ressource existante (client).
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('client.edit', compact('client')); // Retourne la vue pour éditer le client
    }

    /**
     * Met à jour la ressource spécifiée (client) dans la base de données.
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
     * Supprime la ressource spécifiée (client) de la base de données.
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);

        // Supprime d'abord les rendez-vous et commandes associés au client
        $client->appointments()->delete();
        $client->orders()->delete();

        // Supprime ensuite le client
        $client->delete();

        return redirect()->route('client.index')
            ->with('success', 'Client supprimé avec succès.');
    }
}
