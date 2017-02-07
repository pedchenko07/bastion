@extends('layouts.main')
@section('content')
<div class="catalog-index">
    <h1 class="h1index">Результаты поиска</h1>
    <div id="content" class="col-sm-9">
    <div class="product-filter clearfix">
        <div class="row">
            <ul class="sort-category">
                <li>
                    <label class="control-label" for="input-sort">Сортировка:</label>
                    <div class="button-view">
                        <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="" data-original-title="Список"><i class="material-icons">list</i></button>
                        <button type="button" id="grid-view" class="btn btn-default active" data-toggle="tooltip" title="" data-original-title="Сетка"><i class="material-icons">grid_on</i></button>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="row block-grid">
        @foreach($goods as $good)
            <div class="product-layout product-grid col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="product-thumb product-category">
                    <div class="image">
                        @if($good->sale == 1)
                            <img src="{{ asset('frontend/img/menu-sale.png') }}" alt="" class="marker">
                        @elseif($good->hits == 1)
                            <img src="{{ asset('frontend/img/menu-top.png') }}" alt="" class="marker">
                        @elseif($good->new)
                            <img src="{{ asset('frontend/img/menu-new.png') }}" alt="" class="marker">
                        @endif
                        <a class="lazy lazy-loaded" style="padding-bottom: 100%" href="{{ route('item.index',$good->id) }}">
                            <img alt="" title="" class="img-responsive" src="{{$good->img !== 'no_image.jpg' ? asset(\App\Models\Goods::GOOD_IMG . $good->id . '/' . $good->img) : asset(\App\Repositories\ImageRepositories::PATH_IMG . $good->img)}}">
                        </a>
                    </div>
                    <div class="caption">
                        <div class="price">{{ $good->price }} руб.</div>
                        <div class="name"><a href="{{ route('item.index',$good->id) }}">{{ $good->name }}</a></div>
                        <div class="description-small">{{ substr($good->anons,0,100) }} ...</div>
                        <div class="description">{!! substr($good->content,0,300) !!} ... </div>
                        <div class="cart-button" id="{{$good->id}}">
                            <a class="btn btn-add" href="" class="dobavit-cart2"><i class="material-icons">shopping_cart</i>Купить</a>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="category-clear"></div>

    {{--<table cellspacing="1" style="width:100%;">--}}

        {{--<tr>--}}

            {{--<td class="product-table">--}}

                {{--<h2><a href="?view=product&amp;goods_id="></a></h2>--}}
                {{--<div class="product-table-img-main">--}}
                    {{--<div class="product-table-img">--}}
                        {{--<a href="?view=product&amp;goods_id="><img src="" alt="" /></a>--}}
                        {{--<div>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<p class="cat-table-more"><a href="?view=product&amp;goods_id=">подробнее...</a></p>--}}
                {{--<p>Цена :  <span></span> </p>--}}
                {{--<a href="?view=addtocart&amp;goods_id=>" class="dobavit-cart2">Добавить в корзину</a>--}}

                {{--&nbsp;--}}


            {{--</td>--}}

        {{--</tr>--}}

    {{--</table>--}}












    {{--<div class="clr"></div>--}}

    </div>
</div> <!-- .catalog-index -->
@endsection