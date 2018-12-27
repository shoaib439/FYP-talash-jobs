<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;
use App\companyprofile;
class Signupcompany extends Controller
{


    public function submission (Request $request)
    {


        $this->validate($request, [
            'name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required',
            'cnic'=> 'required',
            'companytype' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'industry' => 'required|string',
            'link' => 'required|string',
            'designation' => 'required|string',

        ]);



        $user = User::create([

            'name' => strtolower( $request->name),
            'display_name' =>  $request->name,
            'email' =>   $request->email,
            'password' =>  Hash::make( $request->password),
            'phoneno' =>  $request->phone,
            'gender'=>  $request->gender,
            'type'=> 'company',
            'city'=>    $request->city,
        ]);


        $companyuser = companyprofile::create([
            'user_id' => $user->id,
            'company_name' =>  $request->name,
            'type' =>   $request->companytype,
            'address' =>  $request->address,
            'website' =>  $request->link,
            'cnic'=>  $request->cnic,
            'person_name'=> $request->username,
            'person_designation'=>    $request->designation,
        ]);
        if($user && $companyuser){
            Auth::attempt(['email'=>$request->email,'password'=>$request->password]);
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