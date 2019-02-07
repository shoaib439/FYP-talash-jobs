
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: shoaib--}}
 {{--* Date: 1/21/2019--}}
 {{--* Time: 12:13 AM--}}
 {{--*/--}}

@extends('companynav')


@section('searchResult')

    @if(empty($jsuser))
        <div class="container-fluid">
            <div class="container shadow-sms p-3 mt-3 pb-1 bg-white rounded ">
                <div class="row">

                    <div class="col-md-12">
                        <h2 class="text-center">No Result Found</h2>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @foreach($jsuser as $user)

        <div class="container-fluid ">

            <div class="container shadow-sms p-3 mt-3 mb-4 bg-white rounded ">

                <div class="d-flex">
                    <div class="w-15">
                        <div class="jbs-logo-container">
                            <div class="jbs-logo">
                                <img class="profile-image-set " src="{{ (empty($user['user']->profile_pic)) ? 'images/Profile.png':$user['user']->profile_pic }}">
                            </div>

                        </div>

                    </div>

                    <div class="w-85">
                        <div class="row jbs-username">
                            <div class="col-md-12">
                                <b class="justify-content-center">{{$user['user']->display_name}}</b>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">

                    <div class="col-md-6">



                        <div class="row">
                            <div class="col-sm-2">
                                <i>Skills:</i>
                            </div>

                            <div class="col-md-4">
                                <i>{{ implode(', ',$user['skills'])  }}</i>
                            </div>

                        </div>


                    </div>

                    <div class="col-lg">

                        <div class="row applied-jobs-btns">


                            <div class="col-md-4">

                                <a href="{{ url('profile/'.$user['user']->id)  }}" class="btn my-btn">View Profile</a>

                            </div>

                        </div>
                    </div>



                </div>

            </div>
        </div>
    @endforeach




@endsection