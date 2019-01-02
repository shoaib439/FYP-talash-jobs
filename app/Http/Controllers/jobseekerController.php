<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\contactus;
use Auth;

class JobseekerController extends Controller
{
    public function jshomeauth(){

        if(!Auth::guard()->check()){



            return redirect('/login');
        }

        else
        {
            if(Auth::user()->isJobseeker()){
                return view('jobseekerMainLayout');

            }

        }

        return redirect('/login');

    }
//////////////////////////////////////////////////////////////////////////


    public function jsbuildCVauth(){

        if(!Auth::guard()->check()){



            return redirect('/login');
        }

        else
        {
            if(Auth::user()->isJobseeker()){
                return view('jobseekerbuildCV');

            }

        }

        return redirect('/login');

    }
//////////////////////////////////////////////////////////////////////////

    public function jsappliedjobsauth(){

        if(!Auth::guard()->check()){



            return redirect('/login');
        }

        else
        {
            if(Auth::user()->isJobseeker()){
                return view('jobseekerAppliedjob');

            }

        }

        return redirect('/login');

    }
//////////////////////////////////////////////////////////////////////////

    public function jssavedjobsauth(){

        if(!Auth::guard()->check()){



            return redirect('/login');
        }

        else
        {
            if(Auth::user()->isJobseeker()){
                return view('jobseekerSavedpost');

            }

        }

        return redirect('/login');

    }
//////////////////////////////////////////////////////////////////////////

    public function jsviewinvitationauth(){

        if(!Auth::guard()->check()){



            return redirect('/login');
        }

        else
        {
            if(Auth::user()->isJobseeker()){
                return view('jobseekerViewinvitation');

            }

        }

        return redirect('/login');

    }
//////////////////////////////////////////////////////////////////////////

}//end of jobseekerController