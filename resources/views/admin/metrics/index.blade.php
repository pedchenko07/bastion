@extends('layouts.admin-app')
@section('content')
    <div class="content">
        <div class="metrics-content">
            <h1>Метрика</h1>
            <table class="tabl">
                <thead>
                <tr>
                    <td><b>#id</b></td>
                    <td><b>Название метрики</b></td>
                    <td><b>Статус</b></td>
                    <td><b>Изменить</b></td>
                    <td><b>Удалить</b></td>
                </tr>
                </thead>
                @foreach($items as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{($item->status?'Включён':'Выключен')}}</td>
                    <td>
                        <a class="approve-review" href="{{route('metrics.status',
                        ['id' => $item->id, 'status' => $item->status])}}"></a>
                    </td>
                    <td><a class="remove-review" href="{{route('metrics.delete', $item->id)}}">х</a></td>
                </tr>
                @endforeach
            </table>
            <a href="{{route('metrics.add')}}">Добавить метрику</a>
        </div>

    </div> <!-- .content -->


@endsection
