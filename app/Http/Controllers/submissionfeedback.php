<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use App\feedback;

class SubmissionFeedback extends Controller
{


    public function feedbacksubmit(Request $request)
    {
        $name =  $request->name;
        $email =  $request->email;
        $suggestion =  $request->suggestion;
        $rating =  $request->selected_rating;


        $feedback = new feedback; //Creates new curdmodel class object. (it doesn't contain constructor.)

        $feedback->name =  $name;//$curdmodel->name is db table(curdmodels) column 'name'
        $feedback->email = $email;
        $feedback->suggestion = $suggestion;
        $feedback->rating = $rating;

        $feedback->save(); //inserts into the database

        return redirect('/submitfeedback');
//         echo $request;
}
}