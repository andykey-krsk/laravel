@extends('layouts.main')

@section('title', 'Адин-панель отзывов')

@section('content')
    <h1>Отзывы</h1>
    {{ $feedbacks->links() }}
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Имя</th>
            <th scope="col">Комментарий</th>
            <th scope="col">Создан</th>
            <th scope="col">Обновлен</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>

        @forelse($feedbacks as $feedback)
            <tr>
                <td>{{ $feedback->id }}</td>
                <td>{{ $feedback->name }}</td>
                <td>{{ $feedback->comment }}</td>
                <td>{{ $feedback->created_at }}</td>
                <td>{{ $feedback->updated_at }}</td>
                <td>
                    <a href="{{ route('feedback.edit', ['feedback' => $feedback->id]) }}" class="text-dark mr-3"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i><i class="fas fa-edit"></i></a>
                    <a href="#" class="text-danger delete-button" data-type="feedback" data-id="{{ $feedback->id }}">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        @empty
            <h3>Пока нет отзывов</h3>
        @endforelse
        </tbody>
    </table>
    {{ $feedbacks->links() }}
@endsection
