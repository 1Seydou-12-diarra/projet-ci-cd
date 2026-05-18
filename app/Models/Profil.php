<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    ////     */
    protected $fillable = [
        'etudiant_id',
        'photo',
        'telephone',
        'adresse',
        'date_naissance',
        'sexe',
        'bio',
    ];
}
