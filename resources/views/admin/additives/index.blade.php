@extends('layouts.app')

@section('title', 'Добавки')

@section('content')
    <div class="container mt-5">
        <h1>Добавки</h1>
        <a href="{{ route('admin.additives.create') }}" class="btn btn-primary mb-3">Добавить</a>
        <table class="table">
            <thead><tr><th>ID</th><th>Название</th><th>Цена</th><th></th></tr></thead>
            <tbody>
            @foreach($additives as $a)
                <tr>
                    <td>{{ $a->id }}</td>
                    <td>{{ $a->name }}</td>
                    <td>{{ number_format($a->price, 2) }}</td>
                    <td>
                        <a href="{{ route('admin.additives.edit', $a) }}" class="btn btn-sm btn-secondary">Изменить</a>
                        <form action="{{ route('admin.additives.destroy', $a) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $additives->links() }}
    </div>
@endsection
