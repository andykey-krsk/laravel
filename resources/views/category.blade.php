@extends('layouts.app')

@section('title', 'Category page')

@section('content')
    @php $counter = 0; @endphp
    @foreach($categories as $category)
        @if($counter % 3 == 0)
            <div class="row mb-3">
                @endif

                <div class="card mx-auto" style="width: 18rem; height: 520px">
                    <div style="height: 16rem; overflow:hidden;">
                        <img src="{{ $category->photo }}" class="card-img-top"
                             alt="{{ $category->name }}">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <p class="card-text"> {{ $category->description }} </p>
                        <a href="{{ route('category.news', ['categoryId' => $category->id]) }}"
                           class="btn btn-primary" style="position: absolute; bottom: 20px">Читать</a>
                    </div>
                </div>

        @php $counter++ @endphp
        @if($counter % 3 == 0 || $counter == count($categories))
            </div>
        @endif
    @endforeach
@endsection
