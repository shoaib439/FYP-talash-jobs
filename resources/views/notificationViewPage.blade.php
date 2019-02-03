
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: shoaib--}}
 {{--* Date: 1/22/2019--}}
 {{--* Time: 3:54 PM--}}
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


@section('showNotificationPage')

    <div class="container-fluid ">

        <div class="container shadow-sms p-3 mt-3 mb-3  bg-white rounded ">

            @foreach($notificationsview as $noti)
            <div class="row">
                <div class="col-md-2">
                    {{$noti->type}}
                </div>

                <div class="col-md-8">
                    {!! $noti->message !!}
                </div>
                <div class="col-md-2 text-right">
                    <a   href="{{ url('/delete/notification/'.$noti->id)  }}"  class="fa fa-remove red " ></a>
                </div>

            </div>
                <hr>


                @endforeach
        </div>

    </div>

    @endsection