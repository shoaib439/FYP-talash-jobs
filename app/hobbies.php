<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hobbies extends Model
{
    protected $table = 'hobbies';

    protected $fillable = [
        'user_id','hobbies'
    ];
}
