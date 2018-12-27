@extends('main')
@section('content')

    <div class="container">

        <div class="pt-4 mybox-shadow1">
       <h1 class="text-center cv-heading pt-40 pb-40">Contact us</h1>
        <p  class="text-center text-info">Please fill out the form below to contact us with our team.</p>
        <div class="row" >
            <div class="col-md-6 offset-md-3"  >

                <form class="pb-40" action="{{url('jobseekercontactus')}}" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" id="Cname" name="Cname"  placeholder="Enter Name" >
                    </div>

                    <div class="form-group">
                        <input type="email" class="form-control" id="Cemail" name="Cemail" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <input type="tel" class="form-control" id="Cno" name="Cno" placeholder="Enter Number">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="Csubject" name="Csubject"  placeholder="Enter Subject" >
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="5" id="cmsg"  name="Cmsg"  placeholder="Message"></textarea>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn my-btn btn-lg"  id="Cbtn" >Submit</button>
                    </div>

                    {{csrf_field()}}

                </form>

            </div>
        </div>
        </div>
    </div>

    @endsection