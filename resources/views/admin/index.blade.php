@extends('layouts.admin-app')
@section('content')

    <div class="content">
        <h2>Список страниц</h2>
        <a href="?view=add_page" class="admin-button">Добавить страницу</a>
        <table id="sort" class="tabl sort" cellspacing="1">
            <tr class="no_sort">
                <th class="number">№</th>
                <th class="str_name">Название страницы</th>
                <th class="str_sort">Сортировка</th>
                <th class="str_action">Действие</th>
            </tr>

            <tr id="">
                <td class="position" style="width:25px">1</td>
                <td style="width:360px" class="name_page">some name</td>
                <td class="position" style="width:80px">0</td>
                <td style="width:160px"><a href="?view=edit_page&amp;page_id=" class="edit-button">изменить</a>&nbsp; | &nbsp;<a href="?view=del_page&amp;page_id=" class="zakaz-del">удалить</a></td>
            </tr>

        </table>
        <a href="?view=add_page" class="admin-button">Добавить страницу</a>

    </div> <!-- .content -->
    <div class="load"></div> <!-- .load -->
    <div class="res"></div> <!-- .res -->

@endsection
