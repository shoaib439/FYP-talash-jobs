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

Auth::routes();


Route::get('/', function () {
    return view('Landing');
});




//for jobseeker signup form start
Route::get('/jobseekersignup', function () {
    return view('jobseekersignup');
});

//job seeker signup controller start
Route::post('/jobseekersignup','signupjobseeker@submission')->name('jobseeker.signup');
//job seeker signup controller start


//for company signup form start
Route::get('/companysignup', function () {
    return view('CompanySignup');
});

Route::post('/companysignup', 'signupcompany@submission');
//for company signup form end




Route::get('/dashboard', function () {
    return view('DashboardNav');
});

Route::get('/jobseeker/contactus', function () {
    return view('contactus');
});

Route::post('/jobseekercontactus','jobseekercontactus@store');



Route::get('/jobseekerhome', function () {
    return view('jobseekerMainLayout');
});


Route::get('/jobseeker/buildcv', function () {
    return view('jobseekerbuildCV');
});


Route::get('/jobseeker/appliedjobs', function () {
    return view('jobseekerAppliedjob');
});

Route::get('/jobseeker/savedjobs', function () {
    return view('jobseekerSavedpost');
});

Route::get('/jobseeker/viewinvitation', function () {
    return view('jobseekerViewinvitation');
});


////////////////////////////////////////////////COMPANY ROUTESSSSS START/////////////////////////////////////////////////


Route::get('/company/dashboard', function () {
    return view('companydashboardnav');
});

Route::get('/company/main', 'CompanyController@home');
//Route::get('/company/AddVacancy', 'CompanyController@check');




Route::get('/company/searchresult', function () {
    return view('companysearch');
});
Route::get('/company/profile', function () {
    return view('companyprofile');
});

Route::get('/company/AddVacancy', function () {
    return view('AddVacancy');
});
Route::post('/company/AddVacancy','postvacancy@addvacancy');


Route::get('/company/companyvacanncylist', function () {
    return view('companyvacancylist');
});


Route::get('/company/companyapplicationslist', function () {
    return view('companyapplications');
});

Route::get('/company/profile', function () {
    return view('companyprofile');
});

//Route::post('/company/profile','companyprofile@cprofile');




////////////////////////////////////////////////COMPANY ROUTESSSSS END/////////////////////////////////////////////////




Route::get('/submitfeedback', function(){
    return view('submitfeedback');
});

Route::post('/submitfeedback','SubmissionFeedback@feedbacksubmit');


/////////////////////////////////////////////////////AJAX ROUTES
//Route::post('/ajax-upload-dp','AjaxCompanyProfile@uploadimage');

//Route::post('/ajax-upload-personal','AjaxCompanyProfile@person');


//Route::get('/home', 'HomeController@index')->name('home');



Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', 'logincontroller@login');

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

////////////////////////////////////////////////admin data end///////////////////////////////////////////