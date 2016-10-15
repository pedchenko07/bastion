@extends('layouts.admin-app')
@section('content')

    <div class="content">
        <h2>Заказы <span class="small">(необработанные заказы подсвечены)</span></h2>
        <?php
        if(isset($_SESSION['answer'])){
            echo $_SESSION['answer'];
            unset($_SESSION['answer']);
        }
        ?>
        <?php if(1): ?>
        <table class="tabl" cellspacing="1">
            <tr>
                <th class="number">№ заказа</th>
                <th class="str_name" style="width:280px;">Покупатель</th>
                <th class="str_sort">Дата</th>
                <th class="str_sort">Удалить</th>
                <th class="str_action">Просмотр</th>
            </tr>
            <tr <?php if(0 == 0) echo "class='highlight'"; ?> >
                <td>order_id</td>
                <td class="name_page">name</td>
                <td>date</td>
                <td><a href="?view=orders&del_order=order_id" class="zakaz-del">Удалить</a></td>
                <td><a href="?view=show_order&amp;order_id=order_id" class="edit-button">Просмотреть</a></td>
            </tr>
        </table>
        {{--// paginator--}}
        <?php else: ?>
        <div class="error">Нет необработанных заказов</div>
        <?php endif; ?>

    </div> <!-- .content -->


@endsection
