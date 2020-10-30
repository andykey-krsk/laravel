@extends('layouts.main')

@section('title', 'Добро пожаловать!')

@section('content')

    <div class="row justify-content-center">
        <div class="card text-center " style="width: 30rem;">
            <img
                src="https://images.unsplash.com/photo-1495020689067-958852a7765e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80"
                class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Много разных новостей</h5>
                <a href="/news/" class="btn btn-primary">Читать</a>
            </div>
        </div>
    </div>

@endsection
