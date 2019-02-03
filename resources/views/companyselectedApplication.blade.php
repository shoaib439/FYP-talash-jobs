
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: shoaib--}}
 {{--* Date: 1/24/2019--}}
 {{--* Time: 3:50 PM--}}
 {{--*/--}}

@extends('companydashboardnav')

@section('listApplication')


    @if(empty($appliedUsers))
        <div class="container-fluid mb-4">
            <div class="container shadow-sms p-3 mt-3 pb-1 bg-white rounded ">
                <div class="row">

                    <div class="col-md-12">
                        <h2 class="text-center">No Applications on this Vacancy</h2>
                    </div>
                </div>
            </div>
        </div>
    @endif


    @if(!empty($appliedUsers))
                <div class="container-fluid ">
                    <div class="container shadow-sms  bg-white  mb-3">
                        <form action="{{url('/updateStatus')}}" method="POST">

            <div class="row mt-5">
                <div class="col-md-6 my-heading-text2 mt-2 mb-3">
                    My Applications

                </div>

            </div>


            <div class="row">
                <div class="col-lg-12 mr-auto ml-auto">



                        @csrf
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Applicant Name</th>
                                <th>Job Title</th>
                                <th class="text-right">Status</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($appliedUsers as $key=> $data)
                            <tr>


                                <td class="text-center">1</td>
                                <td>{{$data['Users']->display_name}}</td>
                                <td>{{$data['vacancy']->title}}</td>
                                <td class="text-right">{{$data['status']->status}}</td>
                                <td class="td-actions text-right">
                                    <a href="{{url('/profile/'.$data['Users']->id)}}" rel="tooltip" class="btn btn-dark  btn-sm" >
                                        <i class="fa fa-user"></i>
                                    </a>
                                    <a  href="{{url('/view/vacancy/'.$data['vacancy']->id)}}" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" >
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <button   value="{{$data['status']->id}}" name="updatestatus"   rel="tooltip" type="submit" class="btn btn-primary btn-just-icon btn-sm" >
                                        <i class="fa fa-edit" style="color: #ffffff"></i>
                                    </button>
                                    <a  class=" call-for-interview-btn   btn btn-danger btn-just-icon btn-sm" data-container="jbs-call-container-{{ $key }}" >
                                        <i style="color: #ffffff" class="fa fa-phone"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
                            {{csrf_field()}}
                        </form>


                    </div>

                </div>




                @foreach($appliedUsers as $key=> $data)
                <div class="jbs-model" id="jbs-call-container-{{ $key }}">
                    <div class="jbs-model-background jbs-close"></div>
                    <div class="jbs-call-container">

                        <form method="post" action="{{url('/callforinterview')}}">
                        <div class="jbs-main">
                            <div class="jbs-header text-center">
                                <div class="jbs-title">
                                    <div class="my-heading-text"> Call Jobseeker For Interview</div>
                                </div>
                                <div class="jbs-close-container">
                                    <i class="fa fa-close jbs-close"></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="datetime">Please choose Date</label>
                                    <input type="date" class="form-control" name="date"required aria-describedby="datehelp" >

                                </div>
                                <div class="col-md-4">
                                    <label for="datetime">Please choose Time</label>
                                    <input type="time" class="form-control" name="time"required aria-describedby="timehelp" >

                                </div>
                            </div>


                            <div class="row mt-4">
                                <div class="col-md-12 text-center">
                                    <input type="hidden" name="user_id" value="{{$data['Users']->id}}" />

                                    <input type="hidden" name="vacancy_id" value="{{$data['vacancy']->id}}" />
                                    <button type="submit" class="btn my-btn2 btn-md"  id="Cbtn" >Call For Interview</button>
                                </div>
                            </div>

                        </div>
                            {{csrf_field()}}

                        </form>
                    </div>
                </div>
            @endforeach
    @endif

    @endsection
