<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contactus extends Model
{

    protected $table = 'contactus';

    protected $fillable = [
        'name','email','type','subject','message','solve'
    ];
}
