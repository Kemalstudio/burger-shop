@extends('layouts.app')

@section('title', 'Редактировать товар')

@section('content')
    <div class="container mt-5">
        <h1>Редактировать товар</h1>
        <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Название</label>
                <input name="name" class="form-control" value="{{ $product->name }}" required>
            </div>
            <div class="form-group">
                <label>Описание</label>
                <textarea name="description" class="form-control">{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <label>Цена</label>
                <input name="price" type="number" step="0.01" class="form-control" value="{{ $product->price }}" required>
            </div>
            <div class="form-group">
                <label>Изображение</label>
                @if($product->image)
                    <div class="mb-2"><img src="{{ $product->image }}" alt="{{ $product->name }}" style="max-width: 150px;"></div>
                @endif
                <input name="image" type="file" class="form-control" accept="image/*">
            </div>
            <div class="form-group">
                <label>Категория</label>
                <select name="category_id" class="form-control">
                    <option value="">—</option>
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}" {{ $product->category_id == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Вес (г)</label>
                <input name="weight" type="number" class="form-control" value="{{ $product->weight }}">
            </div>
            <div class="form-group form-check">
                <input name="is_popular" type="checkbox" class="form-check-input" id="is_popular" {{ $product->is_popular ? 'checked' : '' }}>
                <label for="is_popular" class="form-check-label">Хит</label>
            </div>
            <div class="form-group form-check">
                <input name="is_new" type="checkbox" class="form-check-input" id="is_new" {{ $product->is_new ? 'checked' : '' }}>
                <label for="is_new" class="form-check-label">Новинка</label>
            </div>
            <button class="btn btn-primary">Обновить</button>
        </form>
    </div>
@endsection
