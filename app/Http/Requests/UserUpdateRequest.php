<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserUpdateRequest extends Request
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
            'name' =>  'required',
            'password'   =>  'min:8',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'У пользователя должно быть указано имя',
            'password.min'  => 'Пароль должен быть больше 8 символов'
        ];
    }
}
