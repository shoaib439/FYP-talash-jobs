<?php

namespace App\Http\Controllers;

use App\jobseekerprofile;
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
//                $profile['cnic'] = $jsuser->cnic;



                $profile['image'] = empty($user->profile_pic) ? 'images/Profile.png':$user->profile_pic;
                return view($view,compact('profile'));
            }
        endif;
        return redirect('/login');
    }

//////////////////////////////////////////////////////////////////////////

}//end of jobseekerController