var gl_path = jQuery('#gl_path').html();
function include(scriptUrl) {
    document.write('<script src="' + scriptUrl + '"></script>');
}

/* Easing library
 ========================================================*/
include('views/kobra/js/jquery.easing.1.3.js');

/* ToTop
 ========================================================*/
;
(function ($) {
    var o = $('html');
    if (o.hasClass('desktop')) {
        include('views/kobra/js/jquery.ui.totop.js');

        $(document).ready(function () {
            $().UItoTop({easingType: 'easeOutQuart'});
        });
    }
})(jQuery);

/*===========================================*/

//Fix z-index youtube video embedding
$(document).ready(function (){
    $('.product-desc iframe').each(function() {
        var url = $(this).attr("src");
        if ($(this).attr("src").indexOf("?") > 0) {
            $(this).attr({
                "src" : url + "&wmode=transparent",
                "wmode" : "Opaque"
            });
        }
        else {
            $(this).attr({
                "src" : url + "?wmode=transparent",
                "wmode" : "Opaque"
            });
        }
    });
})

    /* Stick up menus
     ========================================================*/
;
(function ($) {
    var o = $('html');
    if (o.hasClass('desktop')) {
        include('views/kobra/js/tmstickup.js');

        $(window).load(function () {
            $('.menu-wrap').TMStickUp({})
        });
    }
})(jQuery);

/* Unveil
 ========================================================*/
;
(function ($) {
    var o = $('.lazy img');

    if (o.length > 0) {
        include('js/jquery.unveil.js');

        $(document).ready(function () {
            $(o).unveil(0, function () {
                $(this).load(function () {
                    $(this).parent().addClass("lazy-loaded");
                })
            });
        });

        $(window).load(function () {
            $(window).trigger('lookup.unveil');
        });

    }
})(jQuery);

/* Magnificent
 ========================================================*/
;
(function ($) {
    var o = $('#image-additional');
    if (o.length > 0) {
        include('views/kobra/js/magnificent/jquery.ba-throttle-debounce.js');
        include('views/kobra/js/magnificent/jquery.bridget.js');
        include('views/kobra/js/magnificent/magnificent.js');

        $(document).ready(function () {

            o.find('li:first-child a').addClass('active');

            $('#product-image').bind("click", function (e) {
                var imgArr = [];
                o.find('a').each(function () {
                    img_src = $(this).data("image");

                    //put the current image at the start
                    if (img_src == $('#product-image').find('img').attr('src')) {
                        imgArr.unshift({
                            href: '' + img_src + '',
                            title: $(this).find('img').attr("title")
                        });
                    }
                    else {
                        imgArr.push({
                            href: '' + img_src + '',
                            title: $(this).find('img').attr("title")
                        });
                    }
                });
                $.fancybox(imgArr);
                return false;
            });


            o.find('[data-image]').click(function (e) {
                e.preventDefault();
                o.find('.active').removeClass('active');
                var img = $(this).data('image');
                $(this).addClass('active');
                $('#product-image').find('.inner img').each(function () {
                    $(this).attr('src', img);
                })
            })

        });

    }
})
(jQuery);



/* Bx Slider
 ========================================================*/
;
(function ($) {
    var o = $('#image-additional');
    var o2 = $('#gallery');
    if (o.length || o2.length) {
        include('js/jquery.bxslider/jquery.bxslider.js');
    }

    if (o.length) {
        $(document).ready(function () {
            $('#image-additional').bxSlider({
                mode: 'vertical',
                pager: false,
                controls: true,
                slideMargin: 13,
                minSlides: 5,
                maxSlides: 5,
                slideWidth: 99,
                nextText: '<i class="fa fa-chevron-down"></i>',
                prevText: '<i class="fa fa-chevron-up"></i>',
                infiniteLoop: false,
                adaptiveHeight: true,
                moveSlides: 1
            });
        });
    }

    if (o2.length) {
        include('views/kobra/js/photo-swipe/klass.min.js');
        include('views/kobra/js/photo-swipe/code.photoswipe.jquery-3.0.5.js');
        include('views/kobra/js/photo-swipe/code.photoswipe-3.0.5.min.js');
        $(document).ready(function () {
            $('#gallery').bxSlider({
                pager: false,
                controls: true,
                minSlides: 1,
                maxSlides: 1,
                infiniteLoop: false,
                moveSlides: 1
            });
        });
    }

})(jQuery);

