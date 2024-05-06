<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    // Afficher une liste de toutes les factures avec une fonctionnalité de recherche
    public function index(Request $request)
    {
        $searchTerm = $request->get('search');

        if (!empty($searchTerm)) {
            // Rechercher des factures en fonction du terme de recherche
            // Ajustez les champs de recherche selon vos besoins. Exemple: numéro de facture, nom du client, etc.
            $factures = Facture::where('numFacture', 'like', '%' . $searchTerm . '%')
                               // Ajoutez d'autres critères de recherche si nécessaire
                               ->get();
        } else {
            // Si aucun terme de recherche n'est fourni, renvoyer toutes les factures
            $factures = Facture::all();
        }

        return view('factures.index', compact('factures'));
    }

    // Afficher les détails d'une facture spécifique
    public function show($id)
    {
        $facture = Facture::find($id);

        if (!$facture) {
            return redirect('/factures')->with('error', 'Facture non trouvée');
        }

        return view('factures.show', compact('facture'));
    }

    public function create()
    {
        return view('factures.create');
    }

    public function destroy($id)
    {
        // Trouver la facture par son ID
        $facture = Facture::find($id);
    
        // Si la facture n'existe pas, rediriger vers la liste des factures avec un message d'erreur
        if (!$facture) {
            return redirect()->route('factures.index')->with('error', 'Facture non trouvée');
        }
    
        // Supprimer la facture
        $facture->delete();
    
        // Rediriger vers la liste des factures avec un message de succès
        return redirect()->route('factures.index')->with('success', 'Facture supprimée avec succès.');
    }}
    