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

        @if(isset($goods) && count($goods) > 0)
            <table class="tabl-kat" cellspacing="1">
                @for($i = 0; $i < ceil(count($goods)/3); $i++)
                    <tr>
                        @for($k = 0; $k < 3; $k++)
                            <td>
                                @if(isset($goods[$count]))
                                <h2>{{ $goods[$count]->name }}</h2>
                                <div class="product-table-img">
                                    @if($goods[$count]->img == 'no_image.jpg')
                                        <img src="{{ asset('frontend/img/' . $goods[$count]->img) }}" alt="">
                                    @else
                                        <img src="{{ asset('frontend/img/productID_' . $goods[$count]->id . '/' . $goods[$count]->img) }}" alt="" />
                                    @endif
                                </div>
                                <p><a href="{{ route('product.add',[$brand->id,$goods[$count]->id]) }}" class="edit-button">изменить</a>&nbsp; | &nbsp;<a href="{{ route('product.delete', $goods[$count]->id) }}" class="zakaz-del">удалить</a></p>
                                @else
                                &nbsp;
                                @endif
                            </td>
                            <?php $count++; ?>
                        @endfor
                    </tr>
                @endfor
            </table>
        @else
            <p class="none">В данном разделе пока нет товаров!</p>
        @endif
        <a href="{{ route('product.add', $brand->id) }}" class="admin-button">Добавить продукт</a>

    </div> <!-- .content -->


@endsection