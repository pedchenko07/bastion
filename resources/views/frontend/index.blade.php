@extends('layouts.main')
@section('content')

        {{--<div class="catalog-index">--}}
				{{--<h1>Лидеры продаж</h1>--}}


        {{--<div class="product-index">--}}
            {{--<h2><a href="?view=product&amp;goods_id="></a></h2>--}}
					{{--<div class="product-table-img">--}}
					{{--<a href="?view=product&amp;goods_id="><img src="" alt="" /></a>--}}
					{{--</div>--}}
					{{--<p>Цена :  <span></span> руб.</p>--}}
					{{--<a href="?view=addtocart&amp;goods_id=" class="dobavit-cart">Добавить в корзину</a>--}}
				{{--</div>--}}

        {{--<div class="clr"></div>--}}


        {{--<p class="no-goods">Здесь товаров пока нет!</p>--}}

        {{--</div>--}}
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

    @include('frontend.includes.img_slider')

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
                <a class="clearfix" href="{{ route('site.category',$brand->id) }}">
                    <img src="{{ asset(\App\Models\Brand::PATH_IMG) . '/' .$brand->img }} " alt="banner-" class="img-responsive"/>
                    <div class="s-desc">{{ $brand->name }}<br>
                        <span>Купить сейчас!</span></div>
                </a>
            </div>
        </div>
        @endforeach
    </div>

    @include('frontend.includes.video_slider')

@endsection