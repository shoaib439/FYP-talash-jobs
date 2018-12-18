

@extends('main')
@section('content')

    <div class="container-fluid ">
        <div class="container mt-5 mb-5">
            <h1 class="text-center h4">LOGIN </h1>

            <div class="row ">
                <div class=" col-md-6 mb-5 curve-border offset-md-3 bg-light">
                    <form  class="mt-5"  action="{{url('login')}}" method="post">
                        <div class="form-group">


                            <i class="fa fa-user-circle-o"></i> <input  type="email"  required class="form-control" id="email" name="email" placeholder="Enter Email">
                        </div>
                        <div class="form-group">

                            <input type="password" required class="form-control" id="pass" placeholder="Enter password" name="password">
                        </div>
                        <div class=" text-right">
                            <a href="http://localhost:8000">Forgot Password?</a>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success btn-md"  id="Cbtn" >Login</button>
                        </div>
                        {{csrf_field()}}

                    </form>

                    <p class="text-muted">Don't have an account?<a href="signup"> Signup</a></p>


                </div>
            </div>


        </div>
    </div>












@endsection