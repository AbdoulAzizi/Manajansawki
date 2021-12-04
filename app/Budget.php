<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    //
    protected $fillable = [
        'montant','nature_montant','date','heure','commentaire'
    ];

    protected $table = 'budget';
}
