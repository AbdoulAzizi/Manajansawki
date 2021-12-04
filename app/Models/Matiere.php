<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    //
    protected $fillable = [
        'nomMat', 'prof_id',
    ];
    protected $table = 'matieres';
    public function professeur()
    {
        return $this->belongsTo('App\Models\Professeur', 'prof_id','id');
    }
    public function etudiants()
    {
        return $this->belongsTo('App\Etudiant', 'etudiant_id','id');
    }

     public function groupes()
    {
        return $this->hasMany('App\Groupes', 'matiere','id');
    }

}
