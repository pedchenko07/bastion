@extends('layouts.admin-app')
@section('content')

    <div class="content">
        <h2>Список отзывов</h2>
        <table class="tabl">
            <thead>
            <tr>
                <th>#</th>
                <th>Ответ</th>
                <th>Товар</th>
                <th>Автор</th>
                <th>Email автора</th>
                <th>Отзыв</th>
                <th>Дата</th>
                <th>Статус</th>
                <th>Изменить</th>
                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach($reviews as $review)
            <tr>
                <td>{{$review->id}}</td>
                <td>{{($review->review_id)?$review->review_id: ''}}</td>
                <td>{{$review->product_id}}</td>
                <td>{{$review->name}}</td>
                <td>{{$review->email}}</td>
                <td>{{$review->text}}</td>
                <td>{{$review->date}}</td>
                <td>{{($review->status)?'Опубликован' : 'Не опубликован'}}</td>
                <td>
                    <a class="approve-review" href="{{route('reviews.status', ['id' => $review->id])}}"></a>
                </td>
                <td><a class="remove-review" href="{{route('reviews.delete', ['id' => $review->id])}}">
                        <i class="material-icons">delete</i></a></td>
            </tr>
                @endforeach
            </tbody>
        </table>

    </div> <!-- .content-main -->


@endsection
