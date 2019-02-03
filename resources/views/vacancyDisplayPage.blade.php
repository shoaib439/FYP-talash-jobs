
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: shoaib--}}
 {{--* Date: 1/22/2019--}}
 {{--* Time: 1:49 PM--}}
 {{--*/--}}


@extends('main')


@section('navbrandclass')
    search-nav-brand
@endsection


@section('afternavlogo')
    <form action="{{url('/search')}}" method="POST">
        @csrf
        <input class="nav-search" type="text" name="userquery" />

        <button type="submit" rel="tooltip" class="btn  btn-secondary-me" >
            <i class="fa fa-search"></i>
        </button>
        <a href="/" >Advance Search</a>
    </form>
@endsection



@section('vacancyDisplayPage')


    <div class="container-fluid ">

        <div class="container shadow-sms p-3 mt-3 mb-4 bg-white rounded ">


            <div class="row mt-3">
                <div class="col-md-10">
                    <div ><p><b class="my-heading-text2">Title:</b> <a class="my-heading-text2">{{  $vacancy->title  }}</a></p></div>
                </div>

                @if( Auth::guard()->check() && Auth::User()->isJobseeker() )

                <div class="col-md-2">


                    @if($savedcheck == 'Saved')

                        <a href="#" onclick="return false;" class="btn my-btn disabled">Saved</a>
                    @elseif($savedcheck)
                        <a href="{{ $savedcheck }}" class="btn my-btn">Save</a>
                    @endif
                </div>


                    @endif
            </div>


            <div class="row mt-sm-1">
                <div class="col-md-3">
                    <p> <b>Type:</b> <a class="my-text-font"> {{  $vacancy->vacancy_type  }}</a></p>
                </div>
            </div>

            <div class="row">
                <b style="margin-left: 16px">Description  :</b>
                <div class="col-md-6">
                    <a class="my-text-font">{{  $vacancy->description  }}</a>
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-md-3">
                    <p><b >Industry:</b> <a class="my-text-font">{{  $vacancy->industry  }} </a></p>
                </div>

                <div class="col-md-3">
                    <p>Positions: <a class="my-text-font">{{    $vacancy->no_of_position  }} </a></p>
                </div>

                <div class="col-md-3">
                    <p>Job Type: <a class="my-text-font">{{     $vacancy->job_type   }} </a></p>
                </div>

                <div class="col-md-3">
                    <p>Job Shift:    <a class="my-text-font">{{     $vacancy->job_shift   }} </a></p>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-4">
                    <p>Experience Required: <a class="my-text-font">{{     $vacancy->experience   }} </a></p>
                </div>

                <div class="col-md-4">
                    <p>Degree Level:    <a class="my-text-font">{{     $vacancy->degree_level   }} </a></p>
                </div>

                <div class="col-md-4">
                    <p>Carrier Level: <a class="my-text-font">{{     $vacancy->carrier_level   }} </a></p>
                </div>
            </div>

                <hr>

                <div class="row">
                    <div class="col-md-4">
                        <p>Skills Required:  <a class="my-text-font">{{     $vacancy->skill_required   }} </a></p>
                    </div>

                    <div class="col-md-4">
                        <p>Age Range:  <a class="my-text-font">{{     $vacancy->age_range   }} </a></p>
                    </div>

                    <div class="col-md-4">
                        <p>Working Hours:   <a class="my-text-font">{{     $vacancy->working_hours   }} </a></p>
                    </div>
                </div>

            <hr>


            <div class="row">
                <div class="col-md-4">
                    <p>Job City:  <a class="my-text-font">{{     $vacancy->job_city   }} </a></p>
                </div>

                <div class="col-md-4">
                    <p>Salary:  <a class="my-text-font">{{     $vacancy->salary   }} </a></p>
                </div>

                <div class="col-md-4">
                    <p>Last Date to Apply:  <a class="my-text-font">{{     $vacancy->last_date   }} </a></p>
                </div>
            </div>




            <div class="row mt-5">
                <div class="col-md-10">
                    <div class="my-heading-text">HR Policies</div>
                </div>

            </div>

            <hr>

            <div class="row  ">
                <div class="col-md-12 mt-2">
                    <div ><strong >No of Interview:</strong><a class="my-text-font"> {{  $vacancy->hr_no_of_interview  }}</a>  </div>
                </div>

            </div>

            <div class="row mt-2 ">
                <div class="col-md-12">
                    <div><strong >Procedure:</strong> <a class="my-text-font">  {{  $vacancy->hr_procedure  }} </a> </div>
                </div>

            </div>

            @if( Auth::guard()->check() && Auth::User()->isJobseeker() )

            <div class="row mt-5">
                <div class="col-md-12 text-center">


                        @if($appliedcheck == 'Applied')

                            <a href="#" onclick="return false;" class="btn my-btn2 disabled">Applied</a>
                        @elseif($appliedcheck)
                            <a href="{{ $appliedcheck }}" class="btn my-btn2">Apply Now</a>
                        @endif
                </div>
            </div>
            @endif




        </div>

        </div>

    @endsection