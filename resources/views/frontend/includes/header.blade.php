<header class="header">
    <div class="top">
        <div class="container">
            <div class="top-panel"></div>
            <div class="pull-right">
                <div class="box-currency">
                </div>
                <ul class="list-unstyled social">
                    <li><a title="Vk.com" href="https://vk.com/id320636317"><i class="fa fa-vk"></i></a></li>
                    <li><a title="Youtube" href="https://www.youtube.com/user/TheKvazimoda/videos"><i class="fa fa-youtube-play"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 block-logo">
                <div id="logo" class="logo">
                    <a href="/">
                        <img src="" alt="Logotip">
                    </a>
                </div>
                <form method="GET" class="search-form">
                    <input type="hidden" name="view" value="search" />
                    <div id="search" class="search">
                        <input id="quickquery" type="text" name="search" placeholder="Что вы хотите купить?" />

                        <input class="button-search" type="submit" value="" />
                        <script type="text/javascript">
                            //<![CDATA[
                            placeholderSetup('quickquery');
                            //]]>
                        </script>
                    </div>
                </form>
                <div class="phone">
                    <i class="material-icons">local_phone</i>
                    <span class="text-phone">Звоните нам:</span>
                    <div class="clear"></div>
                    <span></span>
                    <div class="clear"></div>
                    <span></span>
                    <div class="clear"></div>
                    <i class="material-icons">drafts</i>
                    <span class="email-holder"><a href="mailto:"></a></span>
                </div>
            </div>
            <div class="col-sm-3"></div>
            <div class="col-sm-9">
                <div class="top-block">
                    <nav id="top-links" class="nav">
                        <ul class="list-inline">
                            <li><a href="{{route('site.index')}}"><i class="fa fa-home"></i><span>Главная</span></a></li>
                            @foreach($pages as $page)
                            <li><a href="{{ route('site.page', $page->id) }}">{{ $page->title }}</a></li>
                            @endforeach
                            <li><a href="{{ route('site.reviews.index') }}">Отзывы о сайте</a></li>
                            <li><a href="#">Контакты</a></li>
                            <li class="li-cart"><i class="material-icons">shopping_cart</i>
                                <a href="{{route('cart.index')}}">
                                    <strong>Корзина</strong>
                                    <span id="cart-total2" class="cart-total2">({{App\Helpers\CartHelper::countCart()}})</span> <i class="fa fa-caret-down"></i>
                                </a>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div id="menu-gadget" class="menu-gadget">
            <div id="menu-icon" class="menu-icon">Категория</div>
            <ul class="menu">
                <li>
                    <a href="#">Газовые баллончики</a>
                </li>
                <li>
                    <a href="#">Растяжки</a>
                </li>
                <li>
                    <a href="#">Чехлы</a>
                </li>
                <li>
                    <a href="#">Ножи</a>
                </li>
            </ul>
        </div>
    </div>
</header>