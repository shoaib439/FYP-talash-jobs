
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: shoaib--}}
 {{--* Date: 1/22/2019--}}
 {{--* Time: 2:37 AM--}}
 {{--*/--}}

@extends('companynav')

@section('jsprofile')

    <div class="container-fluid ">

        <div class="container shadow-sms p-3 mt-3 mb-3  bg-white rounded ">

            <div class="d-flex">
                <div class="w-15">
                    <div class="jbs-logo-container">
                        <div class="jbs-logo">
                            <img class="profile-image-set " src="{{ 'images/Profile.png' }}">
                        </div>

                    </div>

                </div>

                <div class="w-85">
                    <div class="row jbs-username">
                        <div class="col-md-8">
                            <b class="justify-content-center">username</b>
                        </div>
                        <div class="col-md-3">
                            <a href="" class="btn my-btn">invite on job post</a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row ">
                <div class="col-md-12">
                    <div class="my-heading-text"><p>Experience</p></div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <strong>Android Developer</strong>
                </div>


            </div>

            <div class="row">
                <div class="col-md-2">
                    <p>company Name</p>
                </div>

                <div class="col-md-2">
                    <p>your position</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <p>start date-end date</p>
                </div>


            </div>
            <hr>


            <div class="row ">
                <div class="col-md-12">
                    <div class="my-heading-text"><p>Education</p></div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <strong>DEGREE title</strong>
                </div>


            </div>


            <div class="row">
                <div class="col-md-2">
                    <p>Institute , Location</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <p>Year of completion</p>
                </div>


            </div>
            <hr>


            <div class="row">
                <div class="col-md-6 my-heading-text">
                    <p>Skills</p>
                </div>

            </div>

            <div class="row">
                <div class="col-md-2">
                    skill1,skill2,skill3
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-md-6 my-heading-text">
                    <p>Preffered city</p>
                </div>

            </div>

            <div class="row">
                <div class="col-md-2">
                    city1,city2,city3
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-md-6 my-heading-text">
                    <p>Languages</p>
                </div>

            </div>

            <div class="row">
                <div class="col-md-2">
                    Languages1,Languages2,Languages3
                </div>
            </div>




        </div>

    </div>
    @endsection