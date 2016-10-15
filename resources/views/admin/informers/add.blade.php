@extends('layouts.admin-app')
@section('content')

    <div class="content">

        <h2>Добавление информера</h2>
        <?php
        if(isset($_SESSION['add_informer']['res'])){
            echo $_SESSION['add_informer']['res'];
            unset($_SESSION['add_informer']['res']);
        }
        ?>

        <form action="" method="post">

            <table class="add_edit_page" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="add-edit-txt">Название информера:</td>
                    <td><input class="head-text" type="text" name="informer_name" /></td>
                </tr>
                <tr>
                    <td>Позиция информера:</td>
                    <td><input class="num-text" type="number" min="1" name="informer_position" /></td>
                </tr>
            </table>

            <input type="submit" value="Сохранить" class="admin-button" />

        </form>

    </div> <!-- .content -->

@endsection
