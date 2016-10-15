@extends('layouts.admin-app')
@section('content')

    <div class="content">
        <h2>Список новостей</h2>
        <?php
        if(isset($_SESSION['answer'])){
            echo $_SESSION['answer'];
            unset($_SESSION['answer']);
        }
        ?>
        <a href="?view=add_news" class="admin-button">Добавить новость</a>
        <table class="tabl" cellspacing="1">
            <tr>
                <th class="number">№</th>
                <th class="str_name">Название страницы</th>
                <th class="str_sort">Дата</th>
                <th class="str_action">Действие</th>
            </tr>
            <tr>
                <td>NUM</td>
                <td class="name_page">title</td>
                <td>date</td>
                <td><a href="?view=edit_news&amp;news_id=news_id" class="edit-button">изменить</a>&nbsp; | &nbsp;<a href="?view=del_news&amp;news_id=news_id" class="zakaz-del">удалить</a></td>
            </tr>
            <tr>
                <td>NUM</td>
                <td class="name_page">title</td>
                <td>date</td>
                <td><a href="?view=edit_news&amp;news_id=news_id" class="edit-button">изменить</a>&nbsp; | &nbsp;<a href="?view=del_news&amp;news_id=news_id" class="zakaz-del">удалить</a></td>
            </tr>
        </table>
        <a href="?view=add_news" class="admin-button">Добавить новость</a>
        {{--pginator--}}
    </div> <!-- .content -->

@endsection
