<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::paginate(5);
        // $categories = Categorie::all();
        return response()->json($categories);
    }

    public function toutesdonees()
    {
        $categories = Categorie::all();
        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|unique:categories',
        ]);

        // $validator = Validator::make($request->all(), [
        //     'libelle' => 'required|unique:categories'
        // ]);

        $categorie = Categorie::create([
            'libelle' => $request->libelle
        ]);
        return response()->json($categorie);
    }

    /**
     * Display the specified resource.
     */
    public function find(Request $request)
    {
        $cat = $request->input('libelle');
        $categorie = Categorie::where('libelle', $cat)->first();
        if (!$categorie) {
            return null;
        }
        return response()->json($categorie);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorie $categorie)
    {
        $validator = Validator::make($request->all(), [
            'libelle' => 'required|unique:categories'
        ]);
        
        $categorie->update([
            'libelle' => $request->libelle,
        ]);
        return response()->json($categorie);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function supprimer(Categorie $categorie)
    {
        $categorie->delete();
        return response()->json($categorie);
    }

    // public function allSupp(Request $request)
    // {
    //     // foreach ($request->ids as $id) {
    //     //     $idd = Categorie::find($id);
    //     //     $allSupp = $idd->delete();
    //     // }
    //     // return response()->json($allSupp);


    //     $allSupp = Categorie::whereIn('id', $request->ids)->delete();
    //     return response()->json($allSupp);
    // }
}
