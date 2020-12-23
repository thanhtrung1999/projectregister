<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\UpdateInforRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class AdminController extends Controller
{
    //
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getInfor()
    {
        $infor = User::where('id', Auth::user()->id)->get();
        return view('admin.information', ['infor' => $infor]);
    }

    public function editInfor()
    {
        $editinfor =  User::where('id', Auth::user()->id)->get();
        return view('admin.updateinformation', [
            'editinfor' => $editinfor
        ]);
    }
    public function updateInfor(UpdateInforRequest $request)
    {
        $updateinfor = $request->all();
        $this->user->updateInfor($updateinfor, Auth::user()->id);
        return redirect()->route('getinforadmin')->with('key', 'Cập nhật thông tin thành công');
    }
    public function getUser()
    {
        $user = $this->user->getUser();
        return view('admin.listuser', compact('user'));
    }
    public function create()
    {
        return view('admin.createuser');
    }

    public function createUser(CreateUserRequest $request)
    {
        $user = $request->all();

        $this->user->createUser($user);

        return redirect()->route('getuser')->with('key', 'Thêm người mới thành công');
    }
    public function getUpdateUser($id)
    {
        $id = User::findOrFail($id);
        return view('admin.updateuser', ['id' => $id]);
    }
    public function updateUser(UpdateUserRequest $request, $id)
    {
        $updateUser = $request->all();
        $this->user->updateUser($id, $updateUser);
        return redirect()->route('getuser')->with('key', 'Sửa thông tin người dùng thành công');
    }
    public function deleteUser($id)
    {
        $this->user->deleteUser($id);
        return redirect()->route('getuser')->with('key', 'Đã xóa thành viên');
    }
}
