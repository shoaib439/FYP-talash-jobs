<?php

namespace App\Http\Controllers;

use App\education;
use App\functionalarea;
use App\hobbies;
use App\jobseekerprofile;
use App\jsProject;
use App\languages;
use App\prefferedcity;
use App\skill;
use App\vacancy;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use DB;

use App\workexperience;


use App\User;
use App\companyprofile;

class AjaxJobSeekerProfile extends Controller
{

    public function workexperience(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'companyname' => 'required|string',
            'companylocation' => 'required|string',
            'companypos' => 'required|string',
            'companyjobtype' => 'required|string',
            'companysd' => 'required|string',

        ]);

        if(!Auth::guard()->check()):
            return response()->json([
                'success' => '0',
                'message'   => 'Please login.',
                'uploaded_image' => '',
                'class_name'  => 'alert-danger'
            ]);
        endif;

        $user = Auth::user();

        if(!$user->isJobSeeker()):
            return response()->json([
                'success' => '0',
                'message'   => 'Please login as jobseeker.',
                'uploaded_image' => '',
                'class_name'  => 'alert-danger'
            ]);
        endif;

        if($validation->passes())
        {
            $currworking = 'yes';
            if(empty($request->currworking)):
                $currworking = 'no';
            endif;

            $workexp = workexperience::Create([
                'user_id'=>$user->id,
                'company_name' => $request->companyname,
                'company_location' => $request->companylocation,
                'company_position' => $request->companypos,
                'job_type' => $request->companyjobtype,
                'start_date' => $request->companysd,
                'end_date' => $request->companyed,
                'currently_working' => $currworking,
            ]);

            if($workexp):
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

    //////////
    ///
    public function uploadimage(Request $request)
    {

        $path = public_path('images');
        $validation = Validator::make($request->all(), [
            'dp_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:5000'
        ]);

        if ($validation->passes()) {
            $image = $request->file('dp_file');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $new_name);

            $user = (Auth::user());
            $new_path = 'images/' . $new_name;

            //NICE
            // $imagedata = file_get_contents(public_path('images/'.$new_name));
            // alternatively specify an URL, if PHP settings allow
            //$base64 = base64_encode($imagedata);
            //echo $base64;
//
            $user->profile_pic = 'images/' . $new_name;
            $user->save();

            return response()->json([
                'message' => 'Image Upload Successfully',
                'uploaded_image' => '<img src="/images/' . $new_name . '" class="img-thumbnail" width="300" />',
                'class_name' => 'alert-success',
                'success' => '1',
            ]);


        } else {
            return response()->json([
                'errors' => $validation->errors()->all(),
                'uploaded_image' => '',
                'success' => '0',
                'class_name' => 'alert-danger'
            ]);
        }

//        if ($validator->fails()) {
//            return redirect('youFormPage')->withErrors($validator)->withInput();
//        }

    }//end of upload image


    public function personData(Request $request){


        $validation = Validator::make($request->all(), [
            //'dp_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
            //'address' => 'required',
            //'address' => 'required', //aur kr lae
        ]);



        if($validation->passes())
        {

            $phone= $request->phone;
            $address= $request->address;
            $city = $request->city;
            $date_of_birth = $request->dob;



            $user = Auth::User();
            $userId = $user->id;


            $user->phoneno =$phone;

            $user->city =$city;

            $user->save();

            $js_user = jobseekerprofile::where('user_id',$userId)->get()->first();

            $js_user->js_address = $address;
            $js_user->date_of_birth = $date_of_birth;

            $js_user->save();


//


            return response()->json([
                'message'   => 'Data Upload Successfully'.$phone,
                'class_name'  => 'alert-success'
            ]);



        }
        else
        {
            return response()->json([
                'message'   => $validation->errors()->all(),
                'uploaded_image' => '',
                'class_name'  => 'alert-danger'
            ]);
        }



    }

    /////////////////////////
    ///


    public function bioData(Request $request){


        $validation = Validator::make($request->all(), [
            //'dp_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
            //'address' => 'required',
            //'address' => 'required', //aur kr lae
        ]);



        if($validation->passes())
        {

            $bio = $request->bio;
            $carrierlevel= $request->carrierlevel;



            $user = Auth::User();
            $myuser= jobseekerprofile::where(['user_id'=>$user->id])->get()->first();

            $myuser->bio =$bio;

            $myuser->carrierlevel = $carrierlevel;

            $success = $myuser->save();

            if($success){
                return response()->json([
                    'message'   => 'Data Upload Successfully',
                    'success'   => '1',
                    'class_name'  => 'alert-success',
                    's' => $success
                ]);
            }


            return response()->json([
                'message'   => $success,
                'success'   => '0',
                'class_name'  => 'alert-success'
            ]);



        }
        else
        {
            return response()->json([
                'message'   => $validation->errors()->all(),
                'uploaded_image' => '',
                'class_name'  => 'alert-danger'
            ]);
        }



    }
    ////////////////////
    public  function uploadeducation(Request $request){


        $validation = Validator::make($request->all(), [
            'degreetitle' => 'required|string',
            'yearofcompletion' => 'required|string',
            'cgpa' => 'required|string',
            'degreelevel' => 'required|string',
            'institute' => 'required|string',
            'location' => 'required|string',
        ]);

        if(!Auth::guard()->check()):
            return response()->json([
                'success' => '0',
                'message'   => 'Please login.',
                'uploaded_image' => '',
                'class_name'  => 'alert-danger'
            ]);
        endif;

        $user = Auth::user();

        if(!$user->isJobSeeker()):
            return response()->json([
                'success' => '0',
                'message'   => 'Please login as jobseeker.',
                'uploaded_image' => '',
                'class_name'  => 'alert-danger'
            ]);
        endif;

        if($validation->passes())
        {

            $edu = education::Create([
                'user_id'=>$user->id,
                'degree_title' => $request->degreetitle,
                'year_of_completion' => $request->yearofcompletion,
                'cgpa' => $request->cgpa,
                'degree_level' => $request->degreelevel,
                'institite' => $request->institute,
                'city' => $request->location,


            ]);

            if($edu):
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

    /////////////////////////
    ///

    public  function uploadlanguages(Request $request){


        $validation = Validator::make($request->all(), [
            'language' => 'required',

        ]);

        if(!Auth::guard()->check()):

            return response()->json([
                'success' => '0',
                'message'   => 'Please login.',
                'class_name'  => 'alert-danger'
            ]);
        endif;

        $user = Auth::user();

        if(!$user->isJobSeeker()):

            return response()->json([
                'success' => '0',
                'message'   => 'Please login as jobseeker.',
                'uploaded_image' => '',
                'class_name'  => 'alert-danger'
            ]);
        endif;

        if($validation->passes())
        {

//           $user=new User();
//
//           $languages=new languages();
//           $languages->user_id=$user->id;
//           $languages->languages=$request->language;
//
//           $languages->save();



            $language = languages::Create([
                'user_id'=>$user->id,
                'language' => $request->language,
            ]);
//
//            this method not woring here :(((((((((



            if($language):
                return response()->json([
                    'success' => '1',
                    'message'   => 'Added',
                    'class_name'  => 'alert-success',
                    'language_id' => $language->id
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

    }////////////////////////
    ///
    ///
    public  function uploadhobby(Request $request){


        $validation = Validator::make($request->all(), [
            'hobbies' => 'required|string|min:4',

        ]);

        if(!Auth::guard()->check()):

            return response()->json([
                'success' => '0',
                'message'   => 'Please login.',
                'class_name'  => 'alert-danger'
            ]);
        endif;

        $user = Auth::user();

        if(!$user->isJobSeeker()):
            return response()->json([
                'success' => '0',
                'message'   => 'Please login as jobseeker.',
                'uploaded_image' => '',
                'class_name'  => 'alert-danger'
            ]);
        endif;

        if($validation->passes())
        {

            $hobby = hobbies::Create([
                'user_id'=>$user->id,
                'hobbies' => $request->hobbies,



            ]);

//            var_dump($request->hobbies);
//            die();

            if($hobby):
                return response()->json([
                    'success' => '1',
                    'message'   => 'Added',
                    'class_name'  => 'alert-success',
                    'hobby_id'=> $hobby->id
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

    }////////////////////////
    ///

    public function removeHobby(Request $request){
        $validation = Validator::make($request->all(), [

            'hobby_id' => 'required|int',

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

            $removed = hobbies::where('id' , $request->hobby_id)->delete();

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
    ///////////////////////////////
    public function removeLanguages(Request $request){
        $validation = Validator::make($request->all(), [

            'language_id' => 'required',

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

            $removed = languages::where('id' , $request->language_id)->delete();

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
    ////////////////////////////
    public  function uploadprefferedcity(Request $request){


        $validation = Validator::make($request->all(), [
            'jobcity' => 'required',

        ]);

        if(!Auth::guard()->check()):

            return response()->json([
                'success' => '0',
                'message'   => 'Please login.',
                'class_name'  => 'alert-danger'
            ]);
        endif;

        $user = Auth::user();

        if(!$user->isJobSeeker()):
            return response()->json([
                'success' => '0',
                'message'   => 'Please login as jobseeker.',
                'uploaded_image' => '',
                'class_name'  => 'alert-danger'
            ]);
        endif;

        if($validation->passes())
        {

            $city = prefferedcity::Create([
                'user_id'=>$user->id,
                'preffered_city' => $request->jobcity,


            ]);

            if($city):
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

    }////////////////////////
    ///
    ///
    ///

    public  function uploadskills(Request $request){


        $validation = Validator::make($request->all(), [
            'skills' => 'required',

        ]);

        if(!Auth::guard()->check()):

            return response()->json([
                'success' => '0',
                'message'   => 'Please login.',
                'class_name'  => 'alert-danger'
            ]);
        endif;

        $user = Auth::user();

        if(!$user->isJobSeeker()):
            return response()->json([
                'success' => '0',
                'message'   => 'Please login as jobseeker.',
                'uploaded_image' => '',
                'class_name'  => 'alert-danger'
            ]);
        endif;

        if($validation->passes())
        {

            $skill = skill::Create([
                'user_id'=>$user->id,
                'skills' => $request->skills,


            ]);

            if($skill):
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

    }////////////////////////

    public function removefunctionalarea(Request $request){
        $validation = Validator::make($request->all(), [

            'functionalarea_id' => 'required',

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

            $removed = functionalarea::where('id' , $request->functionalarea_id)->delete();

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
    ////////////////////////////


    public function removeskills(Request $request){
        $validation = Validator::make($request->all(), [

            'skills_id' => 'required',

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

            $removed = skill::where('id' , $request->skills_id)->delete();

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
    ////////////////////////////


    public function removePrefferedcity(Request $request){
        $validation = Validator::make($request->all(), [

            'prefferedcity_id' => 'required',

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

            $removed = prefferedcity::where('id' , $request->prefferedcity_id)->delete();

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
    ////////////////////////////
///////////////////////////////////
    public  function uploadfa(Request $request){


        $validation = Validator::make($request->all(), [
            'functionalarea' => 'required',

        ]);

        if(!Auth::guard()->check()):

            return response()->json([
                'success' => '0',
                'message'   => 'Please login.',
                'class_name'  => 'alert-danger'
            ]);
        endif;

        $user = Auth::user();

        if(!$user->isJobSeeker()):
            return response()->json([
                'success' => '0',
                'message'   => 'Please login as jobseeker.',
                'uploaded_image' => '',
                'class_name'  => 'alert-danger'
            ]);
        endif;

        if($validation->passes())
        {

            $fa = functionalarea::Create([
                'user_id'=>$user->id,
                'functional_area' => $request->functionalarea,


            ]);

            if($fa):
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

    }////////////////////////
    ///

    public  function uploadjsproject(Request $request){


        $validation = Validator::make($request->all(), [
            'projecttitle' => 'required',
            'projectdesc' => 'required',
            'projectsd' => 'required',
            'projected' => 'required',
            'projecturl' => 'required|url',

        ]);

        if(!Auth::guard()->check()):

            return response()->json([
                'success' => '0',
                'message'   => 'Please login.',
                'class_name'  => 'alert-danger'
            ]);
        endif;

        $user = Auth::user();

        if(!$user->isJobSeeker()):
            return response()->json([
                'success' => '0',
                'message'   => 'Please login as jobseeker.',
                'uploaded_image' => '',
                'class_name'  => 'alert-danger'
            ]);
        endif;

        if($validation->passes())
        {

            $project = jsProject::Create([
                'user_id'=>$user->id,
                'project_title' => $request->projecttitle,
                'project_desc' => $request->projectdesc,
                'project_sd' => $request->projectsd,
                'project_ed' => $request->projected,
                'project_url' => $request->projecturl,


            ]);

            if($project):
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

    }////////////////////////
    ///

    public function removejsproject(Request $request){
        $validation = Validator::make($request->all(), [

            'jsproject_id' => 'required',

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

            $removed = jsProject::where('id' , $request->jsproject_id)->delete();

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
    ////////////////////////////
    ///


    public function removeeducation(Request $request){
        $validation = Validator::make($request->all(), [

            'education_id' => 'required',

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

            $removed = education::where('id' , $request->education_id)->delete();

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

    public function removeworkexp(Request $request){
        $validation = Validator::make($request->all(), [

            'workexp_id' => 'required',

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

            $removed = workexperience::where('id' , $request->workexp_id)->delete();

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



}//end