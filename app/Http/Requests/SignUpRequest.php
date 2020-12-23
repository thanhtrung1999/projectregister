<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
            'username'   => 'required|unique:users,username',
            'password'   => 'required|min:5|max:255',
            'email' => 'nullable|unique:users,email|email'
        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'Username không được để trống',
            'username.unique' => 'Username đã tồn tại',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu có độ dài lớn hơn 5',
            'password.max' => 'Mật khẩu có độ dài nhỏ hơn 255',
            'email.unique' => 'Email đã tồn tại',
            'email.email' => 'Email sai định dạng',
        ];
    }
}
