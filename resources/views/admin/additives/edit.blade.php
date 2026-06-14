@extends('layouts.app')

@section('title', 'Редактировать добавку')

@section('content')
    <div class="container mt-5">
        <h1>Редактировать добавку</h1>
        <form method="POST" action="{{ route('admin.additives.update', $additive) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Название</label>
                <input name="name" class="form-control" value="{{ $additive->name }}" required>
            </div>
            <div class="form-group">
                <label>Цена</label>
                <input name="price" type="number" step="0.01" class="form-control" value="{{ $additive->price }}" required>
            </div>
            <div class="form-group">
                <label>Изображение</label>
                @if($additive->image)
                    <div class="mb-2"><img src="{{ $additive->image }}" alt="{{ $additive->name }}" style="max-width: 100px;"></div>
                @endif
                <input name="image" type="file" class="form-control" accept="image/*">
            </div>
            <button class="btn btn-primary">Обновить</button>
        </form>
    </div>
@endsection
