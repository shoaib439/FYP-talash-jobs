
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: shoaib--}}
 {{--* Date: 1/26/2019--}}
 {{--* Time: 8:06 PM--}}
 {{--*/--}}



@extends('main')

@section('InvitationAcceptedPage')

    <div class="container-fluid ">

        <div class="container shadow-sms p-3 mt-4 mb-5 bg-white rounded ">

            @if(!empty($company))
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="my-heading-text"> <p>Invitation Accepted</p> </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center green-icon-set">
                    <a class="fa fa-check fa-2x "></a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="my-heading-text2"> <p>Please reachout {{$company->company_name}} with your original documents</p> </div>
                </div>
            </div>

                <div class="row mt-4">
                    <div class="col-md-12 text-center green-icon-set">
                        <a style="    margin-left: 30px;" class="fa fa-arrow-left fa-2x "></a>
                        <a href="/jobseekerhome">   Back to Home</a>
                    </div>
                </div>



@endif

        </div>

    </div>


@endsection