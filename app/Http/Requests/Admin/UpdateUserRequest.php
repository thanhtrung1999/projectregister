<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => "required|min:3|max:50|unique:users,username,{$this->id}",
            'password' => 'required|min:5',
            'full_name' => 'required',
            'email' => "nullable|email|unique:users,email,{$this->id}",
        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'Username không được để trống',
            'username.min' => 'Username tối thiểu 3 ký tự',
            'username.max' => 'Username tối đa 50 ký tự',
            'username.unique' => 'Username đã tồn tại',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu có độ dài lớn hơn 5',
            'full_name.required' => 'Họ và tên không được để trống',
            'email.email' => 'Email sai định dạng',
            'email.unique' => 'Email đã tồn tại',
        ];
    }
}
