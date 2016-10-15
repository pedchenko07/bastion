@extends('layouts.main')
@section('content')


    <div id="content" class="col-sm-9 product_page">
        <div class="row product-content-columns">
            <div class="col-md-12">
                <div class="page-holder">
                    <p class="contact-us-text">
                        Наш интернет-магазин вышел на рынок труда более 3-х лет назад и с тех пор является одним из лидеров
                        по количеству проданных единиц товара в Украине. Так как мы сотрудничаем только с надёжными и проверенными
                        производителями, мы завоевали доверие наших клиентов и продолжаем поставлять качественную продукцию.
                        Главная цель интернет-магазина <b>«Кобра»</b> -  помочь гражданам нашей страны обезопасить себя и своих близких.
                        Именно поэтому наша продукция доступна каждому, а доставка  товара своевременна.
                        Нам важен каждый отзыв!
                    </p>
                </div>
                <h2>Написать отзыв</h2>
                <form method="POST" class="form-group">
                    <div class="form-group required">
                        <label class="control-label" for="name">Имя</label>
                        <input type="text" name="name" value="" placeholder="Имя" id="name" class="form-control">
                    </div>
                    <div class="form-group required">
                        <label class="control-label" for="email">Email</label>
                        <input type="email" name="email" value="" placeholder="Email" id="email" class="form-control">
                    </div>
                    <div class="form-group required">
                        <label class="control-label" for="comment">Отзыв</label>
                        <textarea type="text" name="comment" placeholder="Отзыв" id="comment" class="form-control"></textarea>
                    </div>
                    <input type="hidden" value="not-product" name="review">
                    <input type="submit" class="btn btn-primary" value="Отправить"/>
                </form>
                <div class="reviews-holder">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <span class="pull-left"></span>
                                <span class="pull-right"></span>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <p>

                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection