@extends('layouts.admin-app')
@section('content')

    <div class="content">
        <h2>Информеры</h2>
        <?php
        if(isset($_SESSION['answer'])){
            echo $_SESSION['answer'];
            unset($_SESSION['answer']);
        }
        ?>
        <a href="{{route('user.informerAdd')}}" class="admin-button">Добавить информер</a>
        <div id="sotr_inf">

            <div id="1" class="ss">
                <div class="inf-down">
                    <p class="toggle"></p>
                    <h3>Informer Name</h3>
                    <p class="inf-link"><a href="?view=edit_informer&amp;informer_id=1" class="edit-button">изменить</a>&nbsp; | &nbsp;<a href="?view=del_informer&amp;informer_id=1" class="zakaz-del">удалить</a></p>
                </div> <!-- .inf-down -->
                <div class="inf-page">
                    <table id="1" class="inf-tabl" cellspacing="1">
                        <tr class="no_sort">
                            <th class="number">№</th>
                            <th class="str_name">Название страницы</th>
                            <th class="str_sort">Сортировка</th>
                            <th class="str_action">Действие</th>
                        </tr>

                        <tr id="1">
                            <td class="position" style="width:25px">pos</td>
                            <td style="width:320px" class="name_page">name</td>
                            <td class="position" style="width:80px">pos</td>
                            <td style="width:160px"><a href="?view=edit_link&amp;link_id=1" class="edit-button">изменить</a>&nbsp; | &nbsp;<a href="?view=del_link&amp;link_id=1" class="zakaz-del">удалить</a></td>
                        </tr>
                        <tr id="2">
                            <td class="position" style="width:25px">pos</td>
                            <td style="width:320px" class="name_page">name</td>
                            <td class="position" style="width:80px">pos</td>
                            <td style="width:160px"><a href="?view=edit_link&amp;link_id=1" class="edit-button">изменить</a>&nbsp; | &nbsp;<a href="?view=del_link&amp;link_id=1" class="zakaz-del">удалить</a></td>
                        </tr>

                        <tr>
                            <td colspan="4"><h3>В этом информере страниц нет</h3></td>
                        </tr>

                    </table>
                    <a href="?view=add_link&amp;informer_id=1" class="admin-button">Добавить страницу в информер</a>
                </div> <!-- .inf-page -->
            </div> <!-- .ss -->

        </div> <!-- #sotr_inf -->
        <a href="{{route('user.informerAdd')}}" class="admin-button">Добавить информер</a>

    </div> <!-- .content -->
    <div class="load"></div> <!-- .load -->
    <div class="res"></div> <!-- .res -->

@endsection
