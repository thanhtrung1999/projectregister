@extends('teacher.navbar')
@section('active-info')
    class="active"
@endsection
@section('content')
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12sdf">
                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-dashboard"></i>Thông tin tài khoản</li>
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
                <div class="form-group row">
                    <label for="inputUser" class="col-sm-2 col-form-label">Tên Đăng Nhập</label>
                    <div class="col-sm-10">
                        {{ $infor[0]->username }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputUser" class="col-sm-2 col-form-label">Họ và tên</label>
                    <div class="col-sm-10">
                        {{ $infor[0]->full_name }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputUser" class="col-sm-2 col-form-label">Ngày sinh</label>
                    <div class="col-sm-10">
                        {{empty($infor[0]->date_of_birth) ? '' : \Carbon\Carbon::parse($infor[0]->date_of_birth)->format('d/m/Y') }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputUser" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        {{ $infor[0]->email }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputUser" class="col-sm-2 col-form-label">Số điện thoại</label>
                    <div class="col-sm-10">
                        {{ $infor[0]->phone_number }}
                    </div>
                </div>
                <a class="btn btn-warning" href="{{ route('inforlecture') }}">Sửa</a>
            </div>
        </div>
    </div>
</div>
@endsection
