@extends('layout.index')
@section('navbar')
<div id="wrapper">
    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li @yield('active-info')><a href="{{ route('getinforlecture') }}"><i class="fa fa-dashboard"></i> Thông tin cá nhân </a></li>
                <li @yield('active-list-topic')><a href="{{ route('listtopic') }}"><i class="fa fa-dashboard"></i> Danh sách đề tài </a></li>
                <li @yield('active-confirm-register')><a href="{{ route('confirmregister') }}"><i class="fa fa-bar-chart-o"></i>Duyệt đăng ký đề tài</a></li>
                <li @yield('active-confirm-extend')><a href="{{ route('confirmextend') }}"><i class="fa fa-bar-chart-o"></i>Duyệt gia hạn đề tài</a></li>
                <li @yield('active-confirm-cancel')><a href="{{ route('confirmcancel') }}"><i class="fa fa-bar-chart-o"></i>Duyệt hủy đề tài</a></li>
                <li><a href="{{ route('logout') }}"><i class="fa fa-table"></i> Đăng xuất </a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</div>
@endsection
