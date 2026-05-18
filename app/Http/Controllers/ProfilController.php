<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;
use App\Models\Etudiant;

class ProfilController extends Controller
{
    // Afficher le formulaire de création
    public function ajouter_profil($etudiant_id)
    {
        $etudiant = Etudiant::find($etudiant_id);
        return view('profil.ajouter', compact('etudiant'));
    }

    // Enregistrer le profil
    public function traiter_ajout(Request $request, $etudiant_id)
    {
        $request->validate([
            'photo'         => 'nullable|image',
            'telephone'     => 'required|string',
            'adresse'       => 'required|string',
            'date_naissance'=> 'required|date',
            'sexe'          => 'required|in:M,F',
            'bio'           => 'nullable|string',
        ]);

        Profil::create([
            'etudiant_id'    => $etudiant_id,
            'telephone'      => $request->telephone,
            'adresse'        => $request->adresse,
            'date_naissance' => $request->date_naissance,
            'sexe'           => $request->sexe,
            'bio'            => $request->bio,
        ]);

        return redirect('/etudiant')->with('success', 'Profil ajouté!');
    }

    // Modifier le profil
    public function modifier_profil(Request $request, $id)
    {
        $profil = Profil::find($id);
        $profil->update($request->all());

        return redirect('/etudiant')->with('success', 'Profil modifié!');
    }

    // Supprimer le profil
    public function supprimer_profil($id)
    {
        Profil::find($id)->delete();

        return redirect('/etudiant')->with('success', 'Profil supprimé!');
    }
}
