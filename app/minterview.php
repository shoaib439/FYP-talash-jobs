<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class minterview extends Model
{
    protected $fillable = [
        'user_id' ,'vacancy_id','company_id','date','time'
    ];
}
