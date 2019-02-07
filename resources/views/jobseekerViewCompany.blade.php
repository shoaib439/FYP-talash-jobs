
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: shoaib--}}
 {{--* Date: 2/5/2019--}}
 {{--* Time: 4:45 PM--}}
 {{--*/--}}

@extends('main')

@section('jobseekerViewCompany')

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

                    <div class="col-md-2">
                        <div class="container">
                            <p>Responsiveess</p>
                            <div class="progress">
                                <div class="progress-bar "  role="progressbar" aria-valuenow="{{$cData['responsiveness']}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$cData['responsiveness'] }};  background-color: #07b108!important; ">
                                     {{$cData['responsiveness']}} %
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fas fa-chart-bar"></i>
                                Bar Chart </div>
                            <div class="card-body">
                                <canvas id="myBarChart" width="100%" height="50"></canvas>
                            </div>
                            <div class="card-footer small text-muted"><p id="date"></p></div>
                        </div>
                    </div>

                </div>

                <script src="{{url('adminstyles/vendor/chart.js/Chart.min.js')}}"></script>


                <script type="text/javascript">

                    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                    Chart.defaults.global.defaultFontColor = '#292b2c';

                    // Bar Chart Example
                    var ctx = document.getElementById("myBarChart");
                    var myLineChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ["Jobs", "Internship", "Positions"],
                            datasets: [{
                                label: "Total",
                                backgroundColor: "rgba(2,117,216,1)",
                                borderColor: "rgba(2,117,216,1)",
                                data: [{{$cData['job']}}, {{$cData['internship']}}, {{$cData['position']}}],
                            }],
                        },
                        options: {
                            scales: {
                                xAxes: [{
                                    time: {
                                        unit: 'day'
                                    },
                                    gridLines: {
                                        display: false
                                    },
                                    ticks: {
                                        maxTicksLimit: 6
                                    }
                                }],
                                yAxes: [{
                                    ticks: {
                                        min: 0,
                                        max: 500,
                                        maxTicksLimit: 5
                                    },
                                    gridLines: {
                                        display: true
                                    }
                                }],
                            },
                            legend: {
                                display: false
                            }
                        }
                    });

                    document.getElementById("date").innerHTML = Date();
                </script>



                <div class="row">

                    <div class="col-md-8">
                        <div id="map"></div>

                    </div>
                    <div class="col-md-4 border-left">
                        <div ><p><b class="my-heading-text">Contact Person Details</b></p></div>
                        <p> <a class="my-heading-text3"></a>  <i class="fa fa-user"></i> <a class="my-text-font ">{{$cData['company']->person_name}}</a></p>
                        <p> <a class="my-heading-text3">Designation: </a>   <a class="my-text-font">{{$cData['company']->person_designation}}</a></p>
                        <p> <a class="my-heading-text3">Email: </a>   <a class="my-text-font">{{$cData['user']->email}}</a></p>
                        <p> <a class="my-heading-text3">Phone No: </a>   <a class="my-text-font">{{$cData['user']->phoneno}}</a></p>
                    </div>



                </div>
            @endif



        </div>

</div>

    <style type="text/css">

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
            // The location of Uluru
            var uluru = {lat: -25.344, lng: 131.036};
            // The map, centered at Uluru
            var map = new google.maps.Map(
                document.getElementById('map'), {zoom: 4, center: uluru});
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
