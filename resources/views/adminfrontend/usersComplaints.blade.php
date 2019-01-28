
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: shoaib--}}
 {{--* Date: 12/29/2018--}}
 {{--* Time: 7:53 PM--}}
 {{--*/--}}

@extends('adminfrontend.adminpanel')

@section('userscomplaints')

    <div class="container-fluid ">


            <div class="container shadow-sms p-3 mb-5 bg-white rounded ">
                @foreach ($complaints as $complaint)
                <div class="row d-flex">
                    <div class="col-md-2">
                        <h6>Name    :</h6>
                        <h6>User Type    :</h6>
                        <h6>Email   :</h6>
                        <h6>Subject :</h6>
                        <h6>Message :</h6>
                    </div>

                    <div class="col-md-8">
                        <p>{{$complaint['name']}}</p>
                        <p>{{$complaint['type']}}</p>
                        <p>{{$complaint['email']}}</p>
                        <p>{{$complaint['subject']}}</p>
                        <p>{{$complaint['message']}}</p>

                    </div>

                    <div class="col-md-2 text-right">


                        <a   href="{{url('/delete/complaint/'.$complaint['id'])}}"  class="fa fa-trash alert-danger " ></a>

                    </div>



                </div>

                <div class="row mt-2">
                    <div class="col-lg">

                        <div class="row applied-jobs-btns">


                            <form method="post" action="{{url('/markAsSolve')}}">
                                @csrf
                                <div class="col-sm-2">
                                    <input type="hidden" name="user_email" value="{{$complaint['email']}}">
                                    <input type="hidden" name="complaint_id" value="{{$complaint['id']}}">
                                </div>

                            <div class="col-md-4">

                                @if($complaint['solve']=='solved')

                                    <button disabled class="btn my-abtn">Solved</button>
                                    @endif

                                    @if($complaint['solve']=='pending')
                                <button type="submit" class="btn my-abtn">Mark As Solved</button>
                                    @endif
                            </div>

                            </form>
                        </div>
                    </div>
                </div>
                    <hr>
                @endforeach
            </div>


    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @endsection