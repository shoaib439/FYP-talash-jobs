@extends('DashboardNav')

@section('appliedjobs')


    @if(empty($appliedvacancy))
        <div class="container-fluid">
            <div class="container shadow-sms p-3 mt-3 mb-4 pb-1 bg-white rounded ">
                <div class="row">

                    <div class="col-md-12">
                        <div class="text-center my-heading-text">Not Yet applied to any job</div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-12 text-center">
                        <a href="{{url('/')}}" class="btn my-btn2">Search Now</a>
                    </div>
                </div>
            </div>
        </div>
    @endif



    @foreach($appliedvacancy as $key=>$data)
    <div class="container-fluid ">

        <div class="container shadow-sms p-3 mb-5 bg-white rounded ">

            <div class="row">
                <div class="col-md-10">
                    <a class="my-heading-text3">Type: </a>   <a class="my-text-font">{{ $data->vacancy_type }}</a>
                </div>

                <div class="col-md-2 text-right ">
                        <a href="{{ url('/view/vacancy/'.$data->id)  }}"  class="fa fa-eye green-icon-set set-margin"></a>
                </div>




            </div>

            <div class="row mt-4">
                <div style="text-align: justify;" class="col-md-8">
                  <p> <a class="my-heading-text3">Title: </a>   <a class="my-text-font">{{ $data->title }}</a></p>
                    <p> <a class="my-heading-text3">Description: </a>   <a class="my-text-font"><i>{{ $data->description }}</i></a></p>


                </div>


            </div>


            <div class="row ">

                <div class="col-md-6">
                    <p> <a class="my-heading-text3">Applied on: </a>   <a class="my-text-font">{{$appliedarray[$key]}}</a></p>
                </div>
                <div class="col-md-3 applied-jobs-btns">

                    <a href="{{url('/vacancy/withdraw/'.$data->id)}}"  class="btn my-btn">Withdraw</a>

                </div>
                <div class="col-md-3 applied-jobs-btns">


                    <button type="submit"  class="btn my-btn check-status-btn" data-container="jbs-add-status-container-{{ $key }}" >Check Status</button>
                </div>

            </div>


        </div>
    </div>





    <div class="jbs-model" id="jbs-add-status-container-{{ $key }}">
        <div class="jbs-model-background jbs-close"></div>
        <div class="jbs-status-container">
            <div class="jbs-main">
                <div class="jbs-header">
                    <div class="jbs-title">
                        <h3>Status</h3>
                    </div>
                    <div class="jbs-close-container">
                        <i class="fa fa-close jbs-close"></i>
                    </div>
                </div>


                <div class="row m-lg-4">
                    <div class="col-md-6">
                        <div class="my-heading-text"> {{$appliedstatus[$key]}}</div>
                    </div>
                </div>




            </div>
        </div>
    </div>



    @endforeach

@endsection