
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: shoaib--}}
 {{--* Date: 12/20/2018--}}
 {{--* Time: 11:51 AM--}}
 {{--*/--}}

@extends('main')
@section('feedback')
<div class="container">

    <div class="pt-4 mybox-shadow1">
        <h1 class="text-center my-heading-text pt-40 pb-40">Feedback</h1>
        <p  class="text-center text-info">Please provide your precious feedback with our team.</p>
        <div class="row" >
            <div class="col-md-6 offset-md-3"  >

                <form class="pb-40" action="{{url('/submitfeedback')}}" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name"  placeholder="Enter Name" >
                    </div>

                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" rows="5" id="suggestion"  name="suggestion"  placeholder="Your Suggestion"></textarea>
                    </div>
                    <div class="form-group" id="rating-ability-wrapper">
                        <label class="control-label" for="rating">
                            <span class="field-label-header">How would you like to rate us?</span><br>
                            <span class="field-label-info"></span>
                            <input type="hidden" id="selected_rating" name="selected_rating" value="" required="required">
                        </label>
                        <h2 class="bold rating-header">
                            <span class="selected-rating">0</span><small> / 5</small>
                        </h2>
                        <button type="button" class="btnrating btn btn-default " data-attr="1" id="rating-star-1">
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </button>
                        <button type="button" class="btnrating btn btn-default " data-attr="2" id="rating-star-2">
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </button>
                        <button type="button" class="btnrating btn btn-default " data-attr="3" id="rating-star-3">
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </button>
                        <button type="button" class="btnrating btn btn-default " data-attr="4" id="rating-star-4">
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </button>
                        <button type="button" class="btnrating btn btn-default " data-attr="5" id="rating-star-5">
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </button>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn my-btn btn-lg"  id="Cbtn" >Submit</button>
                    </div>

                    {{csrf_field()}}

                </form>

            </div>
        </div>
    </div>
</div>
@endsection