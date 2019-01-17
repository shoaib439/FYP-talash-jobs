<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class education extends Model
{
    protected $table = 'education';

    protected $fillable = [
        'user_id','degree_title','year_of_completion' ,'cgpa','degree_level','institite','city'
    ];
}
