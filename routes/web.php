<?php

use Illuminate\Support\Facades\Route;
use App\http\controllers\EtudiantController;
use App\http\controllers\ProfilController;



Route::get('/etudiant', [EtudiantController::class, 'liste_etudiant']);
Route::get('/ajouter', [EtudiantController::class, 'ajouter_etudiant']);
Route::post('/ajouter/traitement', [EtudiantController::class, 'traiter_ajout']);
Route::delete('/etudiant/{id}', [EtudiantController::class, 'supprimer_etudiant']);
Route::put('/etudiant/{id}', [EtudiantController::class, 'modifier_etudiant']);
Route::get('/etudiant/profil/{id}', [EtudiantController::class, 'voir_profil']);




Route::get('/profil/ajouter/{etudiant_id}',  [ProfilController::class, 'ajouter_profil']);
Route::post('/profil/ajouter/{etudiant_id}', [ProfilController::class, 'traiter_ajout']);
Route::post('/profil/modifier/{id}',         [ProfilController::class, 'modifier_profil']);
Route::get('/profil/supprimer/{id}',         [ProfilController::class, 'supprimer_profil']);