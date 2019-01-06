<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;
use Illuminate\Http\Request;
use App\User;
class Logincontroller extends Controller
{



//    public function admin( Request $request){
//
//        if($request->isMethod('post')){
//            $data=$request->input();
//            $User = new User;
//            if(auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
//
//                $verify = $User::where(['email' => $data['email']])->get()->first();
//
//                if($verify->role == '1'){
//                    // Session::set('user_type', 'jobseeker');
//                    return redirect('/adminpanel');
//                }
//                else{
//                    // Session::set('user_type', 'company');
//                    return redirect('/');
//                }
//            }
//
//
//
//        }
//
//        return redirect('/Adminlogin');
//    }
    public function index(){

        if(Auth::guard()->check()){
            return redirect('/');
        }

        return view('login');
    }

    public function login (Request $request)
    {
        if(Auth::guard()->check()){
            return redirect('/');
        }

        $email =  $request->email;
        $password =  $request->password;

        $User = new User;

        if(auth::attempt(['email'=>$email,'password'=>$password])):
            $verify = $User::where(['email' => $email])->get()->first();

            if($verify->type == 'jobseeker' && !$verify->isAdmin()){
                // Session::set('user_type', 'jobseeker');
                return redirect('/jobseekerhome');
            }
            elseif(!$verify->isAdmin()){
                // Session::set('user_type', 'company');
                return redirect('/company/main');
            }
        endif;

        return redirect('/login')->withInput(['msg'=>'Invalid Username or Password']);
    }
}