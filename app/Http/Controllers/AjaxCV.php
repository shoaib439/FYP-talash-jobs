<?php

namespace App\Http\Controllers;

use App\jobseekerprofile;
use Illuminate\Http\Request;
use Validator;
use App\User;

use Illuminate\Support\Facades\Auth;

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
