
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: shoaib--}}
 {{--* Date: 2/3/2019--}}
 {{--* Time: 8:49 PM--}}
 {{--*/--}}

@extends('adminfrontend.adminpanel')

@section('companyRequestPage')
    @if(empty($companyRequest))
        <div class="container-fluid">
            <div class="container shadow-sms p-3 mb-4 mt-3 pb-1 bg-white rounded ">
                <div class="row">

                    <div class="col-md-12">
                        <h2 class="text-center">No company Approval request Found</h2>
                    </div>
                </div>
            </div>
        </div>
    @endif



    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-user-friends"></i>
            Company Approval and Verification</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Company id</th>
                        <th>Company Name</th>
                        <th>Email</th>
                        <th>Account Status</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>



                    @foreach ($companyRequest as $Request)



                        <tr>

                            <td>{{$Request['id']}}</td>
                            <td>{{$Request['display_name']}}</td>
                            <td>{{$Request['email']}}</td>


                            <td>  @if($Request['active_status']==0)
                                    <button type="button" rel="tooltip" class="btn btn-danger btn-just-icon btn-sm"  >
                                        Deactivated
                                    </button>
                                    @endif   </td>

                            {{--url('/delete/{{$User['id']')}}--}}

                            {{--{{url('/delete/'$User['id'])}}--}}
                            <td class="set-center"> <a href={{url('/approve/companyRequest/'.$Request['id'])}}><button type="button" rel="tooltip" class="btn btn-success btn-just-icon btn-sm"  >
                                       Activate
                                    </button> </a>

                                <a class="border-left" href={{url('/adminview/company/'.$Request['id'])}}><button type="button" rel="tooltip" class="btn btn-primary btn-just-icon btn-sm"  >
                                        <i class="fas fa-eye"></i>
                                    </button> </a>

                            </td>



                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted"></div>
    </div>



    @endsection