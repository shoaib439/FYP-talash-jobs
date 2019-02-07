var $ = jQuery;

$(document).ready(function(){

    $('.jbs-model .jbs-close').click(function(){
        $('.jbs-model').fadeOut();
    });

    $('.check-status-btn').click(function (e) {

        var container = $(this).data('container');

        $('#'+container).fadeIn();

    });


    $('.call-for-interview-btn').click(function () {

        var container = $(this).data('container');

        $('#'+container).fadeIn();

    });




    $('#nav-search-filters-btn').click(function (e) {
        e.preventDefault();

        if($('#nav-search-filters').hasClass('nav-search-filters-open')){
            $('#nav-search-filters').fadeOut(); //.removeClass('nav-search-filters-open');
        }
        else{
            $('#nav-search-filters').fadeIn(); //.addClass('nav-search-filters-open');
        }

    });

    ///////////////////////////////
    //company profile edit section start

    // ye edit icon click krnay pe run hoga

    $('.company-edit-btn').click(function (e) {
        e.preventDefault();

        var btn = $(this);
        var containerid = btn.data('containerid');


        var container = $('#'+containerid);
        container.fadeIn();

        var form = container.find('form');
        if(!form.length){
            return;
        }

        var openercontainer = $('#'+form.data('submission'));
      //  var gender = openercontainer.find('#company-personal-gender');
        var phone = openercontainer.find('#company-personal-phone');
        var city = openercontainer.find('#company-personal-city');
        var email = openercontainer.find('#company-personal-email');
        var cnic = openercontainer.find('#company-personal-cnic');
        var website = openercontainer.find('#company-personal-website');
        var skype = openercontainer.find('#company-personal-skype');
        var address = openercontainer.find('#company-personal-address');

       // container.find('#gender').val(gender.text());
        container.find('#phone').val(phone.text());

        container.find('#city').val(city.text());
        container.find('#email').val(email.text());

        container.find('#website').val(website.text());
        container.find('#cnic').val(cnic.text());

        container.find('#skype').val(skype.text());
        container.find('#address').val(address.text());
    });

    //till open . open ho gya edit/ update k liye

    //nechay wala code se update hoga

    $('#company-personal-form').submit(function (e) {
        e.preventDefault();

        var form = $(this);
        var gender = $('#gender',form);
        var phone = $('#phone',form);
        var city = $('#city',form);
       // var email = $('#email',form);
        var website = $('#website',form);
        var cnic = $('#cnic',form);
        var skype = $('#skype',form);
        var address = $('#address',form);

        $.ajax({
            type:'POST',
            url:  window.location.origin+'/ajax-upload-personal',
            data: new FormData(this),
            dataType:'JSON',
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                console.log("success");
                console.log(data);
            },
            error: function(data){
                console.log("error");
                console.log(data.responseText);
            }
        });


        // $.post( window.location.origin+"/ajax-upload-personal",
        //     {
        //         gendersent: gender.val(),
        //         time: "2pm",
        //         csrf_token: $('#ajax_csrf_token').val()
        //     },
        //     function(response){
        //
        //     }
        // );


        var submission = $('#'+form.data('submission'));

       // var genderhtml = $('#company-personal-gender',submission);
        var phonehtml = $('#company-personal-phone',submission);
        var cityhtml = $('#company-personal-city',submission);
       // var emailhtml = $('#company-personal-email',submission);
        var websitehtml = $('#company-personal-website',submission);
        var cnichtml = $('#company-personal-cnic',submission);
        var skypehtml = $('#company-personal-skype',submission);
        var addresshtml = $('#company-personal-address',submission);




       // genderhtml.html(gender.val()); //ye gender ki value ko update kr ra html main
        phonehtml.html(phone.val()); //ye phone ki value ko update kr ra html main

        cityhtml.html(city.val());
        //emailhtml.html(email.val());
        websitehtml.html(website.val());
        cnichtml.html(cnic.val());
        skypehtml.html(skype.val());
        addresshtml.html(address.val());


    });


    //to form submit

    /////////////////////////////////



    ////bio start
    $('.jbs-edit-bio-btn').click(function (e) {
        e.preventDefault();

        var btn = $(this);
        var containerid = btn.data('containerid');


        var container = $('#'+containerid);
        container.fadeIn();

        var form = container.find('form');
        if(!form.length){
            return;
        }

        var openercontainer = $('#'+form.data('submission'));
        var bio = openercontainer.find('#bio');
        var carrierlevel = openercontainer.find('#carrierlevel');



        // container.find('#gender').val(gender.text());
        container.find('#my-bio').val(bio.text());

        container.find('#my-carrierlevel').val(carrierlevel.text());





    });

    $('#jbs-bio-form').submit(function (e) {
        e.preventDefault();

        var form = $(this);
        var bio = $('#bio',form);
        var carrierlevel = $('#carrierlevel',form);
        alert('A');

        $.ajax({
            type:'POST',
            url:  window.location.origin+'/ajax-upload-bio',
            data: new FormData(this),
            dataType:'JSON',
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                console.log(data);//ye line hr jagha dalni
                form.parents('.jbs-model').find(' > .jbs-model-background.jbs-close').click();
                var submission = $('#'+form.data('submission'));


                var biohtml = $('.my-bio',submission);
                var carrierlevelhtml = $('.my-carrierlevel',submission);




                biohtml.html(bio.val()); //ye age ki value ko update kr ra html main
                carrierlevelhtml.html(carrierlevel.val()); //ye phone ki value ko update kr ra html main
            },
            error: function(data){
                console.log("error");
                console.log(data.responseText);
                form.parents('.jbs-model').find(' > .jbs-model-background.jbs-close').click();
            }
        });



    });



    ///bio end


    $('.jbs-add-btn').click(function (e) {
        e.preventDefault();

        var btn = $(this);
        var containerid = btn.data('containerid');
        openJBSModel(containerid);
    });



    //user profile edit section start

    // ye edit icon click krnay pe run hoga

    $('.jbs-edit-btn').click(function (e) {
        e.preventDefault();

        var btn = $(this);
        var containerid = btn.data('containerid');


        var container = $('#'+containerid);
        container.fadeIn();

        var form = container.find('form');
        if(!form.length){
            return;
        }

        var openercontainer = $('#'+form.data('submission'));
        var email = openercontainer.find('#personal-email');
        var phone = openercontainer.find('#personal-phone');
        //var gender = openercontainer.find('#personal-gender');
        var city = openercontainer.find('#personal-city');
        var dob = openercontainer.find('#personal-dob');
        var address = openercontainer.find('#personal-address');


       // container.find('#gender').val(gender.text());
        container.find('#phone').val(phone.text());

        container.find('#email').val(email.text());
        container.find('#city').val(city.text());

        container.find('#dob').val(dob.text());
        container.find('#address').val(address.text());




    });

    //till open . open ho gya edit/ update k liye

    //nechay wala code se update hoga



    //personal start
    $('#jbs-personal-form').submit(function (e) {
        e.preventDefault();

        var form = $(this);
        var email = $('#email',form);
        var phone = $('#phone',form);

        var address = $('#address',form);
        var city = $('#city',form);

        var dob = $('#dob',form);


        $.ajax({
            type:'POST',
            url:  window.location.origin+'/ajax-upload-jspersonal',
            data: new FormData(this),
            dataType:'JSON',
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                console.log(data);//ye line hr jagha dalni
                form.parents('.jbs-model').find(' > .jbs-model-background.jbs-close').click();
                if(data.success == '1'){

                    console.log("success");
                }
            },
            error: function(data){
                console.log("error");
                console.log(data.responseText);
                form.parents('.jbs-model').find(' > .jbs-model-background.jbs-close').click();
            }
        });

        var submission = $('#'+form.data('submission'));

        var emailhtml = $('#personal-email',submission);
        var phonehtml = $('#personal-phone',submission);
        //var gender = $('#personal-gender');
        var cityhtml = $('#personal-city',submission);
        var dobhtml = $('#personal-dob',submission);
        var addresshtml = $('#personal-address',submission);



        emailhtml.html(email.val()); //ye age ki value ko update kr ra html main
        phonehtml.html(phone.val()); //ye phone ki value ko update kr ra html main
        cityhtml.html(city.val()); //ye age ki value ko update kr ra html main
        dobhtml.html(dob.val()); //ye age ki value ko update kr ra html main
        addresshtml.html(address.val()); //ye phone ki value ko update kr ra html main


       // $('.jbs-model').fadeOut();


    });


    //to form submit

    //personal ended

