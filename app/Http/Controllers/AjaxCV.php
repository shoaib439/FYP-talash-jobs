<?php

namespace App\Http\Controllers;

use App\hobbies;
use App\jobseekerprofile;
use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Workexperience;
use App\skill;
use App\Education;


use PDF;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AjaxCV extends Controller
{
    public function getCVHTML($id){

        if($id == '1'){
            return view('cvtemplet1.CV');
        }
        else{
            return "No Found";
        }
    }

    public function buildCV($id){

        if(Auth::guard()->check()):

        endif;
    }

    public function buildCVPreview($id){

        if(!Auth::guard()->check()):
            return redirect('/jobseeker/buildcv');
        endif;
        $path = storage_path('app\public\cvtemplates\cv_'.$id.'.php');
        //echo $path;die();
        return $html = $this->getConvertedHTML($path);


    }


    public function buildCVPDF($id){

        if(!Auth::guard()->check()):
            return redirect('/jobseeker/buildcv');
        endif;
        $path = storage_path('app\public\cvtemplates\cv_'.$id.'.php');
        //echo $path;die();
        $html =  $this->getConvertedHTML($path);


        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($html);
        return $pdf->stream(Auth::user()->display_name."_cv.pdf");


    }

    public function getConvertedHTML($path){
        if(!file_exists($path)):
            return FALSE;
        endif;

        $content = File::get($path);

        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($content);
        libxml_clear_errors();



        $user = Auth::user();
        $js = jobseekerprofile::where('user_id',$user->id)->get()->first();

        $dom->getElementsByTagName('title')->item(0)->nodeValue = $user->display_name;
        $dom->getElementById('jobseeker_name')->nodeValue = $user->display_name;


        $dom->getElementById('jobseeker_email')->nodeValue = $user->email;
        $dom->getElementById('jobseeker_phoneno')->nodeValue = $user->phoneno;

        $dom->getElementById('jobseeker_address')->nodeValue = $user->jsaddress;

        $dom->getElementById('jobseeker_bio')->nodeValue = $js->bio;

        //WORK EXP




        $workexps = Workexperience::where('user_id',$user->id)->get();
   // dd($workexps->isEmpty());
        if(!empty($workexps) && !$workexps->isEmpty()):


            $domwork = $dom->getElementById('jobseeker_workexperience');
            $workexpfrag = $dom->createDocumentFragment();
            $workexphtml = '';

            foreach ($workexps as $workexp) {
                $workexphtml .= <<<HTML
            <article>
                <h2>{$workexp->company_name}</h2>
                <p class="subDetails">{$workexp->company_position} | {$workexp->job_type} </p>
                <p class="subDetails">{$workexp->start_date} - {$workexp->end_date} </p>
            </article>
HTML;
            }
            $workexpfrag->appendXML($workexphtml);
            $domwork->appendChild($workexpfrag);

        endif;


        //END WORK EXP

        //SKILLS

        $workskills = skill::where('user_id',$user->id)->get();
        if(!empty($workskills) && !$workskills->isEmpty()):

            $domskills = $dom->getElementById('jobseeker_skills');

            $workskillsfrag = $dom->createDocumentFragment();


            $workskillshtml = '';

            foreach ($workskills as $workskill) {
                $workskillshtml .= <<<HTML
                <p>{$workskill->skills}</p>
HTML;
            }
            $workskillsfrag->appendXML($workskillshtml);
            $domskills->appendChild($workskillsfrag);

        endif;

        //END SKILLS


        //Hobby

        $hobbies = hobbies::where('user_id',$user->id)->get();
        if(!empty($hobbies) && !$hobbies->isEmpty()):
            $domhobby = $dom->getElementById('jobseeker_hobby');

            $hobbyfrag = $dom->createDocumentFragment();


            $hobbyhtml = '';

            foreach ($hobbies as $hobby) {
                $hobbyhtml .= <<<HTML
                <p>{$hobby->hobbies}</p>
HTML;
            }
            $hobbyfrag->appendXML($hobbyhtml);
            $domhobby->appendChild($hobbyfrag);

        endif;

        //END Hobby





        //EDUCATION


        $educations = Education::where('user_id',$user->id)->get();
        if(!empty($educations) && !$educations->isEmpty()):

            $domedu = $dom->getElementById('jobseeker_educations');

            $edufrag = $dom->createDocumentFragment();

            $educationshtml = '';

            foreach ($educations as $education) {
                $educationshtml .= <<<HTML
                <article>
                    <h2>{$education->degree_title}</h2>
                    <p class="subDetails">{$education->institute}</p>
                    <p class="subDetails">{$education->city} | {$education->year_of_completion} </p>
                </article>
HTML;
            }
            $edufrag->appendXML($educationshtml);
            $domedu->appendChild($edufrag);

        endif;

        //END EDUCATION

/*

        $avatarUrl = url($user->profile_pic);
        $arrContextOptions=array(
                "ssl"=>array(
                    "verify_peer"=>false,
                    "verify_peer_name"=>false,
                ),
            );

$type = pathinfo(url($user->profile_pic), PATHINFO_EXTENSION);
$avatarData = file_get_contents($avatarUrl);
$avatarBase64Data = base64_encode($avatarData);
$imageData = 'data:image/' . $type . ';base64,' . $avatarBase64Data;


       // return '<img src="'.$imageData.'" />';
         //str_replace('/', '\\', public_path($user->profile_pic));

        $dom->getElementById('profile_image')->setAttribute('src', $imageData);

*/

        /* FOR PREVIEW */


        return $dom->saveHTML();
    }


    public function getUserData(Request $request){
        $validation = Validator::make($request->all(), [
            'user_id' => 'required|int',
        ]);

        if($validation->passes()){

            $user = User::where('id',$request->user_id)->get();

            if(empty($user) || $user->isEmpty()){
                return response()->json([
                    'success'=>'0',
                    'msg'=>'Not found'
                ]);
            }

            $user = $user->first();

            $jobseekertable = jobseekerprofile::where('user_id',$user->id)->get()->first();

            $data['jobseeker'] = $jobseekertable;
            $data['user'] = $user;

            return response()->json([
                'success' => '1',
                'data' => $data
            ]);
        }

        return response()->json([
            'success'=>'0',
            'msg'=>'Validation'
        ]);
    }



}
