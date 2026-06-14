@extends('layouts.app')

@section('title', 'Создать товар')

@section('content')
    <div class="container mt-5">
        <h1>Создать товар</h1>
        <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Название</label>
                <input name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Описание</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>Цена</label>
                <input name="price" type="number" step="0.01" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Изображение</label>
                <input name="image" type="file" class="form-control" accept="image/*">
            </div>
            <div class="form-group">
                <label>Категория</label>
                <select name="category_id" class="form-control">
                    <option value="">—</option>
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Вес (г)</label>
                <input name="weight" type="number" class="form-control">
            </div>
            <div class="form-group form-check">
                <input name="is_popular" type="checkbox" class="form-check-input" id="is_popular">
                <label for="is_popular" class="form-check-label">Хит</label>
            </div>
            <div class="form-group form-check">
                <input name="is_new" type="checkbox" class="form-check-input" id="is_new">
                <label for="is_new" class="form-check-label">Новинка</label>
            </div>
            <button class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
