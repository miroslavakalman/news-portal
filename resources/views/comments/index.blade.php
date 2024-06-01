@extends('layouts.admin')

@section('content')
    <h1>Комментарии</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Текст</th>
                <th>Автор</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->text }}</td>
                    <td>
                        @if ($comment->user)
                            {{ $comment->user->name }}
                        @else
                            Анонимный пользователь
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
