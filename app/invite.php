<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invite extends Model
{
    protected $fillable = [
        'jobseeker_id','company_id' ,'vacancy_id','invite_accept'
    ];
}
