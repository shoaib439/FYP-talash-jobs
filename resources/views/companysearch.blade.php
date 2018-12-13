
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: shoaib--}}
 {{--* Date: 12/10/2018--}}
 {{--* Time: 1:09 AM--}}
 {{--*/--}}

@extends('companynav')

@section('company-search')



    <div class="container-fluid mt-md-5">

        <div class="container shadow-sms p-3 mb-5 bg-white rounded ">

            <div class="row ">

                    <div class="col-sm-2">

                            <img  src="{{asset('images/logo.png')}}" class="img-rounded profile-image-set" alt="Cinque Terre">

                    </div>

                    <div class="col-md-2">
                        <div class="row">
                            <div class="myname">
                                <p>Jobseeker name</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="city-country">
                                city , country
                            </div>
                        </div>
                    </div>



            </div>

            <div class="row pt-3">

                <div class="col-md-4">
                    <div class="w-25">
                        <p>Description</p>
                    </div>
                </div>



                <div class="col-lg">

                    <div class="row applied-jobs-btns">

                        <div class="col-md-4">

                            <button type="submit" class="btn my-btn">View Profile</button>

                        </div>
                        <div class="col-md-4">


                            <button type="submit" class="btn my-btn">Invite on Job Post</button>
                        </div>

                    </div>
                </div>
            </div>



            {{--<div class="row mt-4">--}}
                {{--<div class="col-sm-3">--}}
                    {{--<p> Title</p>--}}
                    {{--<p> company Name    </p>--}}
                    {{--<p> Description    </p>--}}


                {{--</div>--}}


            {{--</div>--}}

        </div>
    </div>



    @endsection