<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'telephone',
        'filiere',
        'date_debut_stage',
        'date_fin_stage',
    ];
}
