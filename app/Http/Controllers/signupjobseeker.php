<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\jobseekerprofile;
use App\User;
class Signupjobseeker extends Controller
{


    public function submission (Request $request)
    {


        $this->validate($request, [
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required',
            'gender'=> 'required',

        ]);

        $firstname =  $request->fname;
        $lastname =  $request->lname;
        $email =  $request->email;
        $phone =  $request->phone;
        $password =  $request->password;
        $gender =  $request->gender;


        $user = User::create([

            'first_name' => $firstname,
            'last_name' => $lastname,
            'name' => strtolower($firstname.$lastname),
            'display_name' => $firstname. ' '.$lastname,
            'email' =>  $email,
            'password' =>  Hash::make($password),
            'phoneno' => $phone,
            'gender'=> $gender,
            'type'=> 'jobseeker',
        ]);


        $jobseekeruser = jobseekerprofile::create([
            'user_id' => $user->id,
        ]);

        if($user && $jobseekeruser){
            Auth::attempt(['email'=>$email,'password'=>$password]);
            return redirect('/');
        }
        else{
            return redirect('/jobseekerSignup');
        }

        /*$users = new User; //Creates new curdmodel class object. (it doesn't contain constructor.)

        $users->first_name =  $firstname;//$curdmodel->name is db table(curdmodels) column 'name'
        $users->last_name =  $lastname;
        $users->name = strtolower($firstname.$lastname);
        $users->display_name = $firstname . ' ' .$lastname;
        $users->email = $email;
        $users->phoneno = $phone;
        $users->password = $password;
        $users->gender =  $gender;

        $users->save(); //inserts into the database

//         echo $request;
        */
    }
}