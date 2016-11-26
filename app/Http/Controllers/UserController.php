<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;
use Validator;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $this->data['success'] = [];
        $this->data['error'] = [];
        if($request->session()->has('success')){
            $this->data['success'][] = $request->session()->pull('success');
        };
        if($request->session()->has('errors')){
//            dd($request->session()->pull('errors'));
            $this->data['error'] = $request->session()->pull('errors');
        };
        $this->data['brands'] = Brand::getBrandsAndSubBrands();
        return view('admin.users.self', $this->data);
    }

    public function saveNewEmail(Request $request, User $user)
    {
        $messages = [
            'email.required' => 'Поле email, обязательное для заполнения!',
            'email.email' => 'Введите корректный адрес электронной почты'
        ];

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ],$messages);

        if($validator->fails()) {
            return redirect()->route('user.index')
                ->withErrors($validator)
                ->withInput();
        }
        $user = Auth::User();
        $user->email = $request->input('email');
        $user->update();
        return redirect()->route('user.index')->withSuccess('Email обновлен');
    }

    public function informer()
    {
        return view('admin.informers.index', $this->data);
    }

    public function informerAdd()
    {
        return view('admin.informers.add', $this->data);
    }

    public function informerEdit($id)
    {
        return view('admin.informers.add', $this->data);
    }
    public function informerDelete($id)
    {
        return view('admin.informers.index', $this->data);
    }
}
