
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: shoaib--}}
 {{--* Date: 2/3/2019--}}
 {{--* Time: 10:12 PM--}}
 {{--*/--}}

@extends('adminfrontend.adminpanel')

@section('AdminViewCompany')

    <div class="container-fluid">
        <div class="container shadow-sms p-3 mb-4 mt-3 pb-1 bg-white  ">

            @if(!empty($cData) || !$cData->isEmpty())
                <div class="row">
                    <div class="col-md-4 ">
                        <div ><p><b class="my-heading-text">Company Details</b></p></div>

                        <p> <a class="my-heading-text3">Name: </a>   <a class="my-text-font">{{$cData['user']->display_name}}</a></p>
                        <p> <a class="my-heading-text3">Type: </a>   <a class="my-text-font">{{$cData['company']->company_type}}</a></p>
                        <p> <a class="my-heading-text3">Address: </a>   <a class="my-text-font">{{$cData['company']->address}}</a></p>
                        {{--<p> <a class="my-heading-text3">Address: </a>   <a class="my-text-font">{{$cData['user']->city}}</a></p>--}}

                    </div>

                </div>







                <div class="row">

                    <div class="col-md-8">
                        <div id="map"></div>

                    </div>
                    <div class="col-md-4 border-left">
                        <div ><p><b class="my-heading-text">Contact Person Details</b></p></div>
                        <p> <a class="my-heading-text3"></a>  <i class="fas fa-user"></i> <a class="my-text-font ">{{$cData['company']->person_name}}</a></p>
                        <p> <a class="my-heading-text3">Designation: </a>   <a class="my-text-font">{{$cData['company']->person_designation}}</a></p>
                        <p> <a class="my-heading-text3">Cnic: </a>   <a class="my-text-font">{{$cData['company']->cnic}}</a></p>
                        <p> <a class="my-heading-text3">Email: </a>   <a class="my-text-font">{{$cData['user']->email}}</a></p>
                        <p> <a class="my-heading-text3">Phone No: </a>   <a class="my-text-font">{{$cData['user']->phoneno}}</a></p>
                    </div>



                </div>
                @endif

            {{--<div class="row">--}}
                {{--<div class="col-md-12">--}}
                    {{--<div id="cont">--}}
                       {{--</div>--}}

                {{--</div>--}}
            {{--</div>--}}



        </div>
    </div>


    <style type="text/css">

        #cont{
            position: relative;
            width: 200px;
            height: 300px;
        }
        #map{
            overflow: hidden;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            height: auto;
        }
    </style>

    <script>


        function initMap() {

            var lat=parseFloat({{$cData['company']->company_lat}});
            var lng=parseFloat({{$cData['company']->company_lng}});

            // The location of Uluru
            var uluru = {lat:lat , lng:lng};
            // The map, centered at Uluru
            var map = new google.maps.Map(
                document.getElementById('map'), {zoom: 12, center: uluru});
            // The marker, positioned at Uluru
            var marker = new google.maps.Marker({position: uluru, map: map});
            google.maps.event.trigger(map, "resize");
            window.dispatchEvent(new Event('resize'));



        }

        /////////////


        //////////
    </script>


    <script async defer

            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOK8R6wADSV3IeDtUu5Ht09VWy7VNi1eE&libraries=places&callback=initMap">
    </script>


@endsection