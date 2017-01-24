<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class OrderRequest extends Request
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
            'email' => 'email|required',
            'phone' => 'required|min:5|max:25',
            'city' => 'required',
            'address' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Пожалуйста, укажите Ваше имя.',
            'email'  => 'Пожалуйста, введите корректный email, например myEmail@domain.com',
            'phone.required' => 'Пожалуйста, введите номер телефона',
            'city.required' => 'Пожалуйста, введите город получателя',
            'address.required' => 'Пожалуйста, введите номер почтового отделения или адрес',

        ];
    }
}
