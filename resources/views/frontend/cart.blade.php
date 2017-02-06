@extends('layouts.main')
@section('content')

    <div id="content-zakaz">
        @if(Session::get('success'))
            <h3 class="success">{{Session::get('success')}}</h3>
        @endif
        @if(count($productInCart))
        <h2>Оформление заказа</h2>

        <div id="content" class="col-sm-9">
            <form class="shoping_cart" action="" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
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
                        @foreach($productInCart as $product)
                            <tr>
                                <td class="text-center"><img width="50" height="50" src="{{$product->img}}"></td>
                                <td class="text-left product-name"><a href="{{route('item.index', ['id' => $product->id])}}">{{$product->name}}</a></td>
                                <td class="text-left">{{$product->quantity}}</td>
                                <td class="text-right">{{$product->price . ' ' . $money}}</td>
                                <td class="text-right">{{($product->price * $product->quantity) . ' ' . $money}}</td>
                                <td class="text-right delete"><a href="{{route('cart.delete.product', ['id' => $product->id])}}"><i class="material-icons">clear</i></a></td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="text-left product-name" colspan="2">Все товары</td>
                            <td class="text-left" colspan="2">{{$totalQuantity}}</td>
                            <td class="text-right" colspan="2">{{$totalPrice . ' ' . $money}}</td>
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
                                                <img src="{{ asset('frontend/img/privat24.png') }}"/>
                                            </a>
                                            <a href="https://novaposhta.ua/">
                                                <img src="{{ asset('frontend/img/novaposhta.jpg') }}"/>
                                            </a>
                                        </div>
                                        <div class="form-group required">
                                            <label class="control-label" for="input-payment-firstname">ФИО</label>
                                            <input type="text" name="name" value="{{old('name')}}" placeholder="ФИО" id="input-payment-firstname" class="form-control">
                                        </div>
                                        <div class="form-group required">
                                            <label class="control-label" for="input-payment-email">E-Mail</label>
                                            <input type="text" name="email" value="{{old('email')}}" placeholder="E-Mail" id="input-payment-email" class="form-control">
                                        </div>
                                        <div class="form-group required">
                                            <label class="control-label" for="input-payment-telephone">Телефон</label>
                                            <input type="text" name="phone" value="{{old('phone')}}" placeholder="Телефон" id="input-payment-telephone" class="form-control">
                                        </div>
                                        <div class="form-group required">
                                            <label class="control-label" for="input-payment-address-1">Город</label>
                                            <input type="text" name="city" value="{{old('city')}}" placeholder="Город" id="input-payment-address-1" class="form-control">
                                        </div>
                                        <div class="form-group required">
                                            <label class="control-label" for="input-payment-address-1">Адрес или номер отделения новой почты</label>
                                            <input type="text" name="address" value="{{old('address')}}" placeholder="Адрес" id="input-payment-address-1" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="comment">Примечание</label>
                                            <textarea class="form-control" name="comment"></textarea>
                                        </div>
                                        @if(count($oplata))
                                        <div class="form-group">
                                            <label for="oplata" class="control-label">Тип оплаты</label>
                                            <select name="oplata" class="form-control">
                                                @foreach($oplata as $item)
                                                <option data-description="{{$item->comment}}" value="{{$item->id}}" {{old('oplata') == $item->id?'selected':''}}>{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @else
                                            <div>
                                                <p>Извините, на сайте недоступны способы оплаты!</p>
                                            </div>
                                        @endif

                                        <script>
                                            $('[name=oplata]').on('change', function(){
                                                var self = $(this),
                                                        value = self.val();
                                                var selectedItem = self.find("[value="+value+"]").data('description');
                                                var arr = selectedItem.split('\n');
                                                $('#comment-box').text('');
                                                var res = '';
                                                for(var i = 0; i < arr.length; i++){
                                                    res += '<p>'+arr[i]+'</p>';
                                                }
                                                $('#comment-box').html(res);
                                            });
                                        </script>
                                    </fieldset>
                                    <div>
                                        <p id="comment-box"></p>
                                    </div>
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
        @else
        <h2>Корзина пуста</h2>
        @endif

    </div> <!-- .content-zakaz -->

@endsection