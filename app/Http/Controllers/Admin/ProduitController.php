<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produit;

class ProduitController extends Controller
{
    public function index() {
        $produits = Produit::latest()->paginate(10);
        return view('admin.produits.index', compact('produits'));
    }

    public function create() {
        return view('admin.produits.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('produits', 'public');
        }

        Produit::create($data);
        return redirect()->route('admin.produits.index')->with('success', 'Produit ajouté !');
    }

    public function edit(Produit $produit) {
        return view('admin.produits.edit', compact('produit'));
    }

    public function update(Request $request, Produit $produit) {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('produits', 'public');
        }

        $produit->update($data);
        return redirect()->route('admin.produits.index')->with('success', 'Produit modifié !');
    }

    public function destroy(Produit $produit) {
        $produit->delete();
        return redirect()->route('admin.produits.index')->with('success', 'Produit supprimé.');
    }

}
