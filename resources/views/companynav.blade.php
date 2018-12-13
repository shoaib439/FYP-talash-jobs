
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

    <div class="container-fluid">
        <div class="btn-group dropdown-header">
            <button type="button" class="btn btn-secondary-me dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Companyusername
            </button>
            <div class="dropdown-menu ">
                <!-- Dropdown menu links -->
                <a class="dropdown-item" href="{{url('company/profile')}}">Profile</a>
                <a class="dropdown-item" href="#">Setting</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">logout</a>
            </div>
        </div>


    </div>
@endsection
@section('companysearchplace')
    <form action="" method="get">
        <input class="company-nav-search" type="text" placeholder="search by skills" />
        <i class="fa fa-search"></i>

    </form>
@endsection

@section('company-section')


    @yield('company-search')
    @yield('company-dashboard')





    @endsection