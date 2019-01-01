
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: shoaib--}}
 {{--* Date: 12/29/2018--}}
 {{--* Time: 6:51 PM--}}
 {{--*/--}}


<!-- DataTables Example -->

@extends('adminfrontend.adminpanel')

@section('registeredUsers')
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-user-friends"></i>
        Registered Users</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Jobs Posted</th>
                    <th>Account Status</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>

                @foreach ($Users as $User)

                <tr>

                    <td>{{$User['display_name']}}</td>
                    <td>{{$User['type']}}</td>
                    <td>{{$User['id']}}</td>
                    <td>Active</td>
                    {{--url('/delete/{{$User['id']')}}--}}

                    {{--{{url('/delete/'$User['id'])}}--}}
                    <td class="set-center"> <a href={{url('/delete/'.$User['id'])}}><button type="button" rel="tooltip" class="btn btn-danger btn-just-icon btn-sm"  >
                            <i class="fas fa-user-minus ju"></i>
                        </button> </a>
                        <button type="button" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" >
                            <i class="fas fa-eye "></i>
                        </button>
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