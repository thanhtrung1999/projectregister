@extends('layout.index')
@section('navbar')
<div id="wrapper">
    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">

                <li @yield('active-info')><a href="{{ route('getinforstudent') }}"><i class="fa fa-dashboard"></i> Thông tin cá nhân</a></li>
                <li @yield('active-status-topic')><a href="{{ route('statustopic') }}"><i class="fa fa-bar-chart-o"></i> Trạng thái đề tài </a></li>
                <li @yield('active-create-topic')><a href="{{ route('gettopic') }}"><i class="fa fa-table"></i> Đăng ký đề tài</a></li>
                <li @yield('active-extend-topic')><a href="{{ route('extendTopic') }}"><i class="fa fa-edit"></i> Gia hạn đề tài</a></li>
                <li @yield('active-cancel-topic')><a href="{{ route('getcancel') }}"><i class="fa fa-edit"></i> Hủy đề tài</a></li>
                <li @yield('active-submit-report')><a href="{{ route('submitreport') }}"><i class="fa fa-edit"></i> Nộp báo cáo </a></li>
                <li>
                    <a href="{{ route('logout') }}"><i class="fa fa-table"></i> Đăng xuất </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</div>
@endsection