/* FancyBox
 ========================================================*/
;
(function ($) {
    var o = $('.quickview');
    var o2 = $('#default_gallery');
    if (o.length > 0 || o2.length > 0) {
        include('views/kobra/js/fancybox/jquery.fancybox.js');
    }

    if (o.length) {
        $(document).ready(function () {
            o.fancybox({
                maxWidth: 800,
                maxHeight: 600,
                fitToView: false,
                width: '70%',
                height: '70%',
                autoSize: false,
                closeClick: false,
                openEffect: 'elastic',
                closeEffect: 'elastic'
            });
        });
    }

})(jQuery);

/* Superfish menus
 ========================================================*/
;
(function ($) {
    include('views/kobra/js/superfish.js');
    $(window).load(function () {
        $('#tm_menu .menu').superfish();
    });
})(jQuery);

/* Owl Carousel
 ========================================================*/
;
(function ($) {
    var o = $('.related-slider');
    if (o.length > 0) {
        $(document).ready(function () {
            o.owlCarousel({
                // Most important owl features
                items : 5,
                itemsCustom : false,
                itemsDesktop : [1199,5],
                itemsDesktopSmall : [991,4],
                itemsTablet: [767,3],
                itemsTabletSmall: [600,2],
                itemsMobile : [480,1],

                // Navigation
                pagination: false,
                navigation : true,
                navigationText: ['<i class="material-icons">navigate_before</i>', '<i class="material-icons">navigate_next</i>'],


            });
        });
    }
})(jQuery);

/* Box Carousel
 ========================================================*/
;
(function ($) {
    var o = $('#content .box-carousel');
    if (o.length > 0) {
        $(document).ready(function () {
            o.owlCarousel({
                // Most important owl features
                items : 4,
                itemsCustom : false,
                itemsDesktop : [1199,4],
                itemsDesktopSmall : [991,3],
                itemsTablet: [767,3],
                itemsTabletSmall: [580,2],
                itemsMobile : [372,1],

                // Navigation
                pagination: false,
                navigation : true,
                navigationText: ['<i class="material-icons">navigate_before</i>', '<i class="material-icons">navigate_next</i>'],


            });
        });
    }
})(jQuery);

/* GREEN SOCKS
 ========================================================*/
;
(function ($) {
    var o = $('html');
    if (o.hasClass('desktop') && o.find('body').hasClass('common-home')) {
        include('views/kobra/js/greensock/jquery.gsap.min.js');
        include('views/kobra/js/greensock/TimelineMax.min.js');
        include('views/kobra/js/greensock/TweenMax.min.js');
        include('views/kobra/js/greensock/jquery.scrollmagic.min.js');

        function listTabsAnimate(element) {
            if ($(element).length) {
                TweenMax.staggerFromTo(element, 0.3, {alpha: 0, rotationY: -90, ease: Power1.easeOut}, {
                    alpha: 1,
                    rotationY: 0,
                    ease: Power1.easeOut
                }, 0.1);
            }
        }

        $(document).ready(function () {
            controller = new ScrollMagic();
        });

        $(window).load(function () {
            if ($(".banners").length) {
                var welcome = new TimelineMax();
                welcome.from(".banners > div:nth-child(1)", .5, {scale: .1, autoAlpha: 0})
                    .from(".banners > div:nth-child(2)", .5, {scale: .1, autoAlpha: 0})
                    .from(".banners > div:nth-child(3)", .5, {scale: .1, autoAlpha: 0})
                    .from(".banners > div:nth-child(4)", .5, {scale: .1, autoAlpha: 0});
                var scene_welcome = new ScrollScene({
                    triggerElement: ".banners",
                    offset: -100
                }).setTween(welcome).addTo(controller).reverse(false);
            }

        });

    }
})(jQuery);

/* Swipe Menu
 ========================================================*/
;
(function ($) {
    $(document).ready(function () {
        $('#page').click(function () {
            if ($(this).parents('body').hasClass('ind')) {
                $(this).parents('body').removeClass('ind');
                return false
            }
        })

        $('.swipe-control').click(function () {
            if ($(this).parents('body').hasClass('ind')) {
                $(this).parents('body').removeClass('ind');
                $(this).removeClass('active');
                return false
            }
            else {
                $(this).parents('body').addClass('ind');
                $(this).addClass('active');
                return false
            }
        })
    });

})(jQuery);

/* EqualHeights
 ========================================================*/
