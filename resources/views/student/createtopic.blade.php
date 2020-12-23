@extends('student.navbar')
@section('active-create-topic')
    class="active"
@endsection
@section('content')
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12sdf">
                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-dashboard"></i> Đăng ký đề tài</li>
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

        <div class="row">
            <div class="col-lg-9">
{{--                {{ dd($check_create_topic) }}--}}
                @if($check_create_topic)
                    <form action="{{ route('posttopic') }}" method="post">
                    @csrf
                        <div class="form-group row">
                            <label for="inputUser" class="col-sm-2 col-form-label">Tên Đề Tài*</label>
                            <div class="col-sm-10">
                                <textarea style="resize: vertical" name="name" class="form-control" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputUser" class="col-sm-2 col-form-label">Mã đề tài</label>
                            <div class="col-sm-10">
                                <input type="text" name="topic_code" class="form-control" id="topic-code">
                            </div>
                        </div>

                        @if(isset($lecturers) && !empty($lecturers))
                            <div class="form-group row">
                                <label for="inputTeacherCode" class="col-sm-2 col-form-label">Giáo Viên Hướng Dẫn *</label>
                                <div class="col-sm-10">
                                    <select name="lecturer_id" class="form-control">
                                        <option value="0">--Chọn giáo viên--</option>
                                        @foreach($lecturers as $lecturer)
                                            <option value="{{ $lecturer->id }}">{{ $lecturer->user->full_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif

                        <div class="form-group row">
                            <label for="inputDate" class="col-sm-2 col-form-label">Ngày gia hạn</label>
                            <div class="col-sm-10">
                                <input type="date" name="date" class="form-control" id="inputDate">
                            </div>
                        </div>
                        <input type="hidden" name="student_id" value="{{ Auth::user()->student->id }}">

                        <button type="reset" class="btn btn-danger">Hủy</button>
                        <button type="submit" class="btn btn-warning">Submit</button>
                </form>
                @elseif($check_create_topic == false)
                    @if($topic_latest->topic_status == 2 || (!empty($topic_latest->cancel_topic_status) && $topic_latest->cancel_topic_status == 1))
                        <form action="{{ route('posttopic') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="inputUser" class="col-sm-2 col-form-label">Tên Đề Tài*</label>
                                <div class="col-sm-10">
                                    <textarea style="resize: vertical" name="name" class="form-control" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputUser" class="col-sm-2 col-form-label">Mã đề tài</label>
                                <div class="col-sm-10">
                                    <input type="text" name="topic_code" class="form-control" id="topic-code">
                                </div>
                            </div>

                            @if(isset($lecturers) && !empty($lecturers))
                                <div class="form-group row">
                                    <label for="inputTeacherCode" class="col-sm-2 col-form-label">Giáo Viên Hướng Dẫn *</label>
                                    <div class="col-sm-10">
                                        <select name="lecturer_id" class="form-control">
                                            <option value="0">--Chọn giáo viên--</option>
                                            @foreach($lecturers as $lecturer)
                                                <option value="{{ $lecturer->id }}">{{ $lecturer->user->full_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif

                            <div class="form-group row">
                                <label for="inputDate" class="col-sm-2 col-form-label">Ngày gia hạn</label>
                                <div class="col-sm-10">
                                    <input type="date" name="date" class="form-control" id="inputDate">
                                </div>
                            </div>
                            <input type="hidden" name="student_id" value="{{ Auth::user()->student->id }}">

                            <button type="reset" class="btn btn-danger">Hủy</button>
                            <button type="submit" class="btn btn-warning">Submit</button>
                        </form>
                    @else
                        <h2>Bạn đã đăng ký đề tài</h2>
                    @endif
                @else
                    <h2>Bạn đã đăng ký đề tài</h2>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
