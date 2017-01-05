@extends('layouts.main')
@section('content')
    <div id="content" class="col-sm-9 product_page">
        <div class="row product-content-columns">
            <div class="col-sm-5 col-lg-9 product_page-left">

                <div id="default_gallery" class="product-gallery">
                    <div class="image-thumb">
                        <div class="bx-wrapper" style="max-width: 99px; margin: 0px auto;">
                            <div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 547px;">
                                <ul id="image-additional" class="image-additional" style="width: auto; position: relative; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
                                    <div class="item_gallery">
                                        <div class="item_thumbs">

                                            <li>
                                                <a
                                                        class="thumb-link"
                                                        rel="gallery"
                                                        fullsize="{{ asset('frontend/img/productID_') . $good->id . '/fullsize/' . $good->img}}"
                                                        title=""
                                                        href="{{ asset('frontend/img/productID_') . $good->id . '/' . $good->img}}">
                                                    <img src="{{ asset('frontend/img/productID_') . $good->id . '/' . $good->img}}"/>
                                                </a>
                                            </li>

                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="product-image" class="product-image">
                        <img class="pi-title" src="" fullsize=""/>
                    </div>
                </div>


            </div>
            <div class="col-sm-7 col-lg-3 product_page-right">
                <div class="general_info product-info">

                    <h1 class="product-title"></h1>
                    <div class="price-section">
                        <span class="price-new">Цена:  грн.</span>
                        <div class="reward-block"></div>
                    </div>

                    <ul class="list-unstyled product-section">
                        <li>Производитель: </li>
                    </ul>
                </div>
                <div id="product">
                    <div class="form-group form-horizontal">
                        <div class="cart-button" id="">
                            <a class="btn btn-primary" href="?view=addtocart&amp;goods_id=" class="dobavit-cart">Добавить в корзину</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="tab-description" class="product-desc product-section">
            <h3 class="product-section_title">Описание</h3>
            <div class="page-holder">
                <p>

                </p>
            </div>
            <div class="clearfix"></div>
        </div>
        @if(isset($reviews))
        <div class="col-md-12">
            <div class="row">
                <h2 data-toggle="collapse" data-target="#reviews" class="review-toggle">
                <span>
                    Отзывов({{$reviewsCount}})
                </span>
                    <i class="material-icons">expand_more</i>
                </h2>
            </div>

            @if(false)
                <div id="reviews">
                <div class="alert alert-danger">
                    <h6>
                        error
                    </h6>
                </div>
                @else
                <div class="collapse" id="reviews">
                @endif
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
                                @if($user)
                                <a href="#reviews-head" class="answer" data-name="{{$review->name}}"
                                   data-review_id = "{{$review->id}}">Ответить</a>
                                @endif
                            </div>
                        </div>
                            @if($review->subReview)
                                @foreach($review->subReview as $subReview)
                                    <div class="panel panel-default answ">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">
                                                <span class="pull-left">{{$subReview->name}}</span>
                                                <span class="pull-right">{{$subReview->date}}</span>
                                            </h3>
                                        </div>
                                        <div class="panel-body">
                                            <p>
                                                {{$subReview->text}}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                    <h2 id="reviews-head">Написать отзыв</h2>
                    <form method="POST" class="form-group" action="javascript:void(null);" onsubmit="call()" id="formx">
                        {{ csrf_field() }}
                        <div class="form-group required">
                            <label class="control-label" for="name" >Имя</label>
                            <input type="text" name="name" value="{{($user)?$user->name:''}}" placeholder="Имя" id="name" class="form-control" required>
                        </div>
                        <div class="form-group required">
                            <label class="control-label" for="email">Email</label>
                            <input type="email" name="email" value="{{($user)?$user->email:''}}" placeholder="Email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group required">
                            <label class="control-label" for="comment">Отзыв</label>
                            <textarea type="text" name="text" placeholder="Отзыв" id="comment" class="form-control" required></textarea>
                        </div>
                        <input type="hidden" value="{{$product_id}}" name="product_id">
                        <input type="hidden" value="0" name="review_id" id="review_id">
                        <input type="submit" class="btn btn-primary" value="Отправить"/>
                    </form>
                </div>
            </div>
        </div>
            @endif
    </div>

    <div class="error">Такого товара нет</div>
    <script type="text/javascript" language="javascript">
        function call() {
            var msg   = $('#formx').serialize();
            $.ajax({
                type: 'POST',
                url: "{{route('site.reviews.save')}}",
                data: msg,
                success: function(data) {
                    var result = JSON.parse(data);
                    alert(result.msg);
                },
                error:  function(xhr, str){
                    alert('Возникла ошибка: ' + xhr.responseCode);
                }
            });

        }

        $(document).ready(function() {
            $('.answer').click(function(){
                var link = $(this),
                    name = link.data('name'),
                    reviewId = link.data('review_id'),
                    reviewHead = $('#reviews-head'),
                    text = reviewHead.text();
                reviewHead.text(text + ' ' + name);
                $('#review_id').val(reviewId);
            });
        });
    </script>

@endsection