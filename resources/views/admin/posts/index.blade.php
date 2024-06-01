@extends('layouts.admin')

@section('content')
    <h1>Все новости</h1>
    <a href="{{ route('admin.posts.create')}}">Создать новость</a>
    <a href="{{ route('admin.users.index')}}">Пользователи</a>
    <a href="{{ route('admin.comments.index')}}">Комментарии</a>


    <ul>
        @foreach($posts as $post)
            <li>
                <a href="{{ route('admin.posts.show', $post) }}">{{ $post->title }}</a>
            </li>
        @endforeach
    </ul>
@endsection
