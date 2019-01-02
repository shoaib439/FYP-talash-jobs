<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

////////////////////////////////////////////////JOBSEEKER ROUTESSSSS sTART /////////////////////////////////////////////////

//for jobseeker signup form start
Route::get('/jobseekersignup', function () {
    return view('jobseekersignup');
});

//job seeker signup controller start
Route::post('/jobseekersignup','signupjobseeker@submission')->name('jobseeker.signup');
//job seeker signup controller start


///
///
///
Route::get('/jobseekerhome', 'jobseekerController@jshomeauth');
Route::get('/jobseeker/buildcv', 'jobseekerController@jsbuildCVauth');
Route::get('/jobseeker/appliedjobs', 'jobseekerController@jsappliedjobsauth');
Route::get('/jobseeker/savedjobs', 'jobseekerController@jssavedjobsauth');
Route::get('/jobseeker/viewinvitation', 'jobseekerController@jsviewinvitationauth');
//Route::get('/jobseekerhome', function () {
//    return view('jobseekerMainLayout');
//});


//Route::get('/jobseeker/buildcv', function () {
//    return view('jobseekerbuildCV');
//});


//Route::get('/jobseeker/appliedjobs', function () {
//    return view('jobseekerAppliedjob');
//});

//Route::get('/jobseeker/savedjobs', function () {
//    return view('jobseekerSavedpost');
//});
//
//Route::get('/jobseeker/viewinvitation', function () {
//    return view('jobseekerViewinvitation');
//});


////////////////////////////////////////////////JOBSEEKER ROUTESSSSS  END/////////////////////////////////////////////////






////////////////////////////////////////////////COMPANY ROUTESSSSS START/////////////////////////////////////////////////


//for company signup form start
Route::get('/companysignup', function () {
    return view('CompanySignup');
});

Route::post('/companysignup', 'signupcompany@submission');
//for company signup form end


Route::get('/company/main', 'CompanyController@homeauth');
Route::get('/company/AddVacancy', 'CompanyController@vacancyauth');
Route::get('/company/dashboard', 'CompanyController@companydashboardauth');
Route::get('/company/profile', 'CompanyController@companyprofileauth');
Route::get('/company/vacancylist', 'CompanyController@companyvacancylistauth');
Route::get('/company/applicationslist', 'CompanyController@companyapplicationslistauth');

Route::get('/company/searchresult', function () {
    return view('companysearch');
});
//Route::get('/company/profile', function () {
//    return view('companyprofile');////////////////////////////////////
//});

//Route::get('/company/AddVacancy', function () {
//    return view('AddVacancy');
//});
Route::post('/company/AddVacancy','postvacancy@addvacancy');


//Route::get('/company/companyvacanncylist', function () {
//    return view('companyvacancylist');
//});


//Route::get('/company/applicationslist', function () {
//    return view('companyapplications');
//});

//Route::get('/company/profile', function () {
//    return view('companyprofile');
//});

//Route::post('/company/profile','companyprofile@cprofile');




////////////////////////////////////////////////COMPANY ROUTESSSSS END/////////////////////////////////////////////////


////////////////////////////////////////////////COMMON ROUTESSSSS sTART/////////////////////////////////////////////////

Auth::routes();

Route::get('/', function () {
    return view('Landing');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', 'logincontroller@login');

Route::get('/dashboard', function () {
    return view('DashboardNav');
});

Route::get('/user/contactus', function () {
    return view('contactus');
});

Route::post('/user/contactus','jobseekercontactus@store');




Route::get('/submitfeedback', function(){
    return view('submitfeedback');
});

Route::post('/submitfeedback','SubmissionFeedback@feedbacksubmit');

////////////////////////////////////////////////COMMON ROUTESSSSS END/////////////////////////////////////////////////










/////////////////////////////////////////////////////AJAX ROUTES
//Route::post('/ajax-upload-dp','AjaxCompanyProfile@uploadimage');

//Route::post('/ajax-upload-personal','AjaxCompanyProfile@person');


//Route::get('/home', 'HomeController@index')->name('home');





////////////////////////////////////////////////admin data start///////////////////////////////////////

Route::get('/Adminlogin', function () {
    return view('/adminfrontend/Adminlogin');
});

Route::post('/Adminlogin','adminController@admin');


Route::group(['middleware' => 'auth'],function(){

//    Route::get('/profile','Pages@profile')->name('profile');

    Route::get('/adminpanel','adminController@home');

    //Admin


});
/*

*/
//Route::post('/adminpanel','adminOperation@check');

//Route::get('adminpanel', function () {
//    //whatever
//})->middleware('auth');


Route::get('/registeredUsers', function () {
    return view('/adminfrontend.registeredUsers');
});

Route::get('/usersComplaints', function () {
    return view('/adminfrontend.usersComplaints');
});

Route::get('/registeredUsers','adminController@showUsers');

Route::get('/delete/{id}','adminController@deleteuser');

Route::get('/usersComplaints','adminController@showComplaints');

Route::get('/usersFeedback','adminController@showFeedback');


////////////////////////////////////////////////admin data end///////////////////////////////////////////