//for experience start
    $('#jbs-we-form').submit(function(e){
        e.preventDefault();

        var form = $(this);
        var name = $('#companyname',form);
        var location = $('#companylocation',form);
        var pos = $('#companypos',form);
        var jobtype = $('#companyjobtype',form);
        var startdate= $('#companysd',form);
        var enddate= $('#companyed',form);
        var curworking= $('#currworking',form);
        var submission = $('#'+form.data('submission'));


        var container = $('.jbs-main-content-container',submission);
        var contentlength = $('.jbs-main-content',container).length;

        var currworkhtml = '';
        if(curworking.is(':checked')){
            currworkhtml = `<i class="fa fa-check"></i>`;
        }
        else{
            currworkhtml =  `<i class="fa fa-close"></i>`;
        }

        var token = $('#container-work-experience .jbs-main-content-container > input').val();

        $.ajax({
            type:'POST',
            url:  window.location.origin+'/ajax-upload-exp',
            data: new FormData(this),
            dataType:'JSON',
            cache:false,
            contentType: false,
            processData: false,
            success:function(data) {

                console.log(data);

                if(data.success == '1'){

                    container.append(`<div class="jbs-main-content" id="work-experience-content-` + contentlength + `">
                     <form class="workexp-remove-form">
                        <input type="hidden" name="_token" value="`+token+`">
                        <input type="hidden" name="workexp_id" value="`+data.workexp_id+`" />
                    </form>
                       
                              <div class="row">
                                <div class="col-md-3">
                                <p >  <a class="my-heading-text3 my-fa">Position: </a>   <a class="my-text-font company-pos">` + pos.val() + `</a></p>

                            </div>
                            <div class="col-md-3">
                                <p >  <a class="my-heading-text3 my-fa">location: </a>   <a class="my-text-font company-loc">` + location.val() + `</a></p>

                            </div>



                            <div class="col-md-6 text-right">
                                <i class="fa fa-close red we-remove-btn"></i>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <p >     <a class="my-heading-text3 my-fa">Company name: </a>   <a class="my-text-font company-name">` + name.val() + `</a></p>

                            </div>

                            <div class="col-md-3">
                                <p><a class="my-heading-text3 my-fa">Job Type: </a><a class="my-text-font company-jobtype">` + jobtype.val() + `</a></p>


                            </div>

                            <div class="col-md-3">
                                <p><a class="my-heading-text3 my-fa">Currently Working: </a><a class="my-text-font company-currentlyworking">` + currworkhtml + `</a></p>


                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <p><a class="my-heading-text3 my-fa">Start Date: </a><a class="my-text-font company-startdate">` + startdate.val() + `</a></p>

                            </div>

                            
                            <div class="col-md-3">
                                <p><a class="my-heading-text3 my-fa">End Date: </a><a class="my-text-font company-enddate">` + enddate.val() + `</a></p>
                            </div>
                                
                        </div>

                        </div>`);



                    $('#container-work-experience .jbs-main-content:last-of-type .we-remove-btn').click(removeworkexp);
                    form.parents('.jbs-model').find(' > .jbs-model-background.jbs-close').click();
                }
                else{
                    alert(data.message);
                }
            },
            error: function(data){
                form.parents('.jbs-model').find(' > .jbs-model-background.jbs-close').click();
                console.log("error");
                console.log(data.responseText);
            }
        });


    });

    $('#container-work-experience .we-remove-btn').click(removeworkexp);


    //experience end

    ////////////////////////////////////////////


    //for education start
    $('#jbs-education-form').submit(function(e){
        e.preventDefault();

        var form = $(this);
        var degreetitle = $('#degreetitle',form);
        var yearofcompletion = $('#yearofcompletion',form);
        var cgpa = $('#cgpa',form);
        var degreelevel = $('#degreelevel',form);
        var institute= $('#institute',form);
        var location= $('#location',form);

        var submission = $('#'+form.data('submission'));



        var container = $('.jbs-main-content-container',submission);
        var contentlength = $('.jbs-main-content',container).length;

        var token = $('#container-education .jbs-main-content-container > input').val();
        $.ajax({
            type:'POST',
            url:  window.location.origin+'/ajax-upload-edu',
            data: new FormData(this),
            dataType:'JSON',
            cache:false,
            contentType: false,
            processData: false,
            success:function(data) {

                console.log(data);

                if(data.success == '1') {
                    container.append(`<div class="jbs-main-content" id="education-content-` + contentlength + `">
                    <form class="education-remove-form">
                        <input type="hidden" name="_token" value="`+token+`">
                        <input type="hidden" name="education_id" value="`+data.education_id+`" />
                    </form>
                   <div class="row">
                            <div class="col-md-5">
                                <p><a class="my-heading-text3 ">Degree Title: </a><a class="my-text-font my-fa degree-title">` + degreetitle.val() + `</a></p>

                            </div>

                            <div class="col-md-5">
                                <p><a class="my-heading-text3 ">Degree Level: </a><a class="my-text-font my-fa degree-level">` + degreelevel.val() + `</a></p>


                            </div>


                            <div class="col-md-2 text-right">
                                <i class="fa fa-close red we-remove-btn"></i>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <p><a class="my-heading-text3 ">Institute: </a><a class="my-text-font my-fa institute">` + institute.val() + `</a></p>

                            </div>


                            <div class="col-md-3">

                                <p><a class="my-heading-text3 ">City: </a><a class="my-text-font location">` + location.val() + `</a></p>


                            </div>

                            <div class="col-md-2">
                                <p><a class="my-heading-text3 ">Year of Completion: </a><a class="my-text-font my-fa degree-yearofcompletion">` + yearofcompletion.val() + `</a></p>



                            </div>
                             <div class="col-md-2">
                                <p><a class="my-heading-text3 ">CGPA: </a><a class="my-text-font my-fa degree-cgpa">` + cgpa.val() + `</a></p>



                            </div>

                        </div>
                    </div>


                </div>`);


                    $('#container-education .jbs-main-content:last-of-type .we-remove-btn').click(removeeducation);
                    form.parents('.jbs-model').find(' > .jbs-model-background.jbs-close').click();
                }
                else{
                    alert(data.message);
                }
            },
            error: function(data){
                form.parents('.jbs-model').find(' > .jbs-model-background.jbs-close').click();
                console.log("error");
                console.log(data.responseText);
            }
        });


    });

    $('#container-education .we-remove-btn').click(removeeducation);

    //eductaion end


    //for project start
    $('#jbs-projects-form').submit(function(e){
        e.preventDefault();

        var form = $(this);
        var projecttitle = $('#projecttitle',form);
        var projectdesc = $('#projectdesc',form);
        var projectsd = $('#projectsd',form);
        var projected = $('#projected',form);
        var projecturl= $('#projecturl',form);


        var submission = $('#'+form.data('submission'));


        var container = $('.jbs-main-content-container',submission);
        var contentlength = $('.jbs-main-content',container).length;

        var token = $('#container-projects .jbs-main-content-container > input').val();

        $.ajax({
            type:'POST',
            url:  window.location.origin+'/ajax-upload-jsproject',
            data: new FormData(this),
            dataType:'JSON',
            cache:false,
            contentType: false,
            processData: false,
            success:function(data) {

                console.log(data);

                if(data.success == '1') {


        container.append(`<div class="jbs-main-content" id="project-content-`+contentlength+`">
 <form class="jsproject-remove-form">
                        <input type="hidden" name="_token" value="`+token+`">
                        <input type="hidden" name="jsproject_id" value="`+data.jsproject_id+`" />
                    </form>
                

                             <div class="row">
                            <div class="col-md-4">

                                <p><a class="my-heading-text3 ">Project Title: </a><a class="my-text-font my-fa project-title">`+projecttitle.val()+`</a></p>

                            </div>


                            <div class="col-md-8 text-right">
                                <i class="fa fa-close red we-remove-btn"></i>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-7">

                                <p><a class="my-heading-text3 ">Description: </a><a class="my-text-font my-fa project-desc">`+projectdesc.val()+`</a></p>

                            </div>

                            <div class="col-md-5">
                                <p><a class="my-heading-text3 ">Url: </a><a class="my-text-font my-fa project-purl">`+projecturl.val()+`</a></p>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-7">
                                <p><a class="my-heading-text3">Start Date: </a><a class="my-text-font  my-fa project-pstartdate">`+projectsd.val()+`</a></p>


                            </div>

                            <div class="col-md-5">
                                <p><a class="my-heading-text3">End Date: </a><a class="my-text-font  my-fa project-penddate">`+projected.val()+`</a></p>

                        </div>




                            </div>

                </div>`);


                    $('#container-projects .jbs-main-content:last-of-type .we-remove-btn').click(removejsproject);
                    form.parents('.jbs-model').find(' > .jbs-model-background.jbs-close').click();
                }
                else{
                    alert(data.message);
                }
            },
            error: function(data){
                form.parents('.jbs-model').find(' > .jbs-model-background.jbs-close').click();
                console.log("error");
                console.log(data.responseText);
            }
        });


    });

    //fa ended

    $('#container-projects .we-remove-btn').click(removejsproject);

    //project end


    //fa started


    $('#jbs-fa-form').submit(function(e){
        e.preventDefault();

        var form = $(this);
        var faname = $('#functionalarea',form);

        var submission = $('#'+form.data('submission'));


        var container = $('.jbs-main-content-container',submission);
        var contentlength = $('.jbs-main--content',container).length;

        var token = $('#container-functional-area .jbs-main-content-container > input').val();

        $.ajax({
            type:'POST',
            url:  window.location.origin+'/ajax-upload-fa',
            data: new FormData(this),
            dataType:'JSON',
            cache:false,
            contentType: false,
            processData: false,
            success:function(data) {

                console.log(data);

                if(data.success == '1') {

        container.append(`<div class="jbs-main-content" id="work-experience-content-`+contentlength+`">

                 <form class="functionalarea-remove-form">
                        <input type="hidden" name="_token" value="`+token+`">
                        <input type="hidden" name="hr_id" value="`+data.functionalarea_id+`" />
                    </form>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="functional-area">`+faname.val()+`</p>
                           
                        </div>
                        <div class="col-md-9 text-right">
                            <i class="fa fa-close red we-remove-btn"></i>
                        </div>
                    </div>
                </div>`);

                    $('#container-functional-area .jbs-main-content:last-of-type .we-remove-btn').click(removefunctionalarea);
                    form.parents('.jbs-model').find(' > .jbs-model-background.jbs-close').click();
                }
                else{
                    alert(data.message);
                }
            },
            error: function(data){
                form.parents('.jbs-model').find(' > .jbs-model-background.jbs-close').click();
                console.log("error");
                console.log(data.responseText);
            }
        });


    });

    //fa ended

    $('#container-functional-area .we-remove-btn').click(removefunctionalarea);


    //hobbies started


    $('#jbs-hobby-form').submit(function(e){
        e.preventDefault();

        var form = $(this);
        var hobby = $('#hobbies',form);

        var submission = $('#'+form.data('submission'));


        var container = $('.jbs-main-content-container',submission);
        var contentlength = $('.jbs-main--content',container).length;


        var token = $('#container-hobbies .jbs-main-content-container > input').val();
        $.ajax({
            type:'POST',
            url:  window.location.origin+'/ajax-upload-hobby',
            data: new FormData(this),
            dataType:'JSON',
            cache:false,
            contentType: false,
            processData: false,
            success:function(data) {

                console.log(data);

                if(data.success == '1') {

        container.append(`<div class="jbs-main-content" id="hobby-content-`+contentlength+`">
                    <form class="hobby-remove-form">
                         <input type="hidden" name="_token" value="`+token+`" />
                        <input type="hidden" name="hobby_id" value="`+data.hobby_id+`" />
                    </form>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="my-hobbies">`+hobby.val()+`</p>
                           
                        </div>
                        <div class="col-md-9 text-right">
                            <i class="fa fa-close red we-remove-btn"></i>
                        </div>
                    </div>
                </div>`);

                    $('#container-hobbies .jbs-main-content:last-of-type .we-remove-btn').click(removeHobbies);
                    form.parents('.jbs-model').find(' > .jbs-model-background.jbs-close').click();
                }
                else{
                    alert(data.message);
                }
            },
            error: function(data){
                form.parents('.jbs-model').find(' > .jbs-model-background.jbs-close').click();
                console.log("error");
                console.log(data.responseText);
            }
        });


    });

    $('#container-hobbies .we-remove-btn').click(removeHobbies);

    //hobbies ended


    ////////////////////////////////////////////////


    $('#jbs-languages-form').submit(function(e){
        e.preventDefault();

        var form = $(this);
        var languages = $('#languages',form);

        var submission = $('#'+form.data('submission'));


        var container = $('.jbs-main-content-container',submission);
        var contentlength = $('.jbs-main--content',container).length;

        var token = $('#container-languages .jbs-main-content-container >input').val();

        $.ajax({
            type:'POST',
            url:  window.location.origin+'/ajax-upload-language',
            data: new FormData(this),
            dataType:'JSON',
            cache:false,
            contentType: false,
            processData: false,
            success:function(data) {

                console.log(data);

                if(data.success == '1') {


                    container.append(`<div class="jbs-main-content" id="languages-content-`+contentlength+`">
                        <form class="language-remove-form">
                            <input type="hidden" name="_token" value="`+token+`" />
                            <input type="hidden" name="language_id" value="`+data.language_id+`" />
                        </form>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="languages">`+languages.val()+`</p>
                           
                        </div>
                        <div class="col-md-9 text-right">
                            <i class="fa fa-close red we-remove-btn"></i>
                        </div>
                    </div>
                </div>`);

                    $('#container-languages .jbs-main-content:last-of-type .we-remove-btn').click(removeLanguages);
                    form.parents('.jbs-model').find(' > .jbs-model-background.jbs-close').click();
                }
                else{
                    alert(data.message);
                }
            },
            error: function(data){
                form.parents('.jbs-model').find(' > .jbs-model-background.jbs-close').click();
                console.log("error");
                console.log(data.responseText);
            }
        });


    });

    $('#container-languages .we-remove-btn').click(removeLanguages);
    //languages ended


    //jobcity  started


    $('#jbs-jobcity-form').submit(function(e){
        e.preventDefault();

        var form = $(this);
        var jobcity = $('#jobcity',form);

        var submission = $('#'+form.data('submission'));


        var container = $('.jbs-main-content-container',submission);
        var contentlength = $('.jbs-main--content',container).length;

        var token = $('#container-prefferedcity .jbs-main-content-container >input').val();


        $.ajax({
            type:'POST',
            url:  window.location.origin+'/ajax-upload-prefferedcity',
            data: new FormData(this),
            dataType:'JSON',
            cache:false,
            contentType: false,
            processData: false,
            success:function(data) {

                console.log(data);

                if(data.success == '1') {

                    container.append(`<div class="jbs-main-content" id="prefferedcity-content-`+contentlength+`">
                             
                        <form class="prefferedcity-remove-form">
                         <input type="hidden" name="_token" value="`+token+`" />
                           <input type="hidden" name="prefferedcity_id" value="`+data.prefferedcity_id+`" />
                        </form>
                        
                    <div class="row">
                        <div class="col-md-3">
                            <p class="jobcity">`+jobcity.val()+`</p>
                           
                        </div>
                        <div class="col-md-9 text-right">
                            <i class="fa fa-close red we-remove-btn"></i>
                        </div>
                    </div>
                </div>`);

                    $('#container-jobcity .jbs-main-content:last-of-type .we-remove-btn').click(removeprefferedcity);
                    form.parents('.jbs-model').find(' > .jbs-model-background.jbs-close').click();
                }
                else{
                    alert(data.message);
                }
            },
            error: function(data){
                form.parents('.jbs-model').find(' > .jbs-model-background.jbs-close').click();
                console.log("error");
                console.log(data.responseText);
            }
        });


    });

    $('#container-jobcity .we-remove-btn').click(removeprefferedcity);

    //jobcity ended

    ///////////////////////////////////


    //skills started


    $('#jbs-skills-form').submit(function(e){
        e.preventDefault();

        var form = $(this);
        var skills = $('#skills',form);

        var submission = $('#'+form.data('submission'));


        var container = $('.jbs-main-content-container',submission);
        var contentlength = $('.jbs-main--content',container).length;

        var token = $('#container-skills .jbs-main-content-container >input').val();
        $.ajax({
            type:'POST',
            url:  window.location.origin+'/ajax-upload-skills',
            data: new FormData(this),
            dataType:'JSON',
            cache:false,
            contentType: false,
            processData: false,
            success:function(data) {

                console.log(data);

                if(data.success == '1') {

        container.append(`<div class="jbs-main-content" id="work-experience-content-`+contentlength+`">
                         <form class="skills-remove-form">
                         <input type="hidden" name="_token" value="`+token+`" />
                           <input type="hidden" name="skills_id" value="`+data.skills_id+`" />
                        </form>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="skills">`+skills.val()+`</p>
                           
                        </div>
                        <div class="col-md-9 text-right">
                            <i class="fa fa-close red we-remove-btn"></i>
                        </div>
                    </div>
                </div>`);



                    $('#container-skills .jbs-main-content:last-of-type .we-remove-btn').click(removeskills);
                    form.parents('.jbs-model').find(' > .jbs-model-background.jbs-close').click();
                }
                else{
                    alert(data.message);
                }
            },
            error: function(data){
                form.parents('.jbs-model').find(' > .jbs-model-background.jbs-close').click();
                console.log("error");
                console.log(data.responseText);
            }
        });


    });

    $('#container-skills .we-remove-btn').click(removeskills);


    //skills ended





    //HR policy started


    $('#jbs-hr-form').submit(function(e){
        e.preventDefault();

        var form = $(this);
        var hr1 = $('#hr1',form);
        var hr2 = $('#hr2',form);

        var submission = $('#'+form.data('submission'));


        var container = $('.jbs-main-content-container',submission);
        var contentlength = $('.jbs-main-content',container).length;

        var token = $('.jbs-main-content-container > input').val();

        $.ajax({
            type:'POST',
            url:  window.location.origin+'/ajax-upload-hr',
            data: new FormData(this),
            dataType:'JSON',
            cache:false,
            contentType: false,
            processData: false,
            success:function(data) {

                console.log(data);

                if(data.success == '1') {

                    container.append(`<div class="jbs-main-content" id="hr-policy-content-`+contentlength+`">
                    <form class="hr-remove-form">
                        <input type="hidden" name="_token" value="`+token+`">
                        <input type="hidden" name="hr_id" value="`+data.hr_id+`" />
                    </form>
                     <div class="row">
                        <div class="col-md-10">

                            <a class="my-heading-text3 ">No of Interview: </a>   <a class="hr1 my-text-font">`+hr1.val()+`</a>


                        </div>

                        <div class="col-md-2 text-right">
                            <i class="fa fa-close red we-remove-btn hr_policy_remove"></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">


                            <p><a class="my-heading-text3">Procedure: </a>   <a class="hr2 my-text-font">`+hr2.val()+`</a></p>

                        </div>
                    </div>
                </div>
                </div>`);



                    $('.jbs-main-content:last-of-type .we-remove-btn').click(removeHRPolicy);
                    form.parents('.jbs-model').find(' > .jbs-model-background.jbs-close').click();
                }
                else{
                    alert(data.message);
                }
            },
            error: function(data){
                form.parents('.jbs-model').find(' > .jbs-model-background.jbs-close').click();
                console.log("error");
                console.log(data.responsetext);
            }
        });


    });

    $('.hr_policy_remove').click(removeHRPolicy);



    //HR policy ended


    ////////////






    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-image-set').attr('src', e.target.result);
               // var file = $(input)[0].files[0];
               // var upload = new Upload(file);

                $('#dp-change-form').submit();
            }

            reader.readAsDataURL(input.files[0]);

        }
    }

    $('#dp-change-form').on('submit',function (e) {
        e.preventDefault();

        $.ajax({
            type:'POST',
            url:  window.location.origin+'/ajax-upload-dp',
            data: new FormData(this),
            dataType:'JSON',
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                console.log("success");
                console.log(data);
                if(data.success =='0'){
                    msg = '';
                    data.errors.forEach(function(val,index){
                        msg += val+'\n';
                    });
                    alert(msg);
                }

            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
    });


    $(".file-upload").on('change', function(){
        readURL(this);
    });

    $(".upload-button").on('click', function() {
        $(".file-upload").click();
    });

    ///////////////////function to open image choose for company profile endset company profile data start///////////////////
    // $('#company-personal-form').on('submit',function (e) {
    //     e.preventDefault();
    //
    //
    // });


    ///////////////////function to open image choose for company profile endset company profile data endd///////////////////

//for rating start
    $(".btnrating").on('click',(function(e) {

        var previous_value = $("#selected_rating").val();

        var selected_value = $(this).attr("data-attr");
        $("#selected_rating").val(selected_value);

        $(".selected-rating").empty();
        $(".selected-rating").html(selected_value);

        for (i = 1; i <= selected_value; ++i) {
            $("#rating-star-"+i).toggleClass('btn-warning');
            $("#rating-star-"+i).toggleClass('btn-default');
        }

        for (ix = 1; ix <= previous_value; ++ix) {
            $("#rating-star-"+ix).toggleClass('btn-warning');
            $("#rating-star-"+ix).toggleClass('btn-default');
        }

    }));
    //for raring end





    //CV BUILD
    $('.buildCV-btn').click(function(e){
        e.preventDefault();

        var user_id = $(this).attr('href');


        $.get( window.location.origin+'/ajax-get-cv/1', function( data ) {

            var html = $('<div></div>').append(data);


            console.log(html.text());

            var token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                type:'POST',
                url:  window.location.origin+'/ajax-current-user-data',
                data: {
                    _token:token,
                    user_id:user_id
                },
                dataType:'JSON',
                success:function(data) {

                    console.log(data);

                    if(data.success == '1') {

                        var jobseekerdata = data.data.jobseeker;
                        var userdata = data.data.user;

                        html.find('#jobseeker_name').html(html);
                        console.log(html.html());
                    }
                    else{
                        alert(data.message);
                    }
                },
                error: function(data){
                    console.log("error");
                    console.log(data);
                }
            });

        });
    });

});


