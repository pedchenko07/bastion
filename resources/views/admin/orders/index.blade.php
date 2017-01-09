@extends('layouts.admin-app')
@section('content')

    <div class="content">
        <h2>Заказы <span class="small">(необработанные заказы подсвечены)</span></h2>
        @if($orders)
        <table class="tabl" cellspacing="1">
            <tr>
                <th class="number">№ заказа</th>
                <th class="str_name" style="width:280px;">Покупатель</th>
                <th class="str_sort">Дата</th>
                <th class="str_sort">Удалить</th>
                <th class="str_action">Просмотр</th>
            </tr>
            @foreach($orders as $order)
            <tr <?php if($order->status == 0) echo "class='highlight'"; ?> >
                <td>{{$order->id}}</td>
                <td class="name_page">{{$order->customer->name}}</td>
                <td>{{$order->date}}</td>
                <td><a href="{{route('order.delete', ['id' => $order->id])}}" class="zakaz-del">Удалить</a></td>
                <td><a href="{{route('order.show', ['id' => $order->id])}}" class="edit-button">Просмотреть</a></td>
            </tr>
            @endforeach
        </table>
        {{--// paginator--}}
        @else
        <div class="error">Нет необработанных заказов</div>
        @endif

    </div> <!-- .content -->
@endsection
