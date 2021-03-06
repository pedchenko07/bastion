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
    @include('frontend.includes.head')
</head>
<body class="common-home">
<div class="wrapper-message" style="display: none;"></div>
@include('frontend.modal.cart-message')

@include('frontend.mobile.swipe-menu')

<div id="page">
    <div class="shadow"></div>
    <div class="toprow-1">
        <a class="swipe-control" href="#"><i class="fa fa-align-justify"></i></a>
    </div>
    @include('frontend.includes.header')

    <div class="header_modules">
    </div>
    <div id="container">
        <div class="container">
            <div class="row">
                <div id="contentwrapper">
                    <div id="content">
                        @include('frontend.includes.aside')
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('frontend.includes.footer')
<script src="{{ asset('frontend/js/livesearch.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/js/script.js') }}" type="text/javascript"></script>
{{--<script src="{{ asset('frontend/js/jquery.easing.1.3.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/js/jquery.ui.totop.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/js/jquery.bxslider.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/js/tmstickup.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/js/jquery.unveil.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/js/fancybox/jquery.fancybox.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/js/superfish.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/js/greensock/jquery.gsap.min.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/js/greensock/TimelineMax.min.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/js/greensock/TweenMax.min.js') }}"></script>--}}
{{--<script src="{{ asset('frontend/js/greensock/jquery.scrollmagic.min.js') }}"></script>--}}
</body>
</html>