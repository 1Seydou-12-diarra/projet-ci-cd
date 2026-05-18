<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;

class EtudiantController extends Controller
{
    public function liste_etudiant()
    {
        $etudiants = Etudiant::all();
        return view('etudiant.liste', compact('etudiants'));
    }

    public function ajouter_etudiant()
    {
        return view('etudia nt.ajouter');
    }

    public function traiter_ajout(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'classe' => 'required|string|max:255',
        ]);

        // Création d'un nouvel étudiant
        $etudiant = new Etudiant();
        $etudiant->nom = $validatedData['nom'];
        $etudiant->prenom = $validatedData['prenom'];
        $etudiant->classe = $validatedData['classe'];
        $etudiant->save();

        // Redirection vers la liste des étudiants avec un message de succès
        return redirect('/etudiant')->with('success', 'Étudiant ajouté avec succès!');
    }

    public function supprimer_etudiant($id)
    {
        $etudiant = Etudiant::find($id);
        $etudiant->delete();

        return redirect('/etudiant')->with('success', 'Étudiant supprimé avec succès!');
    }
    public function modifier_etudiant(Request $request, $id)
    {
        // Validation des données
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'classe' => 'required|string|max:255',
        ]);

        // Trouver l'étudiant à modifier
        $etudiant = Etudiant::find($id);
        if (!$etudiant) {
            return redirect('/etudiant')->with('error', 'Étudiant non trouvé!');
        }

        // Mettre à jour les informations de l'étudiant
        $etudiant->nom = $validatedData['nom'];
        $etudiant->prenom = $validatedData['prenom'];
        $etudiant->classe = $validatedData['classe'];
        $etudiant->save();

        // Redirection vers la liste des étudiants avec un message de succès
        return redirect('/etudiant')->with('success', 'Étudiant modifié avec succès!');
    }

    public function voir_profil($id)
    {
        $etudiant = Etudiant::find($id);
        if (!$etudiant) {
            return redirect('/etudiant')->with('error', 'Étudiant non trouvé!');
        }

        $profil = $etudiant->profil; // Récupérer le profil associé à l'étudiant
        return view('etudiant.profil', compact('etudiant', 'profil'));
    }



}