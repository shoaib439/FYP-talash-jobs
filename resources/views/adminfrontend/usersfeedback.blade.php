
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: shoaib--}}
 {{--* Date: 12/29/2018--}}
 {{--* Time: 7:58 PM--}}
 {{--*/--}}

@extends('adminfrontend.adminpanel')
@section('usersfeedback')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Users Feedback</a>
        </li>

    </ol>

    <div class="container-fluid ">

        <div class="container shadow-sms p-3 mb-2 bg-white rounded ">

            @foreach($feedback as $values)

            <div class="row">
                <div class="col-md-8">

                    <a class=" feedbackname my-heading-text3">Name: </a>   <a class="my-text-font">{{$values['name']}}</a></p>


                    <a class=" feedbacksuggession my-heading-text3">Suggession: </a>   <a class="my-text-font">{{$values['suggestion']}}</a></p>
                </div>
                <div class="col-md-4 d-flex set-this">
                    <p class="getrating"> <b>rating:</b>   {{$values['rating']}}/5</p>
                </div>
            </div>

                @endforeach
        </div>
    </div>

    @endsection