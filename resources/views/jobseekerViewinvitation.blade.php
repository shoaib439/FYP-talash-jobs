@extends('DashboardNav')

@section('viewinvitation')

    <div class="container-fluid ">

        <div class="container shadow-sms p-3 mb-5 bg-white rounded ">

            <div class="row">
                <div class="col-sm-2">
                    <h5>Type :</h5>
                </div>



            </div>

            <div class="row mt-4">
                <div class="col-sm-3">
                    <p> Title</p>
                    <p> company Name    </p>
                    <p> Description    </p>
                    <p> Date    </p>

                </div>

                <div class="col-lg">

                    <div class="row applied-jobs-btns">

                        <div class="col-md-4">

                            <button type="submit" class="btn my-btn">Accept</button>

                        </div>
                        <div class="col-md-4">


                            <button type="submit" class="btn my-btn">Reject</button>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>




@endsection