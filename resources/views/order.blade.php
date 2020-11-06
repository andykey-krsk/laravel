@extends('layouts.main')

@section('title', 'Форма заказа')

@section('content')
    <h1>Форма заказа</h1>

    @if(!empty($status) && $status)
    <div class="alert alert-success" role="alert">
        Заказ успешно отправлен
    </div>
    @endif

    <form action="{{ route('order.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Имя пользователя</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label for="phone">Телефон</label>
            <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required pattern="[0-9]{7,10}">
        </div>
        <div class="form-group">
            <label for="email">Электронная почта</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div class="form-group">
            <label for="comment">Подробности</label>
            <input type="text" class="form-control" id="comment" name="comment" value="{{ old('comment') }}" required>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Заказать</button>
            </div>
        </div>
    </form>
@endsection
