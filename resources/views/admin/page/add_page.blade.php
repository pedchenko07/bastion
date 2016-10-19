@extends('layouts.admin-app')
@section('content')

    <div class="content">
        <h2>Добавление страницы</h2>
        @if (count($errors) > 0)
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="error" style="display: none;"></div>
        <form action="" method="post">
            <table class="add_edit_page" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="add-edit-txt">Название страницы:</td>
                    <td><input class="head-text" type="text" name="title" /></td>
                </tr>
                <tr>
                    <td>Ключевые слова:</td>
                    <td><input class="head-text" type="text" name="keywords" value="" /></td>
                </tr>
                <tr>
                    <td>Описание:</td>
                    <td><input class="head-text" type="text" name="description" value="" /></td>
                </tr>
                <tr>
                    <td>Позиция страницы:</td>
                    <td><input class="num-text" type="number" min="1" name="position" value="" /></td>
                </tr>
                <tr>
                    <td>Содержание страницы:</td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <textarea id="editor1" class="full-text" name="text"></textarea>
                        <script type="text/javascript">
                            CKEDITOR.replace( 'editor1' );
                        </script>
                    </td>
                </tr>
            </table>
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="submit" value="Сохранить" class="admin-button" />
        </form>

    </div> <!-- .content -->


@endsection
