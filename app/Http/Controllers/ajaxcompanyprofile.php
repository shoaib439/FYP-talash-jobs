<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use App\User;
use App\companyprofile;

class AjaxCompanyProfile extends Controller
{


    public function person(Request $request){


        $gender = $request->gender;

        $companyuser = new Companyprofile;

        $companyuser->gender = $gender;

        $companyuser->save();
    }
    public function uploadimage(Request $request)
    {
        $file = $request->file('image');

        //Display File Name
       // echo 'File Name: '.$file->getClientOriginalName();
        //echo '<br>';

        //Display File Extension
        //echo 'File Extension: '.$file->getClientOriginalExtension();
        //echo '<br>';

        //Display File Real Path
        //echo 'File Real Path: '.$file->getRealPath();
        //echo '<br>';

        //Display File Size
        //echo 'File Size: '.$file->getSize();
        //echo '<br>';

        //Display File Mime Type
        //echo 'File Mime Type: '.$file->getMimeType();

        //Move Uploaded File
        $destinationPath = public_path().'/uploads';
        $file->move($destinationPath,$file->getClientOriginalName());


        $user =  User::find(1);

        $user->phoneno = $destinationPath;

        $user->save();
    //         echo $request;
    }
}