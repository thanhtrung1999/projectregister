<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class Topic extends Model
{
    use Notifiable;

    protected $fillable = [
        'name',
        'student_id',
        'topic_status',
        'lecturer_id',
        'date',
        'cancel_topic_status',
        'extend_topic_status',
    ];

    public function lecturer() {
        return $this->belongsTo('App\Lecturer', 'lecturer_id');
    }

    public function student() {
        return $this->belongsTo('App\Student', 'student_id');
    }

    public function submit_report() {
        return $this->hasOne('App\SubmitReport', 'topic_id');
    }

    public function createTopic($request)
    {
        /**
         * (topic_status):
         * 0 - chờ duyệt(mặc định khi sinh viên đăng ký đề tài xong)
         * 1 - giáo viên đã duyệt
         * 2 - giáo viên đã hủy duyệt
         */
        $createtopic = new Topic();

        $createtopic->name = $request['name'];
        $createtopic->topic_code = $request['topic_code'];
        $createtopic->lecturer_id = $request['lecturer_id'];
        $createtopic->student_id = $request['student_id'];
        $createtopic->date = $request['date'];
        $createtopic->topic_status = 0;

        $createtopic->save();
    }

    public function getTopic()
    {
        return Topic::where('student_id', Auth::user()->student->id)->get();
    }

    public function getLatestTopic()
    {
        return Topic::latest('id')->where('student_id', Auth::user()->student->id)->first();
    }

    public function getExtendTopicStudent()
    {
        return Topic::where('student_id', Auth::user()->student->id)
            ->where('topic_status','>', 0)
            ->get();
    }

    public function getTopicStudent()
    {
        return Topic::where('lecturer_id', Auth::user()->lecturer->id)->get();
    }
    //lecture
    public function getTopicCancel()
    {
        return Topic::where('lecturer_id', Auth::user()->lecturer->id)
            ->where('cancel_topic_status','>=', 0)
            ->get();
    }
    public function getExtendTopic()
    {
        return Topic::where('lecturer_id', Auth::user()->lecturer->id)
            ->where('extend_topic_status','>=', 0)
            ->get();
    }
    public function getTopicById($id)
    {
        return Topic::findorfail($id);
    }
    public function checkCreateTopic($student_id)
    {
        /**
         * return true nếu sinh viên chưa đăng ký đề tài
         * return false nếu đã đăng ký
         */
        return Topic::all()->where('student_id', $student_id)->isEmpty();
    }

    public function cancelTopic($id)
    {
        /**
         * (cancel_topic_status):
         * NULL - chưa hủy(mặc định)
         * 0 - đã hủy và chờ giáo viên duyệt
         * 1 - giáo viên đã duyệt
         * 2 - giáo viên đã hủy duyệt
         */
        return Topic::where('id', $id)->update(['cancel_topic_status' => 0]);
    }

    public function postExtendTopic($id, $request)
    {
        /**
         * (extend_topic_status):
         * NULL - chưa gia hạn(mặc định)
         * 0 - đã gia hạn và chờ giáo viên duyệt
         * 1 - giáo viên đã duyệt
         * 2 - giáo viên đã hủy duyệt
         */
        $extend = Topic::findOrFail($id);
        $extend->extend_date = $request['extend_date'];
        $extend->extend_topic_status = 0;
        $extend->save();
    }

    public function confirmExtendTopic($id)
    {
        /**
         * (extend_topic_status):
         * NULL - chưa gia hạn(mặc định)
         * 0 - đã gia hạn và chờ giáo viên duyệt
         * 1 - giáo viên đã duyệt
         * 2 - giáo viên đã hủy duyệt
         */
        return Topic::where('id', $id)->update(['extend_topic_status' => 1]);
    }

    public function confirmCancelTopic($id)
    {
        /**
         * (cancel_topic_status):
         * NULL - chưa hủy(mặc định)
         * 0 - đã hủy và chờ giáo viên duyệt
         * 1 - giáo viên đã duyệt
         * 2 - giáo viên đã hủy duyệt
         */
        return Topic::where('id', $id)->update(['cancel_topic_status' => 1]);
    }

    public function confirmRegisterTopic($id)
    {
        /**
         * (topic_status):
         * 0 - chờ duyệt(mặc định khi sinh viên đăng ký đề tài xong)
         * 1 - giáo viên đã duyệt
         * 2 - giáo viên đã hủy duyệt
         */
        return Topic::where('id', $id)->update(['topic_status' => 1]);
    }

    public function cancelRegisterTopic($id)
    {
        /**
         * (topic_status):
         * 0 - chờ duyệt(mặc định khi sinh viên đăng ký đề tài xong)
         * 1 - giáo viên đã duyệt
         * 2 - giáo viên đã hủy duyệt
         */
        return Topic::where('id', $id)->update(['topic_status' => 2]);
    }

    public function cancelExtendTopic($id)
    {
        /**
         * (extend_topic_status):
         * NULL - chưa gia hạn(mặc định)
         * 0 - đã gia hạn và chờ giáo viên duyệt
         * 1 - giáo viên đã duyệt
         * 2 - giáo viên đã hủy duyệt
         */
        return Topic::where('id', $id)->update(['extend_topic_status' => 2]);
    }

    public function notConfirmCancelTopic($id)
    {
        /**
         * (cancel_topic_status):
         * NULL - chưa hủy(mặc định)
         * 0 - đã hủy và chờ giáo viên duyệt
         * 1 - giáo viên đã duyệt
         * 2 - giáo viên đã hủy duyệt
         */
        return Topic::where('id', $id)->update(['cancel_topic_status' => 2]);
    }
}
