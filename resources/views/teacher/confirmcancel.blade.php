@extends('teacher.navbar')
@section('active-confirm-cancel')
    class="active"
@endsection
@section('content')
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12sdf">
                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-dashboard"></i> Duyệt hủy đề tài </li>
                </ol>
            </div>
        </div><!-- /.row -->
        <h2>Hủy đề tài</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover tablesorter">
                <thead>
                <tr>
                    <th width="5%">STT</th>
                    <th width="30%">Tiêu đề</th>
                    <th width="30%">Tên sinh viên</th>
                    <th width="10%">Ngày gửi</th>
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
                        <td>
                            {{--
                            cancel_topic_status:
                             +/ NULL - chưa hủy(mặc định)
                             +/ 0 - đã hủy và chờ giáo viên duyệt
                             +/ 1 - giáo viên đã duyệt
                             +/ 2 - giáo viên đã hủy yêu cầu hủy duyệt
                            --}}
                            @if(!is_null($topic->cancel_topic_status))
                                @if($topic->cancel_topic_status == 0)
                                    <a style="margin-bottom: 5px" onclick="return confirm('Bạn có chắc chắn cho phép sinh viên hủy đề tài này?')" class="btn btn-danger" href="{{ route('postconfirmcancel', ['id' => $topic->id]) }}">Xác nhận hủy</a>
                                    <a class="btn btn-warning" href="{{ route('cancelextend',['id' => $topic->id]) }}">Không cho phép hủy đề tài</a>
                                @elseif($topic->cancel_topic_status == 1)
                                    <p>Đã duyệt hủy đề tài</p>
                                @elseif($topic->cancel_topic_status == 2)
                                    <p>Đã hủy yêu cầu hủy đề tài</p>
                                @endif
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
