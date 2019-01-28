
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: shoaib--}}
 {{--* Date: 12/10/2018--}}
 {{--* Time: 1:12 AM--}}
 {{--*/--}}
@extends('main')

@section('navbrandclass')
    search-nav-brand
@endsection
@section('companydropdownclass')

    {{--<div class="container-fluid">--}}
        {{--<div class="btn-group dropdown-header">--}}
            {{--<button type="button" class="btn btn-secondary-me dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                {{--{{ Auth::user()->display_name }}--}}
            {{--</button>--}}
            {{--<div class="dropdown-menu ">--}}
                {{--<!-- Dropdown menu links -->--}}
                {{--<a class="dropdown-item" href="{{url('company/profile')}}">Profile</a>--}}
                {{--<a class="dropdown-item" href="{{url('user/resetpassword')}}">Reset Password</a>--}}
                {{--<div class="dropdown-divider"></div>--}}
                {{--<a class="dropdown-item" href="{{route('logout')}}"--}}
                   {{--onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log Out</a>--}}

                {{--<form id="logout-form" action="{{route('logout')}}" method="post" style="display: none"> {{csrf_field()}} </form>--}}
            {{--</div>--}}
        {{--</div>--}}

    {{--</div>--}}
@endsection
@section('companysearchplace')
    <form action="{{url('/search/jobseeker')}}" method="POST">
        @csrf
        <input class="company-nav-search" type="text"  name= "companyQuery" placeholder="search by skills" />

        <button type="submit" rel="tooltip" class="btn  btn-secondary-me" >
            <i class="fa fa-search"></i>
        </button>

    </form>
@endsection

@section('company-section')


    @yield('company-search')
    @yield('company-dashboard')
    @yield('searchResult')
    @yield('HRpolicies')
    @yield('jsprofilee')








    @endsection