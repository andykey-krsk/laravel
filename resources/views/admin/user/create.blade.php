@extends('layouts.app')

@section('title', 'Добавить пользователя')

@section('content')
    <h1>Добавить пользователя</h1>
    @if(isset($errors) && !empty($errors))
        @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">{{ $error }}</div>
        @endforeach
    @endif
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Подтверждение пароля</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="is_admin" name="is_admin" value="1">
                    <label class="form-check-label" for="is_admin">Права администратора</label>
                </div>

            </div>

            <div class="col-md-4">
                <div class="card bg-light mb-3" style="max-width: 100%;">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary btn-block">Добавить</button>
                        <a href="{{ route('user.index') }}" class="btn btn-secondary btn-block">Отмена</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
