@extends('layouts.app')

@section('title', 'Адин-панель новостей')

@section('content')
    <h1>Новости</h1>
    @if(!empty($newNews))
        <div class="alert alert-success" role="alert">
            Новость <a href="{{ route('news.edit', $newNews->id) }}">"{{ $newNews->title }}"</a> успешно сохранена!
        </div>
    @endif
    <a href="{{ route('news.create') }}" class="btn btn-primary mb-3 float-right">Добавить новость</a>
    {{ $news->links() }}
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Заголовок</th>
            <th scope="col">Текст</th>
            <th scope="col">Фотография</th>
            <th scope="col">Категория</th>
            <th scope="col">Источник</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>

        @forelse($news as $oneNews)
            <tr>
                <td>{{ $oneNews->id }}</td>
                <td>{{ $oneNews->title }}</td>
                <td>{{ $oneNews->short_text }}</td>
                <td><img src="{{ $oneNews->photo }}" alt="" style="max-width: 300px;"></td>
                <td>{{ $categories->get($oneNews->category_id)->name }}</td>
                <td>{{ $sources->get($oneNews->source_id)->title }}</td>
                <td>
                    <a href="{{ route('news.edit', ['news' => $oneNews->id]) }}" class="text-dark mr-3"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i><i class="fas fa-edit"></i></a>
                    <a href="#" class="text-danger delete-button" data-type="news" data-id="{{ $oneNews->id }}">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        @empty
            <h1>Нет новостей</h1>
        @endforelse

        </tbody>
    </table>
    {{ $news->links() }}
@endsection
