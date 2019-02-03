@extends('main')


@section('content')


    <div class="container-fluid ">
        <div class="container mt-5 mb-5">
            <div class="text-center my-heading-text">SIGNUP AS A JOB SEEKER</div>
            <div class="row ">
                <div class=" col-md-6 mb-5 curve-border offset-md-3 bg-light">
                    <form  class="mt-5 " action="{{route('jobseeker.signup')}}" method="post">
                        <div class="form-group">

                            <input type="text" required class="form-control curve-border" name="fname" value="{{ old('fname') }}" placeholder="First name">
                            @php // var_dump($errors->first('fname'));die(); @endphp

                            @if ($errors->has('fname'))
                                <span class="invalid-feedback-custom" role="alert">
                                    <strong>{{ $errors->first('fname') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">

                            <input type="text"required  class="form-control curve-border" name="lname" value="{{ old('lname') }}" placeholder="Last Name">
                            @if ($errors->has('lname'))
                                <span class="invalid-feedback-custom" role="alert">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">

                            <input type="email" required class="form-control curve-border" value="{{ old('email') }}" name="email" placeholder="Enter Email">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback-custom" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">

                            <input type="tel" required class="form-control curve-border" value="{{ old('phone') }}" name="phone" placeholder="Phone Number">
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback-custom" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">

                            <input type="password" required class="form-control curve-border"  value="{{ old('password') }}"  name="password" placeholder="Password">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback-custom" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">

                            <input type="password" required class="form-control curve-border" name="password_confirmation"  placeholder="Confirm Password">
                        </div>

                        <div class="form-group">

                            <label class="radio-inline">
                            <input type="radio" required  value="male" name="gender"> Male
                            </label>
                            <label class="radio-inline">
                                <input type="radio" required value="female" name="gender"> Female
                            </label>
                            @if ($errors->has('gender'))
                                <span class="invalid-feedback-custom" role="alert">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group text-center  ">
                            <button type="submit" class="btn mybtn-text  my-btn1 btn-md"  id="Cbtn" >Signup</button>
                        </div>

                        {{ csrf_field() }}

                    </form>



                </div>
            </div>
        </div>
    </div>



















@endsection