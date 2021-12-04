<?php

namespace App;
use App\Periode;
use Illuminate\Database\Eloquent\Model;

class Horaire extends Model
{
    //
    protected $fillable = [
        'horaire'
    ];

    protected $table = 'horaires';

    public function periodes()
    {
        return $this->belongsToMany('App\Periode');
    }
}
