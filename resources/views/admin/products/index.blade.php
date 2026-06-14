@extends('layouts.app')

@section('title', 'Управление товарами')

@section('content')
    <div class="container mt-5">
        <h1>Товары</h1>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Добавить товар</a>
        <table class="table">
            <thead><tr><th>ID</th><th>Название</th><th>Категория</th><th>Цена</th><th></th></tr></thead>
            <tbody>
            @foreach($products as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->category?->name }}</td>
                    <td>{{ number_format($p->price, 2) }}</td>
                    <td>
                        <a href="{{ route('admin.products.edit', $p) }}" class="btn btn-sm btn-secondary">Изменить</a>
                        <a href="{{ route('admin.products.additives.edit', $p) }}" class="btn btn-sm btn-info">Добавки</a>
                        <form action="{{ route('admin.products.destroy', $p) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
@endsection
