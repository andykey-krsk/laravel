@extends('layouts.app')

@section('title', 'Редактировать пользователя')

@section('content')
    <h1>Редактировать пользователя</h1>
    <form action="{{ route('user.update', ['user' => $user->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}">
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="is_admin" name="is_admin" value="1" @if($user->is_admin) checked @endif>
                    <label class="form-check-label" for="is_admin">Права администратора</label>
                </div>

            </div>

            <div class="col-md-4">
                <div class="card bg-light mb-3" style="max-width: 100%;">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary btn-block">Изменить</button>
                        <a href="{{ route('user.index') }}" class="btn btn-secondary btn-block">Отмена</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
