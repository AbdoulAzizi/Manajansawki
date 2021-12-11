<?php

namespace App;

use App\Retraitdiplome;
use Illuminate\Database\Eloquent\Model;

class Retraitdiplome extends Model
{
    //
     protected $fillable = [
         'nomEtudiant','prenomEtudiant','nomMat','numeroDiplome', 'dateRetrait'
    ];

     protected $table = 'retrait_diplomes';
    protected $guarded = [];
}
