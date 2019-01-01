
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: shoaib--}}
 {{--* Date: 12/19/2018--}}
 {{--* Time: 10:12 PM--}}
 {{--*/--}}

        <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Dashboard</title>

    <!-- Bootstrap core CSS-->

    <link rel="stylesheet" href="{{url('adminstyles/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Custom fonts for this template-->

    <link rel="stylesheet" href="{{url('adminstyles/vendor/fontawesome-free/css/all.min.css')}}">

    <!-- Page level plugin CSS-->

    <link rel="stylesheet" href="{{url('adminstyles/vendor/datatables/dataTables.bootstrap4.css')}}">

    <!-- Custom styles for this template-->

    <link rel="stylesheet" href="{{url('adminstyles/css/sb-admin.css')}}">

</head>

<body id="page-top">

@include('adminfrontend.adminnav')

<div id="wrapper">

   @include('adminfrontend.adminsidebar')
    <div id="content-wrapper">

        <div class="container-fluid">

         @include('adminfrontend.admindashboard')

            <!-- Area Chart Example-->
            {{--<div class="card mb-3">--}}
                {{--<div class="card-header">--}}
                    {{--<i class="fas fa-chart-area"></i>--}}
                    {{--Area Chart Example</div>--}}
                {{--<div class="card-body">--}}
                    {{--<canvas id="myAreaChart" width="100%" height="30"></canvas>--}}
                {{--</div>--}}
                {{--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>--}}
            {{--</div>--}}

            <!-- DataTables Example -->
          @yield('registeredUsers')
            @yield('userscomplaints')
             @yield('usersfeedback')



        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
      @include('adminfrontend.adminfooter')

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{route('logout')}}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log Out</a>

                <form id="logout-form" action="{{route('logout')}}" method="post" style="display: none"> {{csrf_field()}} </form>

            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{url('adminstyles/vendor/jquery/jquery.min.js')}}"></script>

<script src="{{url('adminstyles/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->


<script src="{{url('adminstyles/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Page level plugin JavaScript-->
<script src="{{url('adminstyles/vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{url('adminstyles/vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{url('adminstyles/vendor/datatables/dataTables.bootstrap4.js')}}"></script>


<!-- Custom scripts for all pages-->
<script src="{{url('adminstyles/js/sb-admin.min.js')}}"></script>


<!-- Demo scripts for this page-->
<script src="{{url('adminstyles/js/demo/datatables-demo.js')}}"></script>
<script src="{{url('adminstyles/js/demo/chart-area-demo.js')}}"></script>



</body>

</html>
