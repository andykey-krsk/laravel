@extends('layouts.main')

@section('title', 'Обратная связь')

@section('content')
    <h1>Обратная связь</h1>
    @if(isset($errors) && !empty($errors))
        @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">{{ $error }}</div>
        @endforeach
    @endif
    <form action="{{ route('feedback.update', ['feedback'=>$feedbacks->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Имя </label>
            <input type="text" class="form-control" id="name" name="name"
                   value="{{ old('name', $feedbacks->name) }}" >
        </div>
        <div class="form-group">
            <label for="comment">Комментарий</label>
            <textarea class="form-control" id="comment" name="comment" rows="3"
                      > {{ old('comment', $feedbacks->comment) }}</textarea>
        </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
            <a href="{{ route('feedback.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection
