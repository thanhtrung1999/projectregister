<?php

namespace App\Http\Controllers;

use App\Http\Requests\Lecture\UpdateInforRequest;
use App\Topic;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class LecturerController extends Controller
{
    protected $topic;
    protected $user;

    public function __construct(Topic $topic, User $user)
    {
        $this->topic = $topic;
        $this->user = $user;
    }

    public function getInfor()
    {
        $infor = User::where('id', Auth::user()->id)->get();
        return view('teacher.information', ['infor' => $infor]);
    }

    public function editInfor()
    {
        $editinfor =  User::where('id', Auth::user()->id)->get();
        return view('teacher.updateinformation', ['editinfor' => $editinfor]);
    }

    public function updateInfor(UpdateInforRequest $request)
    {
        $updateinfor = $request->all();
        $this->user->updateInfor($updateinfor, Auth::user()->id);
        return redirect()->route('getinforlecture')->with('key', 'Cập nhật thông tin thành công');
    }

//    list topic
    public function getTopicStudent()
    {
        return view('teacher.listtopic', ['topics' => $this->topic->getTopicStudent()]);
    }

//    gv  duyet dang ky de tai
    public function getConfirmRegisterTopic()
    {
        return view('teacher.confirmregister', ['topics' => $this->topic->getTopicStudent()]);
    }

    public function confirmRegisterTopic($id)
    {
        $this->topic->confirmRegisterTopic($id);
//        return redirect()->route('confirmextend'); ?????
        return redirect()->route('confirmregister');
    }

    public function cancelRegisterTopic($id)
    {
        $this->topic->cancelRegisterTopic($id);
        return redirect()->route('confirmregister');
    }

//    gv duyet gia han de tai
    public function getConfirmExtendTopic()
    {
        return view('teacher.confirmextend', ['topics' => $this->topic->getExtendTopic()]);
    }

    public function confirmExtendTopic($id)
    {
        $this->topic->confirmExtendTopic($id);
        return redirect()->route('confirmextend');
    }

    public function cancelExtendTopic($id)
    {
        $this->topic->cancelExtendTopic($id);
        return redirect()->route('confirmextend');
    }

//    gv duyet huy de tai
    public function getConfirmCancelTopic()
    {
        return view('teacher.confirmcancel', ['topics' => $this->topic->getTopicCancel()]);
    }

    public function confirmCancelTopic($id)
    {
        $this->topic->confirmCancelTopic($id);
        return redirect()->route('confirmcancel');
    }

    public function notConfirmCancelTopic($id)
    {
        $this->topic->notConfirmCancelTopic($id);
        return redirect()->route('confirmcancel');
    }
}
