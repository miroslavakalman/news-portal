@extends('layouts.admin')

@section('content')
    <div>
        <h2>Редактировать статью</h2>
        <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="title">Заголовок:</label><br>
            <input type="text" id="title" name="title" value="{{ $post->title }}"><br>

            <label for="category">Категория:</label><br>
            <input type="text" id="category" name="category" value="{{ $post->category }}"><br>

            <label for="description">Описание:</label><br>
            <textarea id="description" name="description">{{ $post->description }}"></textarea><br>

            <label for="tags">Тэги:</label><br>
            <input type="text" id="tags" name="tags" value="{{ $post->tags }}"><br>

            <label for="image">Картинка:</label><br>
            <input type="file" id="image" name="image"><br>

            <button type="submit">Обновить</button>
            <a href="{{ route('admin.posts.show', $post) }}">Назад</a>

        </form>
    </div>
@endsection
