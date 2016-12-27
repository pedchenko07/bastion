@extends('layouts.admin-app')
@section('content')

    <div class="content">
        <h2>Список новостей</h2>
        @if(isset($success))
        <h3 class='success'>{{$success}}</h3>
        @endif
        @if(isset($error))
            <h3 class='error'>{{$error}}</h3>
        @endif
        <a href="{{route('news.add')}}" class="admin-button">Добавить новость</a>
        <table class="tabl" cellspacing="1">

            <tr>
                <th class="number">ID</th>
                <th class="str_name">Название страницы</th>
                <th class="str_sort">Дата</th>
                <th class="str_action">Действие</th>
            </tr>
            @foreach($news as $new)
            <tr>
                <td>{{$new->id}}</td>
                <td class="name_page">{{$new->title}}</td>
                <td>{{$new->date}}</td>
                <td><a href="{{route('news.edit', ['id' => $new->id])}}" class="edit-button">изменить</a>&nbsp; | &nbsp;<a href="{{route('news.delete', ['id' => $new->id])}}" class="zakaz-del">удалить</a></td>
            </tr>
                @endforeach
        </table>
        <a href="{{route('news.add')}}" class="admin-button">Добавить новость</a>
        {{--pginator--}}
    </div> <!-- .content -->

@endsection
