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
            <a class="dropdown-item"  href="{{url('user/resetpassword')}}">Reset Password</a>
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

@section('afternav')
    <div id="nav-search-filters">
        <h1>TEST NAV</h1>
    </div>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="container border-dark">
            <div class="my-heading-text bg-light mt-2 "> JobSeeker Dashboard</div>
        </div>
    </div>

    <div class="container-fluid">


        <div class="container mt-sm-2">
            <div class="row">



                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-plus"></i>
                            </div>
                            <div class="mr-5">Build CV!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{url('jobseeker/buildcv')}}">
                            <span class="float-left">click here</span>
                            <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-warning o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-file"></i>
                            </div>
                            <div class="mr-5">Applied Jobs/Internships</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{url('jobseeker/appliedjobs')}}">
                            <span class="float-left">click here</span>
                            <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="mr-5">Saved Jobs/Internships</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{url('jobseeker/savedjobs')}}">
                            <span class="float-left">click here</span>
                            <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-danger o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-gavel"></i>
                            </div>
                            <div class="mr-5"> View Jobs invitation</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{url('jobseeker/viewinvitation')}}">
                            <span class="float-left">click here</span>
                            <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                      </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>





    {{--<div class="container-fluid">--}}


            {{--<div class="cv-heading mt-4"> JOBSEEKER DASHBOARD</div>--}}

            {{--<div class="row">--}}

                {{--<div class="col-md-3 test-parent">--}}

                    {{--<div class="white-heading"><b> Build CV</b></div>--}}


                {{--</div>--}}

                {{--<div class="col-md-3 test-parent">--}}

                    {{--<div class="white-heading"><b> Applied Jobs/Internships</b></div>--}}


                {{--</div>--}}
                {{--<div class="col-md-3 test-parent">--}}

                    {{--<div class="white-heading"><b> Saved Jobs/Internships</b></div>--}}


                {{--</div>--}}
                {{--<div class="col-md-3 test-parent">--}}

                    {{--<div class="white-heading"><b> View Jobs invitation</b></div>--}}


                {{--</div>--}}

            {{--</div>--}}


    {{--</div>--}}


    @yield('userprofile')
    @yield('buildcv')
    @yield('appliedjobs')
    @yield('savedjobs')
    @yield('viewinvitation')




@endsection