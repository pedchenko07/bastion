@extends('layouts.main')
@section('content')

    <div id="content" class="col-sm-9 product_page">
        <div class="row product-content-columns">
            <div class="col-sm-5 col-lg-12 product_page-left">
                <div class="contacts-holder">
                    <h1>Контакты</h1>
                    <table class="table">
                        <thead>
                        <td>Время работы</td>
                        <td>Заказ по телефону</td>
                        <td>Email</td>
                        </thead>
                        <tbody>
                        <td>
                            <h2>09:00 - 21:00</h2>
                        </td>
                        <td>
                            <h2>
                                <i class="material-icons">local_phone</i>

                                <br>
                                <i class="material-icons">local_phone</i>

                            </h2>
                        </td>
                        <td>
                            <h2>
                                <i class="material-icons">drafts</i>
                                <span class="email-holder"><a href="mailto:"></a></span>
                            </h2>
                        </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection