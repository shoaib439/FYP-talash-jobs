
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

            <form class="" method="post" action="#">
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
                                        <input type="text" class="form-control " id="vacancytitle" required aria-describedby="vacancytitlehelp" placeholder="Job Title">
                            </div>

                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="title">Job/Internship<span class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2 square" id="inlineFormCustomSelect">

                                <option value="1">Job</option>
                                <option value="2">Internship</option>

                            </select>
                        </div>

                    </div>
                </div>


                <div class="row ">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="description">Description<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="vacancydescription" required aria-describedby="vacancydescriptionhelp" placeholder="description">
                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="Pos">no of Positions<span class="text-danger">*</span></label>
                            <input type="Pos" class="form-control" id="vacancyPos" required aria-describedby="vacancyPoshelp" placeholder="no of Positions">

                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form-group">

                            <label for="Industry">Industry<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="vacancyindustry" required aria-describedby="vacancyindustryhelp" placeholder="IT/technology">

                        </div>

                    </div>
                </div>




                <div class="row ">
                    <div class="col-md-3">

                        <div class="form-group">
                            <label for="city">Job location<span class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2 square" id="inlineFormCustomSelect">

                                <option value="">Select City</option><option value="287">Ahmadpur East</option><option value="293">Ahmadpur Sial</option><option value="286">Alipur</option><option value="285">Arifwala</option><option value="284">Attock City</option><option value="283">Baddomalhi</option><option value="282">Bahawalnagar</option><option value="288">Bahawalnagar</option><option value="281">Bahawalpur</option><option value="280">Bakhri Ahmad Khan</option><option value="279">Basirpur</option><option value="289">Basti Aukharvand</option><option value="295">Basti Dosa</option><option value="296">Basti Machi</option><option value="292">Basti Qaudhia</option><option value="278">Begowala</option><option value="277">Bhai Pheru</option><option value="276">Bhakkar</option><option value="275">Bhalwal</option><option value="274">Bhawana</option><option value="273">Bhera</option><option value="272">Bhopalwala</option><option value="271">Burewala</option><option value="270">Chak Azam Saffo</option><option value="269">Chakwal</option><option value="268">Chawinda</option><option value="267">Chichawatni</option><option value="266">Chiniot</option><option value="265">Chishtian Mandi</option><option value="264">Choa Saidan Shah</option><option value="263">Chuhar Kana</option><option value="262">Chunian</option><option value="261">Daira Din Panah</option><option value="260">Dajal</option><option value="259">Darya Khan</option><option value="258">Daska</option><option value="257">Daud Khel</option><option value="256">Daultala</option><option value="255">Dera Ghazi Khan</option><option value="254">Dhanot</option><option value="253">Dhaunkal</option><option value="298">Dhok Awan</option><option value="252">Dijkot</option><option value="251">Dinga</option><option value="250">Dipalpur</option><option value="249">Dullewala</option><option value="248">Dunga Bunga</option><option value="247">Dunyapur</option><option value="246">Eminabad</option><option value="245">Faisalabad</option><option value="244">Faqirwali</option><option value="243">Faruka</option><option value="188025">Fateh Jang</option><option value="241">Fazalpur</option><option value="240">Fort Abbas</option><option value="239">Garh Maharaja</option><option value="238">Gojra</option><option value="237">Gujar Khan</option><option value="236">Gujranwala</option><option value="235">Gujrat</option><option value="234">Hadali</option><option value="233">Hafizabad</option><option value="232">Harnoli</option><option value="231">Haru Zbad</option><option value="230">Hasan Abdal</option><option value="229">Hasilpur</option><option value="228">Haveli</option><option value="227">Hazro</option><option value="226">Hujra</option><option value="225">Jahanian Shah</option><option value="224">Jalalpur</option><option value="223">Jalalpur Pirwala</option><option value="222">Jampur</option><option value="221">Jand</option><option value="220">Jandiala Sher Khan</option><option value="219">Jaranwala</option><option value="218">Jatoi Shimali</option><option value="217">Jauharabad</option><option value="216">Jhang Sadar</option><option value="215">Jhawarian</option><option value="214">Jhelum</option><option value="213">Jhumra</option><option value="212">Kabirwala</option><option value="211">Kahna</option><option value="210">Kahror Pakka</option><option value="209">Kahuta</option><option value="208">Kalabagh</option><option value="207">Kalaswala</option><option value="206">Kaleke Mandi</option><option value="205">Kallar Kahar</option><option value="204">Kallur Kot</option><option value="203">Kamalia</option><option value="202">Kamar Mushani</option><option value="201">Kamir</option><option value="200">Kamoke</option><option value="188003">Kamokey</option><option value="199">Kamra</option><option value="198">Kanganpur</option><option value="197">Karor</option><option value="196">Kasur</option><option value="195">Khairpur</option><option value="194">Khangah Dogran</option><option value="193">Khangarh</option><option value="192">Khanpur</option><option value="191">Kharian</option><option value="190">Khewra</option><option value="189">Khurrianwala</option><option value="188">Khushab</option><option value="187">Kot Addu</option><option value="186">Kot Ghulam Muhammad</option><option value="184">Kot Momin</option><option value="183">Kot Radha Kishan</option><option value="182">Kot Samaba</option><option value="181">Kot Sultan</option><option value="185">Kotli Loharan</option><option value="180">Kundian</option><option value="179">Kunjah</option><option value="178">Ladhewala Waraich</option><option value="177">Lahore</option><option value="176">Lala Musa</option><option value="175">Lalian</option><option value="174">Lawa</option><option value="173">Leiah</option><option value="172">Liliani</option><option value="171">Lodhran</option><option value="170">Mailsi</option><option value="169">Malakwal</option><option value="294">Malakwal City</option><option value="168">Mamu Kanjan</option><option value="167">Mananwala</option><option value="166">Mandi Bahauddin</option><option value="165">Mangla</option><option value="164">Mankera</option><option value="163">Mian Channun</option><option value="162">Mianwali</option><option value="161">Minchinabad</option><option value="160">Mitha Tiwana</option><option value="297">Moza Shahwala</option><option value="159">Multan</option><option value="158">Muridke</option><option value="157">Murree</option><option value="156">Mustafabad</option><option value="155">Muzaffargarh</option><option value="154">Nankana Sahib</option><option value="153">Narang</option><option value="152">Narowal</option><option value="151">Naushahra Virkan</option><option value="299">Nazir Town</option><option value="150">Okara</option><option value="291">Pakki Shagwanwali</option><option value="149">Pakpattan</option><option value="148">Pasrur</option><option value="147">Pattoki</option><option value="146">Phalia</option><option value="188019">Phool Nagar </option><option value="188022">Phoolnagar</option><option value="145">Pind Dadan Khan</option><option value="144">Pindi Bhattian</option><option value="143">Pindi Gheb</option><option value="142">Pir Mahal</option><option value="141">Qadirpur Ran</option><option value="140">Rabwah</option><option value="188006">Rahim Yar Khan</option><option value="139">Raiwind</option><option value="138">Raja Jang</option><option value="137">Rajanpur</option><option value="136">Rasulnagar</option><option value="135">Rawalpindi</option><option value="134">Renala Khurd</option><option value="133">Rojhan</option><option value="132">Sadiqabad</option><option value="130">Sahiwal</option><option value="131">Sahiwal</option><option value="129">Sambrial</option><option value="128">Sangla Hill</option><option value="127">Sanjwal</option><option value="126">Sarai Alamgir</option><option value="125">Sarai Sidhu</option><option value="124">Sargodha</option><option value="123">Shahkot</option><option value="122">Shahpur</option><option value="121">Shahr Sultan</option><option value="120">Shakargarr</option><option value="119">Sharqpur</option><option value="118">Sheikhupura</option><option value="117">Shujaabad</option><option value="116">Sialkot</option><option value="115">Sillanwali</option><option value="114">Sodhra</option><option value="113">Sukheke Mandi</option><option value="112">Surkhpur</option><option value="111">Talagang</option><option value="110">Talamba</option><option value="109">Tandlianwala</option><option value="290">Taragar wala</option><option value="108">Taunsa</option><option value="187996">Taxila</option><option value="107">Toba Tek Singh</option><option value="106">Vihari</option><option value="188005">Wah Cantt</option><option value="105">Warburton</option><option value="104">Wazirabad</option><option value="103">Yazman</option><option value="102">Zafarwal</option><option value="101">Zahir Pir</option></select>



                            </select>
                        </div>

                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="type">Job type<span class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2 square" id="inlineFormCustomSelect">

                                <option value="1">Full Time</option>
                                <option value="2">Part Time</option>
                                <option value="1">Contract</option>
                                <option value="2">Freelance</option>

                            </select>
                        </div>

                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="type">Job Shift<span class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2 square" id="inlineFormCustomSelect">

                                <option value="1">Morning</option>
                                <option value="2">Night</option>
                                <option value="1">Afternoon</option>
                                <option value="2">All</option>

                            </select>


                        </div>

                    </div>
                </div>

                <hr class="mt-md-5 mb-md-5">


                <div class="row mt">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="city">Degree Level<span class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2 square" id="inlineFormCustomSelect">

                                <option value="0">Select Degree Level</option> <option value="1">Not Required</option> <option value="2">PHD - Doctorate</option> <option value="3">MS-M.Phil</option> <option value="5">M.SC-MBA-BS</option> <option value="6">BSC-BA</option> <option value="7">FA-FSC</option> <option value="8">High School</option> <option value="9">B.CS - B.IT</option> <option value="10">Intermediate A-Level</option> <option value="11">ACA - ACCA - CA - ACMA</option> <option value="12">MBBS</option> <option value="13">B.Com</option> <option value="14">Diploma </option> <option value="15">Short Courses</option> <option value="16">B.E - B.Tech</option> <option value="17">BBA - MBA</option> <option value="18">M.CS - MBA Marketing</option> <option value="19">Pharm-D</option> <option value="20">LLB - LLM</option> <option value="21">DAE</option> <option value="22">Bachelors</option> <option value="23">Masters</option> <option value="24">DVM</option> <option value="25">BS Electrical</option> <option value="26">B.E Mechanical</option> <option value="27">B.E-B.Sc</option> <option value="28">FCPS</option> <option value="29">M.Com</option> <option value="30">MBA</option> <option value="31">BBA</option> <option value="32">Civil Engineering</option> <option value="33">Primary</option> <option value="34">Middle</option> <option value="35">LLB</option> <option value="36">LLM</option> <option value="37">CA</option> <option value="38">Mphil</option> <option value="39"> Matric</option> <option value="40">MS</option> <option value="43">Master</option> <option value="44">MA</option> <option value="45">BiT</option> <option value="46">BCS</option> <option value="47">DAE</option> <option value="48">Bachelor</option> <option value="49">MBBS</option> <option value="50">B.ed</option> <option value="51">M.ed</option> <option value="52">Intermediate</option> <option value="53">ACCA</option> <option value="54">B.Sc</option> <option value="55">BA</option> <option value="56">Diploma</option> <option value="57">P.G Diploma</option> <option value="58">ITI</option> <option value="59">BBA</option> <option value="60">MCA</option> <option value="61">MBA</option> <option value="63">B.Tech</option> <option value="64">MSc</option> <option value="65">M.Tech</option> <option value="66">M.Sc - B.Sc</option> </select>


                            </select>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="type">Select Carrier Level<span class="text-danger">*</span></label>


                                <select name="career" class="form-control valid" aria-invalid="false"> <option value="none">Select Career Level</option> <option value="0">Not Required</option> <option value="1">Entry Level</option> <option value="2">Student (Undergraduate)</option> <option value="3">Experienced (Non Manager)</option> <option value="4">Manager</option> </select>


                        </div>

                    </div>

                </div>



                <div class="row ">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="city">Skills Required<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="vacancySkills" required aria-describedby="vacancySkillshelp" placeholder="Skills">

                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="type">Salary</label>
                            <input type="text" class="form-control" id="vacancySalary" required aria-describedby="vacancySalaryhelp" placeholder="Salary">


                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="type">Experience</label>
                            <input type="number" class="form-control" id="vacancyExperience" required aria-describedby="vacancyExperiencehelp" placeholder="no of years">


                        </div>

                    </div>

                </div>




                <div class="row ">
                    <div class="col-md-4">

                        <div class="form-group">
                            <label for="age">Age Range<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="vacancyAge" required aria-describedby="vacancySkillshelp" placeholder="from 18-50">

                        </div>



                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="hours">working hours<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="vacancyAge" required aria-describedby="vacancyhourshelp" placeholder="working hours">

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="lastdate">Last date to Apply<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="vacancylastdate" required aria-describedby="vacancyhourshelp">
                        </div>
                    </div>

                </div>

                <div class="vacancy-button mt-4 mb-4">

                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="form-group">
                            <button type="submit" class="btn my-btn2">Post Vacancy</button>
                        </div>
                    </div>
                </div>

                </div>
            </form>

        </div>
    </div>




    @endsection