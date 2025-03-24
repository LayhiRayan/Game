<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    public function index()
    {
        $utilisateurs = \App\Models\Utilisateur::all();

        return view('utilisateurs.index', compact('utilisateurs'));
    }

    public function create()
    {
        return view('utilisateurs.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs,email',
        ]);
    
        \App\Models\Utilisateur::create($validatedData);
    
        return redirect()->route('utilisateurs.index')->with('success', 'Étudiant ajouté avec succès.');
    }

    public function show($id)
    {
        $utilisateur = \App\Models\Utilisateur::findOrFail($id);

        return view('utilisateurs.show', compact('utilisateur'));
    }

    public function edit($id)
    {
        $utilisateur = \App\Models\Utilisateur::findOrFail($id);

        return view('utilisateurs.edit', compact('utilisateur'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs,email,' . $id,
        ]);
    
        $utilisateur = \App\Models\Utilisateur::findOrFail($id);
    
        $utilisateur->update($validatedData);
    
        return redirect()->route('utilisateurs.index')->with('success', 'Étudiant mis à jour avec succès.');
    
    }

    public function destroy($id)
    {
        $utilisateur = \App\Models\Utilisateur::findOrFail($id);

        $utilisateur->delete();

        return redirect()->route('utilisateurs.index')->with('success', 'Étudiant supprimé avec succès.');
    }
}
