@extends('layouts.app')

@section('title', 'Admin Parser')

@section('content')
    <h3>Выберите источник</h3>
    {{ $sources->links() }}
    <form action="{{ route('parser.parse') }}" method="post" name="formparser">
        @csrf
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">
                    <input type="checkbox" id="parser" name="parser">
                </th>
                <th scope="col" width="60%">Источник</th>
                <th scope="col" width="40%">Рубрика</th>
            </tr>
            </thead>
            <tbody>

            @foreach($sources as $key => $source)
                <tr>
                    <td>
                        <input name="sources[]" type="checkbox" value="{{ $source->id }}"
                               id="{{ sprintf('checkbox%s', $source->id) }}" class="check">
                    </td>
                    <td>
                        <label class="form-check-label" for="{{ sprintf('checkbox%s', $source->id) }}">
                            {{ $source->source }}
                        </label>
                    </td>
                    <td>
                        <select class="form-control" id="{{ sprintf('select%s', $source->id) }}" name="categories[]">
                            <option value="0">-----------------</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        <input type="submit" class="btn btn-primary mt-3" value="Запустить парсиннг">
    </form>
    {{ $sources->links() }}
@endsection
