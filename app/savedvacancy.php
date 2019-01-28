<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class savedvacancy extends Model
{
    protected $fillable = [
        'jobseeker_id','vacancy_id'
    ];
}
