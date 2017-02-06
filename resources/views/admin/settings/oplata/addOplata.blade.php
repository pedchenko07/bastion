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
                <td><input class="form-control" type="text" name="name" placeholder="введите способ оплаты"
                           @if(isset($item))
                           value="{{$item->name}}"
                           @endif
                           required/></td>
            </tr>
            <tr>
                <td class="add-edit-txt">Реквизиты способа оплаты:</td>
                <td>
                        <textarea placeholder="Введите текст для отображения во время выбора этого сопоба доставки"
                                  class="form-control" name="comment" rows="4">{{isset($item)?$item->comment:''}}</textarea>
                </td>
            </tr>
        </table>

        <input type="submit" value="Сохранить" class="admin-button" />
        <input type="reset" value="Очистить" class="admin-button" />
        <a href="{{route('settings.index')}}" class="admin-button">Назад</a>
    </form>

</div>

@endsection
