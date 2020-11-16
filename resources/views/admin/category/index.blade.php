@extends('layouts.app')

@section('title', 'Адин-панель рубрик')

@section('content')
    <h1>Рубрики</h1>
    <a href="{{ route('category.create') }}" class="btn btn-primary mb-3 float-right">Добавить рубрику</a>
    {{ $categories->links() }}
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Рубрика</th>
            <th scope="col">Описание</th>
            <th scope="col">Фото</th>
            <th scope="col">Создана</th>
            <th scope="col">Обновлена</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>

        @forelse($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td><img src="{{ $category->photo }}" alt="" style="max-width: 300px;"></td>
                <td>{{ $category->created_at }}</td>
                <td>{{ $category->updated_at }}</td>
                <td>
                    <a href="{{ route('category.edit', ['category' => $category->id]) }}" class="text-dark mr-3"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i><i class="fas fa-edit"></i></a>
                    <a href="#" class="text-danger delete-button" data-type="category" data-id="{{ $category->id }}">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        @empty
            <h3>Пока нет рубрик</h3>
        @endforelse
        </tbody>
    </table>
    {{ $categories->links() }}
@endsection
