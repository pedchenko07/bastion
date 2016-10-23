@extends('layouts.main')
@section('content')

    <div class="kroshka">
        <a href="">Главная</a> / <span></span>
    </div>

    <div class="content-txt">
        @if(isset($page))
        <h1 class="page-title">{{ $page->title }}</h1>
        <div class="page-holder col-lg-9">
            {!! $page->text !!}
        </div>
        @else
        <p class="error">Такой страницы нет!</p>
        @endif
    </div> <!-- .content-txt -->

@endsection