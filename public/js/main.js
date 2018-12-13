var $ = jQuery;

$(document).ready(function(){

    $('.jbs-model .jbs-close').click(function(){
        $('.jbs-model').fadeOut();
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
        var age = openercontainer.find('#personal-age');
        var phone = openercontainer.find('#personal-phone');

        container.find('#age').val(age.text());
        container.find('#phone').val(phone.text());
    });

    //till open . open ho gya edit/ update k liye

    //nechay wala code se update hoga

    $('#jbs-personal-form').submit(function (e) {
        e.preventDefault();

        var form = $(this);
        var age = $('#age',form);
        var phone = $('#phone',form);

        var submission = $('#'+form.data('submission'));


        var agehtml = $('#personal-age',submission);
        var phonehtml = $('#personal-phone',submission);

        agehtml.html(age.val()); //ye age ki value ko update kr ra html main
        phonehtml.html(phone.val()); //ye phone ki value ko update kr ra html main


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
        console.log(curworking.val());

        var currworkhtml = '';
        if(curworking.is(':checked')){
            currworkhtml = `<i class="fa fa-check"></i>`;
        }
        else{
            currworkhtml =  `<i class="fa fa-close"></i>`;
        }

        container.append(`<div class="jbs-main-content" id="functional-area-content-`+contentlength+`">
                    <div class="row">
                        <div class="col-md-3">
                            <p class="company-name">`+name.val()+`</p>
                            <p class="company-loc">`+location.val()+`</p>
                            <p class="company-pos">`+pos.val()+`</p>
                            <p class="company-jobtype">`+jobtype.val()+`</p>
                            <p class="company-startdate">`+startdate.val()+`</p>
                            <p class="company-enddate">`+enddate.val()+`</p>
                            <p class="company-currentlyworking">`+currworkhtml+`</p>
                        </div>
                        <div class="col-md-9 text-right">
                            <i class="fa fa-close red we-remove-btn"></i>
                        </div>
                    </div>
                </div>`);



        $('.jbs-main-content:last-of-type .we-remove-btn').click(function () {

            var confirm = window.confirm('are you sure?');
            if(confirm){
                $(this).parent().parent().parent().remove();
            }
        });

    });

    //experience end


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


        container.append(`<div class="jbs-main-content" id="education-content-`+contentlength+`">
                    <div class="row">
                        <div class="col-md-3">
                            <p class="degree-title">`+degreetitle.val()+`</p>
                            <p class="degree-yearofcompletion">`+yearofcompletion.val()+`</p>
                            <p class="degree-cgpa">`+cgpa.val()+`</p>
                            <p class="degree-level">`+degreelevel.val()+`</p>
                            <p class="institute">`+institute.val()+`</p>
                            <p class="location">`+location.val()+`</p>
                            
                        </div>
                        <div class="col-md-9 text-right">
                            <i class="fa fa-close red we-remove-btn"></i>
                        </div>
                    </div>
                </div>`);



        $('.jbs-main-content:last-of-type .we-remove-btn').click(function () {

            var confirm = window.confirm('are you sure?');
            if(confirm){
                $(this).parent().parent().parent().remove();
            }
        });

    });

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


        container.append(`<div class="jbs-main-content" id="project-content-`+contentlength+`">
                    <div class="row">
                        <div class="col-md-3">
                            <p class="project-title">`+projecttitle.val()+`</p>
                            <p class="project-desc">`+projectdesc.val()+`</p>
                            <p class="project-pstartdate">`+projectsd.val()+`</p>
                            <p class="project-penddate">`+projected.val()+`</p>
                            <p class="project-purl">`+projecturl.val()+`</p>
                            
                        </div>
                        <div class="col-md-9 text-right">
                            <i class="fa fa-close red we-remove-btn"></i>
                        </div>
                    </div>
                </div>`);



        $('.jbs-main-content:last-of-type .we-remove-btn').click(function () {

            var confirm = window.confirm('are you sure?');
            if(confirm){
                $(this).parent().parent().parent().remove();
            }
        });

    });

    //project end


    //fa started


    $('#jbs-fa-form').submit(function(e){
        e.preventDefault();

        var form = $(this);
        var faname = $('#functionalarea',form);

        var submission = $('#'+form.data('submission'));


        var container = $('.jbs-main-content-container',submission);
        var contentlength = $('.jbs-main--content',container).length;

        container.append(`<div class="jbs-main-content" id="work-experience-content-`+contentlength+`">
                    <div class="row">
                        <div class="col-md-3">
                            <p class="functional-area">`+faname.val()+`</p>
                           
                        </div>
                        <div class="col-md-9 text-right">
                            <i class="fa fa-close red we-remove-btn"></i>
                        </div>
                    </div>
                </div>`);



        $('.jbs-main-content:last-of-type .we-remove-btn').click(function () {

            var confirm = window.confirm('are you sure?');
            if(confirm){
                $(this).parent().parent().parent().remove();
            }
        });

    });

    //fa ended




    //hobbies started


    $('#jbs-hobby-form').submit(function(e){
        e.preventDefault();

        var form = $(this);
        var hobby = $('#hobbies',form);

        var submission = $('#'+form.data('submission'));


        var container = $('.jbs-main-content-container',submission);
        var contentlength = $('.jbs-main--content',container).length;

        container.append(`<div class="jbs-main-content" id="work-experience-content-`+contentlength+`">
                    <div class="row">
                        <div class="col-md-3">
                            <p class="my-hobbies">`+hobby.val()+`</p>
                           
                        </div>
                        <div class="col-md-9 text-right">
                            <i class="fa fa-close red we-remove-btn"></i>
                        </div>
                    </div>
                </div>`);



        $('.jbs-main-content:last-of-type .we-remove-btn').click(function () {

            var confirm = window.confirm('are you sure?');
            if(confirm){
                $(this).parent().parent().parent().remove();
            }
        });

    });

    //hobbies ended





    //skills started


    $('#jbs-skills-form').submit(function(e){
        e.preventDefault();

        var form = $(this);
        var skills = $('#skills',form);

        var submission = $('#'+form.data('submission'));


        var container = $('.jbs-main-content-container',submission);
        var contentlength = $('.jbs-main--content',container).length;

        container.append(`<div class="jbs-main-content" id="work-experience-content-`+contentlength+`">
                    <div class="row">
                        <div class="col-md-3">
                            <p classskills">`+skills.val()+`</p>
                           
                        </div>
                        <div class="col-md-9 text-right">
                            <i class="fa fa-close red we-remove-btn"></i>
                        </div>
                    </div>
                </div>`);



        $('.jbs-main-content:last-of-type .we-remove-btn').click(function () {

            var confirm = window.confirm('are you sure?');
            if(confirm){
                $(this).parent().parent().parent().remove();
            }
        });

    });

    //skills ended




    //jobcity  started


    $('#jbs-jobcity-form').submit(function(e){
        e.preventDefault();

        var form = $(this);
        var jobcity = $('#jobcity',form);

        var submission = $('#'+form.data('submission'));


        var container = $('.jbs-main-content-container',submission);
        var contentlength = $('.jbs-main--content',container).length;

        container.append(`<div class="jbs-main-content" id="jobcity-content-`+contentlength+`">
                    <div class="row">
                        <div class="col-md-3">
                            <p class="jobcity">`+jobcity.val()+`</p>
                           
                        </div>
                        <div class="col-md-9 text-right">
                            <i class="fa fa-close red we-remove-btn"></i>
                        </div>
                    </div>
                </div>`);



        $('.jbs-main-content:last-of-type .we-remove-btn').click(function () {

            var confirm = window.confirm('are you sure?');
            if(confirm){
                $(this).parent().parent().parent().remove();
            }
        });

    });

    //jobcity ended


    //skills started


    $('#jbs-languages-form').submit(function(e){
        e.preventDefault();

        var form = $(this);
        var languages = $('#languages',form);

        var submission = $('#'+form.data('submission'));


        var container = $('.jbs-main-content-container',submission);
        var contentlength = $('.jbs-main--content',container).length;

        container.append(`<div class="jbs-main-content" id="work-experience-content-`+contentlength+`">
                    <div class="row">
                        <div class="col-md-3">
                            <p class="languages">`+languages.val()+`</p>
                           
                        </div>
                        <div class="col-md-9 text-right">
                            <i class="fa fa-close red we-remove-btn"></i>
                        </div>
                    </div>
                </div>`);



        $('.jbs-main-content:last-of-type .we-remove-btn').click(function () {

            var confirm = window.confirm('are you sure?');
            if(confirm){
                $(this).parent().parent().parent().remove();
            }
        });

    });

    //skills ended




});


function openJBSModel(containerid){
    var container = $('#'+containerid);
    container.fadeIn();

}

$('#myCarousel').on('slide.bs.carousel', function () {
    // do something…
})
