<?php

namespace App\Http\Controllers;

use App\companyprofile;
use App\feedback;
use App\vacancy;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use App\contactus;
use Illuminate\Support\Facades\Validator;
use App\notification;

class adminController extends Controller
{
    public function home(){

        if(!Auth::user()->isAdmin()):
            return redirect('/');
        endif;

        $data=[];
        $totalUsers=User::all('id')->toArray();
        $totalVacancies=vacancy::all('id')->toArray();
        $totaljs=User::where(['type'=>"jobseeker"])->get(['id']);
        $totalcompany=User::where(['type'=>"company"])->get(['id']);

        $data['user']=count($totalUsers);
        $data['vacancy']=count($totalVacancies);
        $data['jobseeker']=count($totaljs);
        $data['company']=count($totalcompany);




        return view('/adminfrontend/admindashboard',compact('data'));

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
                    Auth::logout();
                    return redirect('/login');
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
    public function loginPage(){
        if(Auth::guard()->check()){
            return redirect('/');
        }
        return view('/adminfrontend/Adminlogin');
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

      //  $Users=User::all()->toArray();

        $adminrole=null;
        $Users=User::where(['role'=>$adminrole])->get()->toArray();

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


    public function complaintResponse(Request $request){

        if (!Auth()->guard()->check()) {
            return redirect('/');
        } else {
            if (Auth::user()->isAdmin()) {


                $validation=Validator::make($request->all(),[

                    'user_email'=>'required|email',
                    'complaint_id'=>'required|int',
                ]);

                if($validation->passes())
                {
                    $complaint=contactus::where(['id'=>$request->complaint_id,'email'=>$request->user_email])->get()->first();

                    $user=User::where('email',$request->user_email)->get()->first();

//                  var_dump($complaint);
//                  die();
                    $html = <<<HTML
Your Complaint related to Subject <strong> '{$complaint->subject}'</strong>is resolved.
HTML;
                    $s='solved';

                    if($complaint){

                        DB::update("UPDATE `contactus` SET `solve`='{$s}' WHERE `id`='{$request->complaint_id}'");

                        notification::create([
                            'user_id'=> $user->id,
                            'message'=>$html,
                            'type'=> 'Customer Support',
                            'viewed'=> '0',
                        ]);



                    }


                    return redirect('/usersComplaints');

                }
                else
                {
                    return response()->json([
                        'success' => '0',
                        'message'   => $validation->errors()->all(),
                        'class_name'  => 'alert-danger'
                    ]);
                }

            }
        }



    }



    public function deletecomplaint($id){

        $c = contactus::find($id);
        $c->delete();
        return redirect('/usersComplaints');

    }//end of deleteuser

//    public function dashboardData(){
//
//        $totalUsers=User::all('id')->toArray();
//        $totalVacancies=vacancy::all('id')->toArray();
//        $totaljs=User::where(['type'=>"jobseeker"])->get('id');
//        $totalcompany=User::where(['type'=>"company"])->get('id');
//
//        $c=count($totalUsers);
//
//        var_dump($c);
//        die();
//
//
//    }


//masla here
        public function manageposts(){

            //$Users=User::where('type','company')->get();


            $vacancy = vacancy::all();

            $posts=[];
            foreach ($vacancy as $key => $vac){

                $user = User::where('id',$vac->user_fk)->get()->first();

                if(!empty($user)){
                    $posts[$key]['vacancy'] = $vac;
                    $posts[$key]['user'] = $user->id;
                }
            }

/*
            foreach ($Users as $key => $user){

               $posts[$key]  = [];

                $vacancy=vacancy::where('user_fk',$user->id)->get();

                $posts[$key]['vacancy'] = false;
                if(!empty($vacancy) || $vacancy->isEmpty()):

                    $posts[$key]['vacancy'] = $vacancy->first();
                endif;



            }
*/

//            $posts[$key]['user']=$Users;
//                 var_dump($posts);
//                          die();

        return view('/adminfrontend.managePosts',compact('posts'));
        }

}
