<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/espace-client', [App\Http\Controllers\ClientController::class, 'index'])->name('espace.client');
    Route::get('/mes-commandes', [App\Http\Controllers\ClientController::class, 'commandes'])->name('client.commandes');
    Route::get('/mon-profil', [App\Http\Controllers\ClientController::class, 'profil'])->name('client.profil');
});

Route::middleware(['auth'])->get('/mon-profil/edit', [ClientController::class, 'editProfil'])->name('profil.edit');
Route::middleware(['auth'])->post('/mon-profil/update', [ClientController::class, 'updateProfil'])->name('profil.update');

use App\Models\Produit;

Route::get('/', function () {
    $populaires = Produit::inRandomOrder()->take(12)->get();
    return view('welcome', compact('populaires'));
})->name('accueil');

//Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/produits/{id}', [ProduitController::class, 'show'])->name('produits.show');

Route::get('/catalogue', [ProduitController::class, 'index'])->name('catalogue');

Route::post('/ajouter-au-panier/{id}', [PanierController::class, 'ajouter'])->name('panier.ajouter');

Route::get('/panier', [PanierController::class, 'voir'])->name('panier.voir');

Route::post('/panier/supprimer/{id}', [PanierController::class, 'supprimer'])->name('panier.supprimer');

Route::post('/panier/vider', [PanierController::class, 'vider'])->name('panier.vider');

Route::post('/newsletter', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');


Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// routes/web.php
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('produits', \App\Http\Controllers\Admin\ProduitController::class);
});