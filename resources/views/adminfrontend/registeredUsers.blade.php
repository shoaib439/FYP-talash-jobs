
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
                    <th>User id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>User Type</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>

                @foreach ($Users as $User)

                <tr>

                    <td>{{$User['id']}}</td>
                    <td>{{$User['display_name']}}</td>
                    <td>{{$User['email']}}</td>
                    <td>{{$User['type']}}</td>

                    {{--url('/delete/{{$User['id']')}}--}}

                    {{--{{url('/delete/'$User['id'])}}--}}
                    <td class="set-center"> <a href={{url('/delete/'.$User['id'])}}><button type="button" rel="tooltip" class="btn btn-danger btn-just-icon btn-sm"  >
                            <i class="fas fa-user-minus ju"></i>
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