function removeHRPolicy(e) {
        e.preventDefault();

        var container = $(this).parents('.jbs-main-content');

        var confirm = window.confirm('are you sure?');
        if(!confirm){
            return false;
        }
        $.ajax({
            type:'POST',
            url:  window.location.origin+'/ajax-remove-hr',
            data: new FormData($('form',container)[0]),
            dataType:'JSON',
            cache:false,
            contentType: false,
            processData: false,
            success:function(data) {

                console.log(data);

                if(data.success == '1') {

                    container.remove();
                }
                else{
                    alert(data.message);
                }
            },
            error: function(data){
                console.log("error");
                console.log(data.responsetext);
            }
        });
}


function removeHobbies(e) {
    e.preventDefault();

    var container = $(this).parents('.jbs-main-content');

    var confirm = window.confirm('are you sure?');
    if(!confirm){
        return false;
    }
    $.ajax({
        type:'POST',
        url:  window.location.origin+'/ajax-remove-hobby',
        data: new FormData($('form',container)[0]),
        dataType:'JSON',
        cache:false,
        contentType: false,
        processData: false,
        success:function(data) {

            console.log(data);

            if(data.success == '1') {

                container.remove();
            }
            else{
                alert(data.message);
            }
        },
        error: function(data){
            console.log("error");
            console.log(data.responseText);
        }
    });
}
///////////////////////////////////////////////////////

