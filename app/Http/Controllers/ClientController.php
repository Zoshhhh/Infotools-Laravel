<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Affiche la liste des clients
    public function index(Request $request)
    {
        $clients = Client::when($request->input('search'), function ($query, $searchTerm) {
            return $query->where(function ($q) use ($searchTerm) {
                $q->where('nomCli', 'like', '%' . $searchTerm . '%')
                  ->orWhere('prenomCli', 'like', '%' . $searchTerm . '%')
                  ->orWhere('mailCli', 'like', '%' . $searchTerm . '%');
            });
        })->get();

        return view('clients.index', compact('clients'));
    }

    // Affiche les détails d'un client spécifique
    public function show($idCli)
    {
        $client = Client::where('idCli', $idCli)->firstOrFail();
        return view('clients.show', compact('client'));
    }

    // Affiche le formulaire de création d'un nouveau client
    public function create()
    {
        return view('clients.create');
    }

    // Enregistre un nouveau client dans la base de données
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomCli' => 'required|max:255',
            'prenomCli' => 'required|max:255',
            'mailCli' => 'required|email|max:255',
            'telCli' => 'required|max:255',
            'villeCli' => 'required|max:255',
            'rueCli' => 'required|max:255',
            'cpCli' => 'required|max:255',
            'prospect' => 'required|boolean',
        ]);

        $client = new Client();
        $client->fill($validatedData);
        $client->save();

        return redirect()->route('clients.index')->with('success', 'Client ajouté avec succès.');
    }

    // Supprime un client de la base de données
    public function destroy($idCli)
    {
        $client = Client::where('idCli', $idCli)->firstOrFail();
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client supprimé avec succès.');
    }
}
