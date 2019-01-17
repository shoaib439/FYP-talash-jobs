@extends('main')


@section('content')


    <div class="container-fluid ">
        <div class="container mt-5 mb-5">
            <div class="text-center my-heading-text ">SIGNUP AS A COMPANY</div>

            <form action="{{url('companysignup')}}" method="post">
            <div class="row ">


                {{-----column 1-----}}
                <div class=" col-md-6  bg-light">

                    <div  class="mt-5 ">
                        <div class="form-group">

                            <input type="text" required class="form-control curve-border" name="name"  placeholder="Company Name">
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">

                            <input type="text" required class="form-control curve-border" name="phone" placeholder="Phone">
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">

                            <input type="email" required class="form-control curve-border" name="email" placeholder="Email">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">

                            <input type="number" required class="form-control curve-border" name="cnic" placeholder="CNIC">
                            @if ($errors->has('cnic'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cnic') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">

                            <input type="password" required class="form-control curve-border" name="password"  placeholder="Password">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">

                            <input type="password" required class="form-control curve-border" name="password_confirmation" placeholder="Confirm Password">

                        </div>
                    </div>

                </div>

                {{-----column 2-----}}
                <div class=" col-md-6  bg-light">
                    <div  class="mt-5 ">
                        <div class="form-group">

                            <input type="text" required class="form-control curve-border" name="company_type" placeholder="Company Type">
                            @if ($errors->has('company_type'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('company_type') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">

                            <input type="text" required class="form-control curve-border" name="address" placeholder="Address">
                            @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">

                            <input type="text" required class="form-control curve-border" name="city" placeholder="City">
                            @if ($errors->has('city'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">

                            <input type="text" required class="form-control curve-border" name="industry" placeholder="Industry">
                            @if ($errors->has('industry'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('industry') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">

                            <input type="text" required class="form-control curve-border" name="link" placeholder="website link">
                            @if ($errors->has('link'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('link') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">

                            <input type="text" required class="form-control curve-border" name="username" placeholder="Contact person name">
                            @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">

                            <input type="text" required class="form-control curve-border" name="designation" placeholder="Contact person Designation">
                            @if ($errors->has('designation'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('designation') }}</strong>
                                    </span>
                            @endif
                        </div>

                    </div>
                </div>
                <div class="col-md-12 bg-light">
                    <div class="form-group text-center ">
                        <button type="submit" class="btn btn-success my-btn2 btn-md"  id="Cbtn" >Signup</button>
                    </div>
                </div>
            </div>
                {{csrf_field()}}
            </form>

        </div>
    </div>



















@endsection