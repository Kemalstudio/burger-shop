@extends('layouts.app')

@section('title', 'Корзина')

@section('content')
    <div class="container mt-5">
        <h1>Ваша корзина</h1>
        @if($items->isEmpty())
            <div class="alert alert-info">Корзина пуста.</div>
            <a href="{{ route('menu') }}" class="btn btn-primary">Продолжить покупки</a>
        @else
            <table class="table table-striped">
                <thead>
                    <tr><th>Товар</th><th>Добавки</th><th>Кол-во</th><th>Цена единицы</th><th>Сумма</th><th></th></tr>
                </thead>
                <tbody>
                @php $total = 0; @endphp
                @foreach($items as $item)
                    @php $sum = $item->unit_price * $item->quantity; $total += $sum; @endphp
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>
                            @if($item->selected_additives && count($item->selected_additives) > 0)
                                @foreach($item->selected_additives as $additiveId)
                                    @php $additive = \App\Models\Additive::find($additiveId); @endphp
                                    @if($additive)
                                        <span class="badge badge-info">{{ $additive->name }}</span>
                                    @endif
                                @endforeach
                            @else
                                —
                            @endif
                        </td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->unit_price, 2) }} TMT</td>
                        <td><strong>{{ number_format($sum, 2) }} TMT</strong></td>
                        <td>
                            <form method="POST" action="{{ route('cart.remove') }}" style="display:inline-block">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <button class="btn btn-sm btn-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="row mt-4">
                <div class="col-md-6">
                    <a href="{{ route('menu') }}" class="btn btn-secondary">Продолжить покупки</a>
                </div>
                <div class="col-md-6 text-right">
                    <h4>Итого: <strong>{{ number_format($total, 2) }} TMT</strong></h4>
                    <button class="btn btn-success" data-toggle="modal" data-target="#checkoutModal">Оформить заказ</button>
                </div>
            </div>

            <!-- Modal для оформления заказа -->
            <div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('orders.checkout') }}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Оформить заказ</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Ваше имя</label>
                                    <input type="text" name="customer_name" class="form-control" value="{{ Auth::user()->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Телефон</label>
                                    <input type="tel" name="customer_phone" class="form-control" value="{{ Auth::user()->phone ?? '' }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Адрес доставки</label>
                                    <textarea name="delivery_address" class="form-control" required>{{ Auth::user()->address ?? '' }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Комментарий (опционально)</label>
                                    <textarea name="comment" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                <button type="submit" class="btn btn-primary">Подтвердить заказ</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
