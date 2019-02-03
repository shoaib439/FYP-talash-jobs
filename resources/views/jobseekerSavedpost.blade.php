@extends('DashboardNav')

@section('savedjobs')


    @if(empty($vacancies))
        <div class="container-fluid">
            <div class="container shadow-sms p-3 mt-4 mb-4 pb-1 bg-white rounded ">
                <div class="row">

                    <div class="col-md-12">
                        <div class="text-center my-heading-text">Not Yet saved any job</div>
                    </div>
                </div>

            </div>
        </div>
    @endif

    @foreach($vacancies as $key=> $vacancy)
    <div class="container-fluid ">

        <div class="container shadow-sms p-3 mb-5 bg-white rounded ">

            <div class="row">
                <div class="col-md-4">
                    <p> <a class="my-heading-text3">Type: </a>   <a class="my-text-font"> {{$vacancy->vacancy_type}}</a></p>

                </div>

                <div class="col-md-8 saved-jobs-remove-icon">
                    <a   href="{{url('/vacancy/removesaved/'.$vacancy->id)}}"  class="fa fa-remove red " ></a>
                </div>



            </div>

            <div class="row mt-2">
                <div class="col-sm-3">
                    <p> <a class="my-heading-text3">Title: </a>   <a class="my-text-font">  {{$vacancy->title}}</a></p>
                    <p> <a class="my-heading-text3">Description: </a>   <a class="my-text-font">   {{$vacancy->description}}</a></p>

                </div>


            </div>

            <div class="row applied-jobs-btns">


                <div class="col-md-4">


                    <a href="{{ url('/view/vacancy/'.$vacancy->id)  }}" class="btn my-btn ">View</a>
                </div>

            </div>

        </div>
    </div>

    @endforeach




@endsection