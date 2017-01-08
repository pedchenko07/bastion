@extends('layouts.admin-app')
@section('content')

    <div class="content">
        <div class="slider-add-holder">
            <h2>Добавленные слайдеры</h2>
            @if(Session::has('message'))
                <h3 class="success">{{Session::get('message')}}</h3>
            @endif
            @if(Session::has('error'))
                <h3 class="error">{{Session::get('error')}}</h3>
            @endif
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
                @foreach($sliders as $slide)
                    <tr>
                        <td>{{ $slide->id }}</td>
                        <td>{{ $slide->name }}</td>
                        <td>{{ $slide->status == 1 ?  'Включен' : 'Выключен' }}</td>
                        <td><a href="">v</a></td>
                        <td>{{ $slide->type }}</td>
                        <td><a href="">х</a></td>
                    </tr>
                @endforeach
            </table>
            <a href="{{ route('sliders.create') }}">Добавить слайдер</a>
        </div>
    </div> <!-- .content -->


@endsection
