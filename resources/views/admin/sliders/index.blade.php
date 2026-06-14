@extends('layouts.app')

@section('title', 'Управление слайдами')

@section('content')
    <div class="container mt-5">
        <h1>Слайды</h1>
        <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary mb-3">Добавить слайд</a>
        <table class="table">
            <thead><tr><th>ID</th><th>Заголовок</th><th>Активен</th><th></th></tr></thead>
            <tbody>
            @foreach($sliders as $s)
                <tr>
                    <td>{{ $s->id }}</td>
                    <td>{{ $s->title }}</td>
                    <td>{{ $s->is_active ? 'Да' : 'Нет' }}</td>
                    <td>
                        <a href="{{ route('admin.sliders.edit', $s) }}" class="btn btn-sm btn-secondary">Изменить</a>
                        <form action="{{ route('admin.sliders.destroy', $s) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $sliders->links() }}
    </div>
@endsection
