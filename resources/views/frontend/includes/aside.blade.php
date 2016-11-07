<aside id="column-left" class="col-sm-3 ">
    <div class="box category">
        <div class="box-heading"><h3>Категории</h3></div>
        <div class="box-content">
            <div class="box-category">
                <ul class="menu">
                    @foreach($brands as $brand)
                    <li><a href="">{{ $brand->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <script>
        jQuery(document).ready(function(){
            jQuery('.box-category .menu').find('li>ul').before('<i class="fa fa-caret-down"></i>').parent().addClass('inset');

            jQuery('.box-category').find('a.active').parent('li').find(' > i').addClass('fa-caret-up').removeClass('fa-caret-down').parent().find('> ul').slideToggle();
            jQuery('.box-category').find('li li a.active').parent('li').parent('ul').slideToggle().parent('li').find(' >i').addClass('fa-caret-up').removeClass('fa-caret-down');
            jQuery('.box-category').find('li li li a.active').parent('li').parent('ul').parent('li').parent('ul').slideToggle().parent('li').find(' >i').addClass('fa-caret-up').removeClass('fa-caret-down');

            jQuery('.box-category .menu li i').on("click", function(){
                if (jQuery(this).hasClass('fa-caret-up')) { jQuery(this).removeClass('fa-caret-up').addClass('fa-caret-down').parent('li').find('> ul').slideToggle(); }
                else {
                    jQuery(this).addClass('fa-caret-up').removeClass('fa-caret-down').parent('li').find('> ul').slideToggle();
                }
            });


        });
    </script>
    <div id="fb-root"></div>
    <div class="category-clear"></div>
    <div class="about_us box">
        <div class="box-heading">
            <h3>Отзывы о нас</h3>
        </div>
        <div class="box-content">
            <div class="reibert">
                <a href="http://reibert.info/threads/Средство-для-самозащиты-Кобра-1Н.368664/">
                    <img src="{{ asset('frontend/img/reibert.gif') }}" width="160">
                </a>
            </div>
            <div class="kharkov_forum">
                <a href="http://www.kharkovforum.com/showthread.php?t=2942281">
                    <img src="{{ asset('frontend/img/kharkov_forum.png') }}" width="160">
                </a>
            </div>
        </div>
    </div>

    <div class="metrika box">
        <div class="box-heading">
            <h3 class="toggle-metrika" data-toggle="collapse" data-target="#metrika">Метрика<i class="material-icons">expand_more</i></h3>
        </div>
        <div class="box-content collapse" id="metrika">
            @foreach($metrics as $metric)
            <div class="metric">
                {!! $metric->code !!}
            </div>
            @endforeach
        </div>
    </div>
    <script>
        window.fbAsyncInit = function () {
            var id = '403545523132758';
            if (id == '') {
                id = false;
            }
            FB.init({
                appId: id,
                xfbml: true,
                version: 'v2.3'
            });
        };

        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));


        ;
        (function ($) {
            var o = $('.fb-page');

            $(window).load(function () {
                o.css({'display': 'block'})
                        .find('span').css({
                            'width': '100%',
                            'display': 'block',
                            'text-align': 'inherit'
                        })
                        .find('iframe').css({
                    'display': 'inline-block',
                    'position': 'static'
                });
            });

            $(window).on('load resize', function () {
                if (o.parent().width() < o.find('iframe').width()) {
                    o.find('iframe').css({
                                'transform': 'scale(' + (o.width() / o.find('iframe').width()) + ')',
                                'transform-origin': '0% 0%'
                            })
                            .parent().css({
                        'height': (o.find('iframe').height() * (o.width() / o.find('iframe').width())) + 'px'
                    });
                } else {
                    o
                            .find('span').css({
                                'height': 'auto'
                            })
                            .find('iframe').css({
                        'transform': 'none'
                    });
                }
            });
        })(jQuery);
    </script> </aside>