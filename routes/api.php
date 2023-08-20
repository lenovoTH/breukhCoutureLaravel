<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\FournisseurController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::apiResource('/categories/{categorie}', CategorieController::class);

Route::get('/categories', [CategorieController::class, 'index']);
Route::get('/allcategories', [CategorieController::class, 'toutesdonees']);
Route::get('/categorie', [CategorieController::class, 'find']);
Route::post('/categories', [CategorieController::class, 'store']);
Route::put('/categories/{categorie}', [CategorieController::class, 'update']);
Route::delete('/categories/{categorie}', [CategorieController::class, 'supprimer']);
// Route::delete('/categories', [CategorieController::class, 'allSupp']);

// --------------------------------------------------------------------
// --------------------------------------------------------------------

Route::get('/alldata', [ArticleController::class, 'index']);
Route::post('/alldata', [ArticleController::class, 'store']);
Route::put('/articles/{article}', [ArticleController::class, 'update']);
Route::delete('/articles/{article}', [ArticleController::class, 'supprimer']);
