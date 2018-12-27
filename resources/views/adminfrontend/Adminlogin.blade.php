
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: shoaib--}}
 {{--* Date: 12/19/2018--}}
 {{--* Time: 10:02 PM--}}
 {{--*/--}}

{{--@extends('main')--}}

@extends('main')

@section('admin-section')
    <div class="my-card">

        <div class="p-5 bg-dark">
            <div class=" card-container p-5">

                <div class="card card-login mx-auto">
                    <div class="card-header">Admin Login</div>
                    <div class="card-body">
                        <form method="POST" action="{{url('Adminlogin') }}">
                            <div class="form-group">
                                <div class="form-label-group">

                                    <input type="email" id="inputEmail"class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email address" required="required" autofocus="autofocus">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="password" id="inputPassword" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="remember-me" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        Remember Password
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                            {{csrf_field()}}
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->


    </div>

    @endsection

