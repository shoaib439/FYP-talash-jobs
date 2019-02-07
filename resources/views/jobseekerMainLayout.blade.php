@extends('DashboardNav')



@section('userprofile')

    <div class="container-fluid ">

        <div class="container shadow-sms p-3 mb-5 bg-white rounded " id="container-personal">


            <div class="d-flex">
                <div class="w-75">
                    <div class="d-flex">
                        <div class="w-15">
                            <div class="jbs-logo-container">
                                <div class="jbs-logo">
                                    <img class="profile-image-set " src="{{ $profile['image'] }}">
                                </div>

                                <div class="jbs-edit">
                                    <i class="fa fa-camera upload-button"></i>
                                    <form id="dp-change-form" method="POST" enctype="multipart/form-data">
                                        <input class="file-upload" name="dp_file" type="file" />

                                        @if ($errors->has('dp_file'))
                                            <span class="invalid-feedback-custom" role="alert">
                                        <strong>{{ $errors->first('dp_file') }}</strong>
                                    </span>
                                        @endif
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>

                        </div>

                        <div class="w-85">
                            <div class="row jbs-username">
                                <div class="col-md-12">
                                    <b class="justify-content-center">{{ Auth::user()->display_name }}</b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-25">
                    <div class="jbs-add-icon">
                        <a href="#" class="jbs-edit-btn" data-containerid="jbs-edit-personal-container"><i class="fa fa-edit"></i> </a>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-sm-3">
                    <p><i class="fa fa-envelope"></i>  <span id="personal-email" class="my-text-font"> {{ Auth::user()->email }}</span></p>
                    <p><i class="fa fa-phone"></i>  <span id="personal-phone" class="my-text-font"> {{ Auth::user()->phoneno }}</span></p>

                    <p><i class="fa fa-address-card" aria-hidden="true"></i>  <span id="personal-address"class="my-text-font">  {{$profile['js_address']}}</span></p>
                    <p><i class="fa fa-building-o" aria-hidden="true"></i>  <span id="personal-city"class="my-text-font">  {{ Auth::user()->city }}</span></p>


                </div>

                <div class="col-sm-3">


                    <p><i class="fa fa-mars"></i>  <span id="personal-gender" class="my-text-font">{{ Auth::user()->gender }}</span></p>

                    <p ><i class="fa fa-calendar" aria-hidden="true"></i>  <span id="personal-dob" class="my-text-font"> {{$profile['date_of_birth']}}</span></p>

                </div>


            </div>

        </div>

        {{--profile ended--}}


        {{--bio started--}}
        <div class="container shadow-sms p-3 mb-5 bg-white rounded " id="container-bio">


            <div class="d-flex">


                <div class="w-75">
                    <div class="d-flex">
                        <h2 class="my-heading-text">Biography</h2>
                    </div>
                </div>
                <div class="w-25">
                    <div class="jbs-add-icon">
                        <a href="#" class="jbs-edit-bio-btn" data-containerid="jbs-edit-bio-container"><i class="fa fa-edit"></i> </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <p >   <a class="my-heading-text3 my-fa">About Me: </a> <a class="my-text-font my-bio"> {{$profile['bio']}}</a></p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <p >  <a class="my-heading-text3 my-fa">Carrier Level: </a>   <a class="my-text-font my-carrierlevel"> {{$profile['carrierlevel']}}</a></p>

                </div>
            </div>


        </div>

        {{--bio ended--}}



        <div class="container shadow-sms p-3 mb-5 bg-white rounded" id="container-work-experience">

            <div class="row">
                <div class="col-md-12">
                    <div class="jbs-we-title">
                        <div class="w-75">
                            <h2 class="my-heading-text">Work Experience</h2>
                        </div>
                        <div class="w-25">
                            <div class="jbs-add-icon">
                                <a href="#" class="jbs-add-btn" data-containerid="jbs-add-we-container" ><i class=" green-icon-set fa fa-plus" ></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="jbs-main-content-container">


                @csrf
                @foreach($workexp as $key => $exp)
                    <div class="jbs-main-content" id="education-content-{{ $key  }}" >
                        <form class="fa-remove-form">
                            @csrf
                            <input type="hidden" name="workexp_id" value="{{ $exp->id }}" />
                        </form>
                        <div class="row">
                            <div class="col-md-3">
                                <p >  <a class="my-heading-text3 my-fa">Position: </a>   <a class="my-text-font">{{ $exp->company_position }}</a></p>

                            </div>
                            <div class="col-md-3">
                                <p >  <a class="my-heading-text3 my-fa">location: </a>   <a class="my-text-font">{{ $exp->company_location }}</a></p>

                            </div>



                            <div class="col-md-6 text-right">
                                <i class="fa fa-close red we-remove-btn"></i>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <p >     <a class="my-heading-text3 my-fa">Company name: </a>   <a class="my-text-font">{{ $exp->company_name }}</a></p>

                            </div>

                            <div class="col-md-3">
                                <p><a class="my-heading-text3 my-fa">Job Type: </a><a class="my-text-font">{{ $exp->job_type }}</a></p>


                            </div>

                            <div class="col-md-3">

                                @if( $exp->currently_working=='no' )

                                    <p><a class="my-heading-text3 my-fa">Currently Working: </a><a class="my-text-font "><i class="fa fa-close"></i></a></p>

                                @endif



                                    @if( $exp->currently_working=='yes' )

                                        <p><a class="my-heading-text3 my-fa">Currently Working: </a><a class="my-text-font "><i class="fa fa-check"></i></a></p>


                                    @endif


                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <p><a class="my-heading-text3 my-fa">Start Date: </a><a class="my-text-font ">{{ $exp->start_date }}</a></p>

                            </div>

                            @if( $exp->currently_working=='no' )
                            <div class="col-md-3">
                                <p><a class="my-heading-text3 my-fa">End Date: </a><a class="my-text-font ">{{ $exp->end_date }}</a></p>
                            </div>
                                @endif
                        </div>
                    </div>
                @endforeach
            </div>


        </div>

        {{--work experience ended--}}

        <div class="container shadow-sms p-3 mb-5 bg-white rounded" id="container-education">

            <div class="row">
                <div class="col-md-12">
                    <div class="jbs-we-title">
                        <div class="w-75">
                            <h2 class="my-heading-text">Education</h2>
                        </div>
                        <div class="w-25">
                            <div class="jbs-add-icon">
                                <a href="#" class="jbs-add-btn" data-containerid="jbs-add-education-container" ><i class=" green-icon-set fa fa-plus" ></i>  </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="jbs-main-content-container">


                @csrf
                @foreach($education as $key => $edu)
                    <div class="jbs-main-content" id="education-content-{{ $key  }}" >
                        <form class="fa-remove-form">
                            @csrf
                            <input type="hidden" name="education_id" value="{{ $edu->id }}" />
                        </form>
                        <div class="row">
                            <div class="col-md-4">
                                <p><a class="my-heading-text3 ">Degree Title: </a><a class="my-text-font my-fa">{{ $edu->degree_title  }}</a></p>

                            </div>

                            <div class="col-md-4">
                                <p><a class="my-heading-text3 ">Degree Level: </a><a class="my-text-font my-fa">{{ $edu->degree_level  }}</a></p>
                            </div>

                            <div class="col-md-2">
                                <p><a class="my-heading-text3 ">CGPA: </a><a class="my-text-font my-fa">{{ $edu->cgpa  }}</a></p>



                            </div>


                            <div class="col-md-2 text-right">
                                <i class="fa fa-close red we-remove-btn"></i>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <p><a class="my-heading-text3 ">Institute: </a><a class="my-text-font my-fa">{{ $edu->institite  }}</a></p>

                            </div>


                            <div class="col-md-3">

                                <p><a class="my-heading-text3 ">City: </a><a class="my-text-font ">{{ $edu->city  }}</a></p>


                            </div>

                            <div class="col-md-3">
                                <p><a class="my-heading-text3 ">Year of Completion: </a><a class="my-text-font my-fa">{{ $edu->year_of_completion  }}</a></p>



                            </div>



                        </div>
                    </div>
                @endforeach
            </div>


        </div>





        <div class="container shadow-sms p-3 mb-5 bg-white rounded" id="container-projects">

            <div class="row">
                <div class="col-md-12">
                    <div class="jbs-we-title">
                        <div class="w-75">
                            <h2 class="my-heading-text">Projects</h2>
                        </div>
                        <div class="w-25">
                            <div class="jbs-add-icon">
                                <a href="#" class="jbs-add-btn" data-containerid="jbs-add-projects-container" ><i class=" green-icon-set fa fa-plus" ></i>  </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="jbs-main-content-container">

                @csrf
                @foreach($jsproject as $key => $project)
                    <div class="jbs-main-content" id="fa-content-{{ $key  }}" >
                        <form class="fa-remove-form">
                            @csrf
                            <input type="hidden" name="jsproject_id" value="{{ $project->id }}" />
                        </form>
                        <div class="row">
                            <div class="col-md-4">

                                <p><a class="my-heading-text3 ">Project Title: </a><a class="my-text-font my-fa">{{ $project->project_title   }}</a></p>

                            </div>


                            <div class="col-md-8 text-right">
                                <i class="fa fa-close red we-remove-btn"></i>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-7">

                                <p><a class="my-heading-text3 ">Description: </a><a class="my-text-font my-fa">{{ $project->project_desc   }}</a></p>

                            </div>

                            <div class="col-md-5">
                                <p><a class="my-heading-text3 ">Url: </a><a class="my-text-font my-fa">{{ $project->project_url   }}</a></p>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-7">
                                <p><a class="my-heading-text3">Start Date: </a><a class="my-text-font  my-fa">{{ $project->project_sd   }}</a></p>


                            </div>

                            <div class="col-md-5">
                                <p><a class="my-heading-text3">End Date: </a><a class="my-text-font  my-fa">{{ $project->project_ed   }}</a></p>

                            </div>




                        </div>


                    </div>
                @endforeach

            </div>


        </div>




        {{--Projects ended--}}


        <div class="container shadow-sms p-3 mb-5 bg-white rounded" id="container-functional-area">

            <div class="row">
                <div class="col-md-12">
                    <div class="jbs-we-title">
                        <div class="w-75">
                            <h2 class="my-heading-text">Functional Area</h2>
                        </div>
                        <div class="w-25">
                            <div class="jbs-add-icon">
                                <a href="#" class="jbs-add-btn" data-containerid="jbs-add-fa-container" ><i class=" green-icon-set fa fa-plus" ></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="jbs-main-content-container">
                @csrf
                @foreach($functionalarea as $key => $fa)
                    <div class="jbs-main-content" id="fa-content-{{ $key  }}" >
                        <form class="fa-remove-form">
                            @csrf
                            <input type="hidden" name="functionalarea_id" value="{{ $fa->id }}" />
                        </form>
                        <div class="row">
                            <div class="col-md-3">
                                <p class="my-fa">{{ $fa->functional_area  }}</p>

                            </div>
                            <div class="col-md-9 text-right">
                                <i class="fa fa-close red we-remove-btn"></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>

        {{--Functional Area ended--}}



        <div class="container shadow-sms p-3 mb-5 bg-white rounded" id="container-skills">

            <div class="row">
                <div class="col-md-12">
                    <div class="jbs-we-title">
                        <div class="w-75">
                            <h2 class="my-heading-text">Skills</h2>
                        </div>
                        <div class="w-25">
                            <div class="jbs-add-icon">
                                <a href="#" class="jbs-add-btn" data-containerid="jbs-add-skills-container" ><i class=" green-icon-set fa fa-plus" ></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="jbs-main-content-container">

                @csrf
                @foreach($skills as $key => $skill)
                    <div class="jbs-main-content" id="skills-content-{{ $key  }}" >
                        <form class="skills-remove-form">
                            @csrf
                            <input type="hidden" name="skills_id" value="{{ $skill->id }}" />
                        </form>
                        <div class="row">
                            <div class="col-md-3">
                                <p class="my-skills">{{ $skill->skills  }}</p>

                            </div>
                            <div class="col-md-9 text-right">
                                <i class="fa fa-close red we-remove-btn"></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>


        {{--Skills ended--}}



        <div class="container shadow-sms p-3 mb-5 bg-white rounded" id="container-jobcity">

            <div class="row">
                <div class="col-md-12">
                    <div class="jbs-we-title">
                        <div class="w-75">
                            <h2 class="my-heading-text">Preferred Job City</h2>
                        </div>
                        <div class="w-25">
                            <div class="jbs-add-icon">
                                <a href="#" class="jbs-add-btn" data-containerid="jbs-add-jobcity-container" ><i class=" green-icon-set fa fa-plus" ></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="jbs-main-content-container">
                @csrf
                @foreach($prefferedcity as $key => $city)
                    <div class="jbs-main-content" id="prefferedcity-content-{{ $key  }}" >
                        <form class="prefferedcity-remove-form">
                            @csrf
                            <input type="hidden" name="prefferedcity_id" value="{{ $city->id }}" />
                        </form>
                        <div class="row">
                            <div class="col-md-3">
                                <p class="my-prefferedcity">{{ $city->preffered_city  }}</p>

                            </div>
                            <div class="col-md-9 text-right">
                                <i class="fa fa-close red we-remove-btn"></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>



        </div>


        {{--Preffered Job City ended--}}

        {{--<div class="container shadow-sms p-3 mb-5 bg-white rounded ">--}}

            {{--<div class="row">--}}
                {{--<div class="col-sm-2">--}}
                    {{--<h5>Projects</h5>--}}
                {{--</div>--}}



            {{--</div>--}}

            {{--<div class="row mt-4">--}}
                {{--<div class="col-sm-3">--}}
                    {{--<p> Project Title</p>--}}
                    {{--<p> Description    </p>--}}
                    {{--<p> Start Date </p>--}}
                    {{--<p> End Date    </p>--}}
                    {{--<p> Project URL </p>--}}


                {{--</div>--}}

                {{--<div class="col-sm-3">--}}
                    {{--<p>Company</p>--}}


                {{--</div>--}}


            {{--</div>--}}

        {{--</div>--}}

        <div class="container shadow-sms p-3 mb-5 bg-white rounded" id="container-languages">

            <div class="row">
                <div class="col-md-12">
                    <div class="jbs-we-title">
                        <div class="w-75">
                            <h2 class="my-heading-text">Languages</h2>
                        </div>
                        <div class="w-25">
                            <div class="jbs-add-icon">
                                <a href="#" class="jbs-add-btn" data-containerid="jbs-add-languages-container" ><i class=" green-icon-set fa fa-plus" ></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="jbs-main-content-container">
                @csrf
                @foreach($languages as $key => $language)
                    <div class="jbs-main-content" id="language-content-{{ $key  }}" >
                        <form class="language-remove-form">
                            @csrf
                            <input type="hidden" name="language_id" value="{{ $language->id }}" />
                        </form>
                        <div class="row">
                            <div class="col-md-3">
                                <p class="my-language">{{ $language->language  }}</p>

                            </div>
                            <div class="col-md-9 text-right">
                                <i class="fa fa-close red we-remove-btn"></i>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>


        </div>



        {{--Languages ended--}}

        <div class="container shadow-sms p-3 mb-5 bg-white rounded" id="container-hobbies">

            <div class="row">
                <div class="col-md-12">
                    <div class="jbs-we-title">
                        <div class="w-75">
                            <h2 class="my-heading-text">Hobbies</h2>
                        </div>
                        <div class="w-25">
                            <div class="jbs-add-icon">
                                <a href="#" class="jbs-add-btn" data-containerid="jbs-add-hobby-container" ><i class=" green-icon-set fa fa-plus" ></i>  </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="jbs-main-content-container">
                @csrf
                @foreach($hobbies as $key => $hobby)
                    <div class="jbs-main-content" id="hobby-content-{{ $key  }}" >
                        <form class="hobby-remove-form">
                            @csrf
                            <input type="hidden" name="hobby_id" value="{{ $hobby->id }}" />


                        </form>
                        <div class="row">
                            <div class="col-md-3">
                                <p class="my-hobbies">{{ $hobby->hobbies  }}</p>

                            </div>
                            <div class="col-md-9 text-right">
                                <i class="fa fa-close red we-remove-btn"></i>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>


        </div>

        {{--hobbies  ended--}}



    </div>



    {{--work experience  start--}}
    <div class="jbs-model" id="jbs-add-we-container">
        <div class="jbs-model-background jbs-close"></div>
        <div class="jbs-container">
            <div class="jbs-main">
                <div class="jbs-header">
                    <div class="jbs-title">
                        <h3>Work Experience</h3>
                    </div>
                    <div class="jbs-close-container">
                        <i class="fa fa-close jbs-close"></i>
                    </div>
                </div>
                <form action="#" method="post" id="jbs-we-form" data-submission="container-work-experience">
                    <div class="jbs-content">
                        <div class="container-fluid">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="companyname">Company Name</label>
                                            <input type="text" class="form-control" name="companyname" id="companyname" required aria-describedby="companynamehelp" placeholder="Enter Company name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="companylocation">Company Location</label>
                                            <input type="text" class="form-control" name="companylocation" id="companylocation" required aria-describedby="companylocationhelp" placeholder="Enter Company Location">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="companypos">Company Position</label>
                                            <input type="text" class="form-control" name="companypos" id="companypos" required aria-describedby="companyposhelp" placeholder="Enter your Position in company">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="companyjobtype">Job type</label>
                                            <input type="text" class="form-control" name="companyjobtype" id="companyjobtype" required aria-describedby="companyjobtypehelp" placeholder="Enter Job Type">
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="companystartdate">Start Date</label>
                                        <input type="date" class="form-control" name="companysd" id="companysd" required aria-describedby="companysdhelp" placeholder="Start Date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="companyenddate">End Date</label>
                                        <input type="date" class="form-control" name="companyed" id="companyed"  aria-describedby="companyedhelp" placeholder="End Date">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="currentlyworking">Currently working</label>
                                        <input type="checkbox" class="form-control" name="currworking" id="currworking" aria-describedby="currworkinghelp" placeholder="Currently Working">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                <div class="jbs-footer">
                   <div class="container-fluid">
                       <div class="row">
                           <div class="col-md-12">
                               <div class="form-group align-class">
                                   @csrf
                                   <input type="submit" class="form-control btn my-btn1" value="Save" />
                               </div>
                           </div>
                       </div>
                   </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    {{--work experience  ended--}}



    {{--education  start--}}
    <div class="jbs-model" id="jbs-add-education-container">
        <div class="jbs-model-background jbs-close"></div>
        <div class="jbs-container">
            <div class="jbs-main">
                <div class="jbs-header">
                    <div class="jbs-title">
                        <h3>Education</h3>
                    </div>
                    <div class="jbs-close-container">
                        <i class="fa fa-close jbs-close"></i>
                    </div>
                </div>
                <form action="#" method="post" id="jbs-education-form" data-submission="container-education">
                    <div class="jbs-content">
                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="degreetitle">Degree Title</label>
                                        <input type="text" class="form-control" id="degreetitle" name="degreetitle" required aria-describedby="degreetitlehelp" placeholder="Enter Degree Title">


                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="yearofcompletion">Year Of Completion</label>
                                        <input type="text" class="form-control" id="yearofcompletion" name="yearofcompletion" required aria-describedby="yearofcompletionhelp" placeholder="Year Of Completion">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cgpa">CGPA/Percentage</label>
                                        <input type="text" class="form-control" id="cgpa" name="cgpa" aria-describedby="cgpahelp" placeholder="CGPA/Percentage">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="degreelevel">Degree Level</label>
                                         <select class="custom-select mr-sm-2 square"   id="degreelevel" name="degreelevel">

                                            <option disabled >Select Degree Level</option> <option value="PHD - Doctorate">PHD - Doctorate</option> <option value="MS-M.Phil">MS-M.Phil</option> <option value="M.SC-MBA-BS">M.SC-MBA-BS</option> <option value="BSC-BA">BSC-BA</option> <option value="FA-FSC">FA-FSC</option> <option value="High School">High School</option> <option value="B.CS - B.IT">B.CS - B.IT</option> <option value="Intermediate A-Level">Intermediate A-Level</option> <option value="ACA - ACCA - CA - ACMA">ACA - ACCA - CA - ACMA</option> <option value="MBBS">MBBS</option> <option value="B.Com">B.Com</option> <option value="Diploma">Diploma </option> <option value="Short Courses">Short Courses</option> <option value="B.E - B.Tech">B.E - B.Tech</option> <option value="BBA - MBA">BBA - MBA</option> <option value="M.CS - MBA Marketing">M.CS - MBA Marketing</option> <option value="Pharm-D">Pharm-D</option> <option value="LLB - LLM">LLB - LLM</option> <option value="DAE">DAE</option> <option value="Bachelors">Bachelors</option> <option value="Masters">Masters</option> <option value="DVM">DVM</option> <option value="BS Electrical">BS Electrical</option> <option value="B.E Mechanical">B.E Mechanical</option> <option value="B.E-B.Sc">B.E-B.Sc</option> <option value="FCPS">FCPS</option> <option value="M.Com">M.Com</option> <option value="MBA">MBA</option> <option value="BBA">BBA</option> <option value="Civil Engineering">Civil Engineering</option> <option value="Primary">Primary</option> <option value="Middle">Middle</option> <option value="LLB">LLB</option> <option value="LLM">LLM</option> <option value="CA">CA</option> <option value="Mphil">Mphil</option> <option value="Matric"> Matric</option> <option value="MS">MS</option> <option value="Master">Master</option> <option value="MA">MA</option> <option value="BiT">BiT</option> <option value="BCS">BCS</option> <option value="DAE">DAE</option> <option value="Bachelor">Bachelor</option> <option value="MBBS">MBBS</option> <option value="B.ed">B.ed</option> <option value="M.ed">M.ed</option> <option value="Intermediate">Intermediate</option> <option value="ACCA">ACCA</option> <option value="B.Sc">B.Sc</option> <option value="BA">BA</option> <option value="Diploma">Diploma</option> <option value="P.G Diploma">P.G Diploma</option> <option value="ITI">ITI</option> <option value="BBA">BBA</option> <option value="MCA">MCA</option> <option value="MBA">MBA</option> <option value="B.Tech">B.Tech</option> <option value="MSc">MSc</option> <option value=">M.Tech">M.Tech</option> <option value="M.Sc - B.Sc">M.Sc - B.Sc</option> </select>


                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="institute">Institute</label>
                                        <input type="text" class="form-control" id="institute" name="institute" required aria-describedby="institutehelp" placeholder="Institute">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="location">Location</label>
                                        <input type="text" class="form-control" id="location" name="location" required aria-describedby="locationhelp" placeholder="Location">
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                    <div class="jbs-footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group align-class">
                                        <input type="submit" class="form-control btn my-btn1" value="Save" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{csrf_field()}}
                </form>
            </div>
        </div>
    </div>

    {{--education  ended--}}

 {{--functional area start--}}

    <div class="jbs-model" id="jbs-add-fa-container">
        <div class="jbs-model-background jbs-close"></div>
        <div class="jbs-container">
            <div class="jbs-main">
                <div class="jbs-header">
                    <div class="jbs-title">
                        <h3>Functional Area</h3>
                    </div>
                    <div class="jbs-close-container">
                        <i class="fa fa-close jbs-close"></i>
                    </div>
                </div>
                <form action="#" method="post" id="jbs-fa-form" data-submission="container-functional-area">
                    @csrf
                    <div class="jbs-content">
                        <div class="container-fluid">


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="functionalarea">Functional Area</label>
                                        <input type="text" class="form-control" id="functionalarea" name="functionalarea" required aria-describedby="functionalareahelp" placeholder="Functional Area">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="jbs-footer">
                        <div class="container-fluid">
                            <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group align-class">
                                            <input type="submit" class="form-control btn my-btn2" value="Save" />
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>


    {{--functional area end--}}


    {{--Hobbies  start--}}


    <div class="jbs-model" id="jbs-add-hobby-container">
        <div class="jbs-model-background jbs-close"></div>
        <div class="jbs-container">
            <div class="jbs-main">
                <div class="jbs-header">
                    <div class="jbs-title">
                        <h3>Hobbies</h3>
                    </div>
                    <div class="jbs-close-container">
                        <i class="fa fa-close jbs-close"></i>
                    </div>
                </div>
                <form action="#" method="post" id="jbs-hobby-form" data-submission="container-hobbies">
                    @csrf
                    <div class="jbs-content">
                        <div class="container-fluid">


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="hobbies">Hobbies</label>
                                        <input type="text" class="form-control" id="hobbies"  name="hobbies" required aria-describedby="hobbieshelp" placeholder="Hobbies">
                                        @if ($errors->has('hobbies'))
                                            <span class="invalid-feedback-custom" role="alert">
                                        <strong>{{ $errors->first('hobbies') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="jbs-footer">
                        <div class="container-fluid">
                            <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group align-class">
                                            <input type="submit" class="form-control btn my-btn1" value="Save" />
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    {{--Hobbies  ended--}}


    {{--skills  start--}}


    <div class="jbs-model" id="jbs-add-skills-container">
        <div class="jbs-model-background jbs-close"></div>
        <div class="jbs-container">
            <div class="jbs-main">
                <div class="jbs-header">
                    <div class="jbs-title">
                        <h3>Skills</h3>
                    </div>
                    <div class="jbs-close-container">
                        <i class="fa fa-close jbs-close"></i>
                    </div>
                </div>
                <form action="#" method="post" id="jbs-skills-form" data-submission="container-skills">
                    @csrf
                    <div class="jbs-content">
                        <div class="container-fluid">


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="skills">Skills</label>
                                        <input type="text" class="form-control" id="skills" name="skills" required aria-describedby="skillshelp" placeholder="Skills">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="jbs-footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group align-class">
                                        <input type="submit" class="form-control btn my-btn1" value="Save" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    {{--skills  ended--}}


    {{--jobcity  start--}}


    <div class="jbs-model" id="jbs-add-jobcity-container">
        <div class="jbs-model-background jbs-close"></div>
        <div class="jbs-container">
            <div class="jbs-main">
                <div class="jbs-header">
                    <div class="jbs-title">
                        <h3>Preffered Job City</h3>
                    </div>
                    <div class="jbs-close-container">
                        <i class="fa fa-close jbs-close"></i>
                    </div>
                </div>
                <form action="#" method="post" id="jbs-jobcity-form" data-submission="container-jobcity">
                    @csrf
                    <div class="jbs-content">
                        <div class="container-fluid">


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="jobcity">Preffered Job City</label>
                                        <input type="text" class="form-control" id="jobcity" name="jobcity"  required aria-describedby="jobcityhelp" placeholder="Preffered job city">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="jbs-footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group align-class">
                                        <input type="submit" class="form-control btn my-btn1" value="Save" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    {{--jobcity  ended--}}


    {{--project  start--}}
    <div class="jbs-model" id="jbs-add-projects-container">
        <div class="jbs-model-background jbs-close"></div>
        <div class="jbs-container">
            <div class="jbs-main">
                <div class="jbs-header">
                    <div class="jbs-title">
                        <h3>Projects</h3>
                    </div>
                    <div class="jbs-close-container">
                        <i class="fa fa-close jbs-close"></i>
                    </div>
                </div>
                <form action="#" method="post" id="jbs-projects-form" data-submission="container-projects">
                    @csrf
                    <div class="jbs-content">
                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projecttitle">Project Title</label>
                                        <input type="text" class="form-control" id="projecttitle" name="projecttitle" required aria-describedby="projecttitlehelp" placeholder="Enter Project Title">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectdesc">Project Description</label>
                                        <input type="text" class="form-control" id="projectdesc" name="projectdesc" required aria-describedby="projectdeschelp" placeholder="Project Description">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectstartdate">Start Date</label>
                                        <input type="date" class="form-control" id="projectsd" name="projectsd" required aria-describedby="projectsdhelp" placeholder="Start Date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectenddate">End Date</label>
                                        <input type="date" class="form-control" id="projected" name="projected" required aria-describedby="projectedhelp" placeholder="End Date">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projecturl">Project Url</label>
                                        <input type="url" class="form-control" id="projecturl" name="projecturl" required aria-describedby="projecturlhelp" placeholder="Project Url">
                                    </div>
                                </div>

                            </div>



                        </div>
                    </div>
                    <div class="jbs-footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group align-class">
                                        <input type="submit" class="form-control btn my-btn1" value="Save" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--project  ended--}}


    {{--languages  start--}}


    <div class="jbs-model" id="jbs-add-languages-container">
        <div class="jbs-model-background jbs-close"></div>
        <div class="jbs-container">
            <div class="jbs-main">
                <div class="jbs-header">
                    <div class="jbs-title">
                        <h3>Languages</h3>
                    </div>
                    <div class="jbs-close-container">
                        <i class="fa fa-close jbs-close"></i>
                    </div>
                </div>
                <form action="#" method="post" id="jbs-languages-form" data-submission="container-languages">
                    @csrf
                    <div class="jbs-content">
                        <div class="container-fluid">


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="languages">Languages</label>
                                        <input type="text" class="form-control" id="languages" name="language" required aria-describedby="languageshelp" placeholder="Languages">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="jbs-footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group align-class">
                                        <input type="submit" class="form-control btn my-btn2" value="Save" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    {{--languages  ended--}}


    {{--Edit personal  start--}}


    <div class="jbs-model" id="jbs-edit-personal-container">
        <div class="jbs-model-background jbs-close"></div>
        <div class="jbs-container">
            <div class="jbs-main">
                <div class="jbs-header">
                    <div class="jbs-title">
                        <h3>Personal Details</h3>
                    </div>
                    <div class="jbs-close-container">
                        <i class="fa fa-close jbs-close"></i>
                    </div>
                </div>
                <form action="#" method="post" id="jbs-personal-form" data-submission="container-personal">
                    <div class="jbs-content">
                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email"   readonly="readonly" name="email" class="form-control" id="email"  required aria-describedby="emailhelp" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" id="address" name="address" required aria-describedby="addresshelp" placeholder="address">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control" id="city" name="city" required aria-describedby="cityhelp" placeholder="City">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="website">Date Of Birth</label>
                                        <input type="date" class="form-control"   id="dob" name="dob" required aria-describedby="dobhelp" placeholder="dob">
                                    </div>
                                </div>


                            </div>



                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="age">Phone</label>
                                        <input type="tel" class="form-control" id="phone" required aria-describedby="phonehelp" name="phone" placeholder="Phone">
                                    </div>
                                </div>

                                {{--<div class="col-md-6">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label for="display_name">Display Name</label>--}}
                                        {{--<input type="text" class="form-control" name="display_name" id="display_name" required aria-describedby="usernamehelp" placeholder="Display Name">--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                            </div>



                        </div>
                    </div>
                    <div class="jbs-footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group align-class">
                                        <input type="submit" class="form-control btn my-btn1" value="Save" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   {{csrf_field()}}
                </form>
            </div>
        </div>
    </div>

    {{--Edit personal  ended--}}



    {{--bio edit start--}}

    <div class="jbs-model" id="jbs-edit-bio-container">
        <div class="jbs-model-background jbs-close"></div>
        <div class="jbs-container">
            <div class="jbs-main">
                <div class="jbs-header">
                    <div class="jbs-title">
                        <h3>Biography</h3>
                    </div>
                    <div class="jbs-close-container">
                        <i class="fa fa-close jbs-close"></i>
                    </div>
                </div>
                <form action="#" method="post" id="jbs-bio-form" data-submission="container-bio">
                    <div class="jbs-content">
                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="bio">Biography</label>
                                        <textarea rows="4" cols="50" name="bio" class="form-control" id="bio" ></textarea>
                                         </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type">Select Carrier Level<span class="text-danger">*</span></label>


                                        <select  name="carrierlevel" id="carrierlevel"  value="{{ old('carrierlevel') }}" id="carrierlevel"class="form-control valid" aria-invalid="false">  @if ($errors->has('carrierlevel'))
                                                <span class="invalid-feedback-custom" role="alert">
                                        <strong>{{ $errors->first('carrierlevel') }}</strong>
                                    </span>
                                            @endif<option  value="">Select Career Level</option> <option value="Not Required">Not Required</option> <option value="Entry Level">Entry Level</option> <option value="Student (Undergraduate">Student (Undergraduate)</option> <option value="Experienced (Non Manager)">Experienced (Non Manager)</option> <option value="Manager">Manager</option> </select>


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="jbs-footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group align-class">
                                        <input type="submit" class="form-control btn my-btn1" value="Save" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{csrf_field()}}
                </form>
            </div>
        </div>
    </div>
    {{--bio edit end--}}









    {{--<div class="row m-0">--}}
        {{--<div class="col-md-12">--}}
            {{--<div style="position:relative;">--}}
                {{--<div class="d-flex" style="align-items: center; justify-content: space-between;">--}}
                     {{--<h3 style="display: inline-block;">Skills</h3>--}}
                     {{--<h3 style="display:inline-block;"><a class="add-skills-btn" href="#">+</a></h3>--}}
                {{--</div>--}}
             {{--</div>--}}
    {{--<div class="person-skills"> </div>--}}
         {{--</div>--}}
    {{--</div>--}}
                     {{--<div class="add-skills-container">--}}
             {{--<div class="add-skills-block">--}}
         {{--<div class="add-skills-background"></div>--}}
     {{--<div class="model-box">--}}
                     {{--<form class="form-add-skills">--}}
                 {{--<input type="text" id="skills" name="skill" required/>--}}
             {{--<input type="submit" value="submit"/>--}}
                     {{--</form>--}}
                    {{--</div>--}}
                  {{--</div>--}}
               {{--</div>--}}

@endsection

