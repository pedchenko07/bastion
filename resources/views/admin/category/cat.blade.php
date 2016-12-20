@extends('layouts.admin-app')
@section('content')

    <div class="content">
        <h2>Редактирование каталога</h2>
        @if(Session::has('message'))
            <h3 class="success">{{Session::get('message')}}</h3>
        @endif
        @if(Session::has('error'))
            <h3 class="error">{{Session::get('error')}}</h3>
        @endif
        <a href="{{ route('category.add') }}" style="position:absolute; top:20px; right:-5px;" class="admin-button">Добавить категорию</a>
        <div class="crosh">

            <p class="crosh-left"><a href="">{{ $brand->name }}</a></p>

            {{--<p class="crosh-left"></p>--}}

            <p class="crosh-right">
                <a href="{{ route('category.edit',$brand->id) }}" class="edit-button">изменить категорию</a>
                &nbsp; | &nbsp;
                <a href="{{ route('category.delete',$brand->id) }}" class="zakaz-del">удалить категорию</a>
            </p>
        </div>

        <a href="{{ route('product.add', $brand->id) }}" class="admin-button">Добавить продукт</a>




        {{--<table class="tabl-kat" cellspacing="1">--}}

            {{--<tr>--}}

                {{--<td>--}}

                    {{--<h2></h2>--}}
                    {{--<div class="product-table-img">--}}
                        {{--<img src="" alt="" />--}}
                    {{--</div>--}}
                    {{--<p><a href="?view=edit_product&amp;goods_id=" class="edit-button">изменить</a>&nbsp; | &nbsp;<a href="?view=del_product&amp;goods_id=" class="zakaz-del">удалить</a></p>--}}

                    {{--&nbsp;--}}
                {{--</td>--}}
            {{--</tr>--}}
        {{--</table>--}}

        <p class="none">В данном разделе пока нет товаров!</p>

        <a href="{{ route('product.add', $brand->id) }}" class="admin-button">Добавить продукт</a>

    </div> <!-- .content -->


@endsection