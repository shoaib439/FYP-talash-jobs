
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

        @if(Auth::user()->isJobseeker())


                <div class="btn-group dropdown-header">
                <a class="btn btn-secondary-me dropdown-toggle"   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->display_name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{url('jobseekerhome')}}">Profile</a>
                    <a class="dropdown-item"  href="{{url('user/resetpassword')}}">Reset Password</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('logout')}}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log Out</a>

                    <form id="logout-form" action="{{route('logout')}}" method="post" style="display: none"> {{csrf_field()}} </form>


                </div>
                </div>

            @endif

        @if(Auth::user()->isCompany())
            <div class="container-fluid">
                <div class="btn-group dropdown-header">
                    <button type="button" class="btn btn-secondary-me dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->display_name }}
                    </button>
                    <div class="dropdown-menu ">
                        <!-- Dropdown menu links -->
                        <a class="dropdown-item" href="{{url('company/profile')}}">Profile</a>
                        <a class="dropdown-item" href="{{url('user/resetpassword')}}">Reset Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('logout')}}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log Out</a>

                        <form id="logout-form" action="{{route('logout')}}" method="post" style="display: none"> {{csrf_field()}} </form>
                    </div>
                </div>

            </div>
        @endif


        {{--{{ Auth::user()->name }}--}}
        {{--<a href="{{route('logout')}}"--}}
           {{--onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log Out</a>--}}

        {{--<form id="logout-form" action="{{route('logout')}}" method="post" style="display: none"> {{csrf_field()}} </form>--}}

    @endif
