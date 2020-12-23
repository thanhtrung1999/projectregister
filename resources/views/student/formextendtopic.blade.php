@extends('student.navbar')
@section('active-extend-topic')
    class="active"
@endsection
@section('content')
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12sdf">
                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-dashboard"></i>Gia Hạn Đề Tài</li>
                </ol>
            </div>
        </div><!-- /.row -->
        <form action="{{ route('postextend', ['id' => $extendtopic->id]) }}" method="post">
            @csrf
            <div class="col-lg-12">
                <div class="form-group row">
                    <label for="inputUser" class="col-sm-2 col-form-label">Tên Đề Tài</label>
                    <div class="col-sm-10">
                        {{ $extendtopic->name }}
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="form-group row">
                    <label for="inputUser" class="col-sm-2 col-form-label">Giáo Viên Hướng Dẫn</label>
                    <div class="col-sm-10">
                        {{ $extendtopic->lecturer->user->full_name }}
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="form-group row">
                    <label for="inputUser" class="col-sm-2 col-form-label">Ngày Gia Hạn</label>
                    <div class="col-sm-10">
                        {{ \Carbon\Carbon::parse($extendtopic->date)->format('d/m/Y') }}
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="form-group row">
                    <label for="inputUser" class="col-sm-2 col-form-label">Ngày gia hạn mới</label>
                    <div class="col-sm-10">
                        <input type="date" name="extend_date" value="">
                    </div>
                </div>
            </div>
            <button type="reset" class="btn btn-danger">Hủy</button>
            <button type="submit" class="btn btn-warning">Submit</button>
        </form>
    </div>
</div>
@endsection
