@extends('layouts.main')
@section('content')

    <div class="kroshka">
        <a href="/">Главная</a>/ <span>новости</span>
    </div>
    <div id="content" class="col-sm-9 product_page">
        <div class="row product-content-columns">
            <div class="col-md-12">
                @if(count($news))
                    @foreach($news as $entity)
                        <h2>{{ $entity->title }}</h2>
                        <time class="news_date" datetime="{{ $entity->date }}">{{ $entity->getDate() }}</time>

                        <div class="page-holder">
                            <p class="contact-us-text">
                                {!! $entity->text !!}
                            </p>
                        </div>
                        <br><br>
                    @endforeach
                @else
                    <p class="error">На сайте нет новостей, извините</p>
                @endif

            </div>
        </div>
    </div>

@endsection