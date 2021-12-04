<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    //
    protected $fillable = [
        'titre', 'date', 'heure', 'matiere_id','salle_id',
    ];
    protected $table = 'cours';

    public function matiere()
    {
        return $this->belongsTo('App\Models\Matiere');
    }

    public function salle()
    {
        return $this->belongsTo('App\Models\Salle');
    }
    public function professeur()
    {
        return $this->belongsTo('App\Models\Professeur', 'prof_id');
    }




}
