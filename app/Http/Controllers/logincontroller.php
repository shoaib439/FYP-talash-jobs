<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\User;
class Logincontroller extends Controller
{


    public function login (Request $request)
    {

        $email =  $request->email;
        $password =  $request->password;

        $User = new User;
//        echo ($User::find(1))->display_name;
//    return;

        $verify = $User::where(['email' => $email, 'password' => $password])->first();

        if(empty($verify->id)):
            return redirect('/login');
        endif;

        $type = $verify->type;

        //Session::set('user_id', $verify->id);
        //Session::set('user_display', $verify->display_name);
        if($type == 'jobseeker'){
           // Session::set('user_type', 'jobseeker');
            return redirect('jobseekerhome');
        }
        else{
           // Session::set('user_type', 'company');
            return redirect('companyhome');
        }



       // $users = new User; //Creates new users class object. (it doesn't contain constructor.)


    }
}