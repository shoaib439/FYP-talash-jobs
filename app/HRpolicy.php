<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hrpolicy extends Model
{
    protected $table = 'hrpolicy';

    protected $fillable = [
        'user_id','no_of_interview','procedure'
    ];
}
