@extends('layouts.main')

@section('title', 'Создание рубрики')

@section('content')
    <h1>Создание рубрики</h1>

    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Название рубрики</label>
            <input type="text" class="form-control" id="name" name="name"
                   value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
        <label for="photo">Фото</label>
        <input type="text" class="form-control" id="photo" name="photo"
               value="{{ old('photo') }}" required>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description" rows="3"
                      required> {{ old('description') }}</textarea>
        </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
            <a href="{{ route('category.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection
