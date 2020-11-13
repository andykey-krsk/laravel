@extends('layouts.main')

@section('title', 'Создание источника')

@section('content')
    <h1>Создание источника</h1>

    <form action="{{ route('source.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title"> Название источника </label>
            <input type="text" class="form-control" id="title" name="title"
                   value="{{ old('title') }}" required>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description" rows="3"
                      required> {{ old('description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="url">Адрес/Ссылка</label>
            <input type="text" class="form-control" id="url" name="url"
                   value="{{ old('url') }}" required>
        </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
            <a href="{{ route('source.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection
