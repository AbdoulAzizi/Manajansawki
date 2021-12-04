<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Creneau extends Model
{
    //
    protected $fillable = [
        'periode', 'horaire',
    ];

    protected $table = 'creneau';
}
