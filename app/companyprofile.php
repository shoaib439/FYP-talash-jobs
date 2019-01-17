<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class companyprofile extends Model
{
    protected $fillable = [
        'user_id','company_name' ,'type','address','website','cnic','person_name','skype','person_designation'
    ];
}
