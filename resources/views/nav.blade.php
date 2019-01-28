<!-- Navbar content -->
<div class="shadow-sms p-3 bg-white  sticky-top">

    <nav class="navbar  navbar-static-top navbar-light  navbar-collaps">

        <div class="navbar-brand @yield('navbrandclass')">
            <a href="#">
                <img src="{{asset('images/aa.png')}}" width="100" height="50" class="d-inline-block align-top" alt="Talash Jobs">

            </a>
            @yield('afternavlogo') @yield('companysearchplace')
        </div>


        <span class="navbar-text">


            @if(!empty($notifications)) <a href="/jobseeker/viewnotification">
                <i class="fa fa-bell fa-fw"></i>
                <span class="badge badge-danger">{{ ( count($notifications) > 0) ? ''.count($notifications).'':'' }}</span></a> @endif

            @guest


                <a href="{{url('register')}}">Signup</a> | <a href="{{url('login')}}" >Login</a>

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

                @if(Auth::user()->isCompany())
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

