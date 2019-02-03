@extends('main')
@section('content')

    <div class="container-fluid ">
        <div class="container mt-5 mb-5">

            <div class="row"  >
                <div  class=" col-md-2 mb-5 shadow-sms bg-white rounded offset-md-3 bg-light">
                    <div style="margin-top: 27px; ">

                        <a href="{{url('jobseekersignup')}}" title=""> <img  class="img-responsive mt-2 mb-2" src="{{asset('images/js-user-icon.png')}}"  alt="Responsive image"></a>
                    </div>
                </div>

                <div class=" col-md-2 mb-5  shadow-sms bg-white rounded offset-md-2 bg-light">
                    <div>

                        <a href="{{url('companysignup')}}" title=""> <img  class="img-responsive mt-2 mb-2" src="{{asset('images/businessman.png')}}"  alt="Responsive image"></a>
                    </div>
                </div>
            </div>

            <div class="row ">
                <div class=" col-md-3 mb-5 curve-border  offset-md-3  ">
                    <p class="h6">Signup as Job Seeker</p>
                </div>

                <div class=" col-md-3 mb-5 curve-border offset-md-1 ">
                    <p class="h6">Signup as Employeer</p>
                </div>
            </div>

        </div>
    </div>












@endsection