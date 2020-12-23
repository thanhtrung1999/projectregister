<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'full_name',
        'date_of_birth',
        'phone_number',
        'user_type'
    ];

    public function student()
    {
        return $this->hasOne('App\Student');
    }

    public function admin()
    {
        return $this->hasOne('App\Admin');
    }

    public function lecturer() {
        return $this->hasOne('App\Lecturer');
    }

    public function getUser()
    {
        return User::all();
    }

    public function createUser($request)
    {
        $addUser = new User();

        $addUser->username = $request['username'];
        $addUser->password = Hash::make($request['password']);
        $addUser->full_name = $request['full_name'];
        $addUser->email = $request['email'];
        //$addUser->user_type = $request['type'];
        $addUser->user_type = 1; //user_type mặc định là 1, r admin sẽ phân quyền lại

        $addUser->save();

        $addStudent = new Student();
        $addStudent->user_id = $addUser->id;
        $addStudent->save();
        // insert table student
        /*if ($addUser->user_type == 1) {
            $addStudent = new Student();
            $addStudent->user_id = $addUser->id;
            $addStudent->save();
        }

        // insert table lecture
        if ($addUser->user_type == 2) {
            $addLecture = new Lecturer();
            $addLecture->user_id = $addUser->id;
            $addLecture->save();
        }*/
    }

    public function updateUser($id, $request)
    {
        $updateUser = User::findOrFail($id);

        $updateUser->username = $request['username'];
        $updateUser->password = Hash::make($request['password']);
        $updateUser->full_name = $request['full_name'];
        $updateUser->email = $request['email'];
        $updateUser->updated_at = Carbon::now();
        $updateUser->user_type = $request['type'];

        $updateUser->save();
    }

    public function deleteUser($id)
    {
        $deleteUser = User::findOrFail($id);
        $deleteUser->delete();
    }
    public function updateInfor($request, $id)
    {
        $updateUser = User::findOrFail($id);
        $updateUser->username = $request['username'];
        $updateUser->password = Hash::make($request['password']);
        $updateUser->full_name = $request['full_name'];
        $updateUser->email = $request['email'];
        $updateUser->date_of_birth = $request['date_of_birth'];
        $updateUser->phone_number = $request['phone_number'];
        $updateUser->save();
    }
    public function updateStudent($request, $id)
    {
        $updateUser = User::findOrFail($id);

        $updateUser->username = $request['username'];
        $updateUser->password = Hash::make($request['password']);
        $updateUser->full_name = $request['full_name'];
        $updateUser->email = $request['email'];
        $updateUser->date_of_birth = $request['date_of_birth'];
        $updateUser->phone_number = $request['phone_number'];
        $updateUser->save();
        $student = Student::where('user_id', $id)->first();

        $updateStudent = Student::findOrFail($student->id);
        $updateStudent->student_code = $request['student_code'];
        $updateStudent->school_year = $request['school_year'];
        $updateStudent->class = $request['class'];
        $updateStudent->save();
    }
}
