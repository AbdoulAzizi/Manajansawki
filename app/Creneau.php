<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Creneau extends Model
{
    //
    protected $fillable = [
        'periode', 'horaire',
    ];

    protected $table = 'creneaux';
}
