@extends('layouts.app')

@section('title', 'Новость')

@section('content')
    <div class="card h-100">
        @if($news->get(0)->photo)
            <div style="height: 300px; overflow: hidden;">
                <img src="{{ $news->get(0)->photo }}" class="card-img-top" alt="...">
            </div>
        @endif
        <div class="card-body">
            <h1 class="card-title">{{ $news->get(0)->title }}</h1>
            <p class="card-text">{!! $news->get(0)->full_text !!}</p>
        </div>
    </div>

@endsection
