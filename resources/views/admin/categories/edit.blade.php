@extends('layouts.app')

@section('title', 'Редактировать категорию')

@section('content')
    <div class="container mt-5">
        <h1>Редактировать категорию</h1>
        <form method="POST" action="{{ route('admin.categories.update', $category) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Название</label>
                <input name="name" class="form-control" value="{{ $category->name }}" required>
            </div>
            <div class="form-group">
                <label>Родительская категория</label>
                <select name="parent_id" class="form-control">
                    <option value="">—</option>
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}" {{ $category->parent_id == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary">Обновить</button>
        </form>
    </div>
@endsection
