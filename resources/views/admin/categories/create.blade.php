@extends('layouts.app')

@section('title', 'Создать категорию')

@section('content')
    <div class="container mt-5">
        <h1>Создать категорию</h1>
        <form method="POST" action="{{ route('admin.categories.store') }}">
            @csrf
            <div class="form-group">
                <label>Название</label>
                <input name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Родительская категория</label>
                <select name="parent_id" class="form-control">
                    <option value="">—</option>
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
