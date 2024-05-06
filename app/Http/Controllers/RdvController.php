<?php

namespace App\Http\Controllers;

use App\Models\Rdv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RdvController extends Controller
{
    /**
     * Affiche la liste des rendez-vous.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rdvs = Rdv::all();
    
        return view('rdvs.index', compact('rdvs'));
    }
    
    /**
     * Affiche les détails d'un rendez-vous spécifique.
     *
     * @param  Rdv $rdv
     * @return \Illuminate\Http\Response
     */
    public function show(Rdv $rdv)
    {
        return view('rdvs.show', compact('rdv'));
    }

    /**
     * Supprime un rendez-vous spécifique.
     *
     * @param  Rdv $rdv
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rdv $rdv)
    {
        $rdv->delete();

        return redirect()->route('rdvs.index')->with('success', 'Rendez-vous supprimé avec succès.');
    }

    

    public function store(Request $request)
    {
        $request->validate([
            'dateRdv' => 'required',
            'idEmploye' => 'required',
            'idClient' => 'required',
        ]);

        Rdv::create($request->all());

        return redirect()->route('rdvs.index')
            ->with('success', 'Rendez-vous créé avec succès.');
    }

    /**
     * Show the form for creating a new rendez-vous.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rdvs.create');
    }
}
