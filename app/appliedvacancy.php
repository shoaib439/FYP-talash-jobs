<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class appliedvacancy extends Model
{
    protected $fillable = [
        'jobseeker_id','vacancy_id','applied_date','status'
    ];
}