function removeLanguages(e) {
    e.preventDefault();

    var container = $(this).parents('.jbs-main-content');

    var confirm = window.confirm('are you sure?');
    if(!confirm){
        return false;
    }
    $.ajax({
        type:'POST',
        url:  window.location.origin+'/ajax-remove-language',
        data: new FormData($('form',container)[0]),
        dataType:'JSON',
        cache:false,
        contentType: false,
        processData: false,
        success:function(data) {

            console.log(data);

            if(data.success == '1') {

                container.remove();
            }
            else{
                alert(data.message);
            }
        },
        error: function(data){
            console.log("error");
            console.log(data.responseText);
        }
    });
}


function removeprefferedcity(e) {
    e.preventDefault();

    var container = $(this).parents('.jbs-main-content');

    var confirm = window.confirm('are you sure?');
    if(!confirm){
        return false;
    }
    $.ajax({
        type:'POST',
        url:  window.location.origin+'/ajax-remove-prefferedcity',
        data: new FormData($('form',container)[0]),
        dataType:'JSON',
        cache:false,
        contentType: false,
        processData: false,
        success:function(data) {

            console.log(data);

            if(data.success == '1') {

                container.remove();
            }
            else{
                alert(data.message);
            }
        },
        error: function(data){
            console.log("error");
            console.log(data.responseText);
        }
    });
}



