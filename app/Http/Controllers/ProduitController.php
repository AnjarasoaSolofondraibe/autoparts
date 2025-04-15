<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class ProduitController extends Controller
{
    public function index(Request $request)
    {
        $query = Produit::query();

        if ($request->filled('marque') && $request->marque != 'Toutes') {
            $query->where('marque', $request->marque);
        }

        if ($request->filled('type') && $request->type != 'Toutes') {
            $query->where('type_piece', $request->type);
        }

        if ($request->filled('dispo') && $request->dispo != 'Toutes') {
            if ($request->dispo == 'En stock') {
                $query->where('stock', '>', 0);
            } else {
                $query->where('stock', '<=', 0);
            }
        }

        if ($request->filled('prix')) {
            $query->where('prix', '<=', $request->prix);
        }

        $produits = $query->paginate(12);

        return view('catalogue', compact('produits'));
    }

    public function show($id)
    {
        $produit = Produit::findOrFail($id);
        return view('show', compact('produit'));
    }
    
}
