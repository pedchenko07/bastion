@extends('layouts.admin-app')
@section('content')

<div class="content">

    <h2>Добавление способа оплаты</h2>
    @if(isset($error))
    <h3>{{$error}}</h3>
    @endif
    <form action="" method="post">
        {{ csrf_field() }}
        <table class="add_edit_page" cellspacing="0" cellpadding="0">
            <tr>
                <td class="add-edit-txt">Название способа оплаты:</td>
                <td><input class="head-text" type="text" name="name"
                           @if(isset($item))
                           value="{{$item->name}}"
                           @endif
                           required/></td>
            </tr>
        </table>

        <input type="submit" value="Сохранить" class="admin-button" />
        <input type="reset" value="Очистить" class="admin-button" />
        <a href="{{route('settings.index')}}" class="admin-button">Назад</a>
    </form>

</div>

@endsection
