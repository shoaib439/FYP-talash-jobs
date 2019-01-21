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
/*
Route::get('/jobseekerhome', function(){
    return \Illuminate\Support\Facades\App::make('\App\Http\Controllers\jobseekerController')->AuthCheck('jobseekerMainLayout');
});
Route::get('/jobseeker/buildcv', function(){
    return \Illuminate\Support\Facades\App::make('\App\Http\Controllers\jobseekerController')->AuthCheck('jobseekerbuildCV');
});
Route::get('/jobseeker/appliedjobs', function(){
    return \Illuminate\Support\Facades\App::make('\App\Http\Controllers\jobseekerController')->AuthCheck('jobseekerAppliedjob');
});
Route::get('/jobseeker/savedjobs', function(){
    return \Illuminate\Support\Facades\App::make('\App\Http\Controllers\jobseekerController')->AuthCheck('jobseekerSavedpost');
});
Route::get('/jobseeker/viewinvitation', function(){
    return \Illuminate\Support\Facades\App::make('\App\Http\Controllers\jobseekerController')->AuthCheck('jobseekerViewinvitation');
});
*/

Route::get('/jobseekerhome', 'jobseekerController@home');
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


Route::post('/company/resetpasswordpage', 'CompanyController@companypassresetPage');

Route::get('/company/resetpassword', 'CompanyController@companypassreset');

Route::get('/company/searchresult', function () {
    return view('companysearch');
});

Route::get('/deletevacancy/{id}','CompanyController@deletevacancy');


//Route::get('/company/profile', function () {
//    return view('companyprofile');////////////////////////////////////
//});

//Route::get('/company/AddVacancy', function () {
//    return view('AddVacancy');
//});
Route::post('/company/AddVacancy','postvacancy@addvacancy');

Route::get('/company/hrPolicies','CompanyController@HRpolicies');

Route::post('/ajax-upload-hr','CompanyController@submitHR');

Route::post('/ajax-remove-hr','CompanyController@removeHR');

Route::get('/view/jobseekerprofile','CompanyController@jsprofile');

//Route::get('/company/comHRpolicies', function () {
//    return view('companysearch');
//    });
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

Route::get('/login', 'logincontroller@index')->name('login');

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











/////////////////////////////////////////////////////AJAX ROUTES////////////////////////////
Route::post('/ajax-upload-dp','AjaxCompanyProfile@uploadimage');
Route::post('/ajax-upload-personal','AjaxCompanyProfile@personData');





//Route::get('/home', 'HomeController@index')->name('home');


/////////////////////////////////////////////////////AJAX jobseeker  ROUTES////////////////////////////
 Route::post('/ajax-upload-dp','AjaxJobSeekerProfile@uploadimage');
Route::post('ajax-upload-exp','AjaxJobSeekerProfile@workexperience');
Route::post('ajax-upload-edu','AjaxJobSeekerProfile@uploadeducation');
Route::post('/ajax-upload-jspersonal','AjaxJobSeekerProfile@personData');
Route::post('/ajax-upload-language','AjaxJobSeekerProfile@uploadlanguages');

Route::post('/ajax-upload-hobby','AjaxJobSeekerProfile@uploadhobby');
Route::post('/ajax-upload-skills','AjaxJobSeekerProfile@uploadskills');
Route::post('/ajax-upload-prefferedcity','AjaxJobSeekerProfile@uploadprefferedcity');
Route::post('/ajax-upload-fa','AjaxJobSeekerProfile@uploadfa');
Route::post('/ajax-upload-jsproject','AjaxJobSeekerProfile@uploadjsproject');




Route::post('/ajax-remove-hobby','AjaxJobSeekerProfile@removeHobby');

Route::post('/ajax-remove-language','AjaxJobSeekerProfile@removeLanguages');

Route::post('/ajax-remove-prefferedcity','AjaxJobSeekerProfile@removePrefferedcity');


Route::post('/ajax-remove-skills','AjaxJobSeekerProfile@removeskills');

Route::post('/ajax-remove-functionalarea','AjaxJobSeekerProfile@removefunctionalarea');

Route::post('/ajax-remove-jsproject','AjaxJobSeekerProfile@removejsproject');
////////////////////////////////////////////////admin data start///////////////////////////////////////

Route::get('/Adminlogin', 'adminController@loginPage');

Route::post('/Adminlogin','adminController@admin');


Route::group(['middleware' => 'adminMiddleware'],function(){

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





////////////////////////////////////////////////Search Route start///////////////////////////////////////////////


Route::post('/search', 'searchController@searchVacancy');
Route::post('/search/jobseeker', 'searchController@companySearchJs');
Route::post('/search-advanced', 'searchController@searchVacancyfromLanding');


////////////////////////////////////////////////Search Route end///////////////////////////////////////////////