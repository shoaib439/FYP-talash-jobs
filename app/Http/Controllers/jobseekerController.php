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
    public function AuthCheck($view = ''){

        if(empty($view)):
            return redirect('/');
        endif;

        if(!Auth::guard()->check()):
            return redirect('/login');
        else:
            if(Auth::user()->isJobseeker()){
                return view($view);
            }
        endif;
        return redirect('/login');
    }

//////////////////////////////////////////////////////////////////////////

}//end of jobseekerController