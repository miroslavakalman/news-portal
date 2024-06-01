@extends('layouts.admin')

@section('content')
<a href="{{ route('admin.posts.index', $post) }}">Назад</a>
<a href="{{ route('admin.posts.edit', $post) }}">Редактировать</a>

    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <p>Тэги: {{ $post->tags }}</p>
    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}">

    <form action="{{ route('admin.posts.destroy', $post) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Удалить</button>
    </form>
@endsection
