@extends('layouts.app')

@section('title', 'Адин-панель заказов')

@section('content')
    <h1>Заказы</h1>
    {{ $orders->links() }}
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Имя</th>
            <th scope="col">Телефон</th>
            <th scope="col">Электронная почта</th>
            <th scope="col">Подробности</th>
            <th scope="col">Создан</th>
            <th scope="col">Обновлен</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>

        @forelse($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->name }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->email }}</td>
                <td>{{ $order->comment }}</td>
                <td>{{ $order->created_at }}</td>
                <td>{{ $order->updated_at }}</td>
                <td>
                    <a href="{{ route('order.edit', ['order' => $order->id]) }}" class="text-dark mr-3"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i><i class="fas fa-edit"></i></a>
                    <a href="#" class="text-danger delete-button" data-type="order" data-id="{{ $order->id }}">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        @empty
            <h3>Пока нет закавов</h3>
        @endforelse
        </tbody>
    </table>
    {{ $orders->links() }}
@endsection
