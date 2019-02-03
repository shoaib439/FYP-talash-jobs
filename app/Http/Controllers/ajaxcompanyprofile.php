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
            $new_path= 'images/'.$new_name;

            //NICE
           // $imagedata = file_get_contents(public_path('images/'.$new_name));
            // alternatively specify an URL, if PHP settings allow
           //$base64 = base64_encode($imagedata);
          //echo $base64;
//
           $user->profile_pic = 'images/'.$new_name;
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
            //'address' => 'required',
            //'address' => 'required', //aur kr lae
        ]);



        if($validation->passes())
        {

            $phone= $request->phone;
            $address= $request->address;
            $city = $request->city;
            $cnic = $request->cnic;
            $website = $request->website;
            $skype = $request->skype;


             $user = Auth::User();
             $userId = $user->id;


             $user->phoneno =$phone;

             $user->city =$city;

            $user->city = $city;
             $user->save();

             $comuser = companyprofile::where('user_id',$userId)->get()->first();

            $comuser->address = $address;
            $comuser->cnic = $cnic;
            $comuser->website = $website;
            $comuser->skype = $skype; // SKYPE KI FIELD PHLY DB MAIN PHR UNCOMMENT KR DE
            $comuser->save();


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