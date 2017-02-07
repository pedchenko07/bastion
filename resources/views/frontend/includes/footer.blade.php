<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-10">
                <div class="footer">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="footer_box">
                    <h5>Категории</h5>
                    <ul class="list-unstyled">

                        {{--<li><a href=""></a></li>--}}
                        @foreach($brands as $brand)
                            <li><a href="{{ route('site.category',$brand->id) }}">{{ $brand->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="footer_box">
                    <h5>Служба поддержки</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('site.reviews.index') }}">Отзывы о сайте</a></li>
                        <li><a href="#">Контакты</a></li>
                        {{--<li><a href=""></a></li>--}}
                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="footer_box">
                    <h5>Инфомрация</h5>
                    <ul class="list-unstyled">
                        @foreach($pages as $page)
                            <li><a href="{{ route('site.page', $page->id) }}">{{ $page->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <div class="copyright">
        <div class="container">
            bastion.loc &copy; 2017
        </div>
    </div>
</footer>