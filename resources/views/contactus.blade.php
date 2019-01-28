@extends('main')

@yield('loginlogout')
@section('content')

    <div class="container-fluid ">

        <div class="container shadow-sms p-3 mb-5 mt-4 bg-white rounded ">

        <h1 class="text-center my-heading-text pt-40 pb-20">Contact us</h1>
        <p  class="text-center text-info  my-heading-text2">Please fill out the form below and submit your Complaint.</p>
        <div class="row" >
            <div class="col-md-6 offset-md-3"  >

                <form class="pb-40" action="{{url('/user/contactus')}}" method="POST">

                    <div class="form-group">
                        <input type="text" class="form-control" id="Csubject" name="Csubject"  placeholder="Enter Subject" >
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="5" id="cmsg"  name="Cmsg"  placeholder="Message"></textarea>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn my-btn1 btn-lg"  id="Cbtn" >Submit</button>
                    </div>

                    {{csrf_field()}}

                </form>

            </div>
        </div>
        </div>
    </div>

    @endsection