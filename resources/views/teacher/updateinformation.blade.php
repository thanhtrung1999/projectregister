@extends('teacher.navbar')
@section('active-info')
    class="active"
@endsection
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12sdf">
                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-dashboard"></i>Cập nhật thông tin</li>
                </ol>
            </div>
        </div><!-- /.row -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="list-style: none; padding: 0">
                    @foreach ($errors->all() as $error)
                        <li><strong>{{ $error }}</strong></li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-9">
                <form action="{{ route('updateinforlecture') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="inputUser" class="col-sm-2 col-form-label">Tên Đăng Nhập*</label>
                        <div class="col-sm-10">
                            <input type="text" name="username" value="{{ $editinfor[0]->username }}" class="form-control" id="inputUser">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Mật Khẩu*</label>
                        <div class="col-sm-10">
                            <input type="password" value="{{ $editinfor[0]->password }}" name="password" class="form-control" id="inputPassword" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputFullName" class="col-sm-2 col-form-label">Họ Và Tên*</label>
                        <div class="col-sm-10">
                            <input type="text" name="full_name" value="{{ $editinfor[0]->full_name }}" class="form-control" id="inputFullName">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputFullName" class="col-sm-2 col-form-label">Ngày sinh*</label>
                        <div class="col-sm-10">
                            <input type="date" name="date_of_birth" value="{{ $editinfor[0]->date_of_birth }}" class="form-control" id="inputFullName">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email*</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" value="{{ $editinfor[0]->email }}" class="form-control" id="inputEmail">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Số điện thoại</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone_number" value="{{ $editinfor[0]->phone_number }}" class="form-control" id="inputEmail">
                        </div>
                    </div>

                    <button type="reset" class="btn btn-danger">Hủy</button>
                    <button type="submit" class="btn btn-warning">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
</div>
