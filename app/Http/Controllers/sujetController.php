<?php

namespace App\Http\Controllers;
use App\Models\sujet;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class sujetController extends Controller
{
    public function ajouterSujet(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'sujet' => 'required',
            'nameen' => 'required',
            'namestag1' => 'required',
            'namestag2' => 'required',
            'langage' => 'required',
            'descption' => 'required',
            'rappoert' => 'file',
        ]);

        // Enregistrer le rapport (si présent)
        

        // Créer une nouvelle instance du modèle "sujet"
        $sujet = new sujet();
        $sujet->sujet = $request->input('sujet');
        $sujet->nameen = $request->input('nameen');
        $sujet->namestag1 = $request->input('namestag1');
        $sujet->namestag2 = $request->input('namestag2');
        $sujet->langage = $request->input('langage');
        $sujet->descption = $request->input('descption');
        

        if ($request->hasFile('rappoert')) {
            $rapport = $request->file('rappoert');
            $rapportPath = $rapport->store('rapports');
            $sujet->rappoert = $rapportPath;
        } else {
            $sujet->rappoert = null;
        }
    
        
        // Enregistrer le sujet dans la base de données
        $sujet->save();
        
        // Rediriger l'utilisateur vers une autre page ou afficher un message de succès
        return redirect()->back()->with('success', 'Sujet ajouté avec succès.');
    }



    public function show()
    {
        $sujet= sujet::all();
        return view('listesujet', compact('sujet'));
    }

    // ...

    public function destroy($id)
    {
        $sujet = sujet::findOrFail($id);
        $sujet->delete();
        return redirect()->back()->with('success', 'Sujet supprimé avec succès.');
    }
    

    public function edit($id)
    {
        $sujet = Sujet::find($id);
        return view('UpdateSujet', compact('sujet'));
    }

    // Méthode pour mettre à jour les informations d'un sujet
    public function update(Request $request, $id)
    {
        $sujet = Sujet::find($id);
        $sujet->sujet = $request->input('sujet');
        $sujet->nameen = $request->input('nameen');
        $sujet->namestag1 = $request->input('namestag1');
        $sujet->namestag2 = $request->input('namestag2');
        $sujet->langage = $request->input('langage');
        $sujet->descption = $request->input('descption');
        
        // Enregistrez le rapport si un fichier est téléchargé
        if ($request->hasFile('rapport')) {
            $rapport = $request->file('rapport');
            // Code pour sauvegarder le fichier rapport
        }
        
        $sujet->save();

        return redirect()->back()->with('success', 'Le sujet a été mis à jour avec succès.');
    }





    public function showRapport($id)
    {
        $sujet = sujet::findOrFail($id);

    // Vérifier si un rapport est associé au sujet
        if ($sujet->rappoert) {
        // Obtenez le chemin complet du rapport
        $rapportPath = storage_path('app/' . $sujet->rappoert);

        // Vérifier si le fichier du rapport existe
        if (file_exists($rapportPath)) {
            // Ouvrir le rapport dans un nouvel onglet du navigateur
            return response()->file($rapportPath, [
                'Content-Disposition' => 'inline',
                'Content-Type' => 'application/pdf' // Modifier le type MIME selon le format du rapport
            ]);
        }
    }
     return redirect()->back()->with('error', 'Rapport non trouvé.');
    }





    // public function sujetshowe()
    // {

    //     $sujetCount = sujet::count();
    //     $sujet = sujet::all();

    //      return view('index', compact('sujetCount', 'sujet'));
    // }
//     public function index()
// {
//     $sujetCount = sujet::count();
//     return view('index', compact('sujetCount'));
// }


  
}