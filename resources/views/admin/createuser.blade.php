@extends('admin.navbar')
@section('active-create-user')
    class="active"
@endsection
@section('content')
<div id="wrapper">
    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12sdf">
                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-dashboard"></i> Tạo tài khoản mới </li>
                </ol>
            </div>
        </div><!-- /.row -->
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul style="list-style: none; padding: 0">
                        @foreach ($errors->all() as $error)
                            <li><strong>{{ $error }}</strong></li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-lg-9">
                <form action="{{ route('postcreateuser') }}" method="post">
                    @csrf

                    <div class="form-group row">
                        <label for="inputUser" class="col-sm-2 col-form-label">Tên Đăng Nhập*</label>
                        <div class="col-sm-10">
                            <input type="text" name="username" class="form-control" id="inputUser">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Mật Khẩu*</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control" id="inputPassword" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputFullName" class="col-sm-2 col-form-label">Họ Và Tên*</label>
                        <div class="col-sm-10">
                            <input type="text" name="full_name" class="form-control" id="inputFullName">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email*</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" class="form-control" id="inputEmail">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputRole" class="col-sm-2 col-form-label">Phân Quyền</label>
                        <div class="col-sm-10">
                            <select name="type" class="form-control">
                                <option value="1">Sinh Viên</option>
                                <option value="2">Giáo Viên</option>
                            </select>
                        </div>
                    </div>

                    <button type="reset" class="btn btn-danger">Hủy</button>
                    <button type="submit" class="btn btn-warning">Thêm tài khoản</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
