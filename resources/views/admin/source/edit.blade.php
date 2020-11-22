@extends('layouts.app')

@section('title', 'Редактирование источника')

@section('content')
    <h1>Редактирование источника</h1>
    <form action="{{ route('source.update', ['source'=>$source->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="source">Название источника</label>
            <input type="text" class="form-control" id="source" name="source"
                   value="{{ old('source', $source->source) }}" >
        </div>
        <div class="form-group">
            <label for="url">Адрес/Ссылка</label>
            <input type="text" class="form-control" id="url" name="url"
                   value="{{ old('url', $source->url) }}" >
        </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
            <a href="{{ route('source.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection
