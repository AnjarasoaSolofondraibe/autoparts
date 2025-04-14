<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class PanierController extends Controller
{
    public function ajouter(Request $request, $id)
    {
        $produit = Produit::findOrFail($id);

        $panier = session()->get('cart', []);

        if (isset($panier[$id])) {
            $panier[$id]['quantite']++;
        } else {
            $panier[$id] = [
                'nom' => $produit->nom,
                'prix' => $produit->prix,
                'quantite' => 1,
                'image' => $produit->image,
            ];
        }

        session()->put('cart', $panier);

        return redirect()->back()->with('success', 'Produit ajouté au panier');
    }

    public function voir()
    {
        $panier = session()->get('cart', []);
        return view('panier', compact('panier'));
    }

    public function supprimer($id)
    {
        $panier = session()->get('cart');

        if (isset($panier[$id])) {
            unset($panier[$id]);
            session()->put('cart', $panier);
        }

        return redirect()->route('panier.voir')->with('success', 'Produit supprimé');
    }

    public function vider()
    {
        session()->forget('cart');
        return redirect()->route('panier.voir')->with('success', 'Panier vidé');
    }
}
