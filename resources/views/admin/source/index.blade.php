@extends('layouts.main')

@section('title', 'Адин-панель источников')

@section('content')
    <h1>Источники</h1>
    <a href="{{ route('source.create') }}" class="btn btn-primary mb-3 float-right">Добавить источник</a>
    {{ $sources->links() }}
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Источник</th>
            <th scope="col">Описание</th>
            <th scope="col">Адрес/Ссылка</th>
            <th scope="col">Новостей</th>
            <th scope="col">Создан</th>
            <th scope="col">Обновлен</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>

        @forelse($sources as $source)
            <tr>
                <td>{{ $source->id }}</td>
                <td>{{ $source->title }}</td>
                <td>{{ $source->description }}</td>
                <td><a href="{{ $source->url }}" target="_blank">{{ $source->url }}</a>></td>
                <td> ? </td>
                <td>{{ $source->created_at }}</td>
                <td>{{ $source->updated_at }}</td>
                <td>
                    <a href="{{ route('source.edit', ['source' => $source->id]) }}" class="text-dark mr-3"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i><i class="fas fa-edit"></i></a>
                    <a href="#" class="text-danger delete-button" data-type="source" data-id="{{ $source->id }}">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        @empty
            <h3>Пока нет источников</h3>
        @endforelse
        </tbody>
    </table>
    {{ $sources->links() }}
@endsection
