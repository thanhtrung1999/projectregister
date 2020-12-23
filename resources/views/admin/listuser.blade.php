@extends('admin.navbar')
@section('active-list-user')
    class="active"
@endsection
@section('content')
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12sdf">
                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-dashboard"></i> Quản lý tài khoản</li>
                </ol>
            </div>
        </div><!-- /.row -->

        @if (session('key'))
            <div class="alert alert-success" role="alert">
                {{ session('key') }}
            </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <h2>Danh sách tài khoản</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover tablesorter">
                        <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Họ và tên</th>
                            <th>Email</th>
                            <th>Tên Đăng Nhập</th>
                            <th>Ngày tạo</th>
                            <th>Ngày cập nhật mới nhất</th>
                            <th>Quyền</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($user as $index => $users)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $users->full_name }}</td>
                                <td>{{ $users->email }}</td>
                                <td>{{ $users->username }}</td>
                                <td>{{ \Carbon\Carbon::parse($users->created_at)->format('d/m/Y') }}</td>
                                <td>{{empty($users->updated_at) ? '' : \Carbon\Carbon::parse($users->updated_at)->format('d/m/Y') }}</td>
                                @if($users->user_type == 1 )
                                    <td>Sinh viên</td>
                                @elseif($users->user_type == 2 )
                                    <td>Giáo viên</td>
                                @else
                                    <td>Admin</td>
                                @endif
                                <td>
                                    <a class="btn btn-danger" href="{{ route('deleteuser', ['id' => $users->id]) }}" onclick="return confirm('Bạn chắc chắn muốn xóa user này không?')">Xóa</a>
                                    <a class="btn btn-warning" href="{{ route('getupdate', ['id' => $users->id]) }}" >Sửa</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.row -->
    </div><!-- /#wrapper -->
</div>
@endsection
