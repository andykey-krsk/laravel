
@extends('layouts.main')

@section('title', 'Новости категории')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">{{ $news->get(0)->category_name }}</h1>
        </div>
    </div>

    @forelse ($news as $oneNews)
        <div class="card mb-3" >
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="{{ $oneNews->photo }}" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{ route('news.id', ['id' => $oneNews->id]) }}">{{ $oneNews->title }}</a></h5>
                        <p class="card-text">{{ $oneNews->short_text }}</p>
                    </div>
                </div>
            </div>
        </div>

    @empty
        <h1>Новостей нет.</h1>
    @endforelse

@endsection
