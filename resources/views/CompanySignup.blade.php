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

                            <input type="text" required class="form-control curve-border" name="name"  value="{{ old('name') }}" placeholder="Company Name">
                            @if ($errors->has('name'))
                                <span class="invalid-feedback-custom" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">

                            <input type="text" required class="form-control curve-border" name="phone"  value="{{ old('phone') }}" placeholder="Phone">
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback-custom" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">

                            <input type="email" required class="form-control curve-border" name="email" value="{{ old('email') }}" placeholder="Email">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback-custom" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">

                            <input type="number" required class="form-control curve-border"  value="{{ old('cnic') }}" name="cnic" placeholder="CNIC">
                            @if ($errors->has('cnic'))
                                <span class="invalid-feedback-custom" role="alert">
                                        <strong>{{ $errors->first('cnic') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">

                            <input type="password" required class="form-control curve-border"  value="{{ old('password') }}" name="password"  placeholder="Password">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback-custom" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">

                            <input type="password" required class="form-control curve-border"   name="password_confirmation" placeholder="Confirm Password">

                        </div>
                    </div>

                </div>

                {{-----column 2-----}}
                <div class=" col-md-6  bg-light">
                    <div  class="mt-5 ">
                        <div class="form-group">

                            <input type="text" required class="form-control curve-border"  value="{{ old('company_type') }}" name="company_type" placeholder="Company Type">
                            @if ($errors->has('company_type'))
                                <span class="invalid-feedback-custom" role="alert">
                                        <strong>{{ $errors->first('company_type') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">

                            <input type="text" required class="form-control curve-border"  value="{{ old('address') }}" id="search-id" name="address" placeholder="Address">
                            @if ($errors->has('address'))
                                <span class="invalid-feedback-custom" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">

                            <input type="text" required class="form-control curve-border"  value="{{ old('city') }}" name="city" placeholder="City">
                            @if ($errors->has('city'))
                                <span class="invalid-feedback-custom" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">

                            <input type="text" required class="form-control curve-border"  value="{{ old('industry') }}" name="industry" placeholder="Industry">
                            @if ($errors->has('industry'))
                                <span class="invalid-feedback-custom" role="alert">
                                        <strong>{{ $errors->first('industry') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">

                            <input type="text" required class="form-control curve-border"  value="{{ old('link') }}" name="link" placeholder="website link">
                            @if ($errors->has('link'))
                                <span class="invalid-feedback-custom" role="alert">
                                        <strong>{{ $errors->first('link') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">

                            <input type="text" required class="form-control curve-border"  value="{{ old('username') }}" name="username" placeholder="Contact person name">
                            @if ($errors->has('username'))
                                <span class="invalid-feedback-custom" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">

                            <input type="text" required class="form-control curve-border"  value="{{ old('designation') }}" name="designation" placeholder="Contact person Designation">
                            @if ($errors->has('designation'))
                                <span class="invalid-feedback-custom" role="alert">
                                        <strong>{{ $errors->first('designation') }}</strong>
                                    </span>
                            @endif
                        </div>

                    </div>
                </div>
                <div class="col-md-12 bg-light">
                    <div class="form-group text-center ">
                        <input type="hidden" name="company_lat" id="company_lat" />
                        <input type="hidden"  name="company_lng" id="company_lng" />
                        <button type="submit" class="btn btn-success my-btn2 btn-md"  id="Cbtn" >Signup</button>
                    </div>
                </div>
            </div>
                {{csrf_field()}}
            </form>

            <div id="map" ></div>




            <script>


                //map work
                var map, infoWindow;
                function init () {

                    var input = document.getElementById('search-id');
                    var autocomplete = new google.maps.places.Autocomplete(input);
                        map = new google.maps.Map(document.getElementById('map'), {
                            center: {lat: -34.397, lng: 150.644},
                            zoom: 12

                        });
                      //  infoWindow = new google.maps.InfoWindow;


                        // Try HTML5 geolocation.
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(function(position) {
                                var pos = {
                                    lat: position.coords.latitude,
                                    lng: position.coords.longitude
                                };
                                var marker = new google.maps.Marker({
                                    // The below line is equivalent to writing:
                                    // position: new google.maps.LatLng(-34.397, 150.644)
                                    position: pos,
                                    map: map
                                });

                                var infowindow = new google.maps.InfoWindow({
                                    content: '<p>Marker Location:' + marker.getPosition() + '</p>'
                                });
                                google.maps.event.addListener(marker, 'click', function() {
                                    infowindow.open(map, marker);
                                });

                                // infoWindow.setPosition(pos);
                                // infoWindow.setContent('Location found.');
                                // infoWindow.open(map);

                                map.setCenter(pos);

                                $('#company_lat').val(pos.lat);
                                $('#company_lng').val(pos.lng);

                            }, function() {
                                handleLocationError(true, infoWindow, map.getCenter());
                            });
                        } else {
                            // Browser doesn't support Geolocation
                            handleLocationError(false, infoWindow, map.getCenter());
                        }
                    }

                    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                        infoWindow.setPosition(pos);
                        infoWindow.setContent(browserHasGeolocation ?
                            'Error: The Geolocation service failed.' :
                            'Error: Your browser doesn\'t support geolocation.');
                        infoWindow.open(map);


                }

                /////////////

                // function activatePlaceSearch() {
                //
                //
                //
                // }


                //////////
            </script>


            <script async defer

                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOK8R6wADSV3IeDtUu5Ht09VWy7VNi1eE&libraries=places&callback=init">
            </script>

        </div>
    </div>



















@endsection