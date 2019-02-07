<?php

namespace App\Http\Controllers;

use App\skill;
use App\vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;
use App\User;


class SearchController extends Controller
{
   public function searchVacancy(Request $request)
   {

       $q = $request->userquery;

       $queryname= $request->userquery;
       $querytype= $request->vacancytype;
       $querycity= $request->cityname;
       $queryindustry= $request->industrytype;

//       $userinput=Input::get($q);
//      dd($userinput);
//       echo $userinput;
//       die();

       $user = Auth::user();


       if (!Auth::guard()->check()):

           var_dump('C');die();
           return redirect('/login');
       elseif(Auth::user()->isJobseeker()):
               if ($q != "") {

                   $searchVacancy = vacancy::where('title', 'LIKE', '%' . $q . '%')->get();




                   $users = [];
                   if (count($searchVacancy) > 0) {

//                      $searchData=[];
//                      $searchData=$searchVacancy;
//                       $searchData=$querytype;
//                       $searchData=$querycity;
//                       $searchData=$queryindustry;

                       if(!empty($search_result)){
                           $searchVacancy->merge($search_result);
                       }

                       if(!empty($city_result)){
                           $searchVacancy->merge($city_result);
                       }
                       if(!empty($industry_result)){
                           $searchVacancy->merge($industry_result);
                       }

                       foreach ($searchVacancy as $vacancy):

                           $user = user::where('id',$vacancy->user_fk)->get()->first();

                           $users[] = $user;

                       endforeach;

//                       dd($users);
//                       die();




                       // return view('searchVacancyResultPage')->withDetails($searchVacancy)->withQuery($q);
                   }
                   return view('searchVacancyResultPage', compact('searchVacancy','users'));


               }



               else {

//                   var_dump('B');die();
                   return "no vacancy found";
               }



       endif;

       return redirect('/login');


   }//


    public function searchVacancyfromLanding(Request $request)
    {

        $q = $request->userquery;

        $querytype= $request->vacancytype;
        $querycity= $request->cityname;
        $queryindustry= $request->industrytype;
//       $userinput=Input::get($q);
//      dd($userinput);
//       echo $userinput;
//       die();

        $user = Auth::user();

        $searchVacancy = [];
        if (!Auth::guard()->check()):
            return redirect('/login');
        else:
            if (Auth::user()->isJobseeker()) {

                if ($q != "") {

                    $searchVacancy = DB::select("SELECT * FROM `vacancy` WHERE `title` LIKE '%".$q."%'");
                    $a = 'A';

                    if(!empty($querytype) && empty($querycity) && empty($queryindustry))
                    {

                        $searchVacancy = DB::select("SELECT * FROM `vacancy` WHERE `title` LIKE '%".$q."%' AND `vacancy_type`='".$querytype."'");
                        $a = 'B';
                    }

                    if(!empty($querycity) && empty($querytype) && empty($queryindustry))
                    {

                        $searchVacancy = DB::select("SELECT * FROM `vacancy` WHERE `title` LIKE '%".$q."%' AND `job_city`='".$querycity."'");
                        $a = 'c';
                    }

                    if(!empty($queryindustry) && empty($querytype) && empty($querycity))
                    {
                        $searchVacancy = DB::select("SELECT * FROM `vacancy` WHERE `title` LIKE '%".$q."%' AND `industry`='".$queryindustry."'");
                        $a = 'd';
                    }

                    if(!empty($querytype) && !empty($querycity) && empty($queryindustry)  )
                    {

                        $searchVacancy = DB::select("SELECT * FROM `vacancy` WHERE `title` LIKE '%".$q."%' AND `vacancy_type`='".$querytype ."' AND `job_city`='".$querycity."'");
                        $a = 'e';
                    }

                    if(!empty($querytype) && !empty($queryindustry) && empty($querycity)  )
                    {

                        $searchVacancy = DB::select("SELECT * FROM `vacancy` WHERE `title` LIKE '%".$q."%' AND `vacancy_type`='".$querytype ."' AND `industry`='".$queryindustry."'");
                        $a = 'f';
                    }

                    if(!empty($querycity) && !empty($queryindustry) && empty($querytype))
                    {

                        $searchVacancy = DB::select("SELECT * FROM `vacancy` WHERE `title` LIKE '%".$q."%' AND `job_city`='".$querycity ."' AND `industry`='".$queryindustry."'");
                        $a = 'g';
                    }

                    if(!empty($querycity) && !empty($querytype) && !empty($queryindustry))
                    {

                        $searchVacancy = DB::select("SELECT * FROM `vacancy` WHERE `title` LIKE '%".$q."%' AND `job_city`='".$querycity ."' AND `industry`='".$queryindustry."' AND `vacancy_type`='".$querytype."'");
                        $a = 'h';
                    }

                    $users = [];
                    foreach ($searchVacancy as $vacancy):

                        $user = user::where('id',$vacancy->user_fk)->get()->first();

                        $users[] = $user;

                    endforeach;

//                    dd($searchVacancy,$a,$querycity,$querytype,$queryindustry);

                   // var_dump($searchVacancy);
                   // die();
                    if (count($searchVacancy) > 0) {

                        return view('searchVacancyResultPage', compact('searchVacancy','users'));
                        // return view('searchVacancyResultPage')->withDetails($searchVacancy)->withQuery($q);
                    }


                } else {

                    return "no vacancy found";
                }


            }

        endif;

        return view('/searchVacancyResultPage',compact('searchVacancy'));


    }//



    public function companySearchJs(Request $request){

        $q = $request->companyQuery;

        if (!Auth::guard()->check()):
            return redirect('/login');
        else:
            if (Auth::user()->isCompany()) {

                if ($q != "") {

                    $searchjs = skill::where('skills', 'LIKE', '%' . $q . '%')->get();


                    $jsuser = [];

                    $continue = true;
                    foreach ($searchjs as $key=>$js){

                        foreach ($jsuser as $user):
                            $continue = true;
                            if($user['user']->id == $js->user_id):
                                $continue = false;
                            break;
                            endif;
                        endforeach;

                        if(!$continue):
                            continue;
                        endif;

                        $user = User::where('id',$js->user_id)->get()->first(); //getting all user for same skills->first()

                        $skills = skill::where('user_id',$js->user_id)->get();

                        $jsuser[$key] = [];
                        $jsuser[$key]['skills'] = [];
                        foreach ($skills as $skill){

                            $jsuser[$key]['skills'][] = $skill->skills;
                        }

                        $jsuser[$key]['user'] = $user;
                    }

                       return view('searchJobseekerResultPage', compact('jsuser'));
                     //  return view('searchJobseekerResultPage');




                } else {

                    return "no jobseeker found";
                }


            }

        endif;

        return redirect('/login');


    }




}
