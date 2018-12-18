<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\contactus;
class Jobseekercontactus extends Controller
{
   public function jobseekercontactusmethod(){
        echo 'A';

   }

    public function store(Request $request)
    {
        $name =  $request->Cname;
        $email =  $request->Cemail;
        $phoneno =  $request->Cno;
        $subject =  $request->Csubject;
        $message =  $request->Cmsg;

        $contactus = new contactus; //Creates new curdmodel class object. (it doesn't contain constructor.)

        $contactus->name =  $name;//$curdmodel->name is db table(curdmodels) column 'name'
        $contactus->email = $email;
        $contactus->phoneno = $phoneno;
        $contactus->subject = $subject;
        $contactus->message =  $message;

      $contactus->save(); //inserts into the database

//         echo $request;
}
}