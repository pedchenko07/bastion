@extends('layouts.admin-app')
@section('content')
<div class="content">

    <h2>Добавление категории</h2>
    @if (count($errors) > 0)
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="" method="post" enctype="multipart/form-data">

        <table class="add_edit_page" cellspacing="0" cellpadding="0">
            <tr>
                <td class="add-edit-txt">Название категории:</td>
                <td><input class="head-text" type="text" name="brand_name" /></td>
            </tr>
            <tr>
                <td>Картинка категории:</td>
                <td><input type="file" name="baseimg" /></td>
            </tr>
            <tr>
                <td>Родительская категория:</td>
                <td><select class="select-inf" name="parent_id">
                        <option value="0">Самостоятельная категория</option>
                        @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select></td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>
                    <textarea cols="75" rows="10" name="text"></textarea>
                </td>
            </tr>
        </table>
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input type="submit" value="Сохранить" class="admin-button" />

    </form>

</div> <!-- .content -->
@endsection