<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $commandes = Auth::user()->commandes()->latest()->get();
        return view('espace-client', compact('commandes','user'));
    }

    public function commandes()
    {
        $commandes = Auth::user()->commandes()->latest()->get();
        return view('commande', compact('commandes'));
    }

    public function editProfil()
    {
        $user = Auth::user();
        return view('profil_edit', compact('user'));
    }

    public function updateProfil(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
    
        $user->save();

        return redirect()->route('espace.client')->with('success', 'Profil mis à jour avec succès.');
    }

}
