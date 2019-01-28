
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: shoaib--}}
 {{--* Date: 1/22/2019--}}
 {{--* Time: 3:54 PM--}}
 {{--*/--}}


@extends('main')

@section('showNotificationPage')

    <div class="container-fluid ">

        <div class="container shadow-sms p-3 mt-3 mb-3  bg-white rounded ">

            @foreach($notificationsview as $noti)
            <div class="row">
                <div class="col-md-2">
                    {{$noti->type}}
                </div>

                <div class="col-md-10">
                    {!! $noti->message !!}
                </div>
            </div>


                @endforeach
        </div>

    </div>

    @endsection