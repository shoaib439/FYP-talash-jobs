<!-- Navbar content -->
<div class="shadow-sms p-3 bg-white  sticky-top">

    <nav class="navbar  navbar-static-top navbar-light  navbar-collaps">

        <div class="navbar-brand @yield('navbrandclass')">
            <a href="#">
                <img src="{{asset('images/logo.png')}}" width="30" height="30" class="d-inline-block align-top" alt="Talash Jobs">
                Talash Jobs
            </a>
            @yield('afternavlogo') @yield('companysearchplace')
        </div>


        <span class="navbar-text">
      @yield('usernameclass') @yield('companydropdownclass')   <a href="#">   @yield('loginlogout')</a>
    </span>


    </nav>
</div>
@yield('afternav')

