<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
        if ($this->method === self::METHOD_POST) {
            return [
                'name'     => 'required',
                'password' => 'required'
            ];
        } else {
            return [];
        }
    }

    /**
     * return validation message
     *
     * @return string[]
     */
    public function messages()
    {
        return [
            'name.required'     => '请输入正确账号',
            'password.required' => '账号或密码错误',
        ];
    }
}
