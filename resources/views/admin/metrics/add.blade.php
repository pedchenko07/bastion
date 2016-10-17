@extends('layouts.admin-app')
@section('content')

    <div class="content">
        <h1>Добавить метрику</h1>
        @if($empty)
        <h3 class="error">Вы не заполнили форму!</h3>
        @endif
        <form method="post" action="{{route('metrics.save')}}" class="form-slider">
            {{ csrf_field() }}
            <table class="tabl">
                <tr>
                    <td>
                        <b>Название метрики</b>
                    </td>
                    <td>
                        <input type="text" class="head-text" name="name" value="{{$name}}"/>
                    </td>
                </tr>

                <tr>
                    <td>
                        <b>Код</b>
                    </td>
                    <td>
                        <textarea cols="50" rows="15" name="code">{{$code}}</textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="admin-button" type="submit" value="Добавить"/>
                    </td>
                    <td>
                        <input type="hidden" name="status" value="0"></input>
                    </td>
                </tr>
            </table>
        </form>

    </div> <!-- .content -->


@endsection
