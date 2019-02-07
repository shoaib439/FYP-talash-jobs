
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: shoaib--}}
 {{--* Date: 12/10/2018--}}
 {{--* Time: 8:44 PM--}}
 {{--*/--}}

@extends('companydashboardnav')

@section('headmeta')
    <meta name="ajax_csrf_token" content="{{csrf_token()}}">
@endsection



@section('company-profile')

    <div class="container-fluid mt-5 ">

        <div class="container shadow-sms p-3 mb-5 bg-white rounded " id="container-personal">


            <div class="d-flex">
                <div class="w-75">
                    <div class="d-flex">
                        <div class="w-15">
                            <div class="jbs-logo-container">
                                <div class="jbs-logo">
                                    <img class="profile-image-set" src="{{ $profile['image'] }}">
                                </div>

                                <div class="jbs-edit">
                                    <i class="fa fa-camera upload-button"></i>
                                    <form id="dp-change-form" method="POST" enctype="multipart/form-data">
                                        <input class="file-upload" name="dp_file" type="file" />
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>

                        </div>


                        <div class="w-85">
                            <div class="row jbs-username">
                                <div class="col-md-12">
                                    <b class="justify-content-center">{{ $profile['name'] }} </b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-25">
                    <div class="jbs-add-icon">
                        <a href="#" class="company-edit-btn" data-containerid="jbs-edit-personal-container"><i class="fa fa-edit"></i> </a>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-4">
                    <p><i class="fa fa-user"aria-hidden="true"></i>  <span id="company-personal-gender"> {{ Auth::user()->name }} </span></p>
                    <p><i class="fa fa-envelope" aria-hidden="true"></i>  <span id="company-personal-email">{{ Auth::user()->email }}</span></p>
                    <p><i class="fa fa-phone "aria-hidden="true"></i>  <span id="company-personal-phone"> {{ Auth::user()->phoneno }} </span></p>
                    <p><i class="fa fa-building-o" aria-hidden="true"></i><span id="company-personal-city"> {{ Auth::user()->city }}</span></p>


                </div>

                <div class="col-md-8">
                    <p><i class="fa fa-id-card"aria-hidden="true"></i> <span id="company-personal-cnic">{{ $profile['cnic'] }}</span></p>
                    <p><i class="fa fa-link"aria-hidden="true"></i> <span id="company-personal-website">{{ $profile['website'] }}</span></p>
                    <p><i class="fa fa-skype"aria-hidden="true"></i>  <span id="company-personal-skype">{{ $profile['skype'] }}</span></p>
                    <p><i class="fa fa-address-card" aria-hidden="true"></i>  <span id="company-personal-address">{{ $profile['address'] }}</span></p>

                </div>


            </div>

        </div>
    </div>



    {{--Edit company-personal  start--}}


    <div class="jbs-model" id="jbs-edit-personal-container">
        <div class="jbs-model-background jbs-close"></div>
        <div class="jbs-container">
            <div class="jbs-main">
                <div class="jbs-header">
                    <div class="jbs-title">
                        <div class="my-heading-text">Personal Details</div>
                    </div>
                    <div class="jbs-close-container">
                        <i class="fa fa-close jbs-close"></i>
                    </div>
                </div>
                <form action="#" method="post" id="company-personal-form" data-submission="container-personal">
                    <div class="jbs-content">
                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email"   readonly="readonly" class="form-control" id="email"  required aria-describedby="emailhelp" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" id="address" name="address" required aria-describedby="addresshelp" placeholder="address">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control" id="city" name="city" required aria-describedby="cityhelp" placeholder="City">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="website">Website</label>
                                        <input type="url" class="form-control" name="website" id="website" required aria-describedby="websitehelp" placeholder="Website">
                                    </div>
                                </div>


                            </div>



                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="age">Phone</label>
                                        <input type="tel" class="form-control" id="phone" required aria-describedby="phonehelp" name="phone" placeholder="Phone">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cnic">Cnic</label>
                                        <input type="number" class="form-control" name="cnic" id="cnic" required aria-describedby="cnichelp" placeholder="Cnic">
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="skype">Skype</label>
                                        <input type="text" class="form-control" id="skype" name="skype" required aria-describedby="skypehelp" placeholder="Skype">
                                    </div>
                                </div>


                            </div>








                        </div>
                    </div>
                    <div class="jbs-footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group align-class">
                                        <input type="submit" class="form-control jbs-close btn my-btn2" value="Save" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{csrf_field()}}
                </form>
            </div>
        </div>
    </div>

    {{--Edit company-personal  ended--}}


@endsection