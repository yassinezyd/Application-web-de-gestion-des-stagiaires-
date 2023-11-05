<?php

namespace App\Http\Controllers;


use App\Models\stagiaires;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;
use Illuminate\Database\Eloquent\ModelNotFoundException;




class StagiaireController extends Controller
{
   public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'cin' => 'required',
            'name' => 'required',
            'sex' => 'required',
            'age' => 'required|integer',
            'mobile' => 'required',
            'email' => 'required|email',
            'stage' => 'required',
            'specialite' => 'required',
            'etude' => 'required',
            'cv' => 'required|mimes:pdf,doc,docx',
            'datedebut' => 'required|date',
            'datefin' => 'required|date',
        ]);

        // Créer un nouveau stagiaire dans la base de données
        $stagiaire = new stagiaires();
        $stagiaire->cin = $validatedData['cin'];
        $stagiaire->name = $validatedData['name'];
        $stagiaire->sex = $validatedData['sex'];
        $stagiaire->age = $validatedData['age'];
        $stagiaire->mobile = $validatedData['mobile'];
        $stagiaire->email = $validatedData['email'];
        $stagiaire->stage = $validatedData['stage'];
        $stagiaire->specialite = $validatedData['specialite'];
        $stagiaire->etude = $validatedData['etude'];
       
        if ($request->hasFile('cv')) {
            $cv = $request->file('cv');
            $cvPath = $cv->store('cv_files');
            $stagiaire->cv = $cvPath;
        }

        $stagiaire->datedebut = $validatedData['datedebut'];
        $stagiaire->datefin = $validatedData['datefin'];

        $stagiaire->save();

        
        return redirect()->back()->with('success', 'Le stagiaire a été ajouté avec succès.');
    }







    public function show()
    {
         $stagiaire = stagiaires::all();
         return view('listestagiaire', compact('stagiaire'));
    }



    public function destroy($id)
    {
        // Trouver le stagiaire à supprimer
        $stagiaire = stagiaires::find($id);

        // Supprimer le CV s'il existe
        if ($stagiaire->cv) {
            Storage::delete($stagiaire->cv);
        }

        // Supprimer le stagiaire de la base de données
        $stagiaire->delete();

        // Rediriger avec un message de réussite
        return redirect()->back()->with('success', 'Le stagiaire a été supprimé avec succès.');
    }

    public function edit($id)
    {
        $stagiaire = stagiaires::find($id);
        return view('updateStagaire', compact('stagiaire'));
    }

    // Met à jour les informations du stagiaire
    public function update(Request $request, $id)
    {
        $stagiaire = Stagiaires::find($id);
        $stagiaire->cin = $request->cin;
        $stagiaire->name = $request->name;
        $stagiaire->sex = $request->sex;
        $stagiaire->age = $request->age;
        $stagiaire->mobile = $request->mobile;
        $stagiaire->email = $request->email;
        $stagiaire->stage = $request->stage;
        $stagiaire->specialite = $request->specialite;
        $stagiaire->etude = $request->etude;
        $stagiaire->datedebut = $request->datedebut;
        $stagiaire->datefin = $request->datefin;
      
        
        if ($request->hasFile('new_cv')) {
            $newCV = $request->file('new_cv');
            $newCVPath = $newCV->store('cv_files');

            if ($stagiaire->cv) {
                // Supprimer l'ancien CV s'il existe
                Storage::delete($stagiaire->cv);
            }

            $stagiaire->cv = $newCVPath;
        }
       

        $stagiaire->save();

        return redirect()->back()->with('success', 'Les informations du stagiaire ont été mises à jour avec succès.');
    }

    // Supprime un stagiaire
    public function delete($id)
    {
        $stagiaire = stagiaires::find($id);
        $stagiaire->delete();

        return redirect()->back()->with('success', 'Le stagiaire a été supprimé avec succès.');
    }




    

    public function printAttestation($id)
    {
        
    }







    public function showCV($id)
    {
        $stagiaire = stagiaires::find($id);

    // Vérifiez si le stagiaire existe
        if (!$stagiaire) {
             return redirect()->back()->with('error', 'Stagiaire non trouvé.');
        }

    // Vérifiez si le CV existe
        if (!$stagiaire->cv) {
            return redirect()->back()->with('error', 'CV non trouvé.');
        }

    // Obtenez le chemin du fichier CV
        $cvPath = storage_path('app/' . $stagiaire->cv);

    // Vérifiez si le fichier CV existe sur le système de fichiers
        if (!file_exists($cvPath)) {
             return redirect()->back()->with('error', 'CV introuvable.');
        } 

    // Lire le contenu du fichier CV
        $cvContents = file_get_contents($cvPath);

    // Déterminez le type de contenu en fonction de l'extension du fichier
        $contentType = mime_content_type($cvPath);

    // Affichez le fichier CV dans le navigateur
        return response($cvContents)->header('Content-Type', $contentType);
    }




    public function attestation($id)
    {
        // Récupérer les informations du stagiaire à partir de l'ID
        $stagiaire = Stagiaires::findOrFail($id);

        // Générer le contenu de l'attestation PDF
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('attestation', compact('stagiaire'));

        // Retourner le contenu PDF pour affichage ou téléchargement
        return $pdf->stream('attestation.pdf');
    }




 }
