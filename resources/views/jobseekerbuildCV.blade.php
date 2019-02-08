@extends('DashboardNav')

@section('buildcv')



    <div class="container">
        <div id="CVBuilder-template-chooser" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{asset('images/postjobimage2.jpg')}}"  alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{asset('images/df.png')}}" alt="Second slide">
                </div>
            </div>
        </div>
    </div>



    <div class="row text-center mb-4 mt-4">
        <div class="col-md-12">
            <img src="{{ asset('images/cv1image.png') }}" width="40%" />
            <a href="{{ url('buildCV/CV/1/preview') }}" id="preview_link" class="btn my-btn2">Preview CV Template 1</a>
            <a href="{{ url('buildCV/CV/1') }}" class="btn my-btn2">Download CV</a>
        </div>
    </div>
    <div class="row text-center mb-4 mt-4">
        <div class="col-md-12">
            <img src="{{ asset('images/cv2image.png') }}" width="40%" />
            <a href="{{ url('buildCV/CV/2/preview') }}" id="preview_link" class="btn my-btn2">Preview CV Template 2</a>
            <a href="{{ url('buildCV/CV/2') }}" class="btn my-btn2">Download CV</a>
        </div>
    </div>
    <div class="row text-center mb-4 mt-4">
        <div class="col-md-12">
            <img src="{{ asset('images/cv3image.png') }}" width="40%" />
            <a href="{{ url('buildCV/CV/3/preview') }}" id="preview_link" class="btn my-btn2">Preview CV Template 3</a>
            <a href="{{ url('buildCV/CV/3') }}" class="btn my-btn2">Download CV</a>
        </div>
    </div>
    </div>



<!--
    <div class="container">
        <h2>Carousel Example</h2>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -- >
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -- >
            <div class="carousel-inner">

                <div class="item active">
                    <img src="{{asset('images/CV.jpg')}}" alt="Los Angeles" style="width:30%; height:50%">
                    <div class="carousel-caption">
                        <h3>Los Angeles</h3>
                        <p>LA is always so much fun!</p>
                    </div>
                </div>

                <div class="item">
                    <img src="{{asset('images/CV.jpg')}}" alt="Chicago" style="width:30%;">
                    <div class="carousel-caption">
                        <h3>Chicago</h3>
                        <p>Thank you, Chicago!</p>
                    </div>
                </div>

                <div class="item">
                    <img src="{{asset('images/CV.jpg')}}" alt="New York" style="width:30%;">
                    <div class="carousel-caption">
                        <h3>New York</h3>
                        <p>We love the Big Apple!</p>
                    </div>
                </div>

            </div>

            <!-- Left and right controls -- >
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>


-->

    @endsection