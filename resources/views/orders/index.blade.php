@extends('layouts.app')

@section('title', 'Мои заказы')

@section('content')
    <div class="container mt-5">
        <h1>Мои заказы</h1>
        @if($orders->isEmpty())
            <div class="alert alert-info">Заказов пока нет.</div>
            <a href="{{ route('menu') }}" class="btn btn-primary">Перейти в меню</a>
        @else
            <div class="row">
                @foreach($orders as $order)
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Заказ #{{ $order->id }}</h5>
                                <p class="card-text">
                                    <strong>Статус:</strong> {{ $order->status }}<br>
                                    <strong>Дата:</strong> {{ $order->created_at->format('d.m.Y H:i') }}<br>
                                    <strong>Адрес:</strong> {{ $order->delivery_address }}<br>
                                    <strong>Сумма:</strong> {{ number_format($order->total, 2) }} TMT<br>
                                    <strong>Товаров:</strong> {{ $order->items->count() }}
                                </p>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#orderModal{{ $order->id }}">
                                        Подробнее
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal для деталей заказа -->
                    <div class="modal fade" id="orderModal{{ $order->id }}" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Заказ #{{ $order->id }}</h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table">
                                        <thead>
                                            <tr><th>Товар</th><th>Кол-во</th><th>Цена</th><th>Сумма</th></tr>
                                        </thead>
                                        <tbody>
                                        @foreach($order->items as $item)
                                            <tr>
                                                <td>{{ $item->product->name }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ number_format($item->unit_price, 2) }} TMT</td>
                                                <td>{{ number_format($item->unit_price * $item->quantity, 2) }} TMT</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <hr>
                                    <p><strong>Статус:</strong> {{ $order->status }}</p>
                                    <p><strong>Адрес доставки:</strong> {{ $order->delivery_address }}</p>
                                    <p><strong>Телефон:</strong> {{ $order->customer_phone }}</p>
                                    <p><strong>Итого:</strong> {{ number_format($order->total, 2) }} TMT</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
