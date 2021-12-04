<?php

namespace App;

use App\Models\Matiere;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    //
    protected $fillable = [
        'nom','prenom','datenais','nomMat','groupe_etudiants','image'
    ];

    protected $table = 'etudiants';
    protected $guarded = [];
    protected $dates = ['name_field'];

    public function matieres()
    {
        return $this->belongsTo('App\Models\Matiere', 'matiere_id','id');
    }

}
