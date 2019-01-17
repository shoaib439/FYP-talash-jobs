<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class functionalarea extends Model
{

    protected $table = 'functionalarea';

    protected $fillable = [
        'user_id','functional_area'
    ];
}
