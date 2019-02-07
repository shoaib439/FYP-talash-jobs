<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jobseekerprofile extends Model
{
    protected $fillable = [
        'user_id','date_of_birth' ,'js_address','bio','carrierlevel'
    ];
}
