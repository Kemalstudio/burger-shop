@extends('layouts.app')

@section('title', 'Создать слайд')

@section('content')
    <div class="container mt-5">
        <h1>Создать слайд</h1>
        <form method="POST" action="{{ route('admin.sliders.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Заголовок</label>
                <input name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Описание</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>Изображение</label>
                <input name="image" type="file" class="form-control" accept="image/*" required>
            </div>
            <div class="form-group">
                <label>Текст кнопки</label>
                <input name="button_text" class="form-control">
            </div>
            <div class="form-group">
                <label>URL кнопки</label>
                <input name="button_url" class="form-control">
            </div>
            <div class="form-group form-check">
                <input name="is_active" type="checkbox" class="form-check-input" id="is_active">
                <label for="is_active" class="form-check-label">Активен</label>
            </div>
            <button class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
