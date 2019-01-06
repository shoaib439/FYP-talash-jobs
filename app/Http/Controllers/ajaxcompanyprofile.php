<?php

namespace App\Http\Controllers;

use App\vacancy;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use DB;


use App\User;
use App\companyprofile;

class AjaxCompanyProfile extends Controller
{


    public function person(Request $request){


        $gender = $request->gender;

        $companyuser = new Companyprofile;

        $companyuser->gender = $gender;

        $companyuser->save();
    }
    public function uploadimage(Request $request)
    {

        $path = public_path('images');
        $validation = Validator::make($request->all(), [
            'dp_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
        ]);

        if($validation->passes())
        {
            $image = $request->file('dp_file');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $new_name);

            $user=(Auth::user());
            $new_path=public_path('images/'.$new_name);

            $imagedata = file_get_contents(public_path('images/'.$new_name));
            // alternatively specify an URL, if PHP settings allow
           $base64 = base64_encode($imagedata);
          //echo $base64;
//
           $user->profile_pic = $base64;
           $user->save();

            return response()->json([
                'message'   => 'Image Upload Successfully',
                'uploaded_image' => '<img src="/images/'.$new_name.'" class="img-thumbnail" width="300" />',
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









        //$file = $request->file('image');

//        var_dump($_POST);
//        return ;

        //Display File Name
       // echo 'File Name: '.$file->getClientOriginalName();
        //echo '<br>';

        //Display File Extension
        //echo 'File Extension: '.$file->getClientOriginalExtension();
        //echo '<br>';

        //Display File Real Path
        //echo 'File Real Path: '.$file->getRealPath();
        //echo '<br>';

        //Display File Size
        //echo 'File Size: '.$file->getSize();
        //echo '<br>';

        //Display File Mime Type
        //echo 'File Mime Type: '.$file->getMimeType();

        //Move Uploaded File
//        $destinationPath = public_path().'/images';
//        $file->move($destinationPath,$file->getClientOriginalName());


      //  $user =  new User();
       //


    //         echo $request;
    }//end of uploadimage


    //////////////////////////////////////////////////////////////////////

    public function personData(Request $request){


        $validation = Validator::make($request->all(), [
            //'dp_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
        ]);

        if($validation->passes())
        {

            $gender= $request->gender;
            $phone= $request->phone;
            $address= $request->address;
            $city= $request->city;


            $user = Auth::User();
             $userId = $user->id;



               $verify = $user::where(['id' =>$userId])->get()->first();



            if($verify->phoneno==null){
                $user->phoneno =$phone;

                $user->save();
            }
            elseif($verify->phoneno!=null)
            {
                DB::table('users')
                    ->where('id', $userId)
                    ->update(['phoneno' => $phone]);
                $user->save();
            }



            if($verify->address==null){
                $user->address =$address;

                $user->save();
            }
            elseif($verify->address!=null)
            {
                DB::table('users')
                    ->where('id', $userId)
                    ->update(['gender' => $address]);
                $user->save();
            }

            if($verify->city==null){
                $user->city =$city;

                $user->save();
            }
            elseif($verify->city!=null)
            {
                DB::table('users')
                    ->where('id', $userId)
                    ->update(['gender' => $city]);
                $user->save();
            }







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


}