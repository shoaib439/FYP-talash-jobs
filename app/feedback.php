<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    protected $table = 'feedback';

    protected $fillable = [
        'name','email','suggestion','rating'
    ];
}
