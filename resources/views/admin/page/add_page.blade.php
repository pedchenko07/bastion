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
                    <td>
                        @if(isset($page->title))
                            <input class="head-text" type="text" name="title" value="{{ $page->title }}" />
                        @else
                            <input class="head-text" type="text" name="title" />
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Ключевые слова:</td>
                    <td>
                        @if(isset($page->keywords))
                            <input class="head-text" type="text" name="keywords" value="{{ $page->keywords }}" />
                        @else
                            <input class="head-text" type="text" name="keywords" />
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Описание:</td>
                    <td>
                        @if(isset($page->description))
                            <input class="head-text" type="text" name="description" value="{{ $page->description }}" />
                        @else
                            <input class="head-text" type="text" name="description" value="" />
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Позиция страницы:</td>
                    <td>
                        @if(isset($page->position))
                            <input class="num-text" type="number" min="1" name="position" value="{{ $page->position }}" />
                        @else
                            <input class="num-text" type="number" min="1" name="position" value="" />
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Содержание страницы:</td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2">
                        @if(isset($page->text))
                            <textarea id="editor1" class="full-text" name="text">{{ $page->text }}</textarea>
                        @else
                            <textarea id="editor1" class="full-text" name="text"></textarea>
                        @endif
                        <script type="text/javascript">
                            CKEDITOR.replace( 'editor1' );
                        </script>
                    </td>
                </tr>
            </table>
            @if(isset($page->id))
                <input type="hidden" name="id" value="{{$page->id}}" />
            @endif
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="submit" value="Сохранить" class="admin-button" />
        </form>

    </div> <!-- .content -->


@endsection
