
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: shoaib--}}
 {{--* Date: 12/11/2018--}}
 {{--* Time: 11:18 PM--}}
 {{--*/--}}

@extends('companydashboardnav')

@section('companyapplication')


    <div class="container-fluid ">
        <div class="container shadow-sms  bg-white  mb-3">

            <form action="{{url('company/showapplicationslist')}}" method="post">
                @csrf
            <div class="row">
                <div class="col-md-6  my-heading-text2 mt-2 mb-3">
                    Please choose your Vacancy
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <select class="form-control" name="choose_vacancy">
                        <option selected disabled>Select your vacancy</option>
                        @foreach($getVacancy as $vacancy)
                            <option value="{{ $vacancy->id }}">{{ $vacancy->title }}</option>
                        @endforeach;
                    </select>
                </div>
            </div>

            <div class="row mt-3 ">
                <div class="col-md-6">
                    <button  class="btn my-btn2" type="submit">Submit</button>
                </div>
            </div>

            </form>
        </div>
    </div>


@endsection