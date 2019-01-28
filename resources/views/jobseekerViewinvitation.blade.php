@extends('DashboardNav')

@section('viewinvitation')

    @if(empty($inviteData))
        <div class="container-fluid">
            <div class="container shadow-sms p-3 mt-3 pb-1 bg-white rounded ">
                <div class="row">

                    <div class="col-md-12">
                        <h2 class="text-center">No invitation Found</h2>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @foreach($inviteData as $key=>$vacancys)

    <div class="container-fluid ">

        <div class="container shadow-sms p-3 mb-5 bg-white rounded ">


            <div class="row">
                <div class="col-md-10">
                    <h5>Type :</h5><strong>{{$vacancys['vacancy']->vacancy_type}}</strong>
                </div>


                <div class="col-md-2 text-right ">
                    <a href="{{ url('/view/vacancy/'.$vacancys['vacancy']->id)  }}"  class="fa fa-eye green-icon-set set-margin"></a>
                </div>


            </div>


            <div class="row mt-4">
                <div class="col-sm-3">
                    <p> Title: {{$vacancys['vacancy']->title}}</p>
                    <p> company Name    :{{$vacancys['company']->company_name}}</p>
                    <p> Description    :{{$vacancys['vacancy']->description}}</p>
                    <p> Date    :{{$vacancys['vacancy']->last_date}}</p>

                </div>

                <div class="col-lg">

                    <div class="row applied-jobs-btns">

                        @if($vacancys['invite']->invite_accept=="0")
                        <div class="col-md-4">


                                <a  href="{{ url('/accept/invite/'.$vacancys['vacancy']->id.'/'.$vacancys['company']->id)  }}"  class="btn my-btn">Accept</a>


                        </div>

                            <div class="col-md-4">


                                <a href="{{ url('/reject/invite/'.$vacancys['vacancy']->id)  }}"  class="btn my-btn">Reject</a>
                            </div>
                        @endif

                            @if($vacancys['invite']->invite_accept=="1")
                                <div class="col-md-4">

                                    <button   disabled class="btn my-btn">Accepted</button>


                                </div>

                                <div class="col-md-4">


                                    <a href="{{ url('/reject/invite/'.$vacancys['vacancy']->id)  }}"  class="btn my-btn">Remove invite</a>
                                </div>
                            @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endforeach



@endsection