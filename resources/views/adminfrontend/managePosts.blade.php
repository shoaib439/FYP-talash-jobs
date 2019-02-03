
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: shoaib--}}
 {{--* Date: 1/31/2019--}}
 {{--* Time: 4:24 PM--}}
 {{--*/--}}

@extends('adminfrontend.adminpanel')

@section('managePosts')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-user-friends"></i>
            Manage Posts</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>company id</th>
                        <th>Vacancy id</th>
                        <th>Vacancy title</th>
                        <th>Vacancy Type</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($posts  as $key=> $vac)
                        <tr>

                            <td>{{$vac['user']}}</td>
                            <td>{{$vac['vacancy']->id}}</td>
                            <td>{{$vac['vacancy']->title}}</td>
                            <td>{{$vac['vacancy']->vacancy_type}}</td>

                            {{--{{url('/delete/'$User['id'])}}--}}
                            <td class="set-center"> <a href={{url('/deletevacancy/'.$vac['vacancy']->id)}}><button type="button" rel="tooltip" class="btn btn-danger btn-just-icon btn-sm">
                                        <i class="fas fa-user-minus ju"></i>
                                    </button> </a>

                                <a href={{url('/view/vacancy/'.$vac['vacancy']->id)}}><button type="button" rel="tooltip" class="btn btn-success btn-just-icon btn-sm ml-sm-2">
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