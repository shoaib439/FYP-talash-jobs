@extends('main')


@section('content')


    <div class="container-fluid ">
        <div class="container mt-5 mb-5">
            <div class="text-center my-heading-text ">SIGNUP AS A COMPANY</div>

            <form action="{{url('CompanySignup')}}" method="post">
            <div class="row ">


                {{-----column 1-----}}
                <div class=" col-md-6  bg-light">

                    <div  class="mt-5 ">
                        <div class="form-group">

                            <input type="text" required class="form-control curve-border"  placeholder="Company Name">
                        </div>

                        <div class="form-group">

                            <input type="text" required class="form-control curve-border"  placeholder="Phone">
                        </div>

                        <div class="form-group">

                            <input type="email" required class="form-control curve-border"  placeholder="Email">
                        </div>

                        <div class="form-group">

                            <input type="number" required class="form-control curve-border"  placeholder="CNIC">
                        </div>

                        <div class="form-group">

                            <input type="password" required class="form-control curve-border"  placeholder="Password">
                        </div>

                        <div class="form-group">

                            <input type="password" required class="form-control curve-border"  placeholder="Confirm Password">
                        </div>
                    </div>

                </div>

                {{-----column 2-----}}
                <div class=" col-md-6  bg-light">
                    <div  class="mt-5 ">
                        <div class="form-group">

                            <input type="text" required class="form-control curve-border"  placeholder="Company Type">
                        </div>

                        <div class="form-group">

                            <input type="text" required class="form-control curve-border"  placeholder="Address">
                        </div>

                        <div class="form-group">

                            <input type="text" required class="form-control curve-border"  placeholder="City">
                        </div>

                        <div class="form-group">

                            <input type="text" required class="form-control curve-border"  placeholder="Industry">
                        </div>

                        <div class="form-group">

                            <input type="text" required class="form-control curve-border"  placeholder="website link">
                        </div>

                        <div class="form-group">

                            <input type="text" required class="form-control curve-border"  placeholder="Contact person name">
                        </div>

                        <div class="form-group">

                            <input type="text" required class="form-control curve-border"  placeholder="Contact person Designation">
                        </div>

                    </div>
                </div>
                <div class="col-md-12 bg-light">
                    <div class="form-group text-center ">
                        <button type="submit" class="btn btn-success my-btn2 btn-md"  id="Cbtn" >Signup</button>
                    </div>
                </div>
            </div>
            </form>

        </div>
    </div>



















@endsection