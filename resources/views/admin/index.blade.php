@extends('layouts.admin-app')
@section('content')

    <div class="content">
        <h2>Список страниц</h2>
        @if(Session::has('message'))
            <h3 class="success">{{Session::get('message')}}</h3>
        @endif
        @if(Session::has('error'))
            <h3 class="error">{{Session::get('error')}}</h3>
        @endif
        <a href="{{ route('admin.add_page') }}" class="admin-button">Добавить страницу</a>
        <table id="sort" class="tabl sort" cellspacing="1">
            <tr class="no_sort">
                <th class="number">№</th>
                <th class="str_name">Название страницы</th>
                <th class="str_sort">Сортировка</th>
                <th class="str_action">Действие</th>
            </tr>
            @foreach($pages as $page)
            <tr id="">
                <td class="position" style="width:25px">{{ $page->id }}</td>
                <td style="width:360px" class="name_page">{{ $page->title }}</td>
                <td class="position" style="width:80px">{{ $page->position }}</td>
                <td style="width:160px">
                    <a href="{{route('admin.edit_page',$page->id)}}" class="edit-button">изменить</a>&nbsp; | &nbsp;
                    <a href="{{ route('admin.delete_page', $page->id) }}" class="zakaz-del">удалить</a>
                </td>
            </tr>
            @endforeach
        </table>
        <a href="{{ route('admin.add_page') }}" class="admin-button">Добавить страницу</a>

    </div> <!-- .content -->
    <div class="load"></div> <!-- .load -->
    <div class="res"></div> <!-- .res -->

@endsection
