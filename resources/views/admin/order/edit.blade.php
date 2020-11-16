@extends('layouts.app')

@section('title', 'Редактирование заказа')

@section('content')
    <h1>Редактирование заказа</h1>
    @if(isset($errors) && !empty($errors))
        @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">{{ $error }}</div>
        @endforeach
    @endif
    <form action="{{ route('order.update', ['order'=>$order->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Имя </label>
            <input type="text" class="form-control" id="name" name="name"
                   value="{{ old('name', $order->name) }}" >
        </div>
        <div class="form-group">
            <label for="phone">Телефон</label>
            <input type="text" class="form-control" id="phone" name="phone"
                   value="{{ old('phone', $order->phone) }}" >
        </div>
        <div class="form-group">
            <label for="email">Электронная почта</label>
            <input type="text" class="form-control" id="email" name="email"
                   value="{{ old('email', $order->email) }}" >
        </div>
        <div class="form-group">
            <label for="comment">Коментарий</label>
            <textarea class="form-control" id="comment" name="comment" rows="3"
                      > {{ old('comment', $order->comment) }}</textarea>
        </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
            <a href="{{ route('order.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection
