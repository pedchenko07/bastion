@extends('layouts.admin-app')
@section('content')

    <div class="content">
        <h2>Список пользователей</h2>
        @foreach($success as $mesage)
            <h4 class="success">{{$mesage}}</h4>
        @endforeach
        @if(count($error) > 0)
            @foreach($error->all() as $mesage)
                <h4 class="error">{{$mesage}}</h4>
            @endforeach
        @endif
        <a href="{{ route('user.add') }}" class="admin-button">Добавить пользователя</a>

        <table class="tabl" cellspacing="1">
            <tr>
                <th class="number">№</th>
                <th class="str_name">Имя</th>
                <th class="str_name">mail</th>
                <th class="str_sort">Роль</th>
                <th class="str_action">Действие</th>
            </tr>
            @foreach($users as $i => $user)
            <tr>
                <td>{{$i + 1}}</td>
                <td class="name_page">{{$user->name}}</td>
                <td class="name_page">{{$user->email}}</td>
                <td>@if($user->role_id == 1)
                        Администратор
                        @else
                        Дирректор
                @endif</td>
                <td>
                    @if($user->role_id == 1 || Auth::user()->role_id == 2)
                    <a href="{{ route('user.edit',['id' => $user->id]) }}" class="edit-button">изменить</a>&nbsp;
                        @if(Auth::user()->id != $user->id)
                        | &nbsp;<a href="{{ route('user.delete',['id' => $user->id]) }}" class="zakaz-del" onclick="return confirm( '{{'Действительно хотите удалить пользователя '.$user->name}}') ? true : false;">удалить</a>
                        @endif
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
        <a href="{{ route('user.add') }}" class="admin-button">Добавить пользователя</a>
    </div>

@endsection