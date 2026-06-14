@extends('layouts.app')

@section('title', 'Добавки для товара')

@section('content')
    <div class="container mt-5">
        <h1>Добавки для товара "{{ $product->name }}"</h1>
        <form method="POST" action="{{ route('admin.products.additives.update', $product) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Выберите добавки:</label>
                <div class="border p-3" style="max-height: 400px; overflow-y: auto;">
                    @foreach($allAdditives as $additive)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="additives[]" value="{{ $additive->id }}" 
                                   id="additive_{{ $additive->id }}" 
                                   {{ $product->additives->contains('id', $additive->id) ? 'checked' : '' }}>
                            <label class="form-check-label" for="additive_{{ $additive->id }}">
                                {{ $additive->name }} ({{ number_format($additive->price, 2) }} TMT)
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            <button class="btn btn-primary mt-3">Сохранить</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary mt-3">Назад</a>
        </form>
    </div>
@endsection
