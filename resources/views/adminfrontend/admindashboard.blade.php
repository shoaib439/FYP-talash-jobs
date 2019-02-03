@extends('adminfrontend.adminpanel')
@section('admindashboard')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>

    </ol>

    {{--<div class="row">--}}

    {{--<div class="col-md-3 shadow-sms p-3 mb-5 bg-white rounded">--}}

    {{--<div class="my-text-small text-center"> Total Users</div>--}}
    {{--</div>--}}
    {{----}}
    {{--<div class="col-md-3 shadow-sms p-3 mb-5 bg-white rounded">--}}

    {{--<div class="my-text-small text-center"> Registered Jobseekers</div>--}}

    {{--</div>--}}

    {{--<div class="col-md-3 shadow-sms p-3 mb-5 bg-white rounded">--}}

    {{--<div class="my-text-small text-center"> Registered Company</div>--}}
    {{--</div>--}}

    {{--<div class="col-md-3 shadow-sms p-3 mb-5 bg-white rounded">--}}

    {{--<div class="my-text-small text-center"> Total Jobs Posted</div>--}}
    {{--</div>--}}


    {{--</div>--}}

    <div class="right_col text-center mb-3" role="main">
        <!-- top tiles -->
        <div class="row tile_count">
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count border-my">
                <span class="count_top " style=""><i class=" fa fa-users"></i><a class="main-heading-admin">  Total Users</a></span>
                <div class="count count-effect main-count-admin " data-count="{{ $data['user']}}">0</div>

            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count border-my">
                <span class="count_top" style=""><i class="fa fa-file"></i> <a class="main-heading-admin"> Jobs Posted</a></span>
                <div class="count count-effect main-count-admin" data-count="{{ $data['vacancy']}}">0</div>

            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count border-my">
                <span class="count_top"><i class="fa fa-user-friends"></i><a class="main-heading-admin"> Total Companies</a></span>
                <div class="count count-effect main-count-admin" data-count="{{ $data['company']}}">0</div>

            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> <a class="main-heading-admin">Total Job Seekers</a></span>
                <div class="count count-effect main-count-admin" data-count="{{ $data['jobseeker']}}">0</div>

            </div>

        </div>
    </div>

    {{--<!-- Area Chart -->--}}
    {{--<div class="card mb-3">--}}
        {{--<div class="card-header">--}}
            {{--<i class="fas fa-chart-area"></i>--}}
            {{--Area Chart </div>--}}
        {{--<div class="card-body">--}}
            {{--<canvas id="myAreaChart" width="100%" height="30"></canvas>--}}
        {{--</div>--}}
        {{--<div class="card-footer small text-muted">nn</div>--}}
    {{--</div>--}}

    <div class="col-md-12">
        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-pie"></i>
                    Pie Chart </div>
                <div class="card-body">
                    <canvas id="myPieChart" width="100%" height="100"></canvas>
                </div>
                <div class="card-footer small text-muted"><p id="date"></p></div>
            </div>
        </div>
    </div>

    <script src="{{url('adminstyles/vendor/chart.js/Chart.min.js')}}"></script>
    <script type="text/javascript">

        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["jobseeker", "vacancy", "company"],
                datasets: [{
                    data: [{{ $data['jobseeker'] }}, {{ $data['vacancy'] }}, {{ $data['company'] }}],
                    backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745'],
                }],
            },
        });


        document.getElementById("date").innerHTML = Date();
    </script>




    <!-- DataTables Example -->

    <!-- Icon Cards-->
    {{--<div class="row">--}}
    {{--<div class="col-xl-3 col-sm-6 mb-3">--}}
    {{--<div class="card text-white bg-primary o-hidden h-100">--}}
    {{--<div class="card-body">--}}
    {{--<div class="card-body-icon">--}}
    {{--<i class="fas fa-fw fa-comments"></i>--}}
    {{--</div>--}}
    {{--<div class="mr-5">26 New Messages!</div>--}}
    {{--</div>--}}
    {{--<a class="card-footer text-white clearfix small z-1" href="#">--}}
    {{--<span class="float-left">View Details</span>--}}
    {{--<span class="float-right">--}}
    {{--<i class="fas fa-angle-right"></i>--}}
    {{--</span>--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-xl-3 col-sm-6 mb-3">--}}
    {{--<div class="card text-white bg-warning o-hidden h-100">--}}
    {{--<div class="card-body">--}}
    {{--<div class="card-body-icon">--}}
    {{--<i class="fas fa-fw fa-list"></i>--}}
    {{--</div>--}}
    {{--<div class="mr-5">11 New Tasks!</div>--}}
    {{--</div>--}}
    {{--<a class="card-footer text-white clearfix small z-1" href="#">--}}
    {{--<span class="float-left">View Details</span>--}}
    {{--<span class="float-right">--}}
    {{--<i class="fas fa-angle-right"></i>--}}
    {{--</span>--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-xl-3 col-sm-6 mb-3">--}}
    {{--<div class="card text-white bg-success o-hidden h-100">--}}
    {{--<div class="card-body">--}}
    {{--<div class="card-body-icon">--}}
    {{--<i class="fas fa-fw fa-shopping-cart"></i>--}}
    {{--</div>--}}
    {{--<div class="mr-5">123 New Orders!</div>--}}
    {{--</div>--}}
    {{--<a class="card-footer text-white clearfix small z-1" href="#">--}}
    {{--<span class="float-left">View Details</span>--}}
    {{--<span class="float-right">--}}
    {{--<i class="fas fa-angle-right"></i>--}}
    {{--</span>--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-xl-3 col-sm-6 mb-3">--}}
    {{--<div class="card text-white bg-danger o-hidden h-100">--}}
    {{--<div class="card-body">--}}
    {{--<div class="card-body-icon">--}}
    {{--<i class="fas fa-fw fa-life-ring"></i>--}}
    {{--</div>--}}
    {{--<div class="mr-5">13 New Tickets!</div>--}}
    {{--</div>--}}
    {{--<a class="card-footer text-white clearfix small z-1" href="#">--}}
    {{--<span class="float-left">View Details</span>--}}
    {{--<span class="float-right">--}}
    {{--<i class="fas fa-angle-right"></i>--}}
    {{--</span>--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    @endsection
