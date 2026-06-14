@extends('layouts.app')

@section('title', 'Редактировать профиль')

@section('content')
    <div class="container mt-5">
        <h1>Редактировать профиль</h1>
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Имя</label>
                <input name="name" class="form-control" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>
            <div class="form-group">
                <label>Телефон</label>
                <input name="phone" class="form-control" value="{{ $user->phone ?? '' }}">
            </div>
            <div class="form-group">
                <label>Адрес</label>
                <textarea name="address" class="form-control">{{ $user->address ?? '' }}</textarea>
            </div>
            <button class="btn btn-primary">Сохранить</button>
            <a href="{{ route('profile.show') }}" class="btn btn-secondary">Отмена</a>
        </form>
    </div>
@endsection
