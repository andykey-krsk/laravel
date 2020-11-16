@extends('layouts.app')

@section('title', 'Адин-панель пользователей')

@section('content')
    <h1>Пользователи</h1>
    @if(!empty($user))
        <div class="alert alert-success" role="alert">
            Пользователь <a href="{{ route('user.edit', $newUser->id) }}">"{{ $newUser->name }}"</a> успешно создан!
        </div>
    @endif
    <a href="{{ route('user.create') }}" class="btn btn-primary mb-3 float-right">Добавить пользователя</a>
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Имя</th>
            <th scope="col">E-mail</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>

        @forelse($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('user.edit', ['user' => $user->id]) }}" class="text-dark mr-3"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i><i class="fas fa-edit"></i></a>
                    <a href="#" class="text-danger delete-button" data-type="news" data-id="{{ $user->id }}">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        @empty
            <h1>Нет пользователей</h1>
        @endforelse
        {{ $users->links() }}
        </tbody>
    </table>
@endsection
