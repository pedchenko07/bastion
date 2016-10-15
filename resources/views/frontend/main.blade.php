        <!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]>
<html dir="ltr" lang="ru" class="ie8"><![endif]-->
<!--[if IE 9 ]>
<html dir="ltr" lang="ru" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir="ltr" lang="ru">
<!--<![endif]-->
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <script type="text/javascript">var NREUMQ=NREUMQ||[];NREUMQ.push(["mark","firstbyte",new Date().getTime()]);</script>
    <title></title>
    <meta name="description" content="Military Store"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <script src="{{ asset('js/jquery-2.1.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/custom.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/common.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/device.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/camera.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.zoom.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.elevateZoom-3.0.8.min.js') }}" type="text/javascript"></script>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" media="screen"/>
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/magnificent.css') }}" rel="stylesheet">
    <link href="{{ asset('css/material-design.css') }}" rel="stylesheet">
    <link href="{{ asset('css/photoswipe.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.fancybox.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.bxslider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/camera.css') }}" type="text/css" rel="stylesheet" media="screen"/>
    <link href="{{ asset('css/tm_newsletter-popup.css') }}" type="text/css" rel="stylesheet" media="screen"/>
    <link href="{{ asset('css/owl.carousel.css') }}" type="text/css" rel="stylesheet" media="screen"/>
    <link href="{{ asset('css/owl.transitions.css') }}" type="text/css" rel="stylesheet" media="screen"/>
    <link href="{{ asset('css/stylesheet.css') }}" rel="stylesheet">
    <link href="{{ asset('css/material-icons.css') }}" rel="stylesheet">

    <!--[if lt IE 9]>
    <div style='clear:both;height:59px;padding:0 15px 0 15px;position:relative;z-index:10000;text-align:center;'>
        <a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img
                src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0"
                height="42" width="820"
                alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
        </a>
    </div><![endif]-->
    <script type="text/javascript">
        /* <![CDATA[ */
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-7078796-5']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

        (function(b){(function(a){"__CF"in b&&"DJS"in b.__CF?b.__CF.DJS.push(a):"addEventListener"in b?b.addEventListener("load",a,!1):b.attachEvent("onload",a)})(function(){"FB"in b&&"Event"in FB&&"subscribe"in FB.Event&&(FB.Event.subscribe("edge.create",function(a){_gaq.push(["_trackSocial","facebook","like",a])}),FB.Event.subscribe("edge.remove",function(a){_gaq.push(["_trackSocial","facebook","unlike",a])}),FB.Event.subscribe("message.send",function(a){_gaq.push(["_trackSocial","facebook","send",a])}));"twttr"in b&&"events"in twttr&&"bind"in twttr.events&&twttr.events.bind("tweet",function(a){if(a){var b;if(a.target&&a.target.nodeName=="IFRAME")a:{if(a=a.target.src){a=a.split("#")[0].match(/[^?=&]+=([^&]*)?/g);b=0;for(var c;c=a[b];++b)if(c.indexOf("url")===0){b=unescape(c.split("=")[1]);break a}}b=void 0}_gaq.push(["_trackSocial","twitter","tweet",b])}})})})(window);
        /* ]]> */
    </script>
</head>
<body class="common-home">
<div class="wrapper-message" style="display: none;"></div>
<div class="cart-message" style="display: none">
    <h3>
        <span>Сообщение</span>
        <span class="hide-message pull-right">x</span>
    </h3>
    <h4>Товар добавлен в корзину!</h4>
