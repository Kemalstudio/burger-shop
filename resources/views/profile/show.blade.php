@extends('layouts.app')

@section('title', 'Профиль')

@section('content')
    <div class="container mt-5">
        <h1>Мой профиль</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Информация профиля</h5>
                        <p><strong>Имя:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Телефон:</strong> {{ $user->phone ?? '—' }}</p>
                        <p><strong>Адрес:</strong> {{ $user->address ?? '—' }}</p>
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Редактировать</a>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="mt-5">Мои заказы</h2>
        @if($orders->isEmpty())
            <p>Заказов пока нет.</p>
        @else
            <table class="table">
                <thead><tr><th>ID</th><th>Статус</th><th>Сумма</th><th>Дата</th><th></th></tr></thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ number_format($order->total, 2) }} TMT</td>
                        <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                        <td><a href="#" class="btn btn-sm btn-info">Подробнее</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
