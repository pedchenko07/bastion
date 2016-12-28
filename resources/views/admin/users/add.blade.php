@extends('layouts.admin-app')
@section('content')
    <div class="content">
        <h2>Создание нового пользователя</h2>
        @foreach($success as $mesage)
            <h4 class="success">{{$mesage}}</h4>
        @endforeach
        @if(count($error) > 0)
            @foreach($error->all() as $mesage)
                <h4 class="error">{{$mesage}}</h4>
            @endforeach
        @endif
        <form action="{{ route('user.new.save') }}" METHOD="post">
            {{ csrf_field() }}
            <table class="add_edit_page" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="add-edit-txt">Имя пользователя:</td>
                    <td><input class="head-text" type="text" name="name"
                               value="{{ old('name') }}" required/></td>
                </tr>
                <tr>
                    <td class="add-edit-txt">Email пользователя:</td>
                    <td>
                        <input class="head-text" type="email" name="email"
                               value="{{ old('email') }}"/>
                    </td>
                </tr>
                <tr>
                    <td class="add-edit-txt">Новый пароль:</td>
                    <td><input class="head-text" min="6" type="password" name="password" required/></td>
                </tr>
            </table>
            <input type="submit" value="Сохранить" class="admin-button"/>
        </form>
    </div>
@endsection