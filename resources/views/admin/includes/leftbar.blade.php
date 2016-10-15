<div class="content-main">
    <div class="leftBar">
        <p class="new_orders"><a href="?view=orders&amp;status=0" class="new-order-button">Есть новые заказы <span>0</span></a></p>

        <ul class="nav-left">
            <li><img src="{{url('backend/images/page-menu.png')}}" /> <a href="{{route('admin.index')}}">Основные страницы</a></li>
            <li><img src="{{url('backend/images/inform-menu.png')}}" /> <a href="{{route('user.informer')}}">Информеры</a></li>
            <li><img src="{{url('backend/images/cat-menu.png')}}" /> <a href="{{route('category.index')}}">Основные категории</a>

            <!-- Аккордеон -->
                <ul class="nav-catalog" id="accordion">
                    <li><h3><a style="font-size: 13px;" href="#">FIRST CATEGORY</a></h3>
                        <ul>
                            <li>- <a href="?view=cat&amp;category=">Все модели</a></li>
                            <li>- <a href="?view=cat&amp;category=">SUB CATEGORY</a></li>
                        </ul>
                    </li>
                    <li><h3><a style="font-size: 13px;" href="#">FIRST CATEGORY</a></h3>
                        <ul>
                            <li>- <a href="?view=cat&amp;category=">Все модели</a></li>
                            <li>- <a href="?view=cat&amp;category=">SUB CATEGORY</a></li>
                        </ul>
                    </li>
                </ul>
            <!-- Аккордеон -->
            </li>
            <li><img src="{{url('backend/images/news-menu.png')}}" /> <a href="{{route('news.index')}}">Новости</a></li>
            <li><img src="{{url('backend/images/order-menu.png')}}" /> <a href="{{route('order.index')}}">Заказы</a></li>
            <li><img src="{{url('backend/images/user-menu.png')}}" /> <a href="{{route('user.index')}}">Пользователи</a></li>
            <li><img src="{{url('backend/images/setting-menu.png')}}" /> <a href="{{route('settings.index')}}">Настройки</a></li>
            <li><img src="{{url('backend/images/design-menu.png')}}" /> <a href="{{route('settings.design')}}">Дизайн</a></li>
            <li><img src="{{url('backend/images/add.png')}}" /> <a href="{{route('news.sliders')}}">Слайдеры</a></li>
            <li><img src="{{url('backend/images/review.png')}}" /> <a href="{{route('reviews.index')}}">Отзывы</a></li>
            <li><img src="{{url('backend/images/statistics.png')}}" /> <a href="{{route('metrics.index')}}">Метрика</a></li>
        </ul>
    </div> <!-- .leftBar -->