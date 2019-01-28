
{{--///**--}}
{{--// * Created by PhpStorm.--}}
{{--// * User: shoaib--}}
{{--// * Date: 12/10/2018--}}
{{--// * Time: 12:40 AM--}}
{{--// */--}}

@extends('companynav')



@section('company-dashboard')

    <div class="container-fluid">
        <div class="container border-dark">
            <div class="my-heading-text bg-light mt-5 ">Employer Dashboard</div>
        </div>
    </div>

   <div class="container-fluid">


       <div class="container mt-sm-3">
           <div class="row">



           <div class="col-xl-3 col-sm-6 mb-3">
               <div class="card text-white bg-primary o-hidden h-100">
                   <div class="card-body">
                       <div class="card-body-icon">
                           <i class="fa fa-plus"></i>
                       </div>
                       <div class="mr-5">Post a Vacancy!</div>
                   </div>
                   <a class="card-footer text-white clearfix small z-1" href="{{url('company/AddVacancy')}}">
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
                       <div class="mr-5">My Vacancies!</div>
                   </div>
                   <a class="card-footer text-white clearfix small z-1" href="{{url('company/vacancylist')}}">
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
                       <div class="mr-5">View Applications!</div>
                   </div>
                   <a class="card-footer text-white clearfix small z-1" href="{{url('/company/applicationslist')}}">
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
                           <div class="mr-5">HR Policies!</div>
                       </div>
                       <a class="card-footer text-white clearfix small z-1" href="{{url('/company/hrPolicies')}}">
                           <span class="float-left" >click here</span>
                           <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                      </span>
                       </a>
                   </div>
              </div>
            </div>
       </div>
   </div>

       {{--dashboard ended--}}

    @yield('companymain')
    @yield('AddVacancy')
    @yield('companydashboardnav')
    @yield('companyapplication')
    @yield('company-profile')
    @yield('listApplication')
    @yield('statuspage')





@endsection