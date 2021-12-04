<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    //
    protected $fillable = [
        'nomProf', 'prenomProf','nomMat','adresse','contact'
    ];
    protected $table = 'professeurs';


    public function matiere()
    {
        return $this->belongsTo('App\Models\Matiere');
    }

}
