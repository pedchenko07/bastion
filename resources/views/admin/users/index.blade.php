@extends('layouts.admin-app')
@section('content')

    <div class="content">
        <h2>Список пользователей</h2>
        <?php
        if(isset($_SESSION['answer'])){
            echo $_SESSION['answer'];
            unset($_SESSION['answer']);
        }
        ?>
        <a href="?view=add_user" class="admin-button">Добавить пользователя</a>

        <table class="tabl" cellspacing="1">
            <tr>
                <th class="number">№</th>
                <th class="str_name">Имя</th>
                <th class="str_name">Логин</th>
                <th class="str_name">mail</th>
                <th class="str_sort">Роль</th>
                <th class="str_action">Действие</th>
            </tr>
            <tr>
                <td>NUM</td>
                <td class="name_page">name</td>
                <td class="name_page">login</td>
                <td class="name_page">email</td>
                <td>name_role</td>
                <td><a href="?view=edit_user&amp;user_id=customer_id" class="edit-button">изменить</a>&nbsp; | &nbsp;<a href="?view=del_user&amp;user_id=customer_id" class="zakaz-del">удалить</a></td>
            </tr>
        </table>
        <a href="" class="admin-button">Добавить пользователя</a>
    </div>

@endsection