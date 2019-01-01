
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: shoaib--}}
 {{--* Date: 12/29/2018--}}
 {{--* Time: 7:58 PM--}}
 {{--*/--}}

@extends('adminfrontend.adminpanel')
@section('usersfeedback')

    <div class="container-fluid ">

        <div class="container shadow-sms p-3 mb-2 bg-white rounded ">

            @foreach($feedback as $values)

            <div class="row">
                <div class="col-md-8">
                   <p class="feedbackname"><b>name:</b>  {{$values['name']}}</p>
                    <p class="feedbacksuggession"><b>Suggession:</b>  <i>{{$values['suggestion']}}</i></p>
                </div>
                <div class="col-md-4 d-flex set-this">
                    <p class="getrating"> <b>rating:</b>   {{$values['rating']}}/5</p>
                </div>




            </div>

            <hr>

                @endforeach
        </div>
    </div>

    @endsection