;
(function ($) {
    var o = $('[data-equal-group]');
    if (o.length > 0) {
        include('js/jquery.equalheights.js');
    }
})(jQuery);

$(function(){
    $('#cart .total tbody tr').last().addClass('last');
    $('.breadcrumb li').last().addClass('last');
})

$(document).ready(function(){
    var width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    if (width > 767) {
        $(".text-top").appendTo(".top-panel");
    }
})

$(document).ready(function () {
    /***********CATEGORY DROP DOWN****************/

    jQuery('#menu-gadget .menu').find('li >ul').before('<i class="fa fa-caret-down"></i>').parent().addClass('inset');

    jQuery('#menu-gadget').find('a.active').parent('li').find(' > i').addClass('fa-caret-up').removeClass('fa-caret-down').parent().find('> ul').slideToggle();
    jQuery('#menu-gadget').find('li li a.active').parent('li').parent('ul').slideToggle().parent('li').find(' >i').addClass('fa-caret-up').removeClass('fa-caret-down');
    jQuery('#menu-gadget').find('li li li a.active').parent('li').parent('ul').parent('li').parent('ul').slideToggle().parent('li').find(' >i').addClass('fa-caret-up').removeClass('fa-caret-down');

    jQuery('#menu-gadget .menu li i').on("click", function(){
        if (jQuery(this).hasClass('fa-caret-up')) { jQuery(this).removeClass('fa-caret-up').addClass('fa-caret-down').parent('li').find('> ul').slideToggle(); }
        else {
            jQuery(this).addClass('fa-caret-up').removeClass('fa-caret-down').parent('li').find('> ul').slideToggle();
        }
    });

    $("#menu-icon").on("click", function () {
        $(this).parent('#menu-gadget').find('> .menu').slideToggle();
        $(this).toggleClass('active');
    });

    if ($('.breadcrumb').length) {
        var o = $('.breadcrumb li:last-child');
        var str = o.find('a').html();
        o.find('a').css('display', 'none');
        o.append('<span>' + str + '</span>');
    }

    $(".soc_block").wrapAll("<div class='row social_blocks'></div>");
    $(".welcome").wrap("<div class='welcome-block'><div class='container'></div></div>");

    var width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

    if ($('aside').length) {
        var leftColumn = $('aside');
    } else {
        return false;
    }

    if (width > 767) {

        if (!flag) {
            flag = true;
            leftColumn.insertBefore('#content');
            $('.col-sm-3 .box-heading').unbind("click");

            $('.col-sm-3 .box-content').each(function () {
                if ($(this).is(":hidden")) {
                    $(this).slideToggle();
                }
            })
        }
    } else {
        if (flag) {
            flag = false;
            leftColumn.insertAfter('#content');

            $('.col-sm-3 .box-content').each(function () {
                if (!$(this).is(":hidden")) {
                    $(this).parent().find('.box-heading').addClass('active');
                }
            });

            $('.col-sm-3 .box-heading').bind("click", function () {
                if ($(this).hasClass('active')) {
                    $(this).removeClass('active').parent().find('.box-content').slideToggle();
                }
                else {
                    $(this).addClass('active');
                    $(this).parent().find('.box-content').slideToggle();
                }
            })
        }
    }

});

var flag = true;

function respResize() {
    var width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

    if ($('aside').length) {
        var leftColumn = $('aside');
    } else {
        return false;
    }

    if (width > 767) {
        if (!flag) {
            flag = true;
            leftColumn.insertBefore('#content');
            $('.col-sm-3 .box-heading').unbind("click");

            $('.col-sm-3 .box-content').each(function () {
                if ($(this).is(":hidden")) {
                    $(this).slideToggle();
                }
            })
        }
    } else {
        if (flag) {
            flag = false;
            leftColumn.insertAfter('#content');

            $('.col-sm-3 .box-content').each(function () {
                if (!$(this).is(":hidden")) {
                    $(this).parent().find('.box-heading').addClass('active');
                }
            });

            $('.col-sm-3 .box-heading').bind("click", function () {
                if ($(this).hasClass('active')) {
                    $(this).removeClass('active').parent().find('.box-content').slideToggle();
                }
                else {
                    $(this).addClass('active');
                    $(this).parent().find('.box-content').slideToggle();
                }
            })
        }
    }
}

$(window).resize(function () {
    clearTimeout(this.id);
    this.id = setTimeout(respResize, 500);
});
