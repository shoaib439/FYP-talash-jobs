<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class workexperience extends Model
{
    protected $table = 'workexperience';

    protected $fillable = [
        'user_id','company_name','company_position' ,'company_location','job_type','start_date','end_date','currently_working'
    ];
}
