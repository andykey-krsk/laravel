@extends('layouts.main')

@section('title', 'Новость')

@section('content')

    <div class="card h-100">
        <div style="height: 300px; overflow: hidden;">
            <img src="{{ $news['photo'] }}" class="card-img-top" alt="...">
        </div>
        <div class="card-body">
            <h1 class="card-title">{{ $news['title'] }}</h1>
            <p class="card-text">{{ $news['text'] }}</p>
        </div>
    </div>

@endsection
