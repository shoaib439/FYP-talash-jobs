<?php

namespace App\Http\Controllers;

use App\appliedvacancy;
use App\companyprofile;
use App\education;
use App\functionalarea;
use App\hobbies;
use App\invite;
use App\jobseekerprofile;
use App\jsProject;
use App\languages;
use App\notification;
use App\prefferedcity;
use App\savedvacancy;
use App\skill;
use App\User;
use App\vacancy;
use App\workexperience;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\contactus;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JobseekerController extends Controller
{

    public function landingjobs(){


        $jobs = vacancy::where(['vacancy_type'=>'job'])->get();

        $jobslist = [];

        foreach ($jobs as $key=>$job):

            $jobslist[$key]['vacancy'] = $job;
            $jobslist[$key]['company'] = companyprofile::where('user_id',$job->user_fk)->get()->first();
            $jobslist[$key]['user'] = User::where('id',$job->user_fk)->get()->first();

        endforeach;


        $interships = vacancy::where(['vacancy_type'=>'intership'])->get();


        $intershiplist = [];

        foreach ($interships as $key=>$intership):

            $intershiplist[$key]['vacancy'] = $intership;
            $intershiplist[$key]['company'] = companyprofile::where('user_id',$intership->user_fk)->get()->first();
            $jobslist[$key]['user'] = User::where('id',$intership->user_fk)->get()->first();

        endforeach;

        return view('Landing',compact('jobslist','intershiplist'));
    }
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

        $education=education::where('user_id',$user->id)->get();

        $workexp=workexperience::where('user_id',$user->id)->get();

        $notifications = Auth::user()->notifications();

        return view('/jobseekerMainLayout',compact('profile','hobbies','languages','prefferedcity','skills','functionalarea','jsproject','notifications','education','workexp'));
    }

//////////////////////////////////////////////////////////////////////////

        public  function jsbuildCVauth(){
                if(!Auth::guard()->check()){
                    return redirect('/login');


                }


                if(!Auth::user()->isJobSeeker()){
                    return view('/');
                }

            $notifications = Auth::user()->notifications();
                return view('jobseekerbuildCV',compact('notifications'));

            }///
