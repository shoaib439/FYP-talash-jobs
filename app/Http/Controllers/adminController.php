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
    public function home()
    {

        if (!Auth::user()->isAdmin()):
            return redirect('/');
        endif;

        $data = [];
        $adminrole=null;
        $totalUsers = User::where(['role'=>$adminrole])->get()->toArray();
        $totalVacancies = vacancy::all('id')->toArray();
        $totaljs = User::where(['type' => "jobseeker"])->get(['id']);
        $totalcompany = User::where(['type' => "company"])->get(['id']);

        $data['user'] = count($totalUsers);
        $data['vacancy'] = count($totalVacancies);
        $data['jobseeker'] = count($totaljs);
        $data['company'] = count($totalcompany);


        return view('/adminfrontend/admindashboard', compact('data'));

    }

    public function adminViewCompany($id){

        if (!Auth()->guard()->check())

        {
            return redirect('/');
        }

        else {

            if (Auth::user()->isAdmin()) {
                $user=Auth::User();

                $company=$user::where('id',$id)->get();
                $companyData=companyprofile::where('user_id',$id)->get();
//                $jvacancy=vacancy::where(['user_fk'=>$id,'vacancy_type'=>"Job"])->get();
//                $ivacancy=vacancy::where(['user_fk'=>$id,'vacancy_type'=>"Internship"])->get();
//
//                $jobsCount=count($jvacancy);
//                $internshipCount=count($ivacancy);

                $totalPos=vacancy::where('user_fk',$id)->sum('no_of_position');

//                dd($totalPos);
//                die();
             //   $totaljobs=vacancy::where('type',"Job")->get();

//                                dd($internshipCount);
//                                 die();

                $cData=[];

                $cData['user']=$company->first();
                $cData['company']=$companyData->first();
//
//                $cData['job']=$jobsCount;
//                $cData['position']=$totalPos;
//                $cData['internship']=$internshipCount;



//                dd($cData);
//                die();



                return view('adminfrontend.AdminViewCompany',compact('cData'));

            }

        }

    }

    public function admin(Request $request)
    {

        if ($request->isMethod('post')) {
            $data = $request->input();
            $User = new User;
            if (auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {

                $verify = $User::where(['email' => $data['email']])->get()->first();

                if ($verify->role == '1') {
                    // Session::set('user_type', 'jobseeker');
                    return redirect('/adminpanel');
                } else {
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

    public function loginPage()
    {
        if (Auth::guard()->check()) {
            return redirect('/');
        }
        return view('/adminfrontend/Adminlogin');
    }


    public function admincheck()
    {

        if (!Auth::guard()->check()) {
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


    public function showUsers()
    {

        //  $Users=User::all()->toArray();

        $adminrole = null;
        $Users = User::where(['role' => $adminrole])->get()->toArray();

        return view('/adminfrontend.registeredUsers', compact('Users'));


    }//end of showUsers


    public function deleteuser($id)
    {

//        $Users=User->find
//
//       DB::table('users')->where('id','$id')->delete();

        $user = User::find($id);
        if($user->type=='company'){
            DB::table('notifications')->where('company_id',$id)->delete();
            DB::table('minterviews')->where('company_id',$id)->delete();
            $user->delete();
        }
        else
        {
            $user->delete();
        }

        return redirect('registeredUsers');


    }//end of deleteuser


    public function showComplaints()
    {


        $complaints = contactus::all()->toArray();


        return view('/adminfrontend.usersComplaints', compact('complaints'));

    }


    public function showFeedback()
    {


        $feedback = feedback::all()->toArray();

        return view('/adminfrontend.usersfeedback', compact('feedback'));

    }


    public function complaintResponse(Request $request)
    {

        if (!Auth()->guard()->check()) {
            return redirect('/');
        } else {
            if (Auth::user()->isAdmin()) {


                $validation = Validator::make($request->all(), [

                    'user_email' => 'required|email',
                    'complaint_id' => 'required|int',
                ]);

                if ($validation->passes()) {
                    $complaint = contactus::where(['id' => $request->complaint_id, 'email' => $request->user_email])->get()->first();

                    $user = User::where('email', $request->user_email)->get()->first();

//                  var_dump($complaint);
//                  die();
                    $html = <<<HTML
Your Complaint related to Subject <strong> '{$complaint->subject}'</strong>is resolved.
HTML;
                    $s = 'solved';

                    if ($complaint) {

                        DB::update("UPDATE `contactus` SET `solve`='{$s}' WHERE `id`='{$request->complaint_id}'");

                        notification::create([
                            'user_id' => $user->id,
                            'message' => $html,
                            'type' => 'Customer Support',
                            'viewed' => '0',
                        ]);


                    }


                    return redirect('/usersComplaints');

                } else {
                    return response()->json([
                        'success' => '0',
                        'message' => $validation->errors()->all(),
                        'class_name' => 'alert-danger'
                    ]);
                }

            }
        }


    }


    public function deletecomplaint($id)
    {

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
    public function manageposts()
    {

        //$Users=User::where('type','company')->get();


        $vacancy = vacancy::all();

        $posts = [];
        foreach ($vacancy as $key => $vac) {

            $user = User::where('id', $vac->user_fk)->get()->first();

            if (!empty($user)) {
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

        return view('/adminfrontend.managePosts', compact('posts'));
    }


    public function companyRequest()
    {

        if (!Auth()->guard()->check())

        {
            return redirect('/');
        }

        else

            {
                    if(Auth::user()->isAdmin())
                        {


                            $companyRequest=User::where(['type'=>'company','active_status'=>'0'])->get();

//                            var_dump($companyRequest);
//                            die();

                            return view('adminfrontend.companyRequestPage',compact('companyRequest'));


                        }

             }

    }

    public function approveCompany($id){


        if (!Auth()->guard()->check())

        {
            return redirect('/');
        }

        else

        {
            if(Auth::user()->isAdmin()) {
                $s='1';

                DB::update("UPDATE `users` SET `active_status`='{$s}' WHERE `id`='{$id}'");
                return redirect('approve/companyRequest');

            }
        }


    }

    public function admindeletevacancy($id){

//        $Users=User->Ffind
        // $vacancy=vacancy::find($id);
//
        DB::table('vacancy')->where('id',$id)->delete();
        DB::table('notifications')->where('vacancy_id',$id)->delete();
        DB::table('minterviews')->where('vacancy_id',$id)->delete();


//        $vacancy=vacancy::find($id);
//        $vacancy->detete();



        return redirect('/managePosts');




    }//end of deleteuser




}//end of controller
