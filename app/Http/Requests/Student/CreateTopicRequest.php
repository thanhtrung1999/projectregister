<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class CreateTopicRequest extends FormRequest
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
            'name' => 'required',
            'lecturer_id' => 'required|not_in:0',
            'date' => 'required|date',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên đề tài không được để trống',
            'lecturer_id.not_in' => 'Giáo viên bắt buộc phải chọn',
            'date.required' => 'Ngày gia hạn không được để trống',
            'date.date' => 'Giá trị của ngày gia hạn không hợp lệ'
        ];
    }
}
