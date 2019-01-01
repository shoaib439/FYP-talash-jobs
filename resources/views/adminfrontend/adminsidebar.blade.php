
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: shoaib--}}
 {{--* Date: 12/23/2018--}}
 {{--* Time: 10:47 PM--}}
 {{--*/--}}

<!-- Sidebar -->


<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="{{url('adminpanel')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Manage</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Actions:</h6>
            <a class="dropdown-item" href="{{url('registeredUsers')}}">Registered Users</a>
            <a class="dropdown-item" href="blank.html">Manage posts</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{url('usersComplaints')}}">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Complaints</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{url('usersFeedback')}}">
            <i class="fa fa-comment"></i>
            <span>Feedback</span></a>
    </li>
</ul>
