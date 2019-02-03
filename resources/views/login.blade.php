

@extends('main')
@section('content')

    <div class="container-fluid ">
        <div class="container mt-5 mb-5">
            <h2 class="text-center ">LOGIN </h2>

            <div class="row ">
                <div class=" col-md-6 mb-5 shadow-sms bg-white rounded offset-md-3 bg-light">
                    <form  class="mt-5 mb-5"   name="login-form"  action="{{url('login')}}" method="post">
                        <div class="form-group">


                            {{--<i class="fa fa-envelope"></i> --}}
                            <input  type="email"  required class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter Email">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback-custom" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">

                            <input type="password" required class="form-control" id="pass" placeholder="Enter password" name="password">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback-custom" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn my-btn1 btn-md"  id="Cbtn" >Login</button>
                        </div>
                        {{csrf_field()}}

                    </form>

                    <p class="text-muted justify-content-center">Don't have an account?<a href="{{url('/register')}}"> Signup</a></p>


                </div>
            </div>


        </div>
    </div>












@endsection