<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\CategorieResource;
use App\Http\Resources\FournisseurResource;
use Intervention\Image\Facades\Image;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::all();
        $fournisseurs = Fournisseur::all();
        $categories = Categorie::all();
        // return response()->json($articles);
        return [
            'articles' => ArticleResource::collection($articles),
            'fournisseurs' => FournisseurResource::collection($fournisseurs),
            'categories' => CategorieResource::collection($categories)
        ];
    }

    public function store(Request $request)
    {
        // dd($request);
        // $request->validate([
        //     'libelle' => 'required',
        //     'prix' => 'required',
        //     'stock' => 'required',
        //     // 'image' => 'required'
        // ]);

        // dd($request->file('image'));
        // if ($request->hasFile('image')) {
        //     $image_path = $request->file('image');
        // } else {
        //     return "ce n'est pas une image";
        // }
        $categorie = Categorie::where('libelle', $request->categorie)->first();
        $image_path = $request->file('photo');
        $article = Article::create([
            'libelle' => $request->libelle,
            'prix' => $request->prix,
            'stock' => $request->stock,
            'fournisseur_id' => $request->fournisseur,
            'categorie_id' => $categorie->id,
            'reference' => $request->reference,
            'photo' => $image_path
        ]);
        return new ArticleResource($article);
    }

    // public function findFournisseur(Request $request)
    // {
    //     $fourn = $request->libelle;
    //     $fournisseur = Fournisseur::where('libelle', $fourn)->first();
    //     if (!$fournisseur) {
    //         return null;
    //     }
    //     return response()->json($fournisseur);
    // }


    public function update(Request $request, Article $article)
    {
        $categorie = Categorie::where('libelle', $request->categorie)->first();
        $request->validate([
            'libelle' => 'required',
            'prix' => 'required',
            'stock' => 'required',
        ]);
        $article->update([
            'libelle' => $request->libelle,
            'prix' => $request->prix,
            'stock' => $request->stock,
            'fournisseur_id' => $request->fournisseur,
            'categorie_id' => $categorie->id,
            'reference' => $request->reference,
            'photo' => $request->photo
        ]);
        return response()->json($article);
    }

    public function supprimer(Article $article)
    {
        $article->delete();
        return response()->json($article);
    }


    // public static function getImageResize(Request $request)
    // {
    //     $img = [];
    //     if (  count($request->files->keys()) > 0 && $request->hasFile($request->files->keys()[0])) {
    //         $file = $request->file($request->files->keys()[0]);
    //         $imageType = $file->getClientOriginalExtension();
    //         $image_resize = Image::make($file)->resize( 100, 100, function ( $constraint ) {
    //             $constraint->aspectRatio();
    //         })->encode( $imageType );
    //         $img[$request->files->keys()[0]] = $image_resize;
    //     }
    //     return $img;
    // }
}
