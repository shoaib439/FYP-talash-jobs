<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\contactus;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function home(){

        if(!Auth::guard()->check()){
            return redirect('/login');
        }

        return view('companymain');
    }

//    public function check(){
//
//        if(!Auth::guard()->check()){
//            return redirect('/login');
//        }
//
//        return view('AddVacancy');
//    }
}