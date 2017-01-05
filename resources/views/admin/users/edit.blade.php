@extends('layouts.admin-app')
@section('content')
<div class="content">

    <h2>Редактирование пользователя</h2>
    @foreach($success as $mesage)
        <h4 class="success">{{$mesage}}</h4>
    @endforeach
    @if(count($error) > 0)
        @foreach($error->all() as $mesage)
            <h4 class="error">{{$mesage}}</h4>
        @endforeach
    @endif
    <form action="{{ route('user.save') }}" method="post">
        {{ csrf_field() }}
        <input class="head-text" type="text" name="id" value="{{ $user->id }}" hidden />
        <table class="add_edit_page" cellspacing="0" cellpadding="0">
            <tr>
                <td class="add-edit-txt">Имя пользователя:</td>
                <td><input class="head-text" type="text" name="name" value="{{ $user->name }}" /></td>
            </tr>
            <tr>
                <td class="add-edit-txt">Email пользователя:</td>
                <td>
                    @if($user->id != Auth::User()->id)
                        <input class="head-text" type="email" name="email" value="{{ $user->email }}" />
                    @else
                        <input class="head-text" type="email" name="email" value="{{ $user->email }}" disabled="" /> <span class="small">Собственный логин изменить нельзя</span>
                    @endif
                </td>
            </tr>
            <tr>
                <td class="add-edit-txt">Новый пароль:</td>
                <td><input class="head-text" min="6" type="text" name="password" /></td>
            </tr>
        </table>

        <input type="submit" value="Сохранить" class="admin-button" />

    </form>

</div>
@endsection