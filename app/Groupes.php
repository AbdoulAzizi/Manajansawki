<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Matiere;

class Groupes extends Model
{
     //
    protected $fillable = [
        'groupe_etudiants','nomMat'
    ];

    protected $table = 'groupe_matiere';
    protected $guarded = [];
    
    public function horaire()
    {
        return $this->hasMany('App\Horaire');
    }

      public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }
}
