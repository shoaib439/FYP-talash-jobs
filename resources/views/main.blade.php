<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Talash Jobs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="{{URL::asset ('/')}}" >
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('css/main.css')}}">
    <link rel="fo" href="{{url('fonts/raleway')}}">
    {{--<link rel="stylesheet" href="{{url('fontawesome/fontawesome.min.css')}}">--}}
    <link rel="stylesheet" href="{{url('font-awesome-4.7.0/css/font-awesome.min.css')}}">

    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->


    @section('headmeta') @show
</head>
<body>






@include('nav')

@yield('content')
@yield('company-section')
@yield('admin-section')
@yield('feedback')
@yield('searchVacancySection')
@yield('showNotificationPage')
@yield('vacancyDisplayPage')
@yield('InvitationAcceptedPage')
@yield('jsprofile')
@yield('searchVacancySectionforAll')




    {{--footer content--}}
@include('Footer')
    <!-- Footer -->


<script src="{{url('js/jquery.js')}}"></script>
<script src="{{url('js/popper.js')}}"></script>
<script src="{{url('js/bootstrap.js')}}"></script>
<script src="{{url('js/main.js')}}"></script>

<script src="{{url('js/validation-plugin.js')}}"></script>
<script src="{{url('js/rules.js')}}"></script>


</body>
</html>
