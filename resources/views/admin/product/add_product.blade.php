@extends('layouts.admin-app')
@section('content')

    <div class="content">
        <h2>Добавление товара</h2>
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
                    <td class="add-edit-txt">Название товара:</td>
                    <td>
                        @if(isset($good))
                            <input class="head-text" type="text" name="name" value="{{ $good->name }}"/>
                        @else
                            <input class="head-text" type="text" name="name" />
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="add-edit-txt">Цена:</td>
                    <td>
                        @if(isset($good))
                            <input class="head-text" id="input-money" type="number" name="price" style="text-align:right;" value="{{ $good->price }}" />
                        @else
                            <input class="head-text" id="input-money" type="number" name="price" style="text-align:right;" />
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="add-edit-txt">Ключевые слова</td>
                    <td>
                        @if(isset($good))
                            <input class="head-text" type="text" name="keywords" value="{{ $good->keywords }}" />
                        @else
                            <input class="head-text" type="text" name="keywords" />
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="add-edit-txt">Страна производителя товара:</td>
                    <td>
                        @if(isset($good))
                            <input class="head-text" type="text" name="country" value="{{ $good->country }}" />
                        @else
                            <input class="head-text" type="text" name="country" />
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Родительская категория:</td>
                    <td>
                        <select class="select-inf" name="category" multiple="" size="10" style="height: auto;">
                            @foreach($brands as $brand)
                                @if(count($brand->subBrands) > 0)
                                    <option disabled="">{{ $brand->name }}</option>
                                        @foreach($brand->subBrands as $sub)
                                            <option
                                                    value="{{ $sub->id }}"
                                                    @if($sub->id == $activeBrand->id || $brand->id == $activeBrand->id)
                                                        selected
                                                    @endif>
                                                &nbsp;&nbsp;- {{ $sub->name }}
                                            </option>
                                        @endforeach
                                @else
                                    <option
                                            value="{{ $brand->id }}"
                                            @if($brand->id == $activeBrand->id)
                                                selected
                                            @endif>{{ $brand->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Картинка товара:</td>
                    <td><input type="file" name="baseimg" /></td>
                </tr>
                <tr>
                    <td>Краткое описание:</td>
                    {{--<td></td>--}}
                </tr>
                <tr>
                    <td colspan="2">
                        @if(isset($good))
                            <textarea class="anons-text" name="anons">{{ $good->anons }}</textarea>
                        @else
                            <textarea class="anons-text" name="anons"></textarea>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Подробное описание:</td>
                    {{--<td></td>--}}
                </tr>
                <tr>
                    <td colspan="2">
                        @if(isset($good))
                            <textarea class="anons-text" name="content">{{ $good->content }}</textarea>
                        @else
                            <textarea class="anons-text" name="content"></textarea>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Картинки галереи:</td>
                    {{--<td></td>--}}
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
                    <td>
                        <input type="checkbox" name="new" @if(isset($good) && $good->new == 1) checked  @endif /> Новинка <br />
                        <input type="checkbox" name="hits" @if(isset($good) && $good->hits == 1) checked @endif/> Лидер продаж <br />
                        <input type="checkbox" name="sale" @if(isset($good) && $good->sale == 1) checked @endif/> Распродажа <br />
                        <input type="checkbox" name="no_goods" @if(isset($good) && $good->no_goods == 1) checked @endif/> Нет в наличии <br />
                    </td>
                </tr>
                </tr>
                <tr>
                    <td>Показывать:</td>
                    <td>
                        <input type="radio" name="visible" value="1" checked=""/> Да <br />
                        <input type="radio" name="visible" value="0" @if(isset($good) && $good->visible == 0) checked  @endif /> Нет
                    </td>
                </tr>
            </table>
            @if(isset($good))
                <input type="hidden" name="id" value="{{ $good->id }}">
            @endif
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="submit" value="Сохранить" class="admin-button" />
        </form>

    </div> <!-- .content -->

@endsection