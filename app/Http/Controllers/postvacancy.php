<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\vacancy;
class Postvacancy extends Controller
{


    public function addvacancy(Request $request)
    {

        $vacancytitle =  $request->vacancytitle;
        $type =  $request->type;
        $vacancydescription =  $request->vacancydescription;
        $vacancyPos =  $request->vacancyPos;
        $vacancyindustry =  $request->vacancyindustry;

        $vacancycity =  $request->vacancycity;
        $vacancytype =  $request->vacancytype;
        $vacancyshift =  $request->vacancyshift;
        $vacancydegreelevel =  $request->vacancydegreelevel;
        $vacancycarrierlevel =  $request->vacancycarrierlevel;
        $vacancySkills =  $request->vacancySkills;
        $vacancySalary =  $request->vacancySalary;
        $vacancyExperience =  $request->vacancyExperience;
        $vacancyAge =  $request->vacancyAge;
        $vacancyworkinghours =  $request->vacancyworkinghours;
        $vacancylastdate =  $request->vacancylastdate;

        $vacancy = new vacancy; //Creates new curdmodel class object. (it doesn't contain constructor.)


       $vacancy->title =  $vacancytitle;//$curdmodel->name is db table(curdmodels) column 'name'
        $vacancy->vacancy_type = $type;
        $vacancy->description = $vacancydescription;
        $vacancy->no_of_position = $vacancyPos;
        $vacancy->industry =  $vacancyindustry;
        $vacancy->job_city = $vacancycity;
        $vacancy->job_type = $vacancytype;
        $vacancy->job_shift = $vacancyshift;
        $vacancy->degree_level =  $vacancydegreelevel;
        $vacancy->carrier_level = $vacancycarrierlevel;
        $vacancy->skills_required = $vacancySkills;
        $vacancy->salary = $vacancySalary;
        $vacancy->experience =  $vacancyExperience;
        $vacancy->age_range = $vacancyAge;
        $vacancy->working_hours = $vacancyworkinghours;
        $vacancy->last_date =  $vacancylastdate;


      $vacancy->save(); //inserts into the database

        echo 'success';
//         echo $request;
}
}