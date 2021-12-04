<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    //
    protected $fillable = [
        'id','user_id','ip_address','user_agent','payload','last_activity'
    ];
    //protected $primaryKey = 'user_id';

    protected $table = 'sessions';
}
