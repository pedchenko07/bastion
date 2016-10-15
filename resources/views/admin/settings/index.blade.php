@extends('layouts.admin-app')
@section('content')

    <div class="content">

        <h2>Настройки интернет-магазина</h2>

        <div style="border-top:1px solid #9A9B9B; padding:20px 0 20px 0;">
            <h2>Редактирование настроек интернет-магазина</h2>
            <!--<a href="?view=add_settings" class="admin-button">Добавить настройку сайта</a> -->
            <table class="tabl" cellspacing="1">
                <tr>
                    <th class="str_name">Название интернет-магазина</th>
                    <th class="str_action">Действие</th>
                </tr>
                <tr>
                    <td class="name_page">NAME_SHOP</td>
                    <td><a href="?view=edit_settings&amp;setting_id=setting_id" class="edit-button">Редактировать</a></td>
                </tr>
            </table>
        </div>

        <div style="border-bottom:1px solid #9A9B9B; border-top:1px solid #9A9B9B; padding-top:20px;">
            <h2>Редактирование способов доставки</h2>
            <a href="?view=add_dostavka" class="admin-button">Добавить способ доставки</a>
            <table class="tabl" cellspacing="1">
                <tr>
                    <th class="number">№</th>
                    <th class="str_name">Способ доставки</th>
                    <th class="str_action">Действие</th>
                </tr>
                <tr>
                    <td>NUM</td>
                    <td class="name_page">NAME</td>
                    <td><a href="?view=edit_dostavka&amp;dostavka_id=DOUSTAVKA_ID" class="edit-button">изменить</a>&nbsp; | &nbsp;<a href="?view=del_dostavka&amp;dostavka_id=dostavka_id" class="zakaz-del">удалить</a></td>
                </tr>
            </table>
            <a href="?view=add_dostavka" class="admin-button">Добавить способ доставки</a>
        </div>

        <div style="margin-top:20px; border-bottom:1px solid #9A9B9B;">
            <h2>Редактирование способов оплаты</h2>
            <a href="?view=add_oplata" class="admin-button">Добавить способ оплаты</a>
            <table class="tabl" cellspacing="1">
                <tr>
                    <th class="number">№</th>
                    <th class="str_name">Способ оплаты</th>
                    <th class="str_action">Действие</th>
                </tr>
                <tr>
                    <td>NUMBER</td>
                    <td class="name_page">NAME</td>
                    <td><a href="?view=edit_oplata&amp;oplata_id=ID" class="edit-button">изменить</a>&nbsp; | &nbsp;<a href="?view=del_oplata&amp;oplata_id=OPLATA_ID" class="zakaz-del">удалить</a></td>
                </tr>
            </table>
            <a href="?view=add_oplata" class="admin-button">Добавить способ оплаты</a>
        </div>

    </div> <!-- .content -->

@endsection
