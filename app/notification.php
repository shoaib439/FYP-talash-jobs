<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
    protected $fillable = [
        'user_id' ,'message','type','viewed'
    ];
}
