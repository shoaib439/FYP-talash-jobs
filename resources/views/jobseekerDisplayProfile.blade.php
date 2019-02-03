
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: shoaib--}}
 {{--* Date: 1/22/2019--}}
 {{--* Time: 2:37 AM--}}
 {{--*/--}}

@extends('main')

@section('jsprofile')

    <div class="container-fluid ">

        <div class="container shadow-sms p-3 mt-3 mb-3  bg-white rounded ">

            <div class="d-flex">
                <div class="w-10">
                    <div class="jbs-logo-container">
                        <div class="jbs-logo">
                            <img class="profile-image-set " src="{{ (empty($user->profile_pic)) ? 'images/Profile.png':$user->profile_pic }}">
                        </div>

                    </div>

                </div>

                <div class="w-85">
                    <div class="row jbs-username">
                        <div class="col-md-8">
                            <b class="justify-content-center">{{ $user->display_name }}</b>
                        </div>
                        <div class="col-md-3">
                            @if($invitelink == 'invited')
                                <a href="#" onclick="return false;" class="btn my-btn disabled">Invited</a>
                            @elseif($invitelink)
                                <a href="{{ $invitelink }}" class="btn my-btn">Invite this user</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>


            <div class="row ">
                <div class="col-md-12">
                    <div class="my-heading-text"><p>Experience</p></div>
                </div>
            </div>

            @foreach($workexp as $exp)

                <div class="row">
                    <div class="col-md-6">
                     <a class="my-heading-text3">Position: </a>   <a class="my-text-font">{{ $exp->company_position }}</a>
                    </div>


                </div>

                <div class="row">
                    <div class="col-md-4">
                          <a class="my-heading-text3">Company name: </a>   <a class="my-text-font">{{ $exp->company_name }}</a>
                    </div>

                    <div class="col-md-2">
                           <a class="my-heading-text3">Job Type: </a>   <a class="my-text-font">{{ $exp->job_type }}</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <a class="my-heading-text3">Start Date: </a>   <a class="my-text-font">{{ $exp->start_date }}</a>
                    </div>

                    <div class="col-md-4">
                        <a class="my-heading-text3">End Date: </a>   <a class="my-text-font">{{ $exp->end_date }}</a>
                    </div>
                </div>


            @endforeach
            <hr>


            <div class="row ">
                <div class="col-md-12">
                    <div class="my-heading-text"><p>Education</p></div>
                </div>
            </div>

            @foreach($education as $edu)
            <div class="row">
                <div class="col-md-6">
                    <a class="my-heading-text3">Degree Title: </a>   <a class="my-text-font">{{ $edu->degree_title }}</a>

                </div>


            </div>


            <div class="row">
                <div class="col-md-6">
                    <a class="my-heading-text3">Institute: </a>   <a class="my-text-font">{{ $edu->institite }} , {{ $edu->city }}</a>
                </div>

                <div class="col-md-4">
                    <p> <a class="my-heading-text3">Year of Completion: </a>   <a class="my-text-font">{{ $edu->year_of_completion }} </a></p>
                </div>


            </div>

            @endforeach
            <hr>


            <div class="row">
                <div class="col-md-6 my-heading-text">
                    <p>Skills</p>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                   <a class="my-text-font"> {{ implode(', ',$skillarray)  }}  </a>
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
                  <a class="my-text-font">   {{ implode(', ',$cityarray)  }} </a>
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
                  <a class="my-text-font">      {{ implode(', ',$langarray)  }} </a>
                </div>
            </div>




        </div>

    </div>
    @endsection