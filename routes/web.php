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

Route::get('/', function () {
    return view('Landing');
});

Route::get('/signup', function () {
    return view('signup');
});


Route::get('/login', function () {
    return view('login');
});

Route::post('/login', 'logincontroller@login');


//for jobseeker signup form start
Route::get('/jobseekersignup', function () {
    return view('jobseekersignup');
});

Route::post('/jobseekersignup', 'jobseekersignupcontroller@jobsignup');
//for jobseeker signup form start

//for company signup form start
Route::get('/companysignup', function () {
    return view('CompanySignup');
});

Route::post('/companysignup', 'companysignupcontroller@companysignup');
//for company signup form end




Route::get('/dashboard', function () {
    return view('DashboardNav');
});

Route::get('/jobseeker/contactus', function () {
    return view('contactus');
});

Route::post('/jobseekercontactus','jobseekercontactus@jobseekercontactus');




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

Route::get('/company/dashboard', function () {
    return view('companydashboardnav');
});

Route::get('/company/main', function () {
    return view('companymain');
});


Route::get('/company/searchresult', function () {
    return view('companysearch');
});
Route::get('/company/profile', function () {
    return view('companyprofile');
});

Route::get('/company/AddVacancy', function () {
    return view('AddVacancy');
});

Route::get('/company/companyvacanncylist', function () {
    return view('companyvacancylist');
});


Route::get('/company/companyapplicationslist', function () {
    return view('companyapplications');
});

Route::get('/company/profile', function () {
    return view('companyprofile');
});


