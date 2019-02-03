<?php

namespace App\Http\Controllers;

use App\appliedvacancy;
use App\education;
use App\hrpolicy;
use App\jobseekerprofile;
use App\languages;
use App\minterview;
use App\notification;
use App\prefferedcity;
use App\savedvacancy;
use App\skill;
use App\workexperience;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\companyprofile;
use App\vacancy;
use App\invite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\User;


class CompanyController extends Controller
{
    public function homeauth(){


        if(!Auth::guard()->check()){



            return redirect('/login');
        }

        else
        {
            if(Auth::user()->isCompany()){

                $notifications = Auth::user()->notifications();
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


                $user=Auth::User();
                $customHR=hrpolicy::where('user_id',$user->id)->get();

                return view('AddVacancy',compact('customHR'));
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


        if(!Auth::user()->isCompany()){
            return view('/');
        }

        $user = Auth::user();

        $comuser = companyprofile::where('user_id',$user->id)->get()->first();

        $profile = [];

        $profile['website'] = $comuser->website;
        $profile['address'] = $comuser->address;
        $profile['cnic'] = $comuser->cnic;

        $profile['skype'] = $comuser->skype;
        $profile['name'] = $comuser->company_name;

        $profile['image'] = empty($user->profile_pic) ? 'images/Profile.png':$user->profile_pic;

        return view('/companyprofile',compact('profile'));
    }

    //////////////////////////////////////////////////////////////////////////
    public function companyvacancylistauth(){

        if(!Auth::guard()->check()){
            return redirect('/login');
        }


            if(!Auth::user()->isCompany()){

                return view('/');
            }

        $user = Auth::user();

          //  $companyprofile = companyprofile::where('user_id',$user->id)->get()->first();

        $vacancylist = vacancy::where('user_fk',$user->id)->get();

       // $vacancylist=vacancy::all()->toArray();

        return view('/companyvacancylist', compact('vacancylist'));
    }

    //////////////////////////////////////////////////////////////////////////
    public function companyapplicationslistauth(){

        if(!Auth::guard()->check()){
            return redirect('/login');
        }


            if(!Auth::user()->isCompany()){
                return redirect('/login');
            }


            $user = Auth::user();


            $getVacancy=vacancy::where('user_fk',$user->id)->get();

        return view('companyapplications',compact('getVacancy'));
    }

    public function showcompanyapplicationslist(Request $request){

        $validation = Validator::make($request->all(), [

            'choose_vacancy' => 'required|int',

        ]);

        if($validation->passes()) {



            $vacancy= appliedvacancy::where(['vacancy_id'=>$request->choose_vacancy])->get();

            $appliedUsers=[];



            foreach ($vacancy as $key => $vac):

                $appliedUsers[$key]=[];
            $Users= User::where(['id'=>$vac->jobseeker_id])->get();
                $vacancy= vacancy::where(['id'=>$request->choose_vacancy])->get();

                $status= appliedvacancy::where(['status'=>$vac->status])->get();

                $appliedUsers[$key]['Users']=$Users->first();
                $appliedUsers[$key]['vacancy']=$vacancy->first();
                $appliedUsers[$key]['status']=$status->first();



            endforeach;

//
//            var_dump($vacancy);
//            die();
            return view('companyselectedapplication',compact('appliedUsers'));
        }


    }

    public function updateStatus(Request $request)
    {

        if (!Auth()->guard()->check()) {
            return redirect('/login');
        } else {
            if (Auth::user()->isCompany()) {


                $validation=Validator::make($request->all(),[

                    'status'=>'required',
                    'vacancy_id'=>'required|int',
                ]);

                if($validation->passes())
                {

                    $statusUpdate=appliedvacancy::where('id',$request->vacancy_id)->get()->first();

                    DB::update("UPDATE `appliedvacancies` SET `status`='{$request->status}' WHERE `id`='{$request->vacancy_id}'");




//                  var_dump($statusUpdate);
//                  die();

                    return redirect('company/profile');

                }
                else
                {
                    return response()->json([
                        'success' => '0',
                        'message'   => $validation->errors()->all(),
                        'uploaded_image' => '',
                        'class_name'  => 'alert-danger'
                    ]);
                }

            }
        }

    }



    public function updateStatuspage(Request $request)
    {

        if (!Auth()->guard()->check()) {

            return redirect('/login');
        }
        else {

            if (Auth::user()->isCompany()) {

                $validation=Validator::make($request->all(),[

                    'updatestatus'=>'required|int',
                    ]);

                if($validation->passes())
                {


                  $vacancyupdate=$request->updatestatus;

//                  var_dump($vacancyupdate);
//                  die();

                  return view('updateStatusPage',compact('vacancyupdate'));

                }
                else
                {
                    return response()->json([
                        'success' => '0',
                        'message'   => $validation->errors()->all(),
                        'uploaded_image' => '',
                        'class_name'  => 'alert-danger'
                    ]);
                }


            }
        }
        return redirect('/login');

    }

    public function HRpolicies(){

        if(!Auth::guard()->check()){
            return redirect('/login');
        }

        else
        {
            if(Auth::user()->isCompany()){


                $hrpolicies = hrpolicy::where('user_id',Auth::user()->id)->get();
                return view('companyHRpolicies',compact('hrpolicies'));
            }

        }
        return redirect('/login');
    }

    public function removeHR(Request $request){
        $validation = Validator::make($request->all(), [

            'hr_id' => 'required|int',

        ]);

        if($validation->passes())
        {


            $user = Auth::user();

            if(!$user):
                return response()->json([
                    'success' => '0',
                    'message'   => 'You\'re not logged in.',
                    'class_name'  => 'alert-success'
                ]);
            endif;

            $removed = hrpolicy::where('id' , $request->hr_id)->delete();

            if($removed):
                return response()->json([
                    'success' => '1',
                    'message'   => 'Added',
                    'class_name'  => 'alert-success'
                ]);
            else:
                return response()->json([
                    'success' => '0',
                    'message'   => 'No',
                    'class_name'  => 'alert-success'
                ]);
            endif;

        }
        else
        {
            return response()->json([
                'success' => '0',
                'message'   => $validation->errors()->all(),
                'uploaded_image' => '',
                'class_name'  => 'alert-danger'
            ]);
        }
    }

    public function companypassresetPage(Request $request)
    {



//        if(!Auth::guard()->check()){
//            return redirect('/login');
//
//                    }
//
//
//        if(!Auth::user()->isCompany()){
//
//            return view('/');
//        }
////
//        $validation = Validator::make($request->all(), [
//            'oldpassword' => 'required|string',
//            'newpassword' => 'required|string|min:6|confirmed',
//        ]);

//        if($validation->passes())
//        {
//            $a = array(1, 2, array("a", "b", "c"));
//            var_dump($a);
//
//
//            $user = Auth::user();
//
//            $userpassword = $user->password;
//
//            $oldpassword = $request->oldpassword;
//            $newpassword = $request->newpassword;
//            //  dd($userpassword);
//            var_dump( $userpassword);


//if($oldpassword==$newpassword){
//            if(!Hash::check($oldpassword, $userpassword)):
//            return redirect('/company/resetpassword');
//        endif;
//}
//
//        $newpassword = Hash::make($newpassword);
//
//        $user->password = $newpassword;
//
//       $user->save();
//
//            echo "success";
                //  return view('resetPassword');
//            return response()->json([
//                'message'   => 'Image Upload Successfully',
//                'class_name'  => 'alert-success'
//            ]);
//
//        }
//        else
//        {
//            return response()->json([
//                'message'   => $validation->errors()->all(),
//                'uploaded_image' => '',
//                'class_name'  => 'alert-danger'
//            ]);
//        }


///

        $this->validate($request, [
            'oldpassword' => 'required|string',
            'newpassword' => 'required|string|min:6',
            'password_confirmation' => 'required|string|min:6|confirmed',
        ]);

        $user = Auth::user();
//
        $userpassword = $user->password;
         $oldpassword = $request->oldpassword;
         $newpassword = $request->newpassword;
        $confirmpassword = $request->password_confirmation;
//
//       //  dd($userpassword);
     // var_dump( $oldpassword);
       // echo $userpassword;

       // die();

            if($newpassword==$confirmpassword){




               // $newpassword = Hash::make($newpassword);

                if (!Hash::check($oldpassword, $userpassword)):
            //        echo $userpassword.'......';
            //

                    return redirect('/user/resetpassword');
                endif;

//                        echo "ho gya";
//                        die();


               $newpassword = Hash::make($newpassword);

                $user->password = $newpassword;

                $user->save();




    return redirect('/');
}




    }


    public function companypassreset(){

        if(!Auth::guard()->check()){
            return redirect('/login');
        }


//        if(!Auth::user()->isCompany() ){
//
//            return view('/');
//        }

        return view('resetPassword');

    }


    public function deletevacancy($id){

//        $Users=User->Ffind
       // $vacancy=vacancy::find($id);
//
       DB::table('vacancy')->where('id',$id)->delete();

//        $vacancy=vacancy::find($id);
//        $vacancy->detete();



        return redirect('/company/vacancylist');




    }//end of deleteuser

    public function submitHR(Request $request){

        $validation = Validator::make($request->all(), [

            'hr1' => 'required',
            'hr2' => 'required',

        ]);

        if($validation->passes())
        {


            $user=Auth::user();

            $interviewnumber = hrpolicy::Create([
                'user_id'=>$user->id,
                'no_of_interview' => $request->hr1,
                'procedure' => $request->hr2,

            ]);


//            $interviewnumber= $request->hr1;
//            $procedure= $request->hr2;
//
//            $policy=new hrpolicy();
//
//            $policy->no_of_interview=$interviewnumber;
//            $policy->procedure=$procedure;
//
//
//            $policy->save();

            if($interviewnumber):
                return response()->json([
                    'success' => '1',
                    'message'   => 'Added',
                    'class_name'  => 'alert-success',
                    'hr_id'=> $interviewnumber->id,
                ]);
            else:
                return response()->json([
                    'success' => '0',
                    'message'   => 'No',
                    'class_name'  => 'alert-success'
                ]);
            endif;

        }
        else
        {
            return response()->json([
                'success' => '0',
                'message'   => $validation->errors()->all(),
                'uploaded_image' => '',
                'class_name'  => 'alert-danger'
            ]);
        }


    }

    public function jsprofile(){

        if(!Auth::guard()->check()){
            return redirect('/login');
        }


        if(!Auth::user()->isCompany()){
            return view('/');
        }

        return view('jobseekerDisplayProfile');
    }


    public function jobseekerprofile($id){

        $user = User::where(['id'=>$id,'type'=>'jobseeker'])->get();

        if(!$user || $user->isEmpty()){
            return redirect('/');
        }

        $user = $user->first();
        $jobseekerdata = jobseekerprofile::where('user_id',$user->id)->get()->first();


        $workexp = workexperience::where('user_id',$user->id)->get();
        $education = education::where('user_id',$user->id)->get();
        $skills=skill::where('user_id',$user->id)->get();
        $Pcity=prefferedcity::where('user_id',$user->id)->get();

        //var_dump(languages::where('user_id',$user->id)->get()->toArray());
        //die();
        $langs = languages::where('user_id',$user->id)->get();

        $langarray = [];
        foreach ($langs as $lang):
            $langarray[] = $lang->language;
        endforeach;

        $cityarray = [];
        foreach ($Pcity as $city):
            $cityarray[] = $city->preffered_city;
        endforeach;

        $skillarray = [];
        foreach ($skills as $skill):
            $skillarray[] = $skill->skills;
        endforeach;

        $invitelink = 'invited';

        $invited = invite::where('jobseeker_id',$user->id)->get();

        if(!$invited || $invited->isEmpty()){
            $invitelink = url('/invite/'.$user->id);
        }





        return view('jobseekerDisplayProfile',compact('user','jobseekerdata','workexp','langarray','invitelink','education','cityarray','skillarray'));

    }

    public function Callforinterview(Request $request){

        if(!Auth::guard()->check()){
            return redirect('/login');
        }


        if (Auth::user()->isCompany()) {

            $validation=Validator::make($request->all(),[

                'user_id'=>'required|int',
                 'vacancy_id'=>'required|int',
                'date'=>'required',
                'time'=>'required',
            ]);

            if($validation->passes())
            {

                $companyid=Auth::user();

                $getuser=User::where('id',$request->user_id)->get()->first();

                $vacancyname=vacancy::where('id',$request->vacancy_id)->get()->first();

                $company=companyprofile::where('user_id',$companyid->id)->get()->first();


                $url = url('view/vacancy/'.$request->vacancy_id);
                $html = <<<HTML
The Company '{$companyid->display_name}' Called you for interview on  '<a href="{$url}">{$vacancyname->title}</a>' vacancy .
 
 <div class="row">
 <div class=" col-md-6">
   <p> <a class="my-heading-text3">Address: </a>   <a class="my-text-font">{$company->address}</a></p>
 
</div>

<div class=" col-md-6">
   <p> <a class="my-heading-text3">Schedule Date and time: </a>   <a class="my-text-font"> $request->date , $request->time.</a></p>
 
</div>
 
 </div>
 
HTML;
//var_dump();
//die();

                if($getuser){

                    notification::create([
                        'user_id'=> $getuser->id,
                        'message'=>$html,
                        'type'=> 'call for interview',
                        'viewed'=> '0',
                        'date'=>$request->date,
                        'time'=>$request->time,
                    ]);

                    minterview::create([
                        'user_id'=> $getuser->id,
                        'vacancy_id'=>$request->vacancy_id,
                        'company_id'=>$company->id,
                        'date'=>$request->date,
                        'time'=>$request->time,
                    ]);
                    return redirect('/company/applicationslist');
                }

//                  var_dump($getuser->id);
//                  die();

//                return view('companyvacancylist');

            }
            else
            {
                return response()->json([
                    'success' => '0',
                    'message'   => $validation->errors()->all(),
                    'uploaded_image' => '',
                    'class_name'  => 'alert-danger'
                ]);
            }


        }
        return redirect('/login');




    }

    public function jobseekerInvite($id){


        if(!Auth::guard()->check()){
            return redirect('/');
        }
        $companyuser = Auth::user();
        if(!$companyuser->isCompany()){
            return redirect('/');
        }

        $user = User::where(['id'=> $id, 'type'=>'jobseeker'])->get();

        if(!$user){
            return redirect('/');
        }

        $user = $user->first();


        $vacancy = vacancy::where('user_fk',$companyuser->id)->get();

        return view('jobseekerinvite',compact('id','user','vacancy'));
    }

    public function jobseekerInviteSubmit(Request $req){

        $validation = Validator::make($req->all(), [

            'invite_vacancy' => 'required',
            'jobseeker_id' => 'required',

        ]);

        if(!Auth::guard()->check()){
            return redirect('/');
        }
        $companyuser = Auth::user();
        if(!$companyuser->isCompany()){
            return redirect('/');
        }


        $user = User::where(['id'=> $req->jobseeker_id, 'type'=>'jobseeker'])->get();

        if(!$user){
            return redirect('/');
        }


        $invite = invite::create([
            'jobseeker_id'=> $req->jobseeker_id,
            'company_id'=> $companyuser->id,
            'vacancy_id'=> $req->invite_vacancy,
            'invite_accept'=> "0",
        ]);


        $vacancydata = vacancy::where('id',$req->invite_vacancy)->get()->first();
        $url = url('view/vacancy/'.$req->invite_vacancy);
        $html = <<<HTML
The Company '{$companyuser->display_name}' has invited you to '<a href="{$url}">{$vacancydata->title}</a>' vacancy.
HTML;

        if($invite){

            notification::create([
                'user_id'=> $req->jobseeker_id,
                'message'=>$html,
                'type'=> 'invite',
                'viewed'=> '0',
            ]);
            return redirect('/profile/'.$req->jobseeker_id);
        }

        return redirect()->back()->withInput($req->only(['invite_vacancy']));
    }


}//end of companyController