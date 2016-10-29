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
                    <td class="name_page">{{$settings->name_shop}}</td>
                    <td><a href="{{route('settings.edit')}}" class="edit-button">Редактировать</a></td>
                </tr>
            </table>
        </div>

        <div style="border-bottom:1px solid #9A9B9B; border-top:1px solid #9A9B9B; padding-top:20px;">
            <h2>Редактирование способов доставки</h2>
            <a href="{{route('settings.delivery')}}" class="admin-button">Добавить способ доставки</a>
            <table class="tabl" cellspacing="1">
                <tr>
                    <th class="number">№</th>
                    <th class="str_name">Способ доставки</th>
                    <th class="str_action">Действие</th>
                </tr>
                @for($i = 0, $count = count($deliveryList); $i < $count; $i++)
                <tr>
                    <td>{{$i+1}}</td>
                    <td class="name_page">{{$deliveryList[$i]->name}}</td>
                    <td><a href="{{route('settings.delivery.edit', ['id' => $deliveryList[$i]->id])}}"
                           class="edit-button">изменить</a>&nbsp; | &nbsp;
                        <a href="{{route('settings.delivery.delete', ['id' => $deliveryList[$i]->id])}}"
                                                                             class="zakaz-del">удалить</a></td>
                </tr>
                @endfor
            </table>
            <a href="{{route('settings.delivery')}}" class="admin-button">Добавить способ доставки</a>
        </div>

        <div style="margin-top:20px; border-bottom:1px solid #9A9B9B;">
            <h2>Редактирование способов оплаты</h2>
            <a href="{{route('settings.oplata')}}" class="admin-button">Добавить способ оплаты</a>
            <table class="tabl" cellspacing="1">
                <tr>
                    <th class="number">№</th>
                    <th class="str_name">Способ оплаты</th>
                    <th class="str_action">Действие</th>
                </tr>
                @for($i = 0, $count = count($oplataList); $i < $count; $i++)
                <tr>
                    <td>{{$i+1}}</td>
                    <td class="name_page">{{$oplataList[$i]->name}}</td>
                    <td><a href="{{route('settings.oplata.edit', ['id' => $oplataList[$i]->id])}}" class="edit-button">изменить</a>&nbsp; | &nbsp;
                        <a href="{{route('settings.oplata.delete', ['id' => $oplataList[$i]->id])}}" class="zakaz-del">удалить</a></td>
                </tr>
                @endfor
            </table>
            <a href="{{route('settings.oplata')}}" class="admin-button">Добавить способ оплаты</a>
        </div>

    </div> <!-- .content -->

@endsection
