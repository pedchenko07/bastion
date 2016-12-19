@extends('layouts.admin-app')
@section('content')

    <div class="content">
        <div class="slider-add-holder">
            <h2>Добавленные слайдеры</h2>
            <table class="tabl">
                <thead>
                <tr>
                    <td><b>#id</b></td>
                    <td><b>Название категории</b></td>
                    <td><b>Статус</b></td>
                    <td><b>Изменить статус</b></td>
                    <td><b>Тип слайдера</b></td>
                    <td><b>Удалить</b></td>
                </tr>
                </thead>
                <tr>
                    <td>ID</td>
                    <td>NAME</td>
                    <td>STATUS ? 'Включён' : 'Выключен' </td>
                    <td><a href="?view=slider&approve=ID&status=STATUS">v</a></td>
                    <td>TYPE</td>
                    <td><a href="?view=sliders&remove=ID">х</a></td>
                </tr>
            </table>
            <a href="?view=add_slider">Добавить слайдер</a>
        </div>
    </div> <!-- .content -->


@endsection
