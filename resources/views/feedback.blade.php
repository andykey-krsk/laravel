@extends('layouts.main')

@section('title', 'Обратная связь')

@section('content')
    <h1>Обратная связь</h1>

    @if(!empty($status) && $status)
    <div class="alert alert-success" role="alert">
        Сообщение успешно отправлено
    </div>
    @endif

   <form action="{{ route('feedback.store') }}" method="POST">
       @csrf
        <div class="form-group">
            <label for="name">Имя пользователя</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label for="comment">Комментарий</label>
            <textarea class="form-control" id="comment" name="comment" rows="3" required> {{ old('comment') }}</textarea>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Отправить</button>
            </div>
        </div>
    </form>
@endsection