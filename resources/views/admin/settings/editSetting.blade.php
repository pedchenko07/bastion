@extends('layouts.admin-app')
@section('content')

    <div class="content">

        <h2>Редактирование настройки сайта</h2>
        @foreach($session as $item)
            <p>{!! $item !!}</p>
        @endforeach
        <div id="setting_id" style="display: none;">{{$settings->id}}</div>
        <form action="" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <table class="table-set" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="text-set">Название интернет-магазина:</td>
                    <td><input class="input-set" required maxlength="100" type="text" name="name_shop" value="{{($field)?$field['name_shop']:$settings->name_shop}}" /></td>
                    <td class="td-set">Пример: Магазин бытовой техники (будет отображаться на всех страницах, рядом с логотипом)</td>
                </tr>
                <tr>
                    <td class="text-set">Картинка для логотипа:</td>
                    <td><input type="file" style="font: 11px Tahoma; width:200px;" name="baseimg" /></td>
                    <td class="td-set">Будет отображаться на всех станицах интернет-магазина (разрешенные типы файлов: jpg, png)</td>
                </tr>
                @if (file_exists(public_path('frontend/img/' . $settings->img)))
                <tr>
                    <td class="img-set" colspan="3"><img src="{{url('frontend/img/' . $settings->img)}}" alt="logo"></td>
                </tr>
                @endif
                <tr>
                    <td class="text-set">E-mail:</td>
                    <td><input class="input-set" required maxlength="50" type="email" name="email" value="{{($field)?$field['email']:$settings->email}}" /></td>
                    <td class="td-set">Пример: info@torgun.by</td>
                </tr>
                <tr>
                    <td class="text-set">Телефон (основной)</td>
                    <td><input class="input-set" maxlength="25" type="text" name="phone1" value="{{($field)?$field['phone1']:$settings->phone1}}" /></td>
                    <td class="td-set">Будет отображаться на всех страницах интернет-магазина</td>
                </tr>
                <tr>
                    <td class="text-set">Телефон 2</td>
                    <td><input class="input-set" maxlength="25" type="text" name="phone2" value="{{($field)?$field['phone2']:$settings->phone2}}" /></td>
                    <td class="td-set">Второй дополнительный телефон</td>
                </tr>
                <tr>
                    <td class="text-set">Телефон 3</td>
                    <td><input class="input-set" maxlength="25" type="text" name="phone3" value="{{($field)?$field['phone3']:$settings->phone3}}" /></td>
                    <td class="td-set">Третий дополнительный телефон</td>
                </tr>
                <tr>
                    <td class="text-set">Режим работы:</td>
                    <td><input class="input-set" maxlength="100" type="text" name="work" value="{{($field)?$field['work']:$settings->work}}" /></td>
                    <td class="td-set">Пример: ПН - ПТ с 9:00 до 19:00, СБ-ВС - выходные</td>
                </tr>
                <tr>
                    <td class="text-set">Адрес:</td>
                    <td><input class="input-set" maxlength="100" type="text" name="adress" value="{{($field)?$field['adress']:$settings->adress}}" /></td>
                    <td class="td-set">Пример: г.Минск, пр.Независимости, 5</td>
                </tr>
                <tr>
                    <td class="text-set">Наименование Юр.лица либо ИП:</td>
                    <td><input class="input-set" maxlength="150" type="text" name="company" value="{{($field)?$field['company']:$settings->company}}" /></td>
                    <td class="td-set">Пример: ООО "Название фирмы"</td>
                </tr>
                <tr>
                    <td class="text-set">УНП:</td>
                    <td><input class="input-set" maxlength="20" type="text" name="unp" value="{{($field)?$field['unp']:$settings->unp}}" /></td>
                    <td class="td-set">Пример: 123456789</td>
                </tr>
                <tr>
                    <td class="text-set">Информация о регистрации в торговом реестре:</td>
                    <td><input class="input-set" maxlength="250" type="text" name="reestr" value="{{($field)?$field['reestr']:$settings->reestr}}" /></td>
                    <td class="td-set">Пример: В торговом реестре с 11 июля 2012 г.</td>
                </tr>
                <tr>
                    <td class="text-set">Название сайта (title):</td>
                    <td><input class="input-set" maxlength="250" type="text" name="title" value="{{($field)?$field['title']:$settings->title}}" /></td>
                    <td class="td-set">Пример: Интернет-магазин бытовой техники в Минске (необходимо для поисковой оптимизации сайта).</td>
                </tr>
                <tr>
                    <td class="text-set">Описание сайта (description):</td>
                    <td><input class="input-set" maxlength="250" type="text" name="description" value="{{($field)?$field['description']:$settings->description}}" /></td>
                    <td class="td-set">Пример: Интернет-магазин по продаже бытовой техники в Бресте. Доставка по области. Гарантия, сервис. (необходимо для поисковой оптимизации сайта).</td>
                </tr>
                <tr>
                    <td class="text-set">Ключевые слова (keywords):</td>
                    <td><input class="input-set" maxlength="250" type="text" name="keywords" value="{{($field)?$field['keywords']:$settings->keywords}}" /></td>
                    <td class="td-set">Пример: холодильники, телевизоры, пылесосы, стиральные машины (пишите через запятую).</td>
                </tr>
                <tr>
                    <td class="text-set">Номер аккаунта в Google Analytics (8 цифр):</td>
                    <td><input class="input-set" maxlength="8" type="text" name="adsense" value="{{($field)?$field['adsense']:$settings->adsense}}" /></td>
                    <td class="td-set">Если вы хотите отслеживать статистику магазина через систему Google Analytics, введите номер аккаунта, полученный при регистрации. Более подробная информация о системе на сайте <a href="http://google.com/analytics" target="_blank">google.com/analytics</a></td>
                </tr>
                <tr>
                    <td class="text-set">Основная валюта магазина:</td>
                    <td><input class="input-set" maxlength="8" type="text" name="money" value="{{($field)?$field['money']:$settings->money}}" /></td>
                    <td class="td-set">К примеру: руб. грн. RUB BYR тңг  $ € </td>
                </tr>
            </table>
            <input type="submit" value="Сохранить" class="admin-button" />
        </form>
    </div>

@endsection
