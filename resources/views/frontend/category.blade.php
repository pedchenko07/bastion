@extends('layouts.main')
@section('content')


    <div class="catalog-index">

        <div id="content" class="col-sm-9">
            <ul class="breadcrumb">

                <a href="">Главная</a> / <a href="?view=cat&amp;category="></a> / <span></span>



            </ul> <!-- .kroshka -->
            <h2></h2>
            <div class="row">
                <div class="col-sm-10">
                    <p class="category-text">

                    </p>
                </div>
            </div>
            <div class="product-filter clearfix">
                <div class="row">
                    <ul class="sort-category">
                        <li>
                            <label class="control-label" for="input-sort">Сортировка:</label>
                            <div class="button-view">
                                <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="" data-original-title="Список"><i class="material-icons">list</i></button>
                                <button type="button" id="grid-view" class="btn btn-default active" data-toggle="tooltip" title="" data-original-title="Сетка"><i class="material-icons">grid_on</i></button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row block-grid">

                <div class="product-layout product-grid col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="product-thumb product-category">
                        <div class="image">
                            <a class="lazy lazy-loaded" style="padding-bottom: 100%" href="?view=product&goods_id=">
                                <img alt="" title="photos/" class="img-responsive" src="baseimg/">
                            </a>
                        </div>
                        <div class="caption">
                            <div class="price"></div>
                            <div class="name"><a href="?view=product&goods_id="></a></div>
                            <div class="description-small">...</div>
                            <div class="description">...</div>
                            <div class="cart-button" id="">
                                <a class="btn btn-add" href="?view=addtocart&amp;goods_id=" class="dobavit-cart2"><i class="material-icons">shopping_cart</i>Купить</a>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>

            </div>
            <div class="category-clear"></div>
        </div>

    </div> <!-- .catalog-index -->

@endsection