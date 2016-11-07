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
                <td>
                    @if(isset($brand->name))
                        <input class="head-text" type="text" name="brand_name" value="{{ $brand->name }}"/>
                    @else
                        <input class="head-text" type="text" name="brand_name" />
                    @endif
                </td>
            </tr>
            @if(!isset($brand))
            <tr>
                <td>Картинка категории:</td>
                <td><input type="file" name="baseimg" /></td>
            </tr>
            @endif
            <tr>
                <td>Родительская категория:</td>
                <td>
                    <select class="select-inf" name="parent_id">
                        <option value="0">Самостоятельная категория</option>
                        @foreach($brands as $cat)
                            @if(isset($brand->id) && $cat->id != $brand->id) <!--Категория не может быть под категорией-->
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @else
                                @continue
                            @endif
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>
                    @if(isset($brand->text))
                        <textarea cols="75" rows="10" name="text">{{ $brand->text }}</textarea>
                    @else
                        <textarea cols="75" rows="10" name="text"></textarea>
                    @endif
                </td>
            </tr>
        </table>
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        @if(isset($brand))
            <input type="hidden" name="id" value="{{ $brand->id }}">
        @endif
        <input type="submit" value="Сохранить" class="admin-button" />

    </form>

</div> <!-- .content -->
@endsection