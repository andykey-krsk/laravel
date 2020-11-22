@extends('layouts.app')

@section('title', 'Изменить пароль')

@section('content')
    <h3>Изменить пароль для пользователя <strong>{{ $user->name }}</strong></h3>
    <form action="{{ route('user.password.update', ['user' => $user->id]) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="old_password">Старый пароль</label>
                    <input type="password" class="form-control" id="old_password" name="old_password">
                </div>
                <div class="form-group">
                    <label for="password">Новый пароль</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Подтверждение нового пароля</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                    <button type="submit" class="btn btn-primary btn-block">Изменить пароль</button>
            </div>
            <div class="col-md-4">
                <a href="{{ route('user.index') }}" class="btn btn-secondary btn-block">Отмена</a>
            </div>
        </div>
    </form>
@endsection
