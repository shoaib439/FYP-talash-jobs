<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jsProject extends Model
{
    protected $table = 'jsProject';

    protected $fillable = [
        'user_id','project_title','project_desc' ,'project_sd','project_ed','project_url',
    ];
}
