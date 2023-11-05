<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\encadrant;
use Illuminate\Support\Facades\Storage;


class encadrantController extends Controller
{
    public function ajouter(Request $request)
    {
        // Validez les données du formulaire
        $validatedData = $request->validate([
            'idant' => 'required',
            'nom' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
            'specialite' => 'required',
        ]);

        // Créez un nouvel encadrant 
        $encadrant = new encadrant();
        $encadrant->idont = $validatedData['idant'];
        $encadrant->name = $validatedData['nom'];
        $encadrant->email = $validatedData['email'];
        $encadrant->mobile = $validatedData['telephone'];
        $encadrant->specialite = $validatedData['specialite'];
        $encadrant->save();

        // Redirigez l'utilisateur vers lae page de confirmation 
        return redirect()->back()->with('success', 'encadrant a été ajouté avec succès.');
    }

    public function show()
    {
        $encadrant = encadrant::all();

        return view('/listeencadrant', compact('encadrant'));
    }
    public function edit($id)
    {
        $encadrant = encadrant::find($id);
        return view('UpdateENcadrant', compact('encadrant'));
    }

    public function update(Request $request, encadrant $encadrant)
    {
        $validatedData = $request->validate([
            'idant' => 'required',
            'nom' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
            'specialite' => 'required',
        ]);

        $encadrant->idont = $validatedData['idant'];
        $encadrant->name = $validatedData['nom'];
        $encadrant->email = $validatedData['email'];
        $encadrant->mobile = $validatedData['telephone'];
        $encadrant->specialite = $validatedData['specialite'];
        $encadrant->save();

        return redirect()->back()->with('success', 'Encadrant mis à jour avec succès.');
    }


    
    public function destroy(encadrant $encadrant)
    {
        $encadrant->delete();
         return redirect()->back()->with('success', 'Encadrant supprimé avec succès.');
    }

    
   

    
}