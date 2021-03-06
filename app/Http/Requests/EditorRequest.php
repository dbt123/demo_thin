<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditorRequest extends Request
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
            'username' => 'required|unique:admins,username',
            'password' => 'required',
            'confirm_pass' => 'required|same:password',
        ];
    }
    public function messages(){
        return [
            'username.required' => 'Bạn chưa nhập tên tài khoản',
            'username.unique' => 'Tài khoản đã được tạo',
            'password.required'  => 'Bạn chưa nhập mật khẩu',
            'confirm_pass.required' => 'Bạn chưa nhập lại mật khẩu',
            'confirm_pass.same' => 'Mật khẩu chưa trùng khớp nhau'
        ];
    }
}
