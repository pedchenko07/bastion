@extends('layouts.admin-app')
@section('content')

    <div class="content">
        <h2>Список категорий</h2>
        <?php
        if(isset($_SESSION['answer'])){
            echo $_SESSION['answer'];
            unset($_SESSION['answer']);
        }
        ?>
        <a href="?view=add_brand" class="admin-button">Добавить категорию</a>
        <table class="tabl" cellspacing="1">
            <tr>
                <th class="number">№</th>
                <th class="str_name">Название страницы</th>
                <th class="str_action">Действие</th>
            </tr>
            <tr>
                <td>NUM</td>
                <td class="name_page">NAME</td>
                <td><a href="?view=edit_brand&amp;brand_id=ID" class="edit-button">изменить</a>&nbsp; | &nbsp;<a href="?view=del_brand&amp;brand_id=ID" class="zakaz-del">удалить</a></td>
            </tr>
        </table>
        <a href="?view=add_brand" class="admin-button">Добавить категорию</a>

    </div> <!-- .content -->

@endsection
