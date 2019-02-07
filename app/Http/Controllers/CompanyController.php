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
            if(Auth::user()->isActive()){

               // $notifications = Auth::user()->notifications();
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
            if(!Auth::user()->isCompany()){
                return view('/');
            }



            if(Auth::user()->isActive()){
                $user=Auth::User();
                $customHR=hrpolicy::where('user_id',$user->id)->get();

                return view('AddVacancy',compact('customHR'));

            }
            return redirect('/companyApprovalPage');

        }


    }


    public function approvalPage(){

        if(!Auth::guard()->check()){
            return redirect('/login');
        }

        else
        {
            if(Auth::user()->isCompany()){

                return view('companyApprovalPage');
            }

        }
    }
    //////////////////////////////////////////////////////////////////////////
    public function companydashboardauth(){

        if(!Auth::guard()->check()){
            return redirect('/login');
        }

        else
        {
            if(Auth::user()->isCompany()&& Auth::user()->isActive()){

                return view('companydashboardnav');
            }

        }
        return redirect('/');
    }
    //////////////////////////////////////////////////////////////////////////
    public function companyprofileauth(){

        if(!Auth::guard()->check()){
            return redirect('/login');
        }


        if(!Auth::user()->isCompany()){
            return view('/');
        }

      if(Auth::user()->isActive()){
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
      return redirect('/companyApprovalPage');
    }

    //////////////////////////////////////////////////////////////////////////
    public function companyvacancylistauth(){

        if(!Auth::guard()->check()){
            return redirect('/login');
        }


            if(!Auth::user()->isCompany()){

                return view('/');
            }

        if(Auth::user()->isActive()){

            $user = Auth::user();

            //  $companyprofile = companyprofile::where('user_id',$user->id)->get()->first();

            $vacancylist = vacancy::where('user_fk',$user->id)->get();

            // $vacancylist=vacancy::all()->toArray();

            return view('/companyvacancylist', compact('vacancylist'));
        }
        return redirect('/companyApprovalPage');


    }

    //////////////////////////////////////////////////////////////////////////
    public function companyapplicationslistauth(){

        if(!Auth::guard()->check()){
            return redirect('/login');
        }


            if(!Auth::user()->isCompany()){
                return redirect('/login');
            }


        if(Auth::user()->isActive()){
            $user = Auth::user();


            $getVacancy=vacancy::where('user_fk',$user->id)->get();

            return view('companyapplications',compact('getVacancy'));

        }
        return redirect('/companyApprovalPage');



    }

    public function showcompanyapplicationslist(Request $request){

        $validation = Validator::make($request->all(), [

            'choose_vacancy' => 'required|int',

        ]);

        if($validation->passes()) {


            if(!Auth::user()->isCompany()){

                return view('/');
            }

            if(Auth::user()->isActive()){


                $vacancy= appliedvacancy::where(['vacancy_id'=>$request->choose_vacancy])->get();

                $appliedUsers=[];
                $rejectedUsers=[];



                foreach ($vacancy as $key => $vac):


                    $vacancy = vacancy::where(['id'=>$request->choose_vacancy])->get()->first();

                    $User= User::where(['id' => $vac->jobseeker_id])->get()->first();

                    $vacancyskills = array_filter(explode(',',$vacancy->skills_required));
                    $continue = false;
                    if(!empty($vacancyskills)):

                        $f = false;
                        foreach ($vacancyskills as $skill):
                            $q = skill::where('user_id',$User->id)->get();
                            if(!empty($q) && !$q->isEmpty() ):
                                $f = true;
                                break;
                            endif;
                        endforeach;
                        if(!$f){
                            $continue = TRUE;
                        }
                    endif;

                    $status= appliedvacancy::where(['status'=>$vac->status])->get()->first();

                    if($continue):

                        //IDHR

                        $rejectedUsers[$key]=[];
                        $rejectedUsers[$key]['Users']=$User;
                        $rejectedUsers[$key]['vacancy']=$vacancy;
                        $rejectedUsers[$key]['status']=$status;
                        continue;
                    endif;


                    $appliedUsers[$key]=[];
                    $appliedUsers[$key]['Users']=$User;
                    $appliedUsers[$key]['vacancy']=$vacancy;
                    $appliedUsers[$key]['status']=$status;



                endforeach;

//
//            var_dump($vacancy);
//            die();
                return view('companyselectedapplication',compact('appliedUsers','rejectedUsers'));
            }


            return redirect('/companyApprovalPage');



        }


    }

    public function updateStatus(Request $request)
    {

        if (!Auth()->guard()->check()) {
            return redirect('/login');
        } else {
            if (Auth::user()->isCompany()) {


                if(Auth::user()->isActive()){

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
                return redirect('/companyApprovalPage');



            }//yahan
        }

    }



    public function updateStatuspage(Request $request)
    {

        if (!Auth()->guard()->check()) {

            return redirect('/login');
        }
        else {

            if (Auth::user()->isCompany()) {


                if(Auth::user()->isActive()){


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
                return redirect('/companyApprovalPage');



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

                if(Auth::user()->isActive()){

                    $hrpolicies = hrpolicy::where('user_id',Auth::user()->id)->get();
                    return view('companyHRpolicies',compact('hrpolicies'));
                }
                return redirect('/companyApprovalPage');



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
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6',
        ]);

//        var_dump( $request->oldpassword);
//        die();


        $user = Auth::user();
//
        $userpassword = $user->password;
         $oldpassword = $request->oldpassword;
         $newpassword = $request->password;
        $confirmpassword = $request->password_confirmation;
//
         //dd($userpassword);
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
//            else
//
//        {
//            return response()->json([
//                'message'   => 'nhy hwa',
//                'uploaded_image' => '',
//                'class_name'  => 'alert-danger'
//            ]);
//        }

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
        DB::table('notifications')->where('vacancy_id',$id)->delete();
        DB::table('minterviews')->where('vacancy_id',$id)->delete();


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

        if(Auth::user()->isActive()){

            return view('jobseekerDisplayProfile');

        }
        return redirect('/companyApprovalPage');


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


            if(Auth::user()->isActive()){

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

                    $companylink=url('/jobseekerview/company/'.$company->user_id);

                    $url = url('view/vacancy/'.$request->vacancy_id);
                    $html = <<<HTML
The Company '<a href="{$companylink}">{$companyid->display_name}</a>' Called you for interview on  '<a href="{$url}">{$vacancyname->title}</a>' vacancy .
 
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
                            'vacancy_id'=>$request->vacancy_id,
                            'company_id'=>$company->user_id,
                            'date'=>$request->date,
                            'time'=>$request->time,
                        ]);

                        minterview::create([
                            'user_id'=> $getuser->id,
                            'vacancy_id'=>$request->vacancy_id,
                            'company_id'=>$company->user_id,
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
            return redirect('/companyApprovalPage');



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


        if(Auth::user()->isActive()){

            $user = User::where(['id'=> $id, 'type'=>'jobseeker'])->get();

            if(!$user){
                return redirect('/');
            }

            $user = $user->first();


            $vacancy = vacancy::where('user_fk',$companyuser->id)->get();

            return view('jobseekerinvite',compact('id','user','vacancy'));
        }
        return redirect('/companyApprovalPage');

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

        if(Auth::user()->isActive()){


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
                    'vacancy_id'=>$req->invite_vacancy,
                    'company_id'=>$companyuser->id,
                ]);
                return redirect('/profile/'.$req->jobseeker_id);
            }

            return redirect()->back()->withInput($req->only(['invite_vacancy']));
        }
        return redirect('/companyApprovalPage');

    }

            public function updateVacancy($id){

                    if(!Auth::guard()->check())
                    {
                        return redirect('/');
                    }

                    if(Auth::user()->isActive()){

                        $user=Auth::User();
                        $customHR=hrpolicy::where('user_id',$user->id)->get();
                        $vacancy=vacancy::where('id',$id)->get()->first();
//
//                        dd($vacancy);
//                        die();

                        return view('updateVacancyView',compact('vacancy','customHR'));
                    }

                    return redirect('/');

            }

    public function updateVacancyData(Request $request){

        if(!Auth::guard()->check() || !Auth::user()->isCompany()):
            return response()->json([
                'message'   => 'Not Logged In as Company',
                'uploaded_image' => '',
                'class_name'  => 'alert-danger'
            ]);
        endif;



        $this->validate($request, [
            'vacancy_id'=>'required',
            'vacancytitle' => 'required|string|min:4',
            'type' => 'required|string',
            'vacancydescription' => 'required|string',
            'vacancyPos' => 'required|int',
            'vacancyindustry' => 'required|string',
            'vacancycity' => 'required|string',
            'vacancytype' => 'required|string',
            'vacancyshift' => 'required|string',
            'vacancydegreelevel' => 'required|string',
            'vacancySkills' => 'required|string|min:3',
            'vacancySalary' => 'required|string',
            'vacancyExperience' => 'required|string|int',
            'vacancyAge' => 'required|string',
            'vacancyworkinghours' => 'required|string',
            'vacancylastdate' => 'required|string|date',
        ]);
        $myHR=hrpolicy::where('id',$request->choose_hr)->get()->first();

        $vacancytitle =  $request->vacancytitle;
        $type =  $request->type;
        $vacancydescription =  $request->vacancydescription;
        $vacancyPos =  $request->vacancyPos;
        $vacancyindustry =  $request->vacancyindustry;

        $vacancycity =  $request->vacancycity;
        $vacancytype =  $request->vacancytype;
        $vacancyshift =  $request->vacancyshift;
        $vacancydegreelevel =  $request->vacancydegreelevel;
        $vacancycarrierlevel =  $request->vacancycarrierlevel;
        $vacancySkills =  $request->vacancySkills;
        $vacancySalary =  $request->vacancySalary;
        $vacancyExperience =  $request->vacancyExperience;
        $vacancyAge =  $request->vacancyAge;
        $vacancyworkinghours =  $request->vacancyworkinghours;
        $vacancylastdate =  $request->vacancylastdate;

        $vacancy=vacancy::where(['id'=>$request->vacancy_id])->get()->first();


        $vacancy->title =  $vacancytitle;//$curdmodel->name is db table(curdmodels) column 'name'
        $vacancy->user_fk =  Auth::user()->id; //ye company ki id hai user ki ni
        $vacancy->vacancy_type = $type;
        $vacancy->description = $vacancydescription;
        $vacancy->no_of_position = $vacancyPos;
        $vacancy->industry =  $vacancyindustry;
        $vacancy->job_city = $vacancycity;
        $vacancy->job_type = $vacancytype;
        $vacancy->job_shift = $vacancyshift;
        $vacancy->degree_level =  $vacancydegreelevel;
        $vacancy->carrier_level = $vacancycarrierlevel;
        $vacancy->skills_required = $vacancySkills;
        $vacancy->salary = $vacancySalary;
        $vacancy->experience =  $vacancyExperience;
        $vacancy->age_range = $vacancyAge;
        $vacancy->working_hours = $vacancyworkinghours;
        $vacancy->last_date =  $vacancylastdate;
        $vacancy->hr_id =  $myHR->id;
        $vacancy->hr_no_of_interview =  $myHR->no_of_interview;
        $vacancy->hr_procedure =  $myHR->procedure;





        $vacancy->save(); //inserts into the database

        return redirect('/company/vacancylist');



    }


}//end of companyController