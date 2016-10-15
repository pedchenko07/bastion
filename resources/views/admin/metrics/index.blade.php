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
                <tr>
                    <td>ID</td>
                    <td>NAME</td>
                    <td>'Включён' : 'Выключен'</td>
                    <td>
                        <a class="approve-review" href="?view=metrics&metric_approve=ID&status=STATUS"></a>
                    </td>
                    <td><a href="?view=metrics&metric_del=ID">х</a></td>
                </tr>
            </table>
            <a href="?view=add_metric">Добавить метрику</a>
            <a href="?view=add_metric">Добавить метрику</a>
        </div>

    </div> <!-- .content -->


@endsection
