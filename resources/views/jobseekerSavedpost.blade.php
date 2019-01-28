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
                <div class="col-sm-2">
                    <h5>Type : {{$vacancy->vacancy_type}}</h5>
                </div>

                <div class="col-lg">

                    <div class="row saved-jobs-remove-icon ">

                        <div class="col-md-4">

                            <a   href="{{url('/vacancy/removesaved/'.$vacancy->id)}}"  class="fa fa-remove red " ></a>



                        </div>


                    </div>
                </div>



            </div>

            <div class="row mt-4">
                <div class="col-sm-3">
                    <p> Title  {{$vacancy->title}}</p>
                    <p> Description    {{$vacancy->description}}</p>


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