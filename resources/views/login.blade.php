

@extends('main')
@section('content')

    <div class="container-fluid ">
        <div class="container mt-5 mb-5">
            <h1 class="text-center h4">LOGIN </h1>
            <form action="{{url('companysignup')}}" method="post">
            <div class="row ">
                <div class=" col-md-6 mb-5 curve-border offset-md-3 bg-light">
                    <form  class="mt-5 ">
                        <div class="form-group">


                            <i class="fa fa-user-circle-o"></i> <input  type="email"  required class="form-control" id="jsemail" name="jsemail" placeholder="Enter Email">
                        </div>
                        <div class="form-group">

                            <input type="password" required class="form-control" id="jspwd" placeholder="Enter password" name="jspwd">
                        </div>
                        <div class=" text-right">
                            <a href="http://localhost:8000">Forgot Password?</a>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success btn-md"  id="Cbtn" >Login</button>
                        </div>

                    </form>

                    <p class="text-muted">Don't have an account?<a href="signup"> Signup</a></p>


                </div>
            </div>
            </form>

        </div>
    </div>












@endsection