@extends('layouts.app')

@section('title', 'Редактирование новости')

@section('content')
    <form action="{{ route('news.update', ['news' => $news->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input type="text" class="form-control" id="title" name="title"
                           value="{{ old('title', $news->title) }}">
                </div>
                <div class="form-group">
                    <label for="category">Категория</label>
                    <select class="form-control" id="category" name="category">
                        @foreach($categories as $category)
                            <option
                                value="{{ $category->id }}"
                                @if($category->id == $news->category_id) selected @endif
                            >{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="photo">Фотография</label>
                    <input type="text" class="form-control" id="photo" name="photo" placeholder="Ссылка..."
                           value="{{ old('photo', $news->photo) }}">
                </div>
                <div class="form-group">
                    <label for="short-text">Короткий текст</label>
                    <textarea class="form-control" id="short-text" name="short_text"
                              rows="3">{{ old('short_text', $news->short_text) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="full-text">Полный текст</label>
                    <textarea class="form-control" id="full-text" name="full_text"
                              rows="7">{{ old('full_text', $news->full_text) }}</textarea>
                </div>
                <label for="source">Источник</label>
                <select class="form-control" id="source" name="source_id">
                    @foreach($sources as $source)
                        <option value="{{ $source->id }}"
                                @if($source->id == $news->source_id) selected @endif
                        >{{ $source->source }} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <div class="card bg-light mb-3" style="max-width: 100%;">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary btn-block">Сохранить</button>
                        <a href="{{ route('news.index') }}" class="btn btn-secondary btn-block">Отмена</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src=" {{ asset('js/ckeditor/ckeditor.js') }} "></script>
    <script>
        let options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Image',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Image&token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&token=',
        };
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            CKEDITOR.replace('full-text', options);
        });
    </script>
@endsection
