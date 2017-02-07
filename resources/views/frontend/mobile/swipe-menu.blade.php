<div class="swipe">
    <div class="swipe-menu">
        <ul>
            <li><a href="{{route('site.index')}}" title="Главная"><i class="fa fa-home"></i><span>Главная</span></a> </li>
            <li><a href="{{route('cart.index')}}" title="Корзина"><i class="material-icons">add_shopping_cart</i><span>Корзина</span></a></li>
            <li><a href="{{ route('site.reviews.index') }}"><i class="fa fa-comments-o"></i>Отзывы о сайте</a></li>
            {{--<li><a href="#" title="Оформление заказа"><i class="fa fa-share"></i><span>Оформление заказа</span></a></li>--}}
        </ul>
        <ul class="foot">
            @foreach($pages as $page)
                <li><a href="{{ route('site.page', $page->id) }}">{{ $page->title }}</a></li>
            @endforeach
            {{--<li><a href="{{ route('site.reviews.index') }}">O нас</a></li>--}}
            {{--<li><a href="#">Информация о доставке</a></li>--}}
            {{--<li><a href="#">Политика конфиденциальности</a></li>--}}
            {{--<li><a href="#">Сроки и условия</a></li>--}}
        </ul>
        <ul class="foot foot-3">
            {{--<li><a href="#">История заказов</a></li>--}}
            {{--<li><a href="#">История заказов2</a></li>--}}
            {{--<li><a href="#">История заказов12</a></li>--}}
        </ul>
    </div>
</div>