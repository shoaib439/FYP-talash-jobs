
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: shoaib--}}
 {{--* Date: 1/25/2019--}}
 {{--* Time: 7:35 PM--}}
 {{--*/--}}

@extends('companydashboardnav')

@section('statuspage')

    <div class="container-fluid ">
        <div class="container shadow-sms  bg-white  mb-3">

            <form action="{{url('/update/status')}}" method="POST">

                @csrf

            <div class="row">

                <div class="col-md-12">
                    <p class="text-center my-heading-text">Please Update Application Status</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <label for="type">Status<span class="text-danger">*</span></label>
                    <select class="custom-select mr-sm-2 square" name="status" required>

                        <option  value="">choose here</option>
                        <option value="Pending">Pending</option>
                        <option value="Processing">Processing</option>
                        <option value="Accepted">Accepted</option>
                        <option value="Rejected">Rejected</option>

                    </select>
                </div>
            </div>

            <div class="row mt-5">

                <div class="col-md-12">


                    <input type="hidden" name="vacancy_id" value="{{$vacancyupdate}}" />
                    <div class="form-group text-center">
                        <button type="submit" class="btn my-btn1 btn-lg"  id="Cbtn" >Update</button>
                    </div>
                </div>
            </div>

                {{csrf_field()}}

            </form>
        </div>
    </div>

    @endsection