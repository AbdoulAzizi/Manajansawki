<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    //
    protected $fillable = [
        'nomSalle', 'numSalle', 'capacite', 'etage','connexion', 'projecteur'
    ];

    protected $casts = [
        'connexion' => 'boolean',
        'projecteur' => 'boolean',
    ];
    protected $table = 'salles';


}
