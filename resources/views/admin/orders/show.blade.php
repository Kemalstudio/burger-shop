@extends('layouts.app')

@section('title', 'Заказ #' . $order->id)

@section('content')
    <div class="container mt-5">
        <h1>Заказ #{{ $order->id }}</h1>

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Информация клиента</h5>
                        <p><strong>Имя:</strong> {{ $order->user->name }}</p>
                        <p><strong>Email:</strong> {{ $order->user->email }}</p>
                        <p><strong>Адрес доставки:</strong> {{ $order->delivery_address ?? '—' }}</p>
                        <p><strong>Телефон:</strong> {{ $order->phone ?? '—' }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Статус заказа</h5>
                        <form method="POST" action="{{ route('admin.orders.update-status', $order) }}">
                            @csrf
                            @method('PUT')
                            <select name="status" class="form-control">
                                <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>В ожидании</option>
                                <option value="confirmed" {{ $order->status === 'confirmed' ? 'selected' : '' }}>Подтвержден</option>
                                <option value="preparing" {{ $order->status === 'preparing' ? 'selected' : '' }}>Готовится</option>
                                <option value="ready" {{ $order->status === 'ready' ? 'selected' : '' }}>Готово</option>
                                <option value="delivered" {{ $order->status === 'delivered' ? 'selected' : '' }}>Доставлено</option>
                                <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Отменено</option>
                            </select>
                            <button class="btn btn-primary mt-2">Обновить статус</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <h3>Товары в заказе</h3>
        <table class="table">
            <thead><tr><th>Товар</th><th>Цена</th><th>Кол-во</th><th>Добавки</th><th>Сумма</th></tr></thead>
            <tbody>
            @foreach($order->items as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ number_format($item->product->price, 2) }} TMT</td>
                    <td>{{ $item->quantity }}</td>
                    <td>
                        @if($item->selected_additives)
                            @php
                                $additiveIds = json_decode($item->selected_additives, true) ?? [];
                            @endphp
                            @foreach($additiveIds as $additiveId)
                                @php
                                    $additive = \App\Models\Additive::find($additiveId);
                                @endphp
                                @if($additive)
                                    <span class="badge badge-info">{{ $additive->name }}</span>
                                @endif
                            @endforeach
                        @else
                            —
                        @endif
                    </td>
                    <td>{{ number_format($item->product->price * $item->quantity, 2) }} TMT</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="row mt-3">
            <div class="col-md-6">
                <h4>Итого:</h4>
                <p><strong>Подитог:</strong> {{ number_format($order->subtotal, 2) }} TMT</p>
                <p><strong>Доставка:</strong> {{ number_format($order->shipping ?? 0, 2) }} TMT</p>
                <p><strong>Скидка:</strong> {{ number_format($order->discount ?? 0, 2) }} TMT</p>
                <h5><strong>Итог:</strong> {{ number_format($order->total, 2) }} TMT</h5>
            </div>
        </div>

        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary mt-3">Назад к заказам</a>
    </div>
@endsection
