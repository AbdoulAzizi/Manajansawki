<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    //
    protected $fillable = [
        'matiere', 'salle', 'professeur', 'date','horaire','groupe_etudiants'
    ];


    protected $table = 'emplois';
}