@endsection
@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 main-header">
                <img src="{{asset('images/searchbgimage.jpg')}}"  class="header-background" alt="Responsive image">
                <div class="row form-container">



                    <form action="{{url('/search-advanced')}}" method="POST">
                        @csrf

                    <div class="col-md-12">
                        <div class="form-group header-form" >


                                <div class="row">

                                    <div class="col-md-3 p-1">

                                        <input type="text" required class="form-control square" name ="userquery"  id="searchid"  placeholder="SEARCH">

                                    </div>

                                    <div class="col-md-3 p-1">

                                        <select class="custom-select mr-sm-2 square" id="inlineFormCustomSelect" name="industrytype">
                                            <option value="" disabled>Search by Industry</option>
                                            <option value="IT"> IT/Software Development</option>
                                            <option value="Medical">Medical/Health</option>
                                            <option value="Accounting"> Accounting</option>
                                            <option value="Engineering"> Engineering</option>

                                            <option value="Insurance"> Insurance </option>
                                            <option value="Banking/Financial Services ">Banking/Financial Services </option>
                                            <option value="Healthcare / Hospital / Medical Jobs"> Healthcare / Hospital / Medical Jobs</option>
                                            <option value="Real Estate/Property Jobs"> Real Estate/Property Jobs</option>

                                            <option value="Manufacturing "> Manufacturing </option>
                                            <option value="Education/Training ">Education/Training </option>
                                            <option value="Call Center "> Call Center </option>
                                            <option value="Recruitment "> Recruitment </option>

                                            <option value="Consultants Jobs ">Consultants Jobs </option>
                                            <option value="Construction/Cement/Metals Jobs "> Construction/Cement/Metals Jobs </option>
                                            <option value="Advertising  "> Advertising  </option>
                                        </select>

                                    </div>

                                    <div class="col-md-3 p-1">

                                        <select class="custom-select mr-sm-2 square" id="inlineFormCustomSelect" name="vacancytype">
                                            <option  value="" selected>Job/Internship</option>
                                            <option value="job">Job</option>
                                            <option value="internship">Internship</option>

                                        </select>

                                    </div>

                                    <div class="col-md-3 p-1">

                                        <select class="custom-select mr-sm-2 square" id="inlineFormCustomSelect" name="cityname">
                                            <option value="">Select City</option>
                                            <option value="Ahmadpur East">Ahmadpur East</option>
                                            <option value="Ahmadpur Sial">Ahmadpur Sial</option>
                                            <option value="Alipur">Alipur</option>
                                            <option value="Arifwala">Arifwala</option>
                                            <option value="Attock City">Attock City</option>
                                            <option value="Baddomalhi">Baddomalhi</option>
                                            <option value="Bahawalnagar">Bahawalnagar</option>
                                            <option value="Bahawalpur">Bahawalpur</option>
                                            <option value="Basirpur">Basirpur</option>
                                            <option value="Basti Aukharvand">Basti Aukharvand</option>
                                            <option value="Basti Dosa">Basti Dosa</option>
                                            <option value="Basti Machi">Basti Machi</option>
                                            <option value="Basti Qaudhia">Basti Qaudhia</option>
                                            <option value="Begowala">Begowala</option>
                                            <option value="Bhai Pheru">Bhai Pheru</option>
                                            <option value="Bhakkar">Bhakkar</option>
                                            <option value="Bhalwal">Bhalwal</option>
                                            <option value="Bhawana">Bhawana</option>
                                            <option value="Bhera">Bhera</option>
                                            <option value="Bhopalwala">Bhopalwala</option>
                                            <option value="Burewala">Burewala</option>
                                            <option value="Chak Azam Saffo">Chak Azam Saffo</option>
                                            <option value="Chakwal">Chakwal</option>
                                            <option value="Chawinda">Chawinda</option>
                                            <option value="Chichawatni">Chichawatni</option>
                                            <option value="Chiniot">Chiniot</option>
                                            <option value="Chishtian Mandi">Chishtian Mandi</option>
                                            <option value="Choa Saidan Shah">Choa Saidan Shah</option>
                                            <option value="Chunian">Chunian</option>
                                            <option value="Daira Din Panah">Daira Din Panah</option>
                                            <option value="Dajal">Dajal</option>
                                            <option value="Darya Khan">Darya Khan</option>
                                            <option value="Daska">Daska</option>
                                            <option value="Daud Khel">Daud Khel</option>
                                            <option value="Daultala">Daultala</option>
                                            <option value="Dera Ghazi Khan">Dera Ghazi Khan</option>
                                            <option value="Dhanot">Dhanot</option>
                                            <option value="Dhaunkal">Dhaunkal</option>
                                            <option value="Dhok Awan">Dhok Awan</option>
                                            <option value="Dijkot">Dijkot</option>
                                            <option value="Dinga">Dinga</option>
                                            <option value="Dipalpur">Dipalpur</option>
                                            <option value="Dullewala">Dullewala</option>
                                            <option value="Dunyapur">Dunyapur</option>
                                            <option value="Eminabad">Eminabad</option>
                                            <option value="Faisalabad">Faisalabad</option>
                                            <option value="Faqirwali">Faqirwali</option>
                                            <option value="Faruka">Faruka</option>
                                            <option value="Fateh Jang">Fateh Jang</option>
                                            <option value="Fazalpur">Fazalpur</option>
                                            <option value="Fort Abbas">Fort Abbas</option>
                                            <option value="Gojra">Gojra</option>
                                            <option value="Gujar Khan">Gujar Khan</option>
                                            <option value="Gujranwala">Gujranwala</option>
                                            <option value="Gujrat">Gujrat</option>
                                            <option value="Hafizabad">Hafizabad</option>
                                            <option value="Harnoli">Harnoli</option>
                                            <option value="Hasan Abdal">Hasan Abdal</option>
                                            <option value="Hasilpur">Hasilpur</option>
                                            <option value="Haveli">Haveli</option>
                                            <option value="Hazro">Hazro</option>
                                            <option value="Hujra">Hujra</option>
                                            <option value="Jahanian Shah">Jahanian Shah</option>
                                            <option value="Jalalpur">Jalalpur</option>
                                            <option value="Jalalpur Pirwala">Jalalpur Pirwala</option>
                                            <option value="Jampur">Jampur</option>
                                            <option value="Jand">Jand</option>
                                            <option value="Jandiala Sher Khan">Jandiala Sher Khan</option>
                                            <option value="Jaranwala">Jaranwala</option>
                                            <option value="Jatoi Shimali">Jatoi Shimali</option>
                                            <option value="Jauharabad">Jauharabad</option>
                                            <option value="Jhawarian">Jhawarian</option>
                                            <option value="Jhelum">Jhelum</option>
                                            <option value="Kabirwala">Kabirwala</option>
                                            <option value="Kahna">Kahna</option>
                                            <option value="Kahror Pakka">Kahror Pakka</option>
                                            <option value="Kalabagh">Kalabagh</option>
                                            <option value="Kalaswala">Kalaswala</option>
                                            <option value="Kallar Kahar">Kallar Kahar</option>
                                            <option value="Kallur Kot">Kallur Kot</option>
                                            <option value="Kamalia">Kamalia</option>
                                            <option value="Kamoke">Kamoke</option>
                                            <option value="Kanganpur">Kanganpur</option>
                                            <option value="Kasur">Kasur</option>
                                            <option value="Khairpur">Khairpur</option>
                                            <option value="Khangah Dogran">Khangah Dogran</option>
                                            <option value="Khangarh">Khangarh</option>
                                            <option value="Khanpur">Khanpur</option>
                                            <option value="Kharian">Kharian</option>
                                            <option value="Khewra">Khewra</option>
                                            <option value="Khushab">Khushab</option>
                                            <option value="Kot Addu">Kot Addu</option>
                                            <option value="Kot Ghulam Muhammad">Kot Ghulam Muhammad</option>
                                            <option value="Kot Momin">Kot Momin</option>
                                            <option value="Kot Radha Kishan">Kot Radha Kishan</option>
                                            <option value="Kunjah">Kunjah</option>
                                            <option value="Lahore">Lahore</option>
                                            <option value="Lala Musa">Lala Musa</option>
                                            <option value="Lalian">Lalian</option>
                                            <option value="Leiah">Leiah</option>
                                            <option value="Liliani">Liliani</option>
                                            <option value="Lodhran">Lodhran</option>
                                            <option value="Malakwal City">Malakwal City</option>
                                            <option value="Mananwala">Mananwala</option>
                                            <option value="Mandi Bahauddin">Mandi Bahauddin</option>
                                            <option value="Mangla">Mangla</option>
                                            <option value="Mankera">Mankera</option>
                                            <option value="Mian Channun">Mian Channun</option>
                                            <option value="Mianwali">Mianwali</option>
                                            <option value="Minchinabad">Minchinabad</option>
                                            <option value="Multan">Multan</option>
                                            <option value="Muridke">Muridke</option>
                                            <option value="Murree">Murree</option>
                                            <option value="Mustafabad">Mustafabad</option>
                                            <option value="Muzaffargarh">Muzaffargarh</option>
                                            <option value="Nankana Sahib">Nankana Sahib</option>
                                            <option value="Narang">Narang</option>
                                            <option value="Narowal">Narowal</option>
                                            <option value="Naushahra">Naushahra</option>
                                            <option value="Okara">Okara</option>
                                            <option value="Pakpattan">Pakpattan</option>
                                            <option value="Pasrur">Pasrur</option>
                                            <option value="Pattoki">Pattoki</option>
                                            <option value="Phool Nagar">Phool Nagar </option>
                                            <option value="Pind Dadan Khan">Pind Dadan Khan</option>
                                            <option value="Pindi Bhattian">Pindi Bhattian</option>
                                            <option value="Pir Mahal">Pir Mahal</option>
                                            <option value="Rabwah">Rabwah</option>
                                            <option value="Rahim Yar Khan">Rahim Yar Khan</option>
                                            <option value="Raiwind">Raiwind</option>
                                            <option value="Raja Jang">Raja Jang</option>
                                            <option value="Rajanpur">Rajanpur</option>
                                            <option value="Rasulnagar">Rasulnagar</option>
                                            <option value="Rawalpindi">Rawalpindi</option>
                                            <option value="Renala Khurd">Renala Khurd</option>
                                            <option value="Sadiqabad">Sadiqabad</option>
                                            <option value="Sahiwal">Sahiwal</option>
                                            <option value="Sambrial">Sambrial</option>
                                            <option value="Sangla Hill">Sangla Hill</option>
                                            <option value="Sarai Alamgir">Sarai Alamgir</option>
                                            <option value="Sargodha">Sargodha</option>
                                            <option value="Shahkot">Shahkot</option>
                                            <option value="Shahpur">Shahpur</option>
                                            <option value="Shakargarr">Shakargarr</option>
                                            <option value="Sharqpur">Sharqpur</option>
                                            <option value="Sheikhupura">Sheikhupura</option>
                                            <option value="Shujaabad">Shujaabad</option>
                                            <option value="Sialkot">Sialkot</option>
                                            <option value="Surkhpur">Surkhpur</option>
                                            <option value="Talagang">Talagang</option>
                                            <option value="Tandlianwala">Tandlianwala</option>
                                            <option value="Taunsa">Taunsa</option>
                                            <option value="Taxila">Taxila</option>
                                            <option value="Toba Tek Singh">Toba Tek Singh</option>
                                            <option value="Vihari">Vihari</option>
                                            <option value="Wah Cantt">Wah Cantt</option>
                                            <option value="Wazirabad">Wazirabad</option>
                                            <option value="Yazman">Yazman</option>
                                            <option value="Zafarwal">Zafarwal</option>
                                            <option value="Zahir Pir">Zahir Pir</option>
                                        </select>

                                    </div>

                                </div>



                        </div>
                    </div>




                    <div class="col-md-12 submit-btn-container">
                        <div class="row w-100 flex-center">
                            <div class="col-md-3">
                                <button type="submit" class="btn header-form-btn">Search</button>
                            </div>
                        </div>
                    </div>
                    </form>
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

                    @foreach($jobslist as $job)
                        <div class="col-md-4 ">
                            <div class="block-interview">
                                <div class="interview-logo">
                                    <img src="{{asset($job['user']->profile_pic)}}" />
                                </div>
                                <div class="interview-description">
                                    <a href="{{ url('/view/vacancy/'.$job['vacancy']->id)  }}"><h4>{{$job['vacancy']->title}}</h4></a>
                                    <p>{{$job['company']->company_name}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

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

        <div class="row  " >

         <div class="col-md-12 section-download-app" style="background-image: url('{{asset('images/ccc.jpg')}}');">
            <div class="d-flex flex-center" >

                <a href="#" class="download-app" target="_blank"> <img src="{{asset('images/downloadapp.jpg')}}"alt="TalashJobs"> </a>
            </div>



         </div>


        </div>

    </section>


    {{--android app section ended--}}






@endsection