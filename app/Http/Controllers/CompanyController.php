<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\companyprofile;
use App\vacancy;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


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

        else
        {
            if(Auth::user()->isCompany()){
                return view('companyapplications');
            }

        }
        return redirect('/login');
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
            'password_confirmation' => 'required|string|min:6',
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

    $newpassword = Hash::make($newpassword);

    if (!Hash::check($newpassword, $userpassword)):
        return redirect('/company/resetpassword');
    endif;


   // $newpassword = Hash::make($newpassword);

    $user->password = $newpassword;

    $user->save();


    return view('resetPassword');
}




    }


    public function companypassreset(){

        if(!Auth::guard()->check()){
            return redirect('/login');
        }


        if(!Auth::user()->isCompany()){

            return view('/');
        }

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


}//end of companyController