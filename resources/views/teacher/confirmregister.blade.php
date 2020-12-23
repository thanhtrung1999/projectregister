@extends('teacher.navbar')
@section('active-confirm-register')
    class="active"
@endsection
@section('content')
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12sdf">
                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-dashboard"></i> Duyệt đăng ký đề tài</li>
                </ol>
            </div>
        </div><!-- /.row -->
        <h1>Xác nhận đăng ký đề tài</h1>
        <div class="table-responsive">
            <table class="table table-bordered table-hover tablesorter">
                <thead>
                <tr>
                    <th width="5%">STT</th>
                    <th width="25%">Tiêu đề</th>
                    <th width="25%">Tên sinh viên</th>
                    <th width="10%">Ngày gửi</th>
                    <th width="10">Ngày gia hạn</th>
                    <th width="25%">Trạng thái</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($topics as $index => $topic)
                    <tr>
                        <td> {{ $index+1 }} </td>
                        <td>{{ $topic->name }}</td>
                        <td>{{ $topic->student->user->full_name }}</td>
                        <td>{{ \Carbon\Carbon::parse($topic->created_at)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($topic->date)->format('d/m/Y') }}</td>  Đề tài đã bị hủy
                        <td>
                            {{--
                            topic_status:
                             +/ 0 - chờ duyệt(mặc định khi sinh viên đăng ký đề tài xong)
                             +/ 1 - giáo viên đã duyệt
                             +/ 2 - giáo viên đã hủy duyệt
                            --}}
                            @if($topic->topic_status == 1)
                                <p>Đã Duyệt</p>
                            @elseif($topic->topic_status == 2)
                                <p>Đề tài không được xác nhận</p>
                            @elseif($topic->cancel_topic_status == 1)
                                <p>Đề tài đã bị hủy</p>
                            @else
                                <a class="btn btn-success" href="{{ route('postconfirmregister',['id' => $topic->id]) }}">Xác nhận</a>
                                <a class="btn btn-warning" href="{{ route('cancelregister',['id' => $topic->id]) }}">Không xác nhận</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
