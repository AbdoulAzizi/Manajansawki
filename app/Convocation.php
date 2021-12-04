<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Convocation extends Model
{
    //
    //
    protected $fillable = [
        'nom','prenom','nomMat','groupe_etudiants','nomSalle',
        'date','heure_debut','heure_fin',
    ];

    protected $table = 'convocations';

}
