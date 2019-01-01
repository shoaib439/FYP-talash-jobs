<?php

namespace App\Http\Controllers;

use App\feedback;
use Illuminate\Http\Request;
use Auth;
use App\User;
use DB;
use App\contactus;

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



//    public function showComplaints(){
//
//        $complaintData=contactus::all();
//
//        return view('/adminfrontend.usersComplaints', compact('complaintData'));
//
//
//
//
//    }//end of showComplaints


    public function showUsers(){

        $Users=User::all()->toArray();

        return view('/adminfrontend.registeredUsers', compact('Users'));




    }//end of showUsers


    public function deleteuser($id){

//        $Users=User->find
//
//       DB::table('users')->where('id','$id')->delete();

        $user = User::find($id);
        $user->delete();
       return redirect('registeredUsers');




    }//end of deleteuser


    public function showComplaints(){


        $complaints=contactus::all()->toArray();

            return view('/adminfrontend.usersComplaints', compact('complaints'));

    }


    public function showFeedback(){


        $feedback=feedback::all()->toArray();

        return view('/adminfrontend.usersfeedback', compact('feedback'));

    }

}
