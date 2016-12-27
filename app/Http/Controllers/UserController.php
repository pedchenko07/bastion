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
            $this->data['error'] = $request->session()->pull('errors');
        };
        $this->data['brands'] = Brand::getBrandsAndSubBrands();
        $this->data['users'] = User::All();
        return view('admin.users.index', $this->data);
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

    public function edit(Request $request, $id)
    {
        $this->data['success'] = [];
        $this->data['error'] = [];
        if($request->session()->has('success')){
            $this->data['success'][] = $request->session()->pull('success');
        };
        if($request->session()->has('errors')){
            $this->data['error'] = $request->session()->pull('errors');
        };
        $user = User::find($id);
        if(is_null($user)) {
            return redirect()
                ->route('user.index')
                ->withErrors('Такого пользователя не существует!');
        }
        if($user->role_id != 1 && Auth::User()->role_id == 1) {
            return redirect()
                ->route('user.index')
                ->withErrors('У Вас нет прав редактировать этого пользователя!');
        }
        $this->data['user'] = $user;
        $this->data['brands'] = Brand::getBrandsAndSubBrands();
        return view('admin.users.edit', $this->data);
    }

    public function add(Request $request)
    {
        $this->data['success'] = [];
        $this->data['error'] = [];
        if($request->session()->has('success')){
            $this->data['success'][] = $request->session()->pull('success');
        };
        if($request->session()->has('errors')){
            $this->data['error'] = $request->session()->pull('errors');
        };
        return view('admin.users.add', $this->data);
    }

    public function delete($id)
    {
        $user = User::find($id);
        if(is_null($user)) {
            return redirect()->route('user.index')->withErrors('Такого пользователя не существует!');
        }
        if($user->role_id != 1) {
            return redirect()->route('user.index')->withErrors('Нельзя удалить этого пользователя!');
        }
        if($user->id == Auth::User()->id){
            return redirect()->route('user.index')->withErrors('Вы не можете удалить себя!');
        }

        if($user->delete()){
            return redirect()->route('user.index')->withSuccess('Пользователь успешно удален!');
        }
        return redirect()->route('user.index')->withErrors('При удалении пользователя возникла ошибка!');
    }

    public function saveNewUser(Request $request)
    {
        if(User::validateEmail($request->input('email'))){
            return back()->withInput()->withErrors('Пользователь с такой почтой уже сущетвует!');
        }
        if(User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ])) {
            return redirect()->route('user.index')->withSuccess('Пользователь успешно создан!');
        }
        return back()->withInput()->withErrors('При создании пользователя произошла ошибка!');
    }

    public function saveUser(Request $request)
    {
        $user = User::find($request->input('id'));
        if(is_null($user)){
            return back()->withInput()->withErrors('Не удалось обновить этого пользователя, его нет в базе данных!');
        }
        $user->name = $request->input('name');
        $user->password = bcrypt($request->input('password'));
        if($user->id != Auth::User()->id){
            if($user->role_id == 2) {
                return back()->withInput()->withErrors('У Вас нет прав на изменение этого пользователя!');
            }
            if($user->email != $request->input('email')){
                if(User::validateEmail($request->input('email'))){
                    return back()->withErrors('Пользователь с такой почтой уже существует');
                }
                $user->email = $request->input('email');
            }
        }
        if($user->update()){
            return back()->withSuccess('Успех, изменения приняты!');
        }
        return back()->withErrors('Не удалось изменить данные пользователя!');
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
