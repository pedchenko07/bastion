@extends('layouts.admin-app')
@section('content')
    <div class="content">

        @if($order)
        <h2>Заказ № {{$order->id}} ({{($order->status)?'Обработан':'Не обработан'}})</h2>
        <p>
            @if($order->status == 0)
                <a class="zakaz-ok" href="{{route('order.status', ['id' => $order->id])}}">Подтвердить заказ</a> |
            @endif
                <a class="zakaz-del" href="{{route('order.delete', ['id' => $order->id])}}">Удалить заказ</a>
        </p>

        <br />
        <table class="tabl" cellspacing="1">
            <tr>
                <th class="number">№</th>
                <th class="str_name" style="width:280px;">Название товара</th>
                <th class="str_sort">Цена</th>
                <th class="str_action">Количество</th>
            </tr>
            <?php $i = 1; $total_sum = 0; ?>
            @foreach($order->zakazTovar as $item)
            <tr>
                <td><?=$i?></td>
                <td class="name_page">{{$item->name}}</td>
                <td><?php $myNumber = $item->price; echo number_format( $myNumber, 0, ',', ' ' ); ?></td>
                <td>{{$item->quantity}}</td>
            </tr>
            <?php $i++; $total_sum += $item->price * $item->quantity; ?>
            @endforeach
        </table>
        <h2>Общая цена заказа: <span style="color:#E3320F;"><?php $myNumber = $total_sum; echo number_format( $myNumber, 0, ',', ' ' ); ?></span></h2>
        <h2>Дата заказа: <span style="color:#E3320F;">{{$order->date}}</span></h2>
        <h2>Способ доставки: <span style="color:#E3320F;">{{$order->dostavka->name}}</span></h2>
        <h2>Способ оплаты: <span style="color:#E3320F;">{{$order->oplata->name}}</span></h2>

        <h2>Данные покупателя:</h2>

        <table class="tabl" cellspacing="1">
            <tr>
                <th class="number" style="width:140px;">ФИО</th>
                <th>Город</th>
                <th class="str_name" style="width:200px;">Адрес или отделение Новой Почты</th>
                <th class="str_sort">Для связи</th>
                <th class="str_action">Примечание</th>
            </tr>
            <tr>
                <td>{{$order->customer->name}}</td>
                <td>{{$order->customer->city}}</td>
                <td class="name_page">{{$order->customer->adres}}</td>
                <td>Email: {{$order->customer->email}}<br />Телефон: {{$order->customer->phone}}</td>
                <td style="text-align:left;">{{$order->prim}}</td>
            </tr>
        </table>

            <p>
                @if($order->status == 0)
                    <a class="zakaz-ok" href="{{route('order.status', ['id' => $order->id])}}">Подтвердить заказ</a> |
                @endif
                <a class="zakaz-del" href="{{route('order.delete', ['id' => $order->id])}}">Удалить заказ</a>
            </p>

        @else
        <div class="error">Заказа с таким номером нет</div>
        @endif
    </div> <!-- .content -->
@endsection
