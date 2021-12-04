<?php

namespace App;
use App\Horaire;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    //
    protected $fillable = [
        'periode','horaire_id','horaire'
    ];

    protected $table = 'periodes';
    protected $guarded = [];
    public function horaire()
    {
        return $this->hasMany('App\Horaire');
    }
}
