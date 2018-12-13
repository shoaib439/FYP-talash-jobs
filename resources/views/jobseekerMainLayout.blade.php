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
                                    <img  src="{{asset('images/logo.png')}}" class="img-rounded profile-image-set" alt="Cinque Terre">
                                </div>

                                <div class="jbs-edit">
                                    <i class="fa fa-edit"></i>
                                </div>
                            </div>
                        </div>


                        <div class="w-85">
                            <div class="row jbs-username">
                                <div class="col-md-12">
                                    <b class="justify-content-center">Username</b>
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
                    <p id="personal-gender"><i class="fa fa-mars"></i>  <span id="personal-gender">Male</span></p>
                    <p ><i class="fa fa-calendar" aria-hidden="true"></i>  <span id="personal-dob">DOB</span></p>
                    <p><i class="fa fa-address-card" aria-hidden="true"></i>  Address</p>
                    <p><i class="fa fa-building-o" aria-hidden="true"></i>  City</p>


                </div>

                <div class="col-sm-3">
                    <p><i class="fa fa-user"></i> <span id="personal-age">18</span></p>
                    <p><i class="fa fa-phone"></i>  <span id="personal-phone">090078601</span></p>
                    <p><i class="fa fa-envelope"></i>  Email</p>
                    <p><i class="fa fa-globe"></i>  Country</p>

                </div>


            </div>

        </div>

        {{--profile ended--}}



        <div class="container shadow-sms p-3 mb-5 bg-white rounded" id="container-work-experience">

            <div class="row">
                <div class="col-md-12">
                    <div class="jbs-we-title">
                        <div class="w-75">
                            <h5>Work Experience</h5>
                        </div>
                        <div class="w-25">
                            <div class="jbs-add-icon">
                                <a href="#" class="jbs-add-btn" data-containerid="jbs-add-we-container" ><i class="fa fa-plus"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="jbs-main-content-container">

            </div>


        </div>

        {{--work experience ended--}}

        <div class="container shadow-sms p-3 mb-5 bg-white rounded" id="container-education">

            <div class="row">
                <div class="col-md-12">
                    <div class="jbs-we-title">
                        <div class="w-75">
                            <h5>Education</h5>
                        </div>
                        <div class="w-25">
                            <div class="jbs-add-icon">
                                <a href="#" class="jbs-add-btn" data-containerid="jbs-add-education-container" ><i class="fa fa-plus"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="jbs-main-content-container">

            </div>


        </div>





        <div class="container shadow-sms p-3 mb-5 bg-white rounded" id="container-functional-area">

            <div class="row">
                <div class="col-md-12">
                    <div class="jbs-we-title">
                        <div class="w-75">
                            <h5>Functional Area</h5>
                        </div>
                        <div class="w-25">
                            <div class="jbs-add-icon">
                                <a href="#" class="jbs-add-btn" data-containerid="jbs-add-fa-container" ><i class="fa fa-plus"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="jbs-main-content-container">

            </div>


        </div>

        {{--Functional Area ended--}}



        <div class="container shadow-sms p-3 mb-5 bg-white rounded" id="container-skills">

            <div class="row">
                <div class="col-md-12">
                    <div class="jbs-we-title">
                        <div class="w-75">
                            <h5>Skills</h5>
                        </div>
                        <div class="w-25">
                            <div class="jbs-add-icon">
                                <a href="#" class="jbs-add-btn" data-containerid="jbs-add-skills-container" ><i class="fa fa-plus"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="jbs-main-content-container">

            </div>


        </div>


        {{--Skills ended--}}



        <div class="container shadow-sms p-3 mb-5 bg-white rounded" id="container-jobcity">

            <div class="row">
                <div class="col-md-12">
                    <div class="jbs-we-title">
                        <div class="w-75">
                            <h5>Preffered Job City</h5>
                        </div>
                        <div class="w-25">
                            <div class="jbs-add-icon">
                                <a href="#" class="jbs-add-btn" data-containerid="jbs-add-jobcity-container" ><i class="fa fa-plus"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="jbs-main-content-container">

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



        <div class="container shadow-sms p-3 mb-5 bg-white rounded" id="container-projects">

            <div class="row">
                <div class="col-md-12">
                    <div class="jbs-we-title">
                        <div class="w-75">
                            <h5>Projects</h5>
                        </div>
                        <div class="w-25">
                            <div class="jbs-add-icon">
                                <a href="#" class="jbs-add-btn" data-containerid="jbs-add-projects-container" ><i class="fa fa-plus"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="jbs-main-content-container">

            </div>


        </div>




        {{--Projects ended--}}
        <div class="container shadow-sms p-3 mb-5 bg-white rounded" id="container-languages">

            <div class="row">
                <div class="col-md-12">
                    <div class="jbs-we-title">
                        <div class="w-75">
                            <h5>Languages</h5>
                        </div>
                        <div class="w-25">
                            <div class="jbs-add-icon">
                                <a href="#" class="jbs-add-btn" data-containerid="jbs-add-languages-container" ><i class="fa fa-plus"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="jbs-main-content-container">

            </div>


        </div>



        {{--Languages ended--}}

        <div class="container shadow-sms p-3 mb-5 bg-white rounded" id="container-hobbies">

            <div class="row">
                <div class="col-md-12">
                    <div class="jbs-we-title">
                        <div class="w-75">
                            <h5>Hobbies</h5>
                        </div>
                        <div class="w-25">
                            <div class="jbs-add-icon">
                                <a href="#" class="jbs-add-btn" data-containerid="jbs-add-hobby-container" ><i class="fa fa-plus"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="jbs-main-content-container">

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
                                            <input type="text" class="form-control" id="companyname" required aria-describedby="companynamehelp" placeholder="Enter Company name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="companylocation">Company Location</label>
                                            <input type="text" class="form-control" id="companylocation" required aria-describedby="companylocationhelp" placeholder="Enter Company Location">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="companypos">Company Position</label>
                                            <input type="text" class="form-control" id="companypos" required aria-describedby="companyposhelp" placeholder="Enter your Position in company">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="companyjobtype">Job type</label>
                                            <input type="text" class="form-control" id="companyjobtype" required aria-describedby="companyjobtypehelp" placeholder="Enter Job Type">
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="companystartdate">Start Date</label>
                                        <input type="date" class="form-control" id="companysd" required aria-describedby="companysdhelp" placeholder="Start Date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="companyenddate">End Date</label>
                                        <input type="date" class="form-control" id="companyed" required aria-describedby="companyedhelp" placeholder="End Date">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="currentlyworking">Currently working</label>
                                        <input type="checkbox" class="form-control" id="currworking" aria-describedby="currworkinghelp" placeholder="Currently Working">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                <div class="jbs-footer">
                   <div class="container-fluid">
                       <div class="row">
                           <div class="col-md-3">
                               <div class="form-group">
                                   <input type="submit" class="form-control jbs-close" value="Save" />
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
                                        <input type="text" class="form-control" id="degreetitle" required aria-describedby="degreetitlehelp" placeholder="Enter Degree Title">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="yearofcompletion">Year Of Completion</label>
                                        <input type="text" class="form-control" id="yearofcompletion" required aria-describedby="yearofcompletionhelp" placeholder="Year Of Completion">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cgpa">CGPA/Percentage</label>
                                        <input type="text" class="form-control" id="cgpa" aria-describedby="cgpahelp" placeholder="CGPA/Percentage">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="degreelevel">Degree Level</label>
                                        <input type="text" class="form-control" id="degreelevel" required aria-describedby="degreelevelhelp" placeholder="Enter Degree Level">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="institute">Institute</label>
                                        <input type="text" class="form-control" id="institute" required aria-describedby="institutehelp" placeholder="Institute">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="location">Location</label>
                                        <input type="text" class="form-control" id="location" required aria-describedby="locationhelp" placeholder="Location">
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                    <div class="jbs-footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="submit" class="form-control jbs-close" value="Save" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                    <div class="jbs-content">
                        <div class="container-fluid">


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="functionalarea">Functional Area</label>
                                        <input type="text" class="form-control" id="functionalarea" required aria-describedby="functionalareahelp" placeholder="Functional Area">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="jbs-footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="submit" class="form-control jbs-close" value="Save" />
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
                    <div class="jbs-content">
                        <div class="container-fluid">


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="hobbies">Hobbies</label>
                                        <input type="text" class="form-control" id="hobbies" required aria-describedby="hobbieshelp" placeholder="Hobbies">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="jbs-footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="submit" class="form-control jbs-close" value="Save" />
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
                    <div class="jbs-content">
                        <div class="container-fluid">


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="skills">Skills</label>
                                        <input type="text" class="form-control" id="skills" required aria-describedby="skillshelp" placeholder="Skills">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="jbs-footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="submit" class="form-control jbs-close" value="Save" />
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
                    <div class="jbs-content">
                        <div class="container-fluid">


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="jobcity">Preffered Job City</label>
                                        <input type="text" class="form-control" id="jobcity" required aria-describedby="jobcityhelp" placeholder="Preffered job city">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="jbs-footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="submit" class="form-control jbs-close" value="Save" />
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
                    <div class="jbs-content">
                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projecttitle">Project Title</label>
                                        <input type="text" class="form-control" id="projecttitle" required aria-describedby="projecttitlehelp" placeholder="Enter Project Title">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectdesc">Project Description</label>
                                        <input type="text" class="form-control" id="projectdesc" required aria-describedby="projectdeschelp" placeholder="Project Description">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectstartdate">Start Date</label>
                                        <input type="date" class="form-control" id="projectsd" required aria-describedby="projectsdhelp" placeholder="Start Date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectenddate">End Date</label>
                                        <input type="date" class="form-control" id="projected" required aria-describedby="projectedhelp" placeholder="End Date">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projecturl">Project Url</label>
                                        <input type="url" class="form-control" id="projecturl" required aria-describedby="projecturlhelp" placeholder="Project Url">
                                    </div>
                                </div>

                            </div>



                        </div>
                    </div>
                    <div class="jbs-footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="submit" class="form-control jbs-close" value="Save" />
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
                    <div class="jbs-content">
                        <div class="container-fluid">


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="languages">Languages</label>
                                        <input type="text" class="form-control" id="languages" required aria-describedby="languageshelp" placeholder="Languages">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="jbs-footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="submit" class="form-control jbs-close" value="Save" />
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
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="age">Age</label>
                                        <input type="text" class="form-control" id="age" required aria-describedby="agehelp" placeholder="Age">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="age">Phone</label>
                                        <input type="tel" class="form-control" id="phone" required aria-describedby="phonehelp" placeholder="Phone">
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                    <div class="jbs-footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="submit" class="form-control jbs-close" value="Save" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--Edit personal  ended--}}









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

