
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

        <div class="container shadow-sms p-3 mt-3  bg-white rounded ">


            <div class="row mt-3">
                <div class="col-md-10">
                    <div class="my-heading-text">Title:  {{  $vacancy->title  }}</div>
                </div>

                @guest

                @elseif( Auth::User()->isJobseeker() )

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
                    <p> <b>Type:</b> <i> {{  $vacancy->vacancy_type  }}</i></p>
                </div>
            </div>

            <div class="row">
                <p style="margin-left: 16px">Description  :</p>
                <div class="col-md-6">
                    <p>{{  $vacancy->description  }}</p>
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-md-3">
                    <p>Industry: {{  $vacancy->industry  }} </p>
                </div>

                <div class="col-md-3">
                    <p>Positions: {{  $vacancy->no_of_position }} </p>
                </div>

                <div class="col-md-3">
                    <p>Job Type: {{  $vacancy->job_type  }} </p>
                </div>

                <div class="col-md-3">
                    <p>Job Shift: {{  $vacancy->job_shift  }} </p>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-4">
                    <p>Experience Required: {{  $vacancy->experience  }} </p>
                </div>

                <div class="col-md-4">
                    <p>Degree Level: {{  $vacancy->degree_level }} </p>
                </div>

                <div class="col-md-4">
                    <p>Carrier Level: {{  $vacancy->carrier_level  }} </p>
                </div>
            </div>

                <hr>

                <div class="row">
                    <div class="col-md-4">
                        <p>Skills Required: {{  $vacancy->skill_required  }} </p>
                    </div>

                    <div class="col-md-4">
                        <p>Age Range: {{  $vacancy->age_range }} </p>
                    </div>

                    <div class="col-md-4">
                        <p>Working Hours: {{  $vacancy->working_hours  }} </p>
                    </div>
                </div>

            <hr>


            <div class="row">
                <div class="col-md-4">
                    <p>Job City: {{  $vacancy->job_city  }} </p>
                </div>

                <div class="col-md-4">
                    <p>Salary: {{  $vacancy->salary }} </p>
                </div>

                <div class="col-md-4">
                    <p>Last Date to Apply: {{  $vacancy->last_date  }} </p>
                </div>
            </div>




            <div class="row mt-5">
                <div class="col-md-10">
                    <div class="my-heading-text">HR Policies</div>
                </div>

            </div>

            <hr>

            <div class="row ">
                <div class="col-md-12">
                    <div ><strong >No of Interview:</strong> {{  $vacancy->hr_no_of_interview  }} </div>
                </div>

            </div>

            <div class="row ">
                <div class="col-md-12">
                    <div><strong >Procedure:</strong>  {{  $vacancy->hr_procedure  }} </div>
                </div>

            </div>

            @if( Auth::User()->isJobseeker() )

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