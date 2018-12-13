
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: shoaib--}}
 {{--* Date: 12/10/2018--}}
 {{--* Time: 8:44 PM--}}
 {{--*/--}}

@extends('companydashboardnav')


@section('company-profile')

    <div class="container-fluid mt-5 ">

        <div class="container shadow-sms p-3 mb-5 bg-white rounded " id="container-personal">


            <div class="d-flex">
                <div class="w-75">
                    <div class="d-flex">
                        <div class="w-15">
                            <div class="jbs-logo-container">
                                <div class="jbs-logo">
                                    <img  src="{{asset('images/logo.png')}}" class="img-rounded profile-image-set" alt="Cinque Terre">
                                </div>

                                <div class="jbs-edit">
                                    <i class="fa fa-edit"></i>
                                </div>
                            </div>
                        </div>


                        <div class="w-85">
                            <div class="row jbs-username">
                                <div class="col-md-12">
                                    <b class="justify-content-center">Username</b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-25">
                    <div class="jbs-add-icon">
                        <a href="#" class="jbs-edit-btn" data-containerid="jbs-edit-personal-container"><i class="fa fa-edit"></i> </a>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-sm-3">
                    <p><i class="fa fa-user"></i>  <span id="personal-gender"> Male</span></p>
                    <p><i class="fa fa-envelope" aria-hidden="true"></i>  <span id="personal-dob"> Email</span></p>
                    <p><i class="fa fa-phone"></i>  <span id="personal-phone"> 090078601</span></p>
                    <p><i class="fa fa-building-o" aria-hidden="true"></i> City</p>


                </div>

                <div class="col-sm-3">
                    <p><i class="fa fa-id-card"></i> <span id="personal-age"> 3520220215151</span></p>
                    <p><i class="fa fa-link"></i> Website</p>
                    <p><i class="fa fa-skype"></i> Skype</p>
                    <p><i class="fa fa-address-card" aria-hidden="true"></i> Address</p>

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
                        <h3>Personal Details</h3>
                    </div>
                    <div class="jbs-close-container">
                        <i class="fa fa-close jbs-close"></i>
                    </div>
                </div>
                <form action="#" method="post" id="jbs-personal-form" data-submission="container-personal">
                    <div class="jbs-content">
                        <div class="container-fluid">


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="age">Age</label>
                                        <input type="text" class="form-control" id="age" required aria-describedby="agehelp" placeholder="Age">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="age">Phone</label>
                                        <input type="tel" class="form-control" id="phone" required aria-describedby="phonehelp" placeholder="Phone">
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                    <div class="jbs-footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="submit" class="form-control jbs-close" value="Save" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--Edit company-personal  ended--}}


@endsection