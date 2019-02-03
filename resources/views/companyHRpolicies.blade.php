
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: shoaib--}}
 {{--* Date: 1/21/2019--}}
 {{--* Time: 12:12 PM--}}
 {{--*/--}}

@extends('companynav')

@section('HRpolicies')

    <div class="container shadow-sms p-3 mt-5 mb-5 bg-white rounded" id="container-hr">

        <div class="row">
            <div class="col-md-12">
                <div class="jbs-we-title">
                    <div class="w-75">
                        <div class="my-heading-text "> HR Policies</div>
                        <div > <b>Define your hiring process to guide Job Seekers</b></div>
                    </div>
                    <div class="w-25">
                        <div class="jbs-add-icon">
                            <a href="#" class="jbs-add-btn" data-containerid="jbs-add-hr-container" ><i class=" green-icon-set fa fa-plus" ></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="jbs-main-content-container">
            @csrf
            @foreach($hrpolicies as $key => $hrpolicy)
                <div class="jbs-main-content" id="hr-policy-content-{{ $key  }}" >
                    <form class="hr-remove-form">
                        @csrf
                        <input type="hidden" name="hr_id" value="{{ $hrpolicy->id }}" />
                    </form>
                    <div class="row">
                        <div class="col-md-10">

                            <a class="my-heading-text3">No of Interview: </a>   <a class="hr1 my-text-font">{{ $hrpolicy->no_of_interview  }}</a>


                        </div>

                        <div class="col-md-2 text-right">
                            <i class="fa fa-close red we-remove-btn hr_policy_remove"></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">


                            <p><a class="my-heading-text3">Procedure: </a>   <a class="hr2 my-text-font">{{ $hrpolicy->procedure  }}</a></p>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>


    </div>




    {{--HR  start--}}


    <div class="jbs-model" id="jbs-add-hr-container">
        <div class="jbs-model-background jbs-close"></div>
        <div class="jbs-container">
            <div class="jbs-main">
                <div class="jbs-header">
                    <div class="jbs-title">
                        <h3>HR Policies</h3>
                    </div>
                    <div class="jbs-close-container">
                        <i class="fa fa-close jbs-close"></i>
                    </div>
                </div>
                <form action="#" method="post" id="jbs-hr-form" data-submission="container-hr">
                    @csrf
                    <div class="jbs-content">
                        <div class="container-fluid">


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="hr">No of Interview</label>
                                        <input type="number" class="form-control" id="hr1" name="hr1" required aria-describedby="htrhelp" placeholder="No of Interview">
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="hr">Hiring Procedure</label>
                                        <input type="text" class="form-control" id="hr2" name="hr2" required aria-describedby="htrhelp" placeholder="Hiring Procedure">
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
                                        <input type="submit" class="form-control jbs-close btn my-btn1" value="Save" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    {{--skills  ended--}}

    @endsection