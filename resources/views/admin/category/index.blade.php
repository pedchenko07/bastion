@extends('layouts.admin-app')
@section('content')

    <div class="content">
        <h2>Список категорий</h2>

        <a href="{{ route('category.add') }}" class="admin-button">Добавить категорию</a>
        <table class="tabl" cellspacing="1">
            <tr>
                <th class="number">№</th>
                <th class="str_name">Название страницы</th>
                <th class="str_action">Действие</th>
            </tr>
            @foreach($brands as $brand)

            <tr>
                <td>{{ $brand->id }}</td>
                <td class="name_page">{{ $brand->name }}</td>
                <td>
                    <a href="" class="edit-button">изменить</a>&nbsp; | &nbsp;
                    <a href="" class="zakaz-del">удалить</a>
                </td>
            </tr>
            @endforeach
        </table>
        <a href="{{ route('category.add') }}" class="admin-button">Добавить категорию</a>

    </div> <!-- .content -->

@endsection
