@extends('layouts.main')
@section('content')

        <!--<div class="catalog-index">
				<h1>Лидеры продаж</h1>


        <div class="product-index">
            <h2><a href="?view=product&amp;goods_id="></a></h2>
					<div class="product-table-img">
					<a href="?view=product&amp;goods_id="><img src="" alt="" /></a>
					</div>
					<p>Цена :  <span></span> руб.</p>
					<a href="?view=addtocart&amp;goods_id=" class="dobavit-cart">Добавить в корзину</a>
				</div>

        <div class="clr"></div>


        <p class="no-goods">Здесь товаров пока нет!</p>

        </div> -->
<div id="content" class="col-sm-9" xmlns="http://www.w3.org/1999/html"><script>
        jQuery(function(){
            jQuery('#camera_wrap_0').camera({
                navigation: true,
                playPause: false,
                thumbnails: false,
                navigationHover: false,
                barPosition: 'top',
                loader: false,
                time: 3000,
                transPeriod:800,
                alignment: 'center',
                autoAdvance: true,
                mobileAutoAdvance: true,
                barDirection: 'leftToRight',
                barPosition: 'bottom',
                easing: 'easeInOutExpo',
                fx: 'simpleFade',
                height: '47.59%',
                minHeight: '200px',
                hover: true,
                pagination: false,
                loaderColor			: '#fff',
                loaderBgColor		: 'transparent',
                loaderOpacity		: 1,
                loaderPadding		: 0,
                loaderStroke		: 3
            });
        });
    </script>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" id="header-slider" role="listbox">





            <div class="item active">
                <a href="">
                    <img width="870px" height="414px" src=""/>
                </a>
            </div>

            <div class="item">
                <a href="">
                    <img src="">
                </a>
            </div>

        </div>

        <!-- Left and right controls -->
        <div class="control_slider">
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <i class="material-icons">chevron_left</i>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <i class="material-icons">chevron_right</i>
            </a>
        </div>
    </div>

    <script>
        function getCookie(c_name) {
            if (document.cookie.length > 0) {
                c_start = document.cookie.indexOf(c_name + "=");
                if (c_start != -1) {
                    return true;
                }
            }
            return false;
        }
    </script>
    <div id="banner0" class="banners row">
        @foreach($brands as $brand)
        <div class="col-sm-6 banner-">
            <div class="banner-box">
                <a class="clearfix" href="">
                    <img src="" alt="banner-" class="img-responsive"/>
                    <div class="s-desc">{{ $brand->name }}<br>
                        <span>Купить сейчас!</span></div>
                </a>
            </div>
        </div>
        @endforeach
    </div>

    <div id="myCarousel2" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" id="header-slider" role="listbox">




            <div class="item active">
                <iframe width="870" height="480" src="https://www.youtube.com/embed/" frameborder="0" allowfullscreen></iframe>
            </div>

            <div class="item">
                <iframe width="870" height="480" src="https://www.youtube.com/embed/" frameborder="0" allowfullscreen></iframe>
            </div>

        </div>

        <!-- Left and right controls -->
        <div class="control_video_slider">
            <a class="left carousel-control" href="#myCarousel2" role="button" data-slide="prev">
                <i class="material-icons">arrow_back</i>
            </a>
            <a class="right carousel-control" href="#myCarousel2" role="button" data-slide="next">
                <i class="material-icons">arrow_forward</i>
            </a>
        </div>
    </div>


@endsection