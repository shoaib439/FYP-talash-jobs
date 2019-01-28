<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\contactus;
use Illuminate\Support\Facades\Auth;
class Jobseekercontactus extends Controller
{

    public function contactus(){

        if(!Auth::guard()->check()){
            return redirect('/login');
        }


        return view('contactus');


    }


    public function store(Request $request)


    {



        $user=Auth::user();
        $name =  $user->display_name;
        $email =  $user->email;
        $type =  $user->type;
        $subject =  $request->Csubject;
        $message =  $request->Cmsg;


        $contactus = new contactus; //Creates new curdmodel class object. (it doesn't contain constructor.)

        $contactus->name =  $name;//$curdmodel->name is db table(curdmodels) column 'name'
        $contactus->email = $email;
        $contactus->type = $type;
        $contactus->subject = $subject;
        $contactus->message =  $message;
        $contactus->solve =  'pending';

      $contactus->save(); //inserts into the database

        return redirect('/');
//         echo $request;
}
}