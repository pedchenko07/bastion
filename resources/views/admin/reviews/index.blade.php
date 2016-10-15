@extends('layouts.admin-app')
@section('content')

    <div class="content">
        <h2>Список отзывов</h2>
        <table class="tabl">
            <thead>
            <tr>
                <th>#</th>
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
            <tr>
                <td>Number</td>
                <td>Author</td>
                <td>Name</td>
                <td>Email</td>
                <td>Text</td>
                <td>Date</td>
                <td>STATUS 'Опубликован' : 'Не опубликован'</td>
                <td>
                    <a class="approve-review" href="?view=reviews&review_approve=ID&status=STATUS"></a>
                </td>
                <td><a class="remove-review" href="?view=reviews&review_del=ID"><i class="material-icons">delete</i></a></td>
            </tr>
            </tbody>
        </table>

    </div> <!-- .content-main -->


@endsection
