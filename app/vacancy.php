<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vacancy extends Model
{
    protected $table = 'vacancy';

    protected $fillable = [
        'user_id','title' ,'vacancy_type','description','no_of_position','industry','job_city','job_type',
        'job_shift','degree_level','carrier_level','skills_required','salary','experience',
        'age range','working_hours','last_date','hr_id','hr_no_of_interview','hr_procedure'
    ];
}
