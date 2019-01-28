
{{--/**--}}
{{--* Created by PhpStorm.--}}
{{--* User: shoaib--}}
{{--* Date: 1/22/2019--}}
{{--* Time: 2:37 AM--}}
{{--*/--}}

@extends('companynav')

@section('jsprofilee')

    <div class="container-fluid ">

        <div class="container shadow-sms p-3 mt-5 mb-3  bg-white rounded ">
            @if(empty($vacancy))
                <h3 class="text-center">You've not posted any vacancy.</h3>
            @endif
            <form method="post" action="{{ url('invite')  }}">
                @csrf
                <input type="hidden" name="jobseeker_id" value="{{ $id }}" />
                <select class="form-control" name="invite_vacancy">
                    <option selected disabled>Select your Posted vacancy</option>
                    @foreach($vacancy as $vac)
                        <option value="{{ $vac->id }}">{{ $vac->title }}</option>
                    @endforeach;
                </select>
                <input type="submit" class="btn my-btn2 text-center" value="Submit"/>
            </form>
        </div>

    </div>
@endsection