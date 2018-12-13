@extends('DashboardNav')

@section('savedjobs')


    <div class="container-fluid ">

        <div class="container shadow-sms p-3 mb-5 bg-white rounded ">

            <div class="row">
                <div class="col-sm-2">
                    <h5>Type :</h5>
                </div>

                <div class="col-lg">

                    <div class="row saved-jobs-remove-icon ">

                        <div class="col-md-4">

                            <i class="fa fa-remove"></i>


                        </div>


                    </div>
                </div>



            </div>

            <div class="row mt-4">
                <div class="col-sm-3">
                    <p> Title</p>
                    <p> company Name    </p>
                    <p> Description    </p>


                </div>


            </div>

        </div>
    </div>




@endsection