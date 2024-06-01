@extends('layouts.admin')

@section('content')
    <h1>Создать статью</h1>
    
    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf

        <label for="title">Заголовок:</label><br>
        <input type="text" id="title" name="title" value="{{ old('title') }}"><br>

        <label for="category">Категория:</label><br>
        <input type="text" id="category" name="category" value="{{ old('category') }}"><br>

        <label for="content">Описание:</label><br>
        <textarea id="content" name="content">{{ old('content') }}</textarea><br>

        <label for="tags">Тэги:</label><br>
        <input type="text" id="tags" name="tags" value="{{ old('tags') }}"><br>

        <label for="image">Картинка:</label><br>
        <input type="text" id="image" name="image" value="{{ old('image') }}"><br>

        <button type="submit">Создать</button>
    </form>
 @endsection