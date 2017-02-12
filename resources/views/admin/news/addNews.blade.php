@extends('layouts.admin-app')
@section('content')

    <div class="content">

        <h2>Добавление новости</h2>
        @if(isset($success))
            <h3 class='success'>{{$success}}</h3>
        @endif
        @if(isset($error) && $error)
            <h3 class='error'>{{$error}}</h3>
        @endif
        <form action="" method="post">

            {{ csrf_field() }}

            <table class="add_edit_page" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="add-edit-txt">Название новости:</td>
                    <td><input class="head-text" type="text" name="title" value="{{$title}}" /></td>
                </tr>
                <tr>
                    <td>Текст новости:</td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <textarea id="editor2" class="full-text" name="text">{!! $text !!}</textarea>
                        <script type="text/javascript">
                            CKEDITOR.replace( 'editor2' );
                        </script>
                    </td>
                </tr>
                <tr>
                    <td class="add-edit-txt">Дата новости:</td>
                    <td><input class="head-text" type="date" name="date" value="{{$date}}" /></td>
                </tr>
            </table>

            <input type="submit" value="Сохранить" class="admin-button" />
            @if(isset($id))
                <input type="hidden" name="id" value="{{$id}}" />
            @endif
        </form>

    </div> <!-- .content -->


@endsection
