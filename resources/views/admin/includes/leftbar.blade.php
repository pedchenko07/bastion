<div class="content-main">
    <div class="leftBar">
        <p class="new_orders"><a href="?view=orders&amp;status=0" class="new-order-button">Есть новые заказы <span>0</span></a></p>

        <ul class="nav-left">
            <li><img src="{{url('backend/images/page-menu.png')}}" /> <a href="{{route('admin.index')}}">Основные страницы</a></li>
            <li><img src="{{url('backend/images/inform-menu.png')}}" /> <a href="{{route('user.informer')}}">Информеры</a></li>
            <li><img src="{{url('backend/images/cat-menu.png')}}" /> <a href="{{route('category.index')}}">Основные категории</a>
            <!-- Аккордеон -->

                <ul class="nav-catalog" id="accordion">
                    @foreach($brands as $brand)
                    <li><h3><a style="font-size: 13px;" href="#">{{ $brand->name }}</a></h3>
                        <ul>
                            <li>- <a href="{{ route('category.subCat', $brand->id) }}">Все модели</a></li>
                            @if(count($brand->subBrands) > 0)
                                @foreach($brand->subBrands as $sub)
                            <li>- <a href="{{ route("category.subCat",$sub->id) }}">{{ $sub->name }}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                    @endforeach

                </ul>
            <!-- Аккордеон -->
            </li>
            <li><img src="{{url('backend/images/news-menu.png')}}" /> <a href="{{route('news.index')}}">Новости</a></li>
            <li><img src="{{url('backend/images/order-menu.png')}}" /> <a href="{{route('order.index')}}">Заказы</a></li>
            <li><img src="{{url('backend/images/user-menu.png')}}" /> <a href="{{route('user.index')}}">Пользователи</a></li>
            <li><img src="{{url('backend/images/setting-menu.png')}}" /> <a href="{{route('settings.index')}}">Настройки</a></li>
            {{--<li><img src="{{url('backend/images/design-menu.png')}}" /> <a href="{{route('settings.design')}}">Дизайн</a></li>--}}
            <li><img src="{{url('backend/images/add.png')}}" /> <a href="{{route('sliders.index')}}">Слайдеры</a></li>
            <li><img src="{{url('backend/images/review.png')}}" /> <a href="{{route('reviews.index')}}">Отзывы ({{\App\Models\Review::noneActivated()}})</a></li>
            <li><img src="{{url('backend/images/statistics.png')}}" /> <a href="{{route('metrics.index')}}">Метрика</a></li>
        </ul>
    </div> <!-- .leftBar -->