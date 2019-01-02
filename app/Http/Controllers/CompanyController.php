<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\contactus;
use Auth;

class CompanyController extends Controller
{
    public function homeauth(){

        if(!Auth::guard()->check()){



            return redirect('/login');
        }

        else
        {
            if(Auth::user()->isCompany()){
                return view('companymain');

            }

        }

        return redirect('/login');

    }
//////////////////////////////////////////////////////////////////////////
    public function vacancyauth(){

        if(!Auth::guard()->check()){
            return redirect('/login');
        }

        else
        {
            if(Auth::user()->isCompany()){
                return view('AddVacancy');
            }

        }
        return redirect('/login');
    }

    //////////////////////////////////////////////////////////////////////////
    public function companydashboardauth(){

        if(!Auth::guard()->check()){
            return redirect('/login');
        }

        else
        {
            if(Auth::user()->isCompany()){
                return view('companydashboardnav');
            }

        }
        return redirect('/login');
    }
    //////////////////////////////////////////////////////////////////////////
    public function companyprofileauth(){

        if(!Auth::guard()->check()){
            return redirect('/login');
        }

        else
        {
            if(Auth::user()->isCompany()){
                return view('companyprofile');
            }

        }
        return redirect('/login');
    }

    //////////////////////////////////////////////////////////////////////////
    public function companyvacancylistauth(){

        if(!Auth::guard()->check()){
            return redirect('/login');
        }

        else
        {
            if(Auth::user()->isCompany()){
                return view('companyvacancylist');
            }

        }
        return redirect('/login');
    }

    //////////////////////////////////////////////////////////////////////////
    public function companyapplicationslistauth(){

        if(!Auth::guard()->check()){
            return redirect('/login');
        }

        else
        {
            if(Auth::user()->isCompany()){
                return view('companyapplications');
            }

        }
        return redirect('/login');
    }

}//end of companyController