///

    public  function jsappliedjobsauth(){

        if(!Auth::guard()->check()){
            return redirect('/login');


        }


        if(!Auth::user()->isJobSeeker()){
            return view('/');
        }



        $user=Auth::user();
        $my=vacancy::all();

//        var_dump($my[0]->id);
//        die();



        $applied = appliedvacancy::where(['jobseeker_id'=>$user->id])->get();

        $appliedvacancy = [];
        $appliedarray = [];
        $appliedstatus= [];
        foreach ($applied as $key=>$vac ):

            $appliedvacancy[] = vacancy::where('id',$vac->vacancy_id)->get()->first();
            $appliedarray[]=$applied[$key]->applied_date;
            $appliedstatus[]=$applied[$key]->status;
        endforeach;


        $notifications = Auth::user()->notifications();

        return view('jobseekerAppliedjob',compact('notifications','appliedvacancy','appliedarray','appliedstatus'));
    }

    public function acceptInvite($vid,$cid){

        if(!Auth::guard()->check()){
            return redirect('/login');


        }


        if(!Auth::user()->isJobSeeker()){
            return view('/');
        }

        $company=companyprofile::where('id',$cid)->get()->first();

        $vacancy=vacancy::where('id',$vid)->get()->first();

        $invite=invite::where(['company_id'=>$company->user_id,'vacancy_id'=>$vid])->get();

       $invite=$invite->first();/////////////////////////////////////////////////////////////////////////////////////////////////////////

        DB::update("UPDATE `invites` SET `invite_accept`='1' WHERE `id`='{$invite->id}'");
//
//        $data=[];
//      //  $vacancydata=[];
//
//        $data['company']=$company;
//
//        $data['vacancy']=$vacancy;
//
////
//        var_dump($invite);
//        die();

        return view('InvitationAcceptedPage',compact('company','vacancy'));







    }




    public  function jssavedjobsauth(){

        if(!Auth::guard()->check()){
            return redirect('/login');


        }


        if(!Auth::user()->isJobSeeker()){
            return view('/');
        }
        $user=Auth::user();


///////////////////

////////////////////

        $user=Auth::user();
        $my=vacancy::all();

//        var_dump($my[0]->id);
//        die();


        $getVacancy = savedvacancy::where(['jobseeker_id'=>$user->id])->get();

      //  $saved=$saved->first();


   //     $getVacancy=vacancy::where(['id'=>$saved->vacancy_id])->get();
//        $getSaved=savedvacancy::where(['jobseeker_id'=>$user->id])->get();


//        var_dump($getVacancy);
//        die();
        $vacancies = [];
        foreach ($getVacancy as $vac ):

            $vacancies[] = vacancy::where('id',$vac->vacancy_id)->get()->first();
        endforeach;

        $notifications = Auth::user()->notifications();
        return view('jobseekerSavedpost',compact('notifications','getVacancy','vacancies'));
    }

    public function vacancyview($id){

        if(!Auth::guard()->check()){
            return redirect('/login');
        }


        $vacancy = vacancy::where('id',$id)->get();

        if(!$vacancy){
            return redirect('/');
        }

        $vacancy = $vacancy->first();
///////////////////

////////////////////

        $user=Auth::user();
        $savedcheck = 'Saved';
        $appliedcheck='Applied';

        $saved = savedvacancy::where(['jobseeker_id'=>$user->id,'vacancy_id'=>$id])->get();
        $applied = appliedvacancy::where(['jobseeker_id'=>$user->id,'vacancy_id'=>$id])->get();


        if( $saved->isEmpty()){
            $savedcheck = url('/vacancy/save/'.$id);
        }

        if( $applied->isEmpty()){
            $appliedcheck = url('/apply/vacancy/'.$id);
        }
//        var_dump($savedcheck);
//        die();


        return view('vacancyDisplayPage',compact('vacancy','savedcheck','appliedcheck'));
    }

    public function withdrawvacancy($id){

        if(!Auth::guard()->check()){
            return redirect('/login');


        }


        if(!Auth::user()->isJobSeeker()){
            return view('/');
        }

        $withdraw=appliedvacancy::where('vacancy_id',$id);


        $withdraw->delete();

        return redirect('jobseeker/appliedjobs');

    }

    public function removesavedvacancy($id){


        if(!Auth::guard()->check()){
            return redirect('/login');


        }


        if(!Auth::user()->isJobSeeker()){
            return view('/');
        }

        $deleteSaved=savedvacancy::where('vacancy_id',$id);


        $deleteSaved->delete();

        return redirect('jobseeker/savedjobs');
    }


    public function rejectInvite($id){


        if(!Auth::guard()->check()){
            return redirect('/login');


        }


        if(!Auth::user()->isJobSeeker()){
            return view('/');
        }

        $rejectInvite=invite::where('vacancy_id',$id);


        $rejectInvite->delete();

        return redirect('jobseeker/viewinvitation');
    }





    public  function jsviewinvitationauth()
    {

        if (!Auth::guard()->check()) {
            return redirect('/login');


        }


        if (!Auth::user()->isJobSeeker()) {
            return view('/');
        }
        $user = Auth::user();
        $invitation = invite::where('jobseeker_id', $user->id)->get();//ye invitation aya hwa user ko



        $inviteData = [];
//        $check=$invitation->toArray();
//
//        for($i=0;$i<count($check);$i++){
//            $inviteData[$i]['company']=$company;
//
//
//
//
//        }
//        var_dump($inviteData['company']);
//
//        die();

        foreach ($invitation as $key => $inviteDataa){
            $inviteData[$key]  = [];
           // $inviteData[$key]['vacancy'] =[];
            //$inviteData[$key]['vacancy'] = $vacancy;

            $vacancy = vacancy::where('id', $inviteDataa->vacancy_id)->get();//is vacancy pe invitation bheja

            $company = companyprofile::where('user_id', $inviteDataa->company_id)->get();//is company ne invitation bheja

            $inviteData[$key]['company'] = $company->first();
            $inviteData[$key]['vacancy'] = $vacancy->first();

            $inviteData[$key]['invite'] = $invitation->first();

    }
//        var_dump($inviteData[$key]['invite']->invite_accept);
//        die();





        $notifications = Auth::user()->notifications();
        return view('jobseekerViewinvitation',compact('notifications','inviteData','invitation'));
    }



    public function showNotification(){


        if(!Auth::guard()->check()){
            return redirect('/login');


        }


        if(!Auth::user()->isJobSeeker()){
            return view('/');
        }

        $user = Auth::user();
        $notifications = $user->notifications();

        DB::update("UPDATE `notifications` SET `viewed`='1' WHERE `user_id`='{$user->id}'");


        $notificationsview = $user->notifications(true);

        return view('notificationViewPage',compact('notifications','notificationsview'));

    }




    public function vacancysave($id){


        if(!Auth::guard()->check()){
            return redirect('/');
        }
        $jsuser = Auth::user();
        if(!$jsuser->isJobSeeker()){
            return redirect('/');
        }

        $getVacancy=vacancy::where('id',$id)->get()->first();


        $vacancySaved = savedvacancy::create([
            'jobseeker_id'=> $jsuser->id,
            'vacancy_id'=>$getVacancy->id,
        ]);

        return redirect('jobseeker/savedjobs');


    }

    public function vacancyapply($id){


            if(!Auth::guard()->check()){
            return redirect('/');
            }
            $jsuser = Auth::user();
            if(!$jsuser->isJobSeeker()){
                return redirect('/');
            }

            $getVacancy=vacancy::where('id',$id)->get()->first();


            $vacancyapply = appliedvacancy::create([
                'jobseeker_id'=> $jsuser->id,
                'vacancy_id'=>$getVacancy->id,
                'applied_date'=>date("Y-m-d"),
                'status'=>'pending',
            ]);

            return redirect('jobseeker/appliedjobs');


}


}//end of jobseekerController