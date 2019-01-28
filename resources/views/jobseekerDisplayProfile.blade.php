
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
                <div class="w-15">
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
                        <strong>{{ $exp->company_position }}</strong>
                    </div>


                </div>

                <div class="row">
                    <div class="col-md-2">
                        <p>{{ $exp->company_name }}</p>
                    </div>

                    <div class="col-md-2">
                        <p>{{ $exp->job_type }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <p>{{ $exp->start_date.'/'.$exp->end_date }}</p>
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
                    <strong>{{ $edu->degree_title }}</strong>
                </div>


            </div>


            <div class="row">
                <div class="col-md-4">
                    <p>{{ $edu->institute }} </p> <p>, {{ $edu->city }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <p>{{ $edu->year_of_completion }}</p>
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
                <div class="col-md-2">
                    {{ implode(', ',$skillarray)  }}
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
                    {{ implode(', ',$cityarray)  }}
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
                   {{ implode(', ',$langarray)  }}
                </div>
            </div>




        </div>

    </div>
    @endsection