@extends('layouts.admin-app')
@section('content')


    <div class="content">

        <h2>Настройка дизайна сайта</h2>


        <div id="design_id" style="display: none;">design_id']</div>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="table-set" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="text-set">Цвет заднего фона интернет-магазина:</td>
                    <td><input class="input-set-color" type="text" name="bg_shop" value="bg_shop" /></td>
                    <td class="td-set"></td>
                </tr>
                <tr>
                    <td class="text-set">Картинка заднего фона интернет-магазина:</td>
                    <td><select class="input-set">
                            <option>Пункт 1</option>
                            <option>Пункт 2</option>
                        </select></td>
                    <td class="td-set"></td>
                </tr>
                <tr>
                    <td class="text-set">Основной шрифт интернет-магазина:</td>
                    <td><select class="input-set">
                            <option>Verdana, Geneva, sans-serif</option>
                            <option>Tahoma, Geneva, sans-serif</option>
                            <option>Arial, Helvetica, sans-serif</option>
                            <option>"Trebuchet MS", Helvetica, sans-serif</option>
                            <option>Impact, Charcoal, sans-serif</option>
                            <option>"Lucida Sans Unicode", "Lucida Grande", sans-serif</option>
                            <option>"Times New Roman", Times, serif</option>
                            <option>Georgia, serif</option>
                            <option>"Palatino Linotype", "Book Antiqua", Palatino, serif</option>
                            <option>"Courier New", Courier, monospace</option>
                            <option>"Lucida Console", Monaco, monospace</option>
                            <option>"Comic Sans MS", cursive</option>
                        </select></td>
                    <td class="td-set"></td>
                </tr>
                <tr>
                    <td class="text-set">Цвет текста на страницах интернет-магазина:</td>
                    <td><input class="input-set-color" type="text" name="page_color_font" value="page_color_font'" /></td>
                    <td class="td-set"></td>
                </tr>
                <tr>
                    <td class="text-set">Цвет ссылок:</td>
                    <td><input class="input-set-color" type="text" name="link_color" value="link_color" /></td>
                    <td class="td-set"></td>
                </tr>
                <tr>
                    <td class="text-set">Размер текста на страницах интернет-магазина (в пикселях):</td>
                    <td><input class="input-set" style="width:50px;" type="number" min="5" max="20" name="page_font_size" value="page_font_size" /></td>
                    <td class="td-set"></td>
                </tr>
                <tr>
                    <td class="text-set">Цвет фона шапки сайта (верхняя часть):</td>
                    <td><input class="input-set-color" type="text" name="header_bg" value="header_bg" /></td>
                    <td class="td-set"></td>
                </tr>
                <tr>
                    <td class="text-set">Цвет фона внутреннего пространства интернет-магазина:</td>
                    <td><input class="input-set-color" type="text" name="wrapper_bg" value="wrapper_bg" /></td>
                    <td class="td-set"></td>
                </tr>
                <tr>
                    <td class="text-set">Шрифт меню:</td>
                    <td><select class="input-set">
                            <option>Verdana, Geneva, sans-serif</option>
                            <option>Tahoma, Geneva, sans-serif</option>
                            <option>Arial, Helvetica, sans-serif</option>
                            <option>"Trebuchet MS", Helvetica, sans-serif</option>
                            <option>Impact, Charcoal, sans-serif</option>
                            <option>"Lucida Sans Unicode", "Lucida Grande", sans-serif</option>
                            <option>"Times New Roman", Times, serif</option>
                            <option>Georgia, serif</option>
                            <option>"Palatino Linotype", "Book Antiqua", Palatino, serif</option>
                            <option>"Courier New", Courier, monospace</option>
                            <option>"Lucida Console", Monaco, monospace</option>
                            <option>"Comic Sans MS", cursive</option>
                        </select></td>
                    <td class="td-set"></td>
                </tr>
                <tr>
                    <td class="text-set">Цвет фона меню:</td>
                    <td><input class="input-set-color" type="text" name="menu_bg" value="menu_bg" /></td>
                    <td class="td-set"></td>
                </tr>
                <tr>
                    <td class="text-set">Цвет фона меню (при наведении курсора):</td>
                    <td><input class="input-set-color" type="text" name="menu_bg_hover" value="menu_bg_hover" /></td>
                    <td class="td-set"></td>
                </tr>
                <tr>
                    <td class="text-set">Цвет текста меню:</td>
                    <td><input class="input-set-color" type="text" name="menu_font_color" value="menu_font_color" /></td>
                    <td class="td-set"></td>
                </tr>
                <tr>
                    <td class="text-set">Размер текста меню (в пикселях):</td>
                    <td><input class="input-set" style="width:50px;" type="number" min="5" max="20" name="menu_font_size" value="menu_font_size" /></td>
                    <td class="td-set"></td>
                </tr>
                <tr>
                    <td class="text-set">Цвет фона блока контактов:</td>
                    <td><input class="input-set-color" type="text" name="contact_bg" value="contact_bg" /></td>
                    <td class="td-set"></td>
                </tr>
                <tr>
                    <td class="text-set">Цвет текста в блоке кантактов:</td>
                    <td><input class="input-set-color" type="text" name="contact_font_color" value="contact_font_color" /></td>
                    <td class="td-set"></td>
                </tr>
                <tr>
                    <td class="text-set">Цвет текста номера телефона в блоке контактов:</td>
                    <td><input class="input-set-color" type="text" name="contact_phone_color" value="contact_phone_color" /></td>
                    <td class="td-set"></td>
                </tr>
                <tr>
                    <td class="text-set">Размер текста номера телефона в блоке контактов (в пикселях):</td>
                    <td><input class="input-set" style="width:50px;" type="number" min="5" max="20" name="contact_phone_size" value="contact_phone_size" /></td>
                    <td class="td-set"></td>
                </tr>
                <tr>
                    <td class="text-set">Цвет заголовков страниц:</td>
                    <td><input class="input-set-color" type="text" name="h1_index" value="h1_index" /></td>
                    <td class="td-set"></td>
                </tr>
                <tr>
                    <td class="text-set">Цвет фона названий боковых блоков:</td>
                    <td><input class="input-set-color" type="text" name="block_h1_bg" value="block_h1_bg" /></td>
                    <td class="td-set"></td>
                </tr>
                <tr>
                    <td class="text-set">Цвет текста названий боковых блоков:</td>
                    <td><input class="input-set-color" type="text" name="block_h1_font_color" value="block_h1_font_color" /></td>
                    <td class="td-set"></td>
                </tr>
                <tr>
                    <td class="text-set">Цвет фона левой боковой панели:</td>
                    <td><input class="input-set-color" type="text" name="block_left_bg" value="block_left_bg" /></td>
                    <td class="td-set"></td>
                </tr>
                <tr>
                    <td class="text-set">Цвет фона правой боковой панели:</td>
                    <td><input class="input-set-color" type="text" name="block_right_bg" value="block_right_bg" /></td>
                    <td class="td-set"></td>
                </tr>
                <tr>
                    <td class="text-set">Цвет текста меню каталога:</td>
                    <td><input class="input-set-color" type="text" name="catalog_font_color" value="catalog_font_color" /></td>
                    <td class="td-set"></td>
                </tr>
                <tr>
                    <td class="text-set">Размер текста меню каталога (в пикселях):</td>
                    <td><input class="input-set" style="width:50px;" type="number" min="5" max="20" name="catalog_font_size" value="catalog_font_size" /></td>
                    <td class="td-set"></td>
                </tr>
                <tr>
                    <td class="text-set">Цвет текста названия товара:</td>
                    <td><input class="input-set-color" type="text" name="goods_font_color" value="goods_font_color" /></td>
                    <td class="td-set"></td>
                </tr>
                <tr>
                    <td class="text-set">Цвет текста названия информеров:</td>
                    <td><input class="input-set-color" type="text" name="informer_h1_color" value="informer_h1_color" /></td>
                    <td class="td-set"></td>
                </tr>
                <tr>
                    <td class="text-set">Цвет текста заголовков информеров:</td>
                    <td><input class="input-set-color" type="text" name="informer_font_color" value="informer_font_color" /></td>
                    <td class="td-set"></td>
                </tr>
                <tr>
                    <td class="text-set">Цвет текста левой боковой панели:</td>
                    <td><input class="input-set-color" type="text" name="left_font_color" value="left_font_color" /></td>
                    <td class="td-set"></td>
                </tr>
                <tr>
                    <td class="text-set">Цвет текста правой боковой панели:</td>
                    <td><input class="input-set-color" type="text" name="right_font_color" value="right_font_color" /></td>
                    <td class="td-set"></td>
                </tr>
                <tr>
                    <td class="text-set">Цвет фона нижней части сайта:</td>
                    <td><input class="input-set-color" type="text" name="footer_bg" value="footer_bg" /></td>
                    <td class="td-set"></td>
                </tr>
                <tr>
                    <td class="text-set">Цвет текста нижней части сайта:</td>
                    <td><input class="input-set-color" type="text" name="footer_font_color" value="footer_font_color" /></td>
                    <td class="td-set"></td>
                </tr>
                <tr>
                    <td class="text-set">Цвет заголовков (Новинки, Распродажа, Лидеры продаж):</td>
                    <td><input class="input-set-color" type="text" name="new_sale_color" value="new_sale_color" /></td>
                    <td class="td-set"></td>
                </tr>
            </table>
            <input type="submit" value="Сохранить" class="admin-button" />
        </form>
        <script>
            $('.input-set-color').colpick({
                layout:'hex',
                submit:0,
                onChange:function(hsb,hex,rgb,el,bySetColor) {
                    $(el).css('border-color','#'+hex);
                    // Fill the text box just if the color was set using the picker, and not the colpickSetColor function.
                    if(!bySetColor) $(el).val(hex);
                }
            }).keyup(function(){
                $(this).colpickSetColor(this.value);
            });
        </script>
    </div> <!-- .content -->

@endsection
