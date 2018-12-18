<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\User;
class Signupjobseeker extends Controller
{


    public function submission (Request $request)
    {
        $firstname =  $request->fname;
        $lastname =  $request->lname;
        $email =  $request->email;
        $phone =  $request->phone;
        $password =  $request->password;
        $gender =  $request->gender;

        $users = new User; //Creates new curdmodel class object. (it doesn't contain constructor.)

        $users->first_name =  $firstname;//$curdmodel->name is db table(curdmodels) column 'name'
        $users->last_name =  $lastname;
        $users->username = strtolower($firstname.$lastname);
        $users->display_name = $firstname . ' ' .$lastname;
        $users->email = $email;
        $users->phoneno = $phone;
        $users->password = $password;
        $users->gender =  $gender;

        $users->save(); //inserts into the database

//         echo $request;
}
}