<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class skill extends Model
{
    protected $table = 'skill';

    protected $fillable = [
        'user_id','skills'
    ];
}
