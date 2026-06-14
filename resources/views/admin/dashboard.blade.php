@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="container mt-5">
        <h1>Панель администратора</h1>
        <div class="row mt-4">
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5>Пользователи</h5>
                        <p class="h3">{{ $users }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5>Товары</h5>
                        <p class="h3">{{ $products }}</p>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-primary">Управление</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5>Заказы</h5>
                        <p class="h3">{{ $orders }}</p>
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-primary">Все заказы</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5>Слайды</h5>
                        <p class="h3">{{ $sliders }}</p>
                        <a href="{{ route('admin.sliders.index') }}" class="btn btn-sm btn-primary">Управление</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <h3>Быстрые ссылки</h3>
                <div class="list-group">
                    <a href="{{ route('admin.products.index') }}" class="list-group-item list-group-item-action">
                        <strong>Управление товарами</strong>
                    </a>
                    <a href="{{ route('admin.categories.index') }}" class="list-group-item list-group-item-action">
                        <strong>Управление категориями</strong>
                    </a>
                    <a href="{{ route('admin.additives.index') }}" class="list-group-item list-group-item-action">
                        <strong>Управление добавками</strong>
                    </a>
                    <a href="{{ route('admin.sliders.index') }}" class="list-group-item list-group-item-action">
                        <strong>Управление слайдами</strong>
                    </a>
                    <a href="{{ route('admin.orders.index') }}" class="list-group-item list-group-item-action">
                        <strong>Управление заказами</strong>
                    </a>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <h3>Последние заказы</h3>
                @if($recentOrders->isEmpty())
                    <p>Заказов пока нет.</p>
                @else
                    <table class="table table-striped">
                        <thead><tr><th>ID</th><th>Клиент</th><th>Статус</th><th>Сумма</th><th>Дата</th><th></th></tr></thead>
                        <tbody>
                        @foreach($recentOrders as $order)
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
                @endif
            </div>
        </div>
    </div>
@endsection
