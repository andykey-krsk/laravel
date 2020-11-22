@extends('layouts.app')

@section('title', 'Создание источника')

@section('content')
    <h1>Создание источника</h1>
    <form action="{{ route('source.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="source"> Название источника </label>
            <input type="text" class="form-control" id="source" name="source"
                   value="{{ old('source') }}" >
        </div>
        <div class="form-group">
            <label for="url">Адрес</label>
            <input type="text" class="form-control" id="url" name="url"
                   value="{{ old('url') }}" >
        </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
            <a href="{{ route('source.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection
