
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: shoaib--}}
 {{--* Date: 12/11/2018--}}
 {{--* Time: 10:13 PM--}}
 {{--*/--}}

@extends('companydashboardnav')


@section('companymain')

<div class="container">
    <div class="row bg-light">


    </div>
</div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 main-header">
            <img src="{{asset('images/postjobimage2.jpg')}}"  class="header-background" alt="Responsive image">
            <div class="row form-container ">
                <div class="col-md-12 submit-text ">
                    <h2 style="color: #ffffff">Post a job to start hiring from our platform</h2>

                </div>
                <div class="col-md-12 submit-btn-container">
                    <div class="row w-100 flex-center">
                        <div class="col-md-3">
                            <a href="{{url('company/AddVacancy')}}" class="btn header-form-btn">POST A VACANCY</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    @endsection