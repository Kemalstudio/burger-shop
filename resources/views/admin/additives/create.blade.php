@extends('layouts.app')

@section('title', 'Создать добавку')

@section('content')
    <div class="container mt-5">
        <h1>Создать добавку</h1>
        <form method="POST" action="{{ route('admin.additives.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Название</label>
                <input name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Цена</label>
                <input name="price" type="number" step="0.01" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Изображение</label>
                <input name="image" type="file" class="form-control" accept="image/*">
            </div>
            <button class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
