
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: shoaib--}}
 {{--* Date: 10/16/2018--}}
 {{--* Time: 12:29 AM--}}
 {{--*/--}}
@extends('main')

@section('loginlogout')
    @guest
        <a href="{{url('register')}}">Signup</a> | <a href="{{url('login')}}" >Login</a>
    @elseif( Auth::guard() )
        {{ Auth::user()->name }}
        <a href="{{route('logout')}}"
           onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log Out</a>

        <form id="logout-form" action="{{route('logout')}}" method="post" style="display: none"> {{csrf_field()}} </form>

    @endif
@endsection
@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 main-header">
                <img src="{{asset('images/searchbgimage.jpg')}}"  class="header-background" alt="Responsive image">
                <div class="row form-container">
                    <div class="col-md-12">
                        <div class="form-group header-form" >
                            <form>

                                <div class="row">

                                    <div class="col-md-3 p-1">

                                        <input type="text" required class="form-control square" id="searchid"  placeholder="SEARCH">

                                    </div>

                                    <div class="col-md-3 p-1">

                                        <select class="custom-select mr-sm-2 square" id="inlineFormCustomSelect">
                                            <option selected>Search by Industry</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>

                                    </div>

                                    <div class="col-md-3 p-1">

                                        <select class="custom-select mr-sm-2 square" id="inlineFormCustomSelect">
                                            <option selected>Job/Internship</option>
                                            <option value="1">Job</option>
                                            <option value="2">Internship</option>

                                        </select>

                                    </div>

                                    <div class="col-md-3 p-1">

                                        <select class="custom-select mr-sm-2 square" id="inlineFormCustomSelect">
                                            <option selected>Search by City</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>

                                    </div>

                                </div>

                            </form>

                        </div>
                    </div>
                    <div class="col-md-12 submit-btn-container">
                        <div class="row w-100 flex-center">
                            <div class="col-md-3">
                                <button type="submit" class="btn header-form-btn">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{--build your cv section started--}}
            <div class="container-fluid border-bottom  bg-light mt-2" >
                <div class="row cv-container-bg">

                    <div class="col-md-12">
                        <div class="myCV">
                            <div class="text-center pt-lg-4">
                                <div class ="cv-heading "><b>BUILT OR UPLOAD YOUR CV</b></div>
                                <div class="cv-para text-uppercase pt-1">Choose the best template enter your information and build your appeling CV.</div>


                            </div>

                            <div>

                                <img  class="img-responsive" src="{{asset('images/df.png')}}"  alt="Responsive image">
                            </div>


                        </div>



                    </div>
                </div>



            </div>

    {{--build your cv section ended--}}


    {{--latest jobs section started--}}
    <div class="container-fluid">

        <div class="row">
            {{--<div class="col-md-12">--}}

            {{--</div>--}}
            <div class="col-md-12 section-interviews">
                <div class ="cv-heading text-center mb-4"><b>LATEST JOBS</b></div>
                <div class="row">

                    <div class="col-md-4 ">
                        <div class="block-interview">
                            <div class="interview-logo">
                                <img src="{{asset('images/int-logo.png')}}" />
                            </div>
                            <div class="interview-description">
                                <a href="#"><h4>Test Interview</h4></a>
                                <p>Silverow (Pvt) Ltd</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="block-interview">
                            <div class="interview-logo">
                                <img src="{{asset('images/int-logo.png')}}" />
                            </div>
                            <div class="interview-description">
                                <a href="#"><h4>Test Interview</h4></a>
                                <p>Silverow (Pvt) Ltd</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="block-interview">
                            <div class="interview-logo">
                                <img src="{{asset('images/int-logo.png')}}" />
                            </div>
                            <div class="interview-description">
                                <a href="#"><h4>Test Interview</h4></a>
                                <p>Silverow (Pvt) Ltd</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">

            <div class="col-md-12 section-interviews">
                <div class="row">
                    <div class="col-md-4">
                        <div class="block-interview">
                            <div class="interview-logo">
                                <img src="{{asset('images/int-logo.png')}}" />
                            </div>
                            <div class="interview-description">
                                <a href="#"><h4>Test Interview</h4></a>
                                <p>Silverow (Pvt) Ltd</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="block-interview">
                            <div class="interview-logo">
                                <img src="{{asset('images/int-logo.png')}}" />
                            </div>
                            <div class="interview-description">
                                <a href="#"><h4>Test Interview</h4></a>
                                <p>Silverow (Pvt) Ltd</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="block-interview">
                            <div class="interview-logo">
                                <img src="{{asset('images/int-logo.png')}}" />
                            </div>
                            <div class="interview-description">
                                <a href="#"><h4>Test Interview</h4></a>
                                <p>Silverow (Pvt) Ltd</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="row">

            <div class="col-md-12 section-interviews">
                <div class="row">
                    <div class="col-md-4">
                        <div class="block-interview">
                            <div class="interview-logo">
                                <img src="{{asset('images/int-logo.png')}}" />
                            </div>
                            <div class="interview-description">
                                <a href="#"><h4>Test Interview</h4></a>
                                <p>Silverow (Pvt) Ltd</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="block-interview">
                            <div class="interview-logo">
                                <img src="{{asset('images/int-logo.png')}}" />
                            </div>
                            <div class="interview-description">
                                <a href="#"><h4>Test Interview</h4></a>
                                <p>Silverow (Pvt) Ltd</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="block-interview">
                            <div class="interview-logo">
                                <img src="{{asset('images/int-logo.png')}}" />
                            </div>
                            <div class="interview-description">
                                <a href="#"><h4>Test Interview</h4></a>
                                <p>Silverow (Pvt) Ltd</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--latest jobs section ended--}}




    {{--latest internships section started--}}


    <div class="container-fluid">

        <div class="row ">
            {{--<div class="col-md-12">--}}

            {{--</div>--}}
            <div class="col-md-12 section-interviews ">
                <div class ="cv-heading text-center mb-4 "><b>LATEST INTERNSHIPS</b></div>
                <div class="row">

                    <div class="col-md-4 ">
                        <div class="block-interview">
                            <div class="interview-logo">
                                <img src="{{asset('images/int-logo.png')}}" />
                            </div>
                            <div class="interview-description">
                                <a href="#"><h4>Test Interview</h4></a>
                                <p>Silverow (Pvt) Ltd</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="block-interview">
                            <div class="interview-logo">
                                <img src="{{asset('images/int-logo.png')}}" />
                            </div>
                            <div class="interview-description">
                                <a href="#"><h4>Test Interview</h4></a>
                                <p>Silverow (Pvt) Ltd</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="block-interview">
                            <div class="interview-logo">
                                <img src="{{asset('images/int-logo.png')}}" />
                            </div>
                            <div class="interview-description">
                                <a href="#"><h4>Test Interview</h4></a>
                                <p>Silverow (Pvt) Ltd</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">

            <div class="col-md-12 section-interviews">
                <div class="row">
                    <div class="col-md-4">
                        <div class="block-interview">
                            <div class="interview-logo">
                                <img src="{{asset('images/int-logo.png')}}" />
                            </div>
                            <div class="interview-description">
                                <a href="#"><h4>Test Interview</h4></a>
                                <p>Silverow (Pvt) Ltd</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="block-interview">
                            <div class="interview-logo">
                                <img src="{{asset('images/int-logo.png')}}" />
                            </div>
                            <div class="interview-description">
                                <a href="#"><h4>Test Interview</h4></a>
                                <p>Silverow (Pvt) Ltd</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="block-interview">
                            <div class="interview-logo">
                                <img src="{{asset('images/int-logo.png')}}" />
                            </div>
                            <div class="interview-description">
                                <a href="#"><h4>Test Interview</h4></a>
                                <p>Silverow (Pvt) Ltd</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="row">

            <div class="col-md-12 section-interviews">
                <div class="row">
                    <div class="col-md-4">
                        <div class="block-interview">
                            <div class="interview-logo">
                                <img src="{{asset('images/int-logo.png')}}" />
                            </div>
                            <div class="interview-description">
                                <a href="#"><h4>Test Interview</h4></a>
                                <p>Silverow (Pvt) Ltd</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="block-interview">
                            <div class="interview-logo">
                                <img src="{{asset('images/int-logo.png')}}" />
                            </div>
                            <div class="interview-description">
                                <a href="#"><h4>Test Interview</h4></a>
                                <p>Silverow (Pvt) Ltd</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="block-interview">
                            <div class="interview-logo">
                                <img src="{{asset('images/int-logo.png')}}" />
                            </div>
                            <div class="interview-description">
                                <a href="#"><h4>Test Interview</h4></a>
                                <p>Silverow (Pvt) Ltd</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>







    {{--latest internships section ended--}}




    {{--android app section started--}}


    <section>

        <div class="row " >

         <div class="col-md-12 section-download-app" style="background-image: url('{{asset('images/ccc.jpg')}}');">
            <div class="d-flex flex-center" >

                <a href="#" class="download-app" target="_blank"> <img src="{{asset('images/downloadapp.jpg')}}"alt="TalashJobs"> </a>
            </div>



         </div>


        </div>

    </section>


    {{--android app section ended--}}






@endsection