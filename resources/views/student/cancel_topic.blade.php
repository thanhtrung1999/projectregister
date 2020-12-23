@extends('student.navbar')
@section('active-cancel-topic')
    class="active"
@endsection
@section('content')
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12sdf">
                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-dashboard"></i> Hủy đề tài</li>
                </ol>
            </div>
        </div><!-- /.row -->

        <div class="row">
            <h2>Hủy đề tài</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover tablesorter">
                    <thead>
                    <tr>
                        <th width="5%">STT</th>
                        <th width="40%">Tiêu đề</th>
                        <th width="25%">Giáo viên hướng dẫn</th>
                        <th width="15%">Ngày gửi</th>
                        <th width="15%">Trạng thái</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($canceltopic as $index => $canceltopics)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $canceltopics->name }}</td>
                            <td>{{ $canceltopics->lecturer->user->full_name }}</td>
                            <td>{{ \Carbon\Carbon::parse($canceltopics->created_at)->format('d/m/Y') }}</td>
                            <td>
                                {{--
                                cancel_topic_status:
                                 +/ NULL - chưa hủy(mặc định)
                                 +/ 0 - đã hủy và chờ giáo viên duyệt
                                 +/ 1 - giáo viên đã duyệt
                                 +/ 2 - giáo viên đã hủy duyệt
                                --}}
                                @if(!is_null($canceltopics->cancel_topic_status))
                                    @if($canceltopics->cancel_topic_status == 0)
                                        <p>Chờ duyệt hủy đề tài</p>
                                    @elseif($canceltopics->cancel_topic_status == 1)
                                        <p>Đề tài đã được hủy</p>
                                    @elseif($canceltopics->cancel_topic_status == 2)
                                        <p>Đề tài không được hủy</p>
                                    @endif
                                @elseif($canceltopics->topic_status == 2)
                                    <p>Đề tài không được duyệt</p>
                                @else
                                    <a class="btn btn-danger" href="{{ route('canceltopic', ['id' => $canceltopics->id]) }}" onclick="return confirm('Bạn có chắc chắn muốn hủy đề tài?')">Hủy</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
