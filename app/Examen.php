<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    //
    protected $fillable = [
        'nomMat','groupe_etudiants','nomSalle','date','heure_debut','heure_fin'
    ];

    protected $table = 'examens';
}
