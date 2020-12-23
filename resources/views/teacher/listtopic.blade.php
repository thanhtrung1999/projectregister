@extends('teacher.navbar')
@section('active-list-topic')
    class="active"
@endsection
@section('content')
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12sdf">
                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-dashboard"></i> Danh sách đề tài </li>
                </ol>
            </div>
        </div><!-- /.row -->

        @if (session('key'))
            <div class="alert alert-success" role="alert">
                {{ session('key') }}
            </div>
        @endif

        <div class="row">
            <h2>Danh sách đề tài</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover tablesorter">
                    <thead>
                        <tr>
                            <th width="10%">STT</th>
                            <th width="25%">Tiêu đề</th>
                            <th width="25%">Tên sinh viên</th>
                            <th width="10%">Lớp</th>
                            <th width="15%">Mã sinh viên</th>
                            <th width="15%">Ngày gửi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($topics as $index => $topic)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $topic->name }}</td>
                            <td>{{ $topic->student->user->full_name }}</td>
                            <td>{{ $topic->student->class }}</td>
                            <td>{{ $topic->student->student_code }}</td>
                            <td>{{ \Carbon\Carbon::parse($topic->created_at)->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