function removefunctionalarea(e) {
    e.preventDefault();

    var container = $(this).parents('.jbs-main-content');

    var confirm = window.confirm('are you sure?');
    if(!confirm){
        return false;
    }
    $.ajax({
        type:'POST',
        url:  window.location.origin+'/ajax-remove-functionalarea',
        data: new FormData($('form',container)[0]),
        dataType:'JSON',
        cache:false,
        contentType: false,
        processData: false,
        success:function(data) {

            console.log(data);

            if(data.success == '1') {

                container.remove();
            }
            else{
                alert(data.message);
            }
        },
        error: function(data){
            console.log("error");
            console.log(data.responseText);
        }
    });
}



function removeskills(e) {
    e.preventDefault();

    var container = $(this).parents('.jbs-main-content');

    var confirm = window.confirm('are you sure?');
    if(!confirm){
        return false;
    }
    $.ajax({
        type:'POST',
        url:  window.location.origin+'/ajax-remove-skills',
        data: new FormData($('form',container)[0]),
        dataType:'JSON',
        cache:false,
        contentType: false,
        processData: false,
        success:function(data) {

            console.log(data);

            if(data.success == '1') {

                container.remove();
            }
            else{
                alert(data.message);
            }
        },
        error: function(data){
            console.log("error");
            console.log(data.responseText);
        }
    });
}

