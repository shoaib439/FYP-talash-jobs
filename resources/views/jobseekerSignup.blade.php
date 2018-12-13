@extends('main')


@section('content')


    <div class="container-fluid ">
        <div class="container mt-5 mb-5">
            <div class="text-center my-heading-text">SIGNUP AS A JOB SEEKER</div>
            <div class="row ">
                <div class=" col-md-6 mb-5 curve-border offset-md-3 bg-light">
                    <form  class="mt-5 " action="{{url('jobseekersignup')}}" method="post">
                        <div class="form-group">

                            <input type="text" required class="form-control curve-border" placeholder="First name">
                        </div>
                        <div class="form-group">

                            <input type="text"required  class="form-control curve-border" placeholder="Last Name">
                        </div>
                        <div class="form-group">

                            <input type="email" required class="form-control curve-border" placeholder="Enter Email">
                        </div>
                        <div class="form-group">

                            <input type="tel" required class="form-control curve-border"  placeholder="Phone Number">
                        </div>

                        <div class="form-group">

                            <input type="password" required class="form-control curve-border"  placeholder="Password">
                        </div>
                        <div class="form-group">

                            <input type="password" required class="form-control curve-border"  placeholder="Confirm Password">
                        </div>

                        <div class="form-group">

                            <label class="radio-inline">
                            <input type="radio" required name="gender"> Male
                            </label>
                            <label class="radio-inline">
                                <input type="radio" required name="gender"> Female
                            </label>
                        </div>

                        <div class="form-group text-center  ">
                            <button type="submit" class="btn mybtn-text  my-btn1 btn-md"  id="Cbtn" >Signup</button>
                        </div>




                    </form>



                </div>
            </div>
        </div>
    </div>



















@endsection