<!-- Navbar content -->
<div class="shadow-sms  bg-white  sticky-top">

    <nav class="navbar  navbar-static-top navbar-light  navbar-collaps">

        <div class="navbar-brand @yield('navbrandclass')">
            <a href="#">
                <img src="{{asset('images/aa.png')}}" width="100" height="50" class="d-inline-block align-top" alt="Talash Jobs">

            </a>
            @yield('afternavlogo') @yield('companysearchplace')
        </div>


        <span class="navbar-text">


            @if(!empty($notifications)) <a href="jobseeker/viewnotification">
                <i class="fa fa-bell fa-fw"></i>
                <span class="badge badge-danger">{{ ( count($notifications) > 0) ? ''.count($notifications).'':'' }}</span></a> @endif

            @guest
                    <nav class="navbar navbar-expand-lg navbar-light ">
  {{--<a class="navbar-brand" href="#">Navbar w/ text</a>--}}
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText" >
    <ul class="navbar-nav mr-auto" style="    border-right-style: groove;
    border-right-width: unset;
    border-right-color: unset">
      <li class="nav-item">
        <a class="nav-link" href="#">About us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('register')}}">Signup</a>
        </li>
    </ul>
    <span class="navbar-text " style="margin-left: 15px;">

                <a  style="color: #ffffff" class="btn signupbtn" href="{{url('login')}}" >Login</a>

    </span>
  </div>
</nav>

            @elseif( Auth::guard() )

                @if(Auth::user()->isJobseeker())


                    <div class="btn-group dropdown-header">
                <a class="btn btn-secondary-me dropdown-toggle"   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->display_name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{url('jobseekerhome')}}">Profile</a>
                    <a class="dropdown-item"  href="{{url('user/resetpassword')}}">Reset Password</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('logout')}}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log Out</a>

                    <form id="logout-form" action="{{route('logout')}}" method="post" style="display: none"> {{csrf_field()}} </form>


                </div>
                </div>

                @endif

                @if(Auth::user()->isCompany() &&!Auth::user()->isActive())
                    <div class="container-fluid">
                <div class="btn-group dropdown-header">
                    <button type="button" class="btn btn-secondary-me dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->display_name }}
                    </button>
                    <div class="dropdown-menu ">

                        <a class="dropdown-item" href="{{route('logout')}}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log Out</a>

                        <form id="logout-form" action="{{route('logout')}}" method="post" style="display: none"> {{csrf_field()}} </form>
                    </div>
                </div>

            </div>


                    @elseif(Auth::user()->isActive())

                                <div class="container-fluid">
                <div class="btn-group dropdown-header">
                    <button type="button" class="btn btn-secondary-me dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->display_name }}
                    </button>
                    <div class="dropdown-menu ">
                        <!-- Dropdown menu links -->
                        <a class="dropdown-item" href="{{url('company/profile')}}">Profile</a>
                        <a class="dropdown-item" href="{{url('user/resetpassword')}}">Reset Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('logout')}}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log Out</a>

                        <form id="logout-form" action="{{route('logout')}}" method="post" style="display: none"> {{csrf_field()}} </form>
                    </div>
                </div>

            </div>

                @endif


                {{--{{ Auth::user()->name }}--}}
                {{--<a href="{{route('logout')}}"--}}
                {{--onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log Out</a>--}}

                {{--<form id="logout-form" action="{{route('logout')}}" method="post" style="display: none"> {{csrf_field()}} </form>--}}

            @endif
    </span>


    </nav>
</div>
@yield('afternav')