function removejsproject(e) {
    e.preventDefault();

    var container = $(this).parents('.jbs-main-content');

    var confirm = window.confirm('are you sure?');
    if(!confirm){
        return false;
    }
    $.ajax({
        type:'POST',
        url:  window.location.origin+'/ajax-remove-jsproject',
        data: new FormData($('form',container)[0]),
        dataType:'JSON',
        cache:false,
        contentType: false,
        processData: false,
        success:function(data) {

            console.log(data);

            if(data.success == '1') {

                container.remove();
            }
            else{
                alert(data.message);
            }
        },
        error: function(data){
            console.log("error");
            console.log(data.responseText);
        }
    });
}





function removeeducation(e) {
    e.preventDefault();

    var container = $(this).parents('.jbs-main-content');

    var confirm = window.confirm('are you sure?');
    if(!confirm){
        return false;
    }
    $.ajax({
        type:'POST',
        url:  window.location.origin+'/ajax-remove-education',
        data: new FormData($('form',container)[0]),
        dataType:'JSON',
        cache:false,
        contentType: false,
        processData: false,
        success:function(data) {

            console.log(data);

            if(data.success == '1') {

                container.remove();
            }
            else{
                alert(data.message);
            }
        },
        error: function(data){
            console.log("error");
            console.log(data.responseText);
        }
    });
}




function removeworkexp(e) {
    e.preventDefault();

    var container = $(this).parents('.jbs-main-content');

    var confirm = window.confirm('are you sure?');
    if(!confirm){
        return false;
    }
    $.ajax({
        type:'POST',
        url:  window.location.origin+'/ajax-remove-workexp',
        data: new FormData($('form',container)[0]),
        dataType:'JSON',
        cache:false,
        contentType: false,
        processData: false,
        success:function(data) {

            console.log(data);

            if(data.success == '1') {

                container.remove();
            }
            else{
                alert(data.message);
            }
        },
        error: function(data){
            console.log("error");
            console.log(data.responseText);
        }
    });




}



function openJBSModel(containerid){
    var container = $('#'+containerid);
    container.fadeIn();

}

$('#myCarousel').on('slide.bs.carousel', function () {
    // do something…
})



