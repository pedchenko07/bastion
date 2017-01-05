$(document).ready(function(){
    $('.thumb-link').on('click', function(e){
        e.preventDefault();
        var imgLink = $(this).attr('href');
        var fullSize = $(this).attr('fullsize');
        $('.pi-title').attr('src', imgLink);
        // console.log($('#product_image img'));
        $('#product_image img').attr('fullsize', fullSize);
        $('#product-image').zoom({url: fullSize});
        $('.item_thumbs a').removeClass('active');
        $(this).addClass('active');
    });
    var fullSize = $('#product-image img').attr('fullsize');
    $('#product-image').zoom({url: fullSize});

    $('.cart-button').on('click', function(e){
        var productId = this.id;
        e.preventDefault();
        $.ajax({
            url: '?view=cartadd&goods_id=' + productId,
            type: 'post',
            success: function(response){
                $(".li-cart").load(location.href + " .li-cart");
                $('.cart-message').show();
                $('.wrapper-message').show();
                $("html, body").animate({ scrollTop: 0 }, "slow");
            }
        });
    });
    $('.hide-message').on('click', function(){
        $('.cart-message').hide();
        $('.wrapper-message').hide();
    });

    $('.wrapper-message').on('click', function(){
        $('.cart-message').hide();
        $('.wrapper-message').hide();
    });
});