</div>
{{--<div class="swipe">--}}
    {{--<div class="swipe-menu">--}}
        {{--<ul>--}}
            {{--<li><a href="#" title="Корзина"><i class="material-icons">add_shopping_cart</i></i><span>Корзина</span></a> </li>--}}
            {{--<li><a href="#" title="Оформление заказа"><i class="fa fa-share"></i><span>Оформление заказа</span></a></li>--}}
        {{--</ul>--}}
        {{--<ul class="foot">--}}
            {{--<li><a href="#">O нас</a></li>--}}
            {{--<li><a href="#">Информация о доставке</a></li>--}}
            {{--<li><a href="#">Политика конфиденциальности</a></li>--}}
            {{--<li><a href="#">Сроки и условия</a></li>--}}
        {{--</ul>--}}
        {{--<ul class="foot foot-1">--}}
            {{--<li><a href="#">Contact Us</a> </li>--}}
            {{--<li><a href="#">Returns</a> </li>--}}
            {{--<li><a href="#">Site Map</a></li>--}}
        {{--</ul>--}}
        {{--<ul class="foot foot-2">--}}
            {{--<li><a href="#">Производитель:</a></li>--}}
            {{--<li><a href="#">Gift Vouchers</a></li>--}}
            {{--<li><a href="#">Affiliates</a></li>--}}
            {{--<li><a href="#">Specials</a></li>--}}
        {{--</ul>--}}
        {{--<ul class="foot foot-3">--}}
            {{--<li><a href="#">История заказов</a></li>--}}
            {{--<li><a href="#">Newsletter</a></li>--}}
        {{--</ul>--}}
    {{--</div>--}}
{{--</div>--}}
<div id="page">
    <div class="shadow"></div>
    <div class="toprow-1">
        <a class="swipe-control" href="#"><i class="fa fa-align-justify"></i></a>
    </div>
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
                            <img src="{{ asset('img/logo.png') }}" title="kobra1.com.ua" alt="kobra1.com.ua" class="img-responsive"/>
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
                                <li><a href="/"><i class="fa fa-home"></i><span>Главная</span></a></li>

                                <li><a href="?view=page&page_id="></a></li>

                                <li><a href="?view=reviews">Отзывы о сайте</a></li>
                                <li><a href="?view=contacts">Контакты</a></li>
                                <li class="li-cart"><i class="material-icons">shopping_cart</i>
                                    <a href="?view=cart">
                                        <strong>Корзина</strong>
                                        <span id="cart-total2" class="cart-total2">()</span> <i class="fa fa-caret-down"></i>
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
    <div class="header_modules">
    </div>
    <div id="container">
        <div class="container">
            <div class="row">

</div>
</div>
</div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-10">
                <div class="footer">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="footer_box">
                    <h5>Категории</h5>
                    <ul class="list-unstyled">

                        <li><a href="?view=cat&amp;category="></a></li>

                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="footer_box">
                    <h5>Служба поддержки</h5>
                    <ul class="list-unstyled">
                        <li><a href="?view=reviews">Отзывы о сайте</a></li>
                        <li><a href="?view=contacts">Контакты</a></li>

                        <li><a href="?view=page&page_id="></a></li>

                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="footer_box">
                    <h5>Полезная инфомрация</h5>
                    <ul class="list-unstyled">

                        <li><a href="?view=page&page_id="></a></li>

                    </ul>
                </div>
            </div>

        </div>
    </div>
    <div class="copyright">
        <div class="container">
            kobra1.com.ua &copy; 2015
        </div>
    </div>
</footer>
<script src="{{ asset('js/livesearch.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/script.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('js/jquery.ui.totop.js') }}"></script>
<script src="{{ asset('js/tmstickup.js') }}"></script>
<script src="{{ asset('js/jquery.unveil.js') }}"></script>
<script src="{{ asset('js/fancybox/jquery.fancybox.js') }}"></script>
<script src="{{ asset('js/superfish.js') }}"></script>
<script src="{{ asset('js/greensock/jquery.gsap.min.js') }}"></script>
<script src="{{ asset('js/greensock/TimelineMax.min.js') }}"></script>
<script src="{{ asset('js/greensock/TweenMax.min.js') }}"></script>
<script src="{{ asset('js/greensock/jquery.scrollmagic.min.js') }}"></script>
</div>
</body>
</html>