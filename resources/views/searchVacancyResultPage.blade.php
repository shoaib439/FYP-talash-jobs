
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
@section('usernameclass')
    @guest

    @elseif( Auth::guard() )

        <div class="btn-group dropdown-header">
            <button type="button" class="btn btn-secondary-me dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->display_name }}
            </button>
            <div class="dropdown-menu ">
                <!-- Dropdown menu links -->
                <a class="dropdown-item" href="{{url('jobseekerhome')}}">Profile</a>
                <a class="dropdown-item" href="#">Setting</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('logout')}}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log Out</a>

                <form id="logout-form" action="{{route('logout')}}" method="post" style="display: none"> {{csrf_field()}} </form>
            </div>
        </div>





    @endif
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



@section('searchVacancySection')




        @foreach($searchVacancy as $key => $data)
    <div class="container-fluid ">

        <div class="container shadow-sms p-3 mt-3  bg-white rounded ">

            <div class="row">
                <div class="col-md-10">

                    <div class="row">
                        <div class="col-sm-2">
                            <h5>Title :</h5>
                        </div>

                        <div class="col-md-4">
                            <p>{{$data->title}}</p>
                        </div>
                    </div>

                </div>

                <div class="col-md-2">

                    <div class="row">
                        <div class="col-md-4">
                            <h5>Type:</h5>
                        </div>


                        <div class="col-md-2">
                            <i>{{$data->vacancy_type}}</i>
                        </div>


                        {{--@foreach($querytype as $type)--}}
                            {{--<div class="col-md-2">--}}
                                {{--<i>{{$type->vacancy_type}}</i>--}}
                            {{--</div>--}}
                        {{--@endforeach--}}



                    </div>

                </div>



            </div>

            <div class="row mt-4">
                <div class="col-sm-12">
                    <p> Description : </p>

                </div>

                <div class="col-sm-12">
                    <p style="text-indent: 90px;"> {{$data->description}} </p>

                </div>


            </div>


            <div class="row">

                <div class="col-md-6">



                        <div class="row">
                            <div class="col-md-12">
                                <i>Posted by: </i>
                                <strong> {{ $users[$key]->display_name  }}</strong>
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