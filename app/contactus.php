<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contactus extends Model
{

    protected $table = 'contactus';

    protected $fillable = [
        'name','email','phoneno','subject','message'
    ];
}
