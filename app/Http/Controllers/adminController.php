<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class adminController extends Controller
{
    public function home(){

        if(!Auth::user()->isAdmin()):
            return redirect('/');
        endif;

        return view('/adminfrontend/adminpanel');

    }
    public function admin( Request $request){

        if($request->isMethod('post')){
            $data=$request->input();
            $User = new User;
            if(auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){

                $verify = $User::where(['email' => $data['email']])->get()->first();

                if($verify->role == '1'){
                    // Session::set('user_type', 'jobseeker');
                    return redirect('/adminpanel');
                }
                else{
                    // Session::set('user_type', 'company');
                    return redirect('/');
                }
            }



            }
//                echo "success"; die;
//                return redirect('/adminpanel');
//
//            }
//            else{
////                echo "failed"; die;
//                return redirect('/Adminlogin');
//
//            }
//        }

        return redirect('/Adminlogin');
    }


    public function admincheck()
    {

        if(!Auth::guard()->check()){
            return redirect('/Adminlogin');
        }

        return view('adminpanel');
    }
}
