@extends('layouts.app')

@section('title', 'Заказы')

@section('content')
    <div class="container mt-5">
        <h1>Управление заказами</h1>
        <table class="table">
            <thead><tr><th>ID</th><th>Клиент</th><th>Статус</th><th>Сумма</th><th>Дата</th><th></th></tr></thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>#{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ number_format($order->total, 2) }} TMT</td>
                    <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                    <td><a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-info">Подробнее</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $orders->links() }}
    </div>
@endsection
