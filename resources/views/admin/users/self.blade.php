@extends('layouts.admin-app')
@section('content')
    <div class="content">
        <h2>Изменение email аккаунта</h2>
        @foreach($success as $mesage)
        <h4 class="success">{{$mesage}}</h4>
        @endforeach
        @if(count($error) > 0)
            @foreach($error->all() as $mesage)
                <h4 class="error">{{$mesage}}</h4>
            @endforeach
        @endif
        <form action="{{ route('user.save') }}" METHOD="post">
            {{ csrf_field() }}
            <p>Текущий email аккаунта: <b>{{ Auth::User()->email }}</b></p>
            <label>Новый email: <input type="email" name="email" placeholder="{{ Auth::User()->email }}" required></label>
            <input type="submit" value="Сохранить" class="admin-button" />
        </form>
    </div>
@endsection