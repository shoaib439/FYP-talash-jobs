
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: shoaib--}}
 {{--* Date: 12/11/2018--}}
 {{--* Time: 10:26 PM--}}
 {{--*/--}}

@extends('companydashboardnav')

@section('AddVacancy')

    <div class="container-fluid ">
        <div class="container shadow-sms  bg-white  mb-3">


            <div class="row mt-5">
                <div class="col-md-6 my-heading-text2 mt-2 mb-3">
                   My Vacancies

                </div>

            </div>


            <div class="row">
                <div class="col-lg-12 mr-auto ml-auto">

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Job Title</th>
                                <th>Created</th>
                                <th>Last Updated</th>
                                <th class="text-right">Status</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($vacancylist as $vacancylists)
                            <tr>
                                <td class="text-center">{{$vacancylists['id']}}</td>
                                <td>{{$vacancylists['title']}}</td>
                                <td>12/12/12</td>
                                <td>12/12/12</td>
                                <td class="text-right">Active</td>
                                <td class="td-actions text-right">
                                   <button type="button" rel="tooltip" class="btn btn-dark  btn-sm" >
                                        <i class="fa fa-check-square-o"></i>
                                        </button>
                                    <button type="button" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" >
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <button type="button" rel="tooltip" class="btn btn-primary btn-just-icon btn-sm" >
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <a href={{url('/deletevacancy/'.$vacancylists['id'])}}><button type="button" rel="tooltip" class="btn btn-danger btn-just-icon btn-sm" >
                                        <i class="fa fa-remove"></i>
                                        </button></a>
                                </td>
                            </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>

    @endsection