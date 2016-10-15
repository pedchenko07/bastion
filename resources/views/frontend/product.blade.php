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
                                                <a class="thumb-link" rel="gallery" fullsize="photos/full_size/" title="" href="photos/">
                                                    <img src="thumbs/"/>
                                                </a>
                                            </li>

                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="product-image" class="product-image">
                        <img class="pi-title" src="photos/" fullsize="photos/full_size/"/>
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
        <div class="col-md-12">
            <div class="row">
                <h2 data-toggle="collapse" data-target="#reviews" class="review-toggle">
                <span>
                    Отзывов()
                </span>
                    <i class="material-icons">expand_more</i>
                </h2>
            </div>

            <div id="reviews">
                <div class="alert alert-danger">
                    <h6>

                    </h6>
                </div>

                <div class="collapse" id="reviews">

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
                        <input type="hidden" value=">" name="review">
                        <input type="submit" class="btn btn-primary" value="Отправить"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div> <!-- .long-opais -->
    </div> <!-- .catalog-detail -->

    <div class="error">Такого товара нет</div>


@endsection