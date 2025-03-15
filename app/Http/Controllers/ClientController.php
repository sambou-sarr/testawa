<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function indexclient(Request $request)
    {
     
          // Chargement eager de la relation
          $categories = Categorie::with('produits')->get();
          return view('client.index', compact('categories'));

    }
         
     public function detailproduit ($id)
    {
          // Récupérer tous les produits depuis la base de données
          $produit= Produit::find($id);

          // Passer les produits à la vue
          return view('client.detailproduit', compact('produit'));
    }
    public function rechercher(Request $request)
    {
        $query = $request->input('query');

        // Rechercher les produits par nom ou description
        $produits = Produit::where('nom', 'LIKE', "%{$query}%")
                            ->orWhere('description', 'LIKE', "%{$query}%")
                            ->get();

        return view('client.index', compact('produits', 'query'));
    }
    
}
