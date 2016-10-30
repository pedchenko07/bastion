<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class StoreSettingsPostRequest extends Request
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
            'name_shop' =>  'required',
            'email'     =>  'email|required',
            'baseimg'   =>  'mimes:jpeg,png',
        ];
    }

    public function messages()
    {
        return [
            'name_shop.required' => 'Название магазина обязательно должно быть заполнено',
            'email'  => 'Введите корректный email, например myEmail@domain.com',
            'mimes'  => 'Файл должен быть разрешения .jpg или .png'
        ];
    }
}
