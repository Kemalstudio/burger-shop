@extends('layouts.app')

@section('title', 'Управление категориями')

@section('content')
    <div class="container mt-5">
        <h1>Категории</h1>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">Добавить категорию</a>
        <table class="table">
            <thead><tr><th>ID</th><th>Название</th><th>Родительская</th><th></th></tr></thead>
            <tbody>
            @foreach($categories as $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td>{{ $c->name }}</td>
                    <td>{{ $c->parent?->name ?? '—' }}</td>
                    <td>
                        <a href="{{ route('admin.categories.edit', $c) }}" class="btn btn-sm btn-secondary">Изменить</a>
                        <form action="{{ route('admin.categories.destroy', $c) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>
@endsection
