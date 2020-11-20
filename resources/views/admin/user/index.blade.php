@extends('layouts.app')

@section('title', 'Адин-панель пользователей')

@section('content')
    <h1>Пользователи</h1>
    @if(session('userStore'))
        <div class="alert alert-success" role="alert">
            {{ session('userStore') }}
        </div>
    @endif
    <a href="{{ route('user.create') }}" class="btn btn-primary mb-3 float-right">Добавить пользователя</a>
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Имя</th>
            <th scope="col">E-mail</th>
            <th scope="col">Администратор</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>

        @forelse($users as $user)
            <tr @if($user->id==Auth::user()->id) bgcolor="#fafad2" @endif>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if($user->is_admin)
                        <i class="fas fa-check-square green"></i>
                    @else
                        <i class=" fas fa-square red"></i>
                    @endif
                </td>
                <td>
                    <a href="{{ route('user.password',['user' => $user->id]) }}" class="text-dark mr-3"><i class="fas fa-key"></i></a>
                    <a href="{{ route('user.edit', ['user' => $user->id]) }}" class="text-dark mr-3"><i class="fas fa-edit"></i></a>
                    <a href="#" class="text-danger delete-button" data-type="user" data-id="{{ $user->id }}">
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
