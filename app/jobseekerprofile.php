<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jobseekerprofile extends Model
{
    protected $fillable = [
        'date_of_birth' ,'age','country'
    ];
}
