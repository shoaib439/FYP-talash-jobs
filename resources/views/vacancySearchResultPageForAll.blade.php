
{{--/**--}}
{{--* Created by PhpStorm.--}}
{{--* User: shoaib--}}
{{--* Date: 1/18/2019--}}
{{--* Time: 9:52 PM--}}
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



@section('searchVacancySectionforAll')
    @if(empty($vacancy))
        <div class="container-fluid">
            <div class="container shadow-sms p-3 mb-4 mt-3 pb-1 bg-white rounded ">
                <div class="row">

                    <div class="col-md-12">
                        <h2 class="text-center">No Result Found</h2>
                    </div>
                </div>
            </div>
        </div>
    @endif




    @foreach($vacancy as $key => $data)
        <div class="container-fluid ">

            <div class="container shadow-sms p-3 mt-3 mb-4 bg-white rounded ">

                <div class="row">
                    <div class="col-md-10">

                        <div class="row">
                            <div class="col-md-8">

                                <p> <a class="my-heading-text3">Title: </a>   <a class="my-text-font">{{$data->title}}</a></p>


                            </div>

                        </div>

                    </div>

                    <div class="col-md-2">

                        <div class="row">
                            <p> <a class="my-heading-text3">Type: </a>   <a class="my-text-font">{{$data->vacancy_type}}</a></p>


                        </div>

                    </div>



                </div>

                <div class="row mt-2">
                    <div class="col-sm-12">
                        <p class="my-heading-text3"> Description : </p>

                    </div>

                    <div class="col-sm-12">
                        <p style="text-indent: 90px; text-align: justify" class="my-text-font "> {{$data->description}} </p>

                    </div>


                </div>


                <div class="row">

                    <div class="col-md-6">



                        <div class="row">
                            <div class="col-md-12">
                                <i>Industry: </i>
                                <a class="my-text-font"> {{$data->industry}}</a>
                            </div>


                        </div>


                    </div>

                    <div class="col-lg">

                        <div class="row applied-jobs-btns">


                            <div class="col-md-4">


                                <a href="{{ url('/view/vacancy/'.$data->id)  }}"  type="submit" class="btn my-btn">View</a>
                            </div>

                        </div>
                    </div>



                </div>

            </div>
        </div>
    @endforeach





@endsection