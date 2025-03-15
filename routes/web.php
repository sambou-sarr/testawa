<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\ProduitController;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facades\Pdf;


Route::get('/user', function () {return view('index');});



Route::get('/admin/categorie',[CategorieController::class, 'index'])->name('list_categorie')->middleware('auth');
Route::get('/admin/categorie/ajout',[CategorieController::class, 'create'])->middleware('auth');
Route::post('/admin/categorie/store',[CategorieController::class, 'store'])->middleware('auth');
Route::get('/admin/categorie/edit/{id}', [CategorieController::class, 'edit'])->name('edit_categorie')->middleware('auth');
Route::delete('/admin/categorie/delete/{id}', [CategorieController::class, 'destroy'])->name('supprimer_categorie')->middleware('auth');
Route::put('/admin/categorie/update',[CategorieController::class, 'update'])->name('update_categorie')->middleware('auth');

Route::get('/admin/produit',[ProduitController::class, 'index'])->name('list_produit')->middleware('auth');
Route::get('admin/produit/create', [ProduitController::class, 'create'])->name('produit.create')->middleware('auth');
Route::post('/admin/produit/store',[ProduitController::class, 'store'])->name('ajout_Produit')->middleware('auth');
Route::get('/admin/produit/edit/{id}', [ProduitController::class, 'edit'])->name('edit_produit')->middleware('auth');
Route::delete('/admin/produit/delete/{id}', [ProduitController::class, 'destroy'])->name('supprimer_produit')->middleware('auth');
Route::put('/admin/produit/update',[ProduitController::class, 'update'])->name('update_produit')->middleware('auth');


Route::get('/admin/commande', [CommandeController::class, 'index'])->name('commandes.index')->middleware('auth');
Route::put('/commandes/{id}/update', [CommandeController::class, 'updateStatus'])->name('commandes.update')->middleware('auth');

Route::get('admin/commande/create', [CommandeController::class, 'create'])->name('commande.create')->middleware('auth');
Route::post('/commande/store', [CommandeController::class, 'store'])->name('commande.store')->middleware('auth');
Route::get('/commande/{id}', [CommandeController::class, 'show'])->name('commande.show')->middleware('auth');

Route::get('/commandes/{id}', [CommandeController::class, 'details'])->name('commandes.details')->middleware('auth');
Route::get('/admin/dashboard', [dashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('commandes/{commande}/facture', [CommandeController::class, 'downloadFacture'])->name('commandes.download.facture')->middleware('auth');
Route::get('/login', [AdminAuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AdminAuthController::class, 'login']);
Route::get('/logout', [AdminAuthController::class, 'logout'])->name('logout');


 

Route::get('/', [CartController::class, 'indexp'])->name('product.index');

Route::get('/client',[ClientController::class, 'indexclient'])->name('client.index');

// Route pour voir un produit en détail
Route::get('client/produit/{id}', [ClientController::class, 'detailproduit'])->name('voir.detail.produit');

// Routes du panier
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

Route::get('/checkout', [CartController::class, 'showForm'])->name('checkout');
Route::post('/commandes/client', [CartController::class, 'processCommande'])->name('checkout.process');
Route::get('/commandes/client/{commande}', [CartController::class, 'generateCommandePDF'])->name('client.commandes.show');
Route::get('client/recherche', [ClientController::class, 'rechercher'])->name('produit.rechercher');


Route::post('/checkout/initiate-wave', [CheckoutController::class, 'initiateWavePayment'])
     ->name('checkout.initiate.wave');
