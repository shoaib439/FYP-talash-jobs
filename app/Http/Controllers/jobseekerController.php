<?php

namespace App\Http\Controllers;

use App\functionalarea;
use App\hobbies;
use App\jobseekerprofile;
use App\jsProject;
use App\languages;
use App\prefferedcity;
use App\skill;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\contactus;
use Illuminate\Support\Facades\Auth;

class JobseekerController extends Controller
{
    public function AuthCheck($view = ''){

        if(empty($view)):
            return redirect('/');
        endif;

        if(!Auth::guard()->check()):
            return redirect('/login');
        else:
            if(Auth::user()->isJobseeker()){

                $user = Auth::user();

                $jsuser = jobseekerprofile::where('user_id',$user->id)->get()->first();

                $profile = [];

                $profile['js_address'] = $jsuser->js_address;
                $profile['date_of_birth'] = $jsuser->date_of_birth;




                $profile['image'] = empty($user->profile_pic) ? 'images/Profile.png':$user->profile_pic;
                return view($view,compact('profile'));
            }
        endif;
        return redirect('/login');
    }



    public function home(){
        if(!Auth::guard()->check()){
            return redirect('/login');
        }


        if(!Auth::user()->isJobSeeker()){
            return view('/');
        }

        $user = Auth::user();

        $jsuser = jobseekerprofile::where('user_id',$user->id)->get()->first();

        $profile = [];

        $profile['js_address'] = $jsuser->js_address;
        $profile['date_of_birth'] = $jsuser->date_of_birth;




        $profile['image'] = empty($user->profile_pic) ? 'images/Profile.png':$user->profile_pic;

        $hobbies = hobbies::where('user_id',$user->id)->get();

        $languages = languages::where('user_id',$user->id)->get();

        $prefferedcity = prefferedcity::where('user_id',$user->id)->get();

        $skills = skill::where('user_id',$user->id)->get();

        $functionalarea=functionalarea::where('user_id',$user->id)->get();

        $jsproject=jsProject::where('user_id',$user->id)->get();

        return view('/jobseekerMainLayout',compact('profile','hobbies','languages','prefferedcity','skills','functionalarea','jsproject'));
    }

//////////////////////////////////////////////////////////////////////////

        public  function jsbuildCVauth(){
                if(!Auth::guard()->check()){
                    return redirect('/login');


                }


                if(!Auth::user()->isJobSeeker()){
                    return view('/');
                }

                return view('jobseekerbuildCV');

            }///
///

    public  function jsappliedjobsauth(){

        if(!Auth::guard()->check()){
            return redirect('/login');


        }


        if(!Auth::user()->isJobSeeker()){
            return view('/');
        }

        return view('jobseekerAppliedjob');
    }





    public  function jssavedjobsauth(){

        if(!Auth::guard()->check()){
            return redirect('/login');


        }


        if(!Auth::user()->isJobSeeker()){
            return view('/');
        }

        return view('jobseekerSavedpost');
    }






    public  function jsviewinvitationauth(){

        if(!Auth::guard()->check()){
            return redirect('/login');


        }


        if(!Auth::user()->isJobSeeker()){
            return view('/');
        }

        return view('jobseekerViewinvitation');
    }



}//end of jobseekerController