@extends('student.navbar')
@section('active-submit-report')
    class="active"
@endsection
@section('content')
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12sdf">
                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-dashboard"></i> Nộp báo cáo </li>
                </ol>
            </div>
        </div><!-- /.row -->

        @if (session('key'))
            <div class="alert alert-success" role="alert">
                {{ session('key') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="list-style: none; padding: 0">
                    @foreach ($errors->all() as $error)
                        <li><strong>{{ $error }}</strong></li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if($check_create_topic)
            <h3>Bạn chưa đăng ký đề tài</h3>
        @else
            @if($topic_latest->topic_status == 2 || (!empty($topic_latest->cancel_topic_status) && $topic_latest->cancel_topic_status == 1))
                <h3>Đề tài của bạn không được xác nhận hoặc đã được hủy</h3>
            @else
                @if(!empty($topic_latest->submit_report->status) && $topic_latest->submit_report->status == 1)
                    <h3>Bạn đã nộp báo cáo</h3>
                @else
                <div class="row">
                    <div class="col-lg-9">
                        <form action="{{ route('submit') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="inputUser" class="col-sm-2 col-form-label">Miêu tả</label>
                                <div class="col-sm-10">
                                    <input type="text" name="description" class="form-control" id="inputUser">
                                </div>
                            </div>

                            <input type="hidden" name="topic_id" value="{{ isset($topic_latest->id) ? $topic_latest->id : '' }}">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">File báo cáo</label>
                                <div class="col-sm-10">
                                    <input name="file" type="file">
                                </div>
                            </div>
                            <button type="reset" class="btn btn-danger">Hủy</button>
                            <button type="submit" class="btn btn-warning">Gửi</button>
                        </form>
                    </div>
                </div>
                @endif
            @endif
        @endif
    </div>
</div>
@endsection
