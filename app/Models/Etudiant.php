<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;      // ✅ correct

class Etudiant extends Model
{
    //     */
    protected $fillable = [
        'nom',
        'prenom',
        'classe',
    ];
     public function profil(): HasOne {
        return $this->hasOne(Profil::class);
    }
}
