
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: shoaib--}}
 {{--* Date: 12/10/2018--}}
 {{--* Time: 10:22 PM--}}
 {{--*/--}}

@extends('companydashboardnav')

@section('AddVacancy')

    <div class="container-fluid ">
        <div class="container shadow-sms  bg-white  mb-3">

            <form class="" method="post" action="{{url('company/AddVacancy')}}">
                <div class="row mt-5">
                    <div class="col-md-6 my-heading-text2 mt-2">
                        Vacancy Details

                    </div>
                    <div class="col-sm-4 mt-2">
                        <div class="text-right ">
                            Asterisk (<span class="text-danger">*</span>) indicates required field
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row ">
                    <div class="col-md-8">

                            <div class="form-group">
                                <label for="title">Title<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="vacancytitle" id="vacancytitle"  aria-describedby="vacancytitlehelp" placeholder="Job Title">
                            </div>

                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="title">Job/Internship<span class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2 square" name="type" id="type">

                                <option value="Job">Job</option>
                                <option value="Internship">Internship</option>

                            </select>
                        </div>

                    </div>
                </div>


                <div class="row ">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="description">Description<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="vacancydescription" id="vacancydescription" required aria-describedby="vacancydescriptionhelp" placeholder="description">
                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="Pos">no of Positions<span class="text-danger">*</span></label>
                            <input type="Pos" class="form-control" name="vacancyPos" id="vacancyPos" required aria-describedby="vacancyPoshelp" placeholder="no of Positions">

                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form-group">

                            <label for="Industry">Industry<span class="text-danger">*</span></label>

                            <select class="custom-select mr-sm-2 square" id="inlineFormCustomSelect" name="vacancyindustry" id="vacancyindustry" required aria-describedby="vacancyindustryhelp">
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

                    </div>
                </div>




                <div class="row ">
                    <div class="col-md-3">

                        <div class="form-group">
                            <label for="city">Job City<span class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2 square" name="vacancycity" id="vacancycity">

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

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="type">Job type<span class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2 square" name="vacancytype" id="vacancytype">

                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                                <option value="Contract">Contract</option>
                                <option value="Freelance">Freelance</option>

                            </select>
                        </div>

                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="type">Job Shift<span class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2 square" name="vacancyshift" id="vacancyshift">

                                <option value="Morning">Morning</option>
                                <option value="Night">Night</option>
                                <option value="Afternoon">Afternoon</option>
                                <option value="All">All</option>

                            </select>


                        </div>

                    </div>
                </div>

                <hr class="mt-md-5 mb-md-5">


                <div class="row mt">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="city">Degree Level<span class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2 square" name="vacancydegreelevel" id="vacancydegreelevel">

                                <option value="0" disabled>Select Degree Level</option> <option value="Not Required">Not Required</option> <option value="PHD - Doctorate">PHD - Doctorate</option> <option value="MS-M.Phil">MS-M.Phil</option> <option value="M.SC-MBA-BS">M.SC-MBA-BS</option> <option value="BSC-BA">BSC-BA</option> <option value="FA-FSC">FA-FSC</option> <option value="High School">High School</option> <option value="B.CS - B.IT">B.CS - B.IT</option> <option value="Intermediate A-Level">Intermediate A-Level</option> <option value="ACA - ACCA - CA - ACMA">ACA - ACCA - CA - ACMA</option> <option value="MBBS">MBBS</option> <option value="B.Com">B.Com</option> <option value="Diploma">Diploma </option> <option value="Short Courses">Short Courses</option> <option value="B.E - B.Tech">B.E - B.Tech</option> <option value="BBA - MBA">BBA - MBA</option> <option value="M.CS - MBA Marketing">M.CS - MBA Marketing</option> <option value="Pharm-D">Pharm-D</option> <option value="LLB - LLM">LLB - LLM</option> <option value="DAE">DAE</option> <option value="Bachelors">Bachelors</option> <option value="Masters">Masters</option> <option value="DVM">DVM</option> <option value="BS Electrical">BS Electrical</option> <option value="B.E Mechanical">B.E Mechanical</option> <option value="B.E-B.Sc">B.E-B.Sc</option> <option value="FCPS">FCPS</option> <option value="M.Com">M.Com</option> <option value="MBA">MBA</option> <option value="BBA">BBA</option> <option value="Civil Engineering">Civil Engineering</option> <option value="Primary">Primary</option> <option value="Middle">Middle</option> <option value="LLB">LLB</option> <option value="LLM">LLM</option> <option value="CA">CA</option> <option value="Mphil">Mphil</option> <option value="Matric"> Matric</option> <option value="MS">MS</option> <option value="Master">Master</option> <option value="MA">MA</option> <option value="BiT">BiT</option> <option value="BCS">BCS</option> <option value="DAE">DAE</option> <option value="Bachelor">Bachelor</option> <option value="MBBS">MBBS</option> <option value="B.ed">B.ed</option> <option value="M.ed">M.ed</option> <option value="Intermediate">Intermediate</option> <option value="ACCA">ACCA</option> <option value="B.Sc">B.Sc</option> <option value="BA">BA</option> <option value="Diploma">Diploma</option> <option value="P.G Diploma">P.G Diploma</option> <option value="ITI">ITI</option> <option value="BBA">BBA</option> <option value="MCA">MCA</option> <option value="MBA">MBA</option> <option value="B.Tech">B.Tech</option> <option value="MSc">MSc</option> <option value=">M.Tech">M.Tech</option> <option value="M.Sc - B.Sc">M.Sc - B.Sc</option> </select>


                            </select>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="type">Select Carrier Level<span class="text-danger">*</span></label>


                                <select  name="vacancycarrierlevel" id="vacancycarrierlevel"class="form-control valid" aria-invalid="false"> <option disabled value="none">Select Career Level</option> <option value="Not Required">Not Required</option> <option value="Entry Level">Entry Level</option> <option value="Student (Undergraduate">Student (Undergraduate)</option> <option value="Experienced (Non Manager)">Experienced (Non Manager)</option> <option value="Manager">Manager</option> </select>


                        </div>

                    </div>

                </div>



                <div class="row ">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="city">Skills Required<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="vacancySkills" id="vacancySkills" required aria-describedby="vacancySkillshelp" placeholder="Skills">

                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="type">Salary</label>
                            <input type="text" class="form-control" name="vacancySalary" id="vacancySalary" required aria-describedby="vacancySalaryhelp" placeholder="Salary">


                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="type">Experience</label>
                            <input type="number" class="form-control" name="vacancyExperience" id="vacancyExperience" required aria-describedby="vacancyExperiencehelp" placeholder="no of years">


                        </div>

                    </div>

                </div>




                <div class="row ">
                    <div class="col-md-4">

                        <div class="form-group">
                            <label for="age">Age Range<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="vacancyAge" id="vacancyAge" required aria-describedby="vacancySkillshelp" placeholder="from 18-50">

                        </div>



                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="hours">working hours<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="vacancyworkinghours" id="vacancyworkinghours" required aria-describedby="vacancyhourshelp" placeholder="working hours">

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="lastdate">Last date to Apply<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="vacancylastdate" id="vacancylastdate" required aria-describedby="vacancyhourshelp">
                        </div>
                    </div>

                </div>

                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="my-heading-text">
                            <p>Please Choose your Custom HR Policies</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <select class="form-control" name="choose_hr">
                            <option selected disabled>Select your Custom HR policy</option>
                            @foreach($customHR as $hr)
                                <option value="{{ $hr->id }}">{{ $hr->procedure }}</option>
                            @endforeach;
                        </select>
                    </div>
                </div>

                <div class="vacancy-button mt-4 mb-md-5">

                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="form-group">
                            <button type="submit" class="btn my-btn2">Post Vacancy</button>
                        </div>
                    </div>
                </div>

                </div>

                {{csrf_field()}}
            </form>

        </div>
    </div>




    @endsection