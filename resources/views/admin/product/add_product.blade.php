@extends('layouts.admin-app')
@section('content')

    <div class="content">
        <h2>Добавление товара</h2>


        <form action="" method="post" enctype="multipart/form-data">

            <table class="add_edit_page" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="add-edit-txt">Название товара:</td>
                    <td><input class="head-text" type="text" name="name" /></td>
                </tr>
                <tr>
                    <td class="add-edit-txt">Цена:</td>
                    <td> <input class="head-text" id="input-money" type="text" name="price" style="text-align:right;" value="" /></td>
                </tr>
                <tr>
                    <td class="add-edit-txt">Ключевые слова</td>
                    <td><input class="head-text" type="text" name="keywords" value="" /></td>
                </tr>
                <tr>
                    <td class="add-edit-txt">Страна производителя товара:</td>
                    <td><input class="head-text" type="text" name="country" value="" /></td>
                </tr>
                <tr>
                    <td>Родительская категория:</td>
                    <td>
                        <select class="select-inf" name="category" multiple="" size="10" style="height: auto;">
                            @foreach($brands as $brand)
                            <option disabled=""></option>

                            <option  value="">&nbsp;&nbsp;- </option>


                            <option  value=""></option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Картинка товара:</td>
                    <td><input type="file" name="baseimg" /></td>
                </tr>
                <tr>
                    <td>Краткое описание:</td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <textarea class="anons-text" name="anons">
                </tr>
                <tr>
                    <td>Подробное описание:</td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <textarea class="anons-text" name="content"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Картинки галереи:</td>
                    <td></td>
                </tr>
                <tr>
                    <td id="btnimg">
                        <div><input type="file" name="galleryimg[]" /></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="button" id="add" value="Добавить картинку" class="admin-button" />
                        <input type="button" id="del" value="Удалить картинку" class="admin-button" />
                    </td>
                </tr>
                <tr>
                    <td>Отметить как:</td>
                    <td><input type="checkbox" name="new" value="1" /> Новинка <br />
                        <input type="checkbox" name="hits" value="1" /> Лидер продаж <br />
                        <input type="checkbox" name="sale" value="1" /> Распродажа <br />
                        <input type="checkbox" name="no_goods" value="1" /> Нет в наличии <br /></td>
                </tr>
                </tr>
                <tr>
                    <td>Показывать:</td>
                    <td><input type="radio" name="visible" value="1" checked="" /> Да <br />
                        <input type="radio" name="visible" value="0" /> Нет</td>
                </tr>
            </table>

            <input type="submit" value="Сохранить" class="admin-button" />
        </form>

    </div> <!-- .content -->
    </div> <!-- .content-main -->
    </div> <!-- .karkas -->
    </body>
    </html>

@endsection