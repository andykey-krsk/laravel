@extends('layouts.main')

@section('title', 'Редактирование источника')

@section('content')
    <h1>Редактирование источника</h1>

    <form action="{{ route('source.update', ['source'=>$source->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Название источника</label>
            <input type="text" class="form-control" id="title" name="title"
                   value="{{ old('title', $source->title) }}" required>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description" rows="3"
                      required> {{ old('description', $source->description) }}</textarea>
        </div>
        <div class="form-group">
            <label for="url">Адрес/Ссылка</label>
            <input type="text" class="form-control" id="url" name="url"
                   value="{{ old('url', $source->url) }}" required>
        </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
            <a href="{{ route('source.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection
