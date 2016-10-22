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
                @if(isset($msg))
                    <h4>{{$msg}}</h4>
                @endif

                <form method="POST" class="form-group">
                    {{ csrf_field() }}
                    <div class="form-group required">
                        <label class="control-label" for="name">Имя</label>
                        <input type="text" name="name" value="" placeholder="Имя" id="name" class="form-control" required>
                    </div>
                    <div class="form-group required">
                        <label class="control-label" for="email">Email</label>
                        <input type="email" name="email" value="" placeholder="Email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group required">
                        <label class="control-label" for="comment">Отзыв</label>
                        <textarea type="text" name="text" placeholder="Отзыв" id="comment" class="form-control" required></textarea>
                    </div>
                    <input type="hidden" value="0" name="product_id">
                    <input type="hidden" value="0" name="review_id">
                    <input type="submit" class="btn btn-primary" value="Отправить"/>
                </form>
                <div class="reviews-holder">
                    @foreach ($reviews as $review)

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <span class="pull-left">{{$review->name}}</span>
                                <span class="pull-right">{{$review->date}}</span>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <p>
                                {{$review->text}}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>



@endsection