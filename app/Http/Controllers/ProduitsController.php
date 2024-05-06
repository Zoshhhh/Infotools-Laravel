<?php


namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitsController extends Controller
{

    public function index()
    {
        $produits = Produit::all();
        return view('produits.index', compact('produits'));
    }

    public function show($idProduit)
    {
        $produit = Produit::find($idProduit);
    
        return view('produits.show', compact('produit'));
    }

    public function create()
    {
        return view('produits.create');
    }
}
