<?php

namespace App\Http\Requests\Lecture;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInforRequest extends FormRequest
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
            'username' => "required|min:3|max:50|unique:users,username,{$this->user()->id}",
            'password' => 'required|min:5',
            'full_name' => 'required',
            'email' => "nullable|email|unique:users,email,{$this->user()->id}",
            'phone_number' => 'nullable|numeric|min:10|max:20',
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
            'phone_number.numeric' => 'Số điện thoại sai định dạng',
            'phone_number.min' => 'Số điện thoại tối thiểu 10 ký tự',
            'phone_number.max' => 'Số điện thoại tối đa 20 ký tự',
        ];
    }
}
