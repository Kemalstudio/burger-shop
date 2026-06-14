@extends('layouts.app')

@section('title', 'Избранное')

@section('content')
    <div class="container mt-5">
        <h1>Мое избранное</h1>
        @if($favorites->isEmpty())
            <div class="alert alert-info">Ваше избранное пусто.</div>
        @else
            <div class="row">
                @foreach($favorites as $fav)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            @if($fav->product->image)
                                <img src="{{ $fav->product->image }}" class="card-img-top" alt="{{ $fav->product->name }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $fav->product->name }}</h5>
                                <p class="card-text">{{ number_format($fav->product->price, 2) }} TMT</p>
                                <a href="{{ route('menu') }}" class="btn btn-sm btn-primary">Выбрать</a>
                                <form action="{{ route('favorites.toggle') }}" method="POST" style="display:inline-block">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $fav->product->id }}">
                                    <button class="btn btn-sm btn-danger">Удалить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
