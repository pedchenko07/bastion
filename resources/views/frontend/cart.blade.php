@extends('layouts.main')
@section('content')

    <div id="content-zakaz">
        <h2>Оформление заказа</h2>

        <div id="content" class="col-sm-9">
            <form class="shoping_cart" action="" method="post" enctype="multipart/form-data">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td class="text-center">Изображение</td>
                            <td class="text-left">Название</td>
                            <td class="text-left">Количество</td>
                            <td class="text-right">Цена за шт.</td>
                            <td class="text-right">Всего</td>
                            <td class="text-right">Удалить</td>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td class="text-center"><img width="50" height="50" src=""></td>
                            <td class="text-left product-name"><a href="?view=product&goods_id="></a></td>
                            <td class="text-left"></td>
                            <td class="text-right"></td>
                            <td class="text-right"></td>
                            <td class="text-right delete"><a href="?view=cart&delete="><i class="material-icons">clear</i></a></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <br>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="#collapse-payment-address" data-toggle="collapse" data-parent="#accordion" class="accordion-toggle">Оформление заказа<i class="fa fa-caret-down"></i></a></h4>
                    </div>
                    <div class="panel-collapse collapse in" id="collapse-payment-address" style="height: auto;">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <fieldset id="account">
                                        <div class="alert alert-warning">
                                            <h5>
                                                Внимание! Доставка заказа осуществляется только через Новую Почту!
                                            </h5>
                                        </div>
                                        <div class="features">
                                            <a href="https://www.privat24.ua/">
                                                <img src="/views/kobra/img/privat24.png"/>
                                            </a>
                                            <a href="https://novaposhta.ua/">
                                                <img src="/views/kobra/img/novaposhta.jpg"/>
                                            </a>
                                        </div>
                                        <div class="form-group required">
                                            <label class="control-label" for="input-payment-firstname">ФИО</label>
                                            <input type="text" name="name" value="" placeholder="ФИО" id="input-payment-firstname" class="form-control">
                                        </div>
                                        <div class="form-group required">
                                            <label class="control-label" for="input-payment-email">E-Mail</label>
                                            <input type="text" name="email" value="" placeholder="E-Mail" id="input-payment-email" class="form-control">
                                        </div>
                                        <div class="form-group required">
                                            <label class="control-label" for="input-payment-telephone">Телефон</label>
                                            <input type="text" name="phone" value="" placeholder="Телефон" id="input-payment-telephone" class="form-control">
                                        </div>
                                        <div class="form-group required">
                                            <label class="control-label" for="input-payment-address-1">Город</label>
                                            <input type="text" name="city" value="" placeholder="Город" id="input-payment-address-1" class="form-control">
                                        </div>
                                        <div class="form-group required">
                                            <label class="control-label" for="input-payment-address-1">Адрес или номер отделения новой почты</label>
                                            <input type="text" name="address" value="" placeholder="Адрес" id="input-payment-address-1" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="comment">Примечание</label>
                                            <textarea class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="oplata" class="control-label">Тип оплаты</label>
                                            <select name="oplata" class="form-control">
                                                <option value="1">Наложенный платёж</option>
                                                <option value="1">Предоплата</option>
                                            </select>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="buttons">
                    <div class="pull-left"><a href="/" class="btn btn-default">Продолжить покупки</a></div>
                    <div class="pull-right">
                        <input type="submit" class="btn btn-default" name="order" value="Отправить заказ" />
                    </div>
                </div>

            </form>
        </div>

        <h2>Корзина пуста</h2>


    </div> <!-- .content-zakaz -->

@endsection