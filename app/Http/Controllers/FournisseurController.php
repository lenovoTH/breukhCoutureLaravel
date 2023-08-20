<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Fournisseur::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required',
        ]);

        $fournisseur = Fournisseur::create([
            'libelle' => $request->libelle
        ]);
        return response()->json($fournisseur);
    }


    public function find(Request $request)
    {
        $fourn = $request->libelle;
        $fournisseur = Fournisseur::where('libelle', $fourn)->first();
        if (!$fournisseur) {
            return null;
        }
        return response()->json($fournisseur);
    }

    /**
     * Display the specified resource.
     */
    public function show(Fournisseur $fournisseur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fournisseur $fournisseur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fournisseur $fournisseur)
    {
        //
    }
}
