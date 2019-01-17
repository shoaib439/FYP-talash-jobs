<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prefferedcity extends Model
{
    protected $table = 'prefferedcity';

    protected $fillable = [
        'user_id','preffered_city'
    ];

}
