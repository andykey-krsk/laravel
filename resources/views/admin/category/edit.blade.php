@extends('layouts.main')

@section('title', 'Редактирование рубрики')

@section('content')
    <h1>Редактирование рубрики</h1>

    <form action="{{ route('category.update', ['category'=>$category->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Название рубрики</label>
            <input type="text" class="form-control" id="name" name="name"
                   value="{{ old('name', $category->name) }}" required>
        </div>
        <div class="form-group">
        <label for="photo">Фото</label>
        <input type="text" class="form-control" id="photo" name="photo"
               value="{{ old('photo', $category->photo) }}" required>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description" rows="3"
                      required> {{ old('description', $category->description) }}</textarea>
        </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
            <a href="{{ route('category.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection
