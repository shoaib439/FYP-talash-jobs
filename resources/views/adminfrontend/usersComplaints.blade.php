
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
                        <p>Name    :</p>
                        <p>Email   :</p>
                        <p>Subject :</p>
                        <p>Message :</p>
                    </div>

                    <div class="col-md-8">
                        <p>{{$complaint['name']}}</p>
                        <p>{{$complaint['email']}}</p>
                        <p>{{$complaint['subject']}}</p>
                        <p>{{$complaint['message']}}</p>

                    </div>



                </div>

                <div class="row mt-2">
                    <div class="col-lg">

                        <div class="row applied-jobs-btns">

                            <div class="col-md-4">

                                <button type="submit" class="btn my-admin-btn">Mark As Solved</button>

                            </div>

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