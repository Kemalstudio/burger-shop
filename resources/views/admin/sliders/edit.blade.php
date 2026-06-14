@extends('layouts.app')

@section('title', 'Редактировать слайд')

@section('content')
    <div class="container mt-5">
        <h1>Редактировать слайд</h1>
        <form method="POST" action="{{ route('admin.sliders.update', $slider) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Заголовок</label>
                <input name="title" class="form-control" value="{{ $slider->title }}" required>
            </div>
            <div class="form-group">
                <label>Описание</label>
                <textarea name="description" class="form-control">{{ $slider->description }}</textarea>
            </div>
            <div class="form-group">
                <label>Изображение</label>
                @if($slider->image)
                    <div class="mb-2"><img src="{{ $slider->image }}" alt="{{ $slider->title }}" style="max-width: 200px;"></div>
                @endif
                <input name="image" type="file" class="form-control" accept="image/*">
            </div>
            <div class="form-group">
                <label>Текст кнопки</label>
                <input name="button_text" class="form-control" value="{{ $slider->button_text }}">
            </div>
            <div class="form-group">
                <label>URL кнопки</label>
                <input name="button_url" class="form-control" value="{{ $slider->button_url }}">
            </div>
            <div class="form-group form-check">
                <input name="is_active" type="checkbox" class="form-check-input" id="is_active" {{ $slider->is_active ? 'checked' : '' }}>
                <label for="is_active" class="form-check-label">Активен</label>
            </div>
            <button class="btn btn-primary">Обновить</button>
        </form>
    </div>
@endsection
