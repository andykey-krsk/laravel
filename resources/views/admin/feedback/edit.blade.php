@extends('layouts.main')

@section('title', 'Обратная связь')

@section('content')
    <h1>Обратная связь</h1>

    <form action="{{ route('feedback.update', ['feedback'=>$feedbacks->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Имя пользователя</label>
            <input type="text" class="form-control" id="name" name="name"
                   value="{{ old('name', $feedbacks->name) }}" required>
        </div>
        <div class="form-group">
            <label for="comment">Комментарий</label>
            <textarea class="form-control" id="comment" name="comment" rows="3"
                      required> {{ old('comment', $feedbacks->comment) }}</textarea>
        </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
            <a href="{{ route('feedback.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection
