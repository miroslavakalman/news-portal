<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
    <link rel="stylesheet" href="{{ asset('/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet"></head>
<body>
<nav>
    <a href="/"><p>новостной портал.</p></a>
        <div class="images">
            <a href="/new-register"><img src="/img/image 26.png" alt=""></a>
            <a href="/admin/posts"><img src="/img/image 27.png" alt=""></a>
        </div>
    </nav>
    <div class="post-detail">
        <h1>{{ $post->title }}</h1>
        <img src="{{ asset( $post->image) }}" alt="{{ $post->title }}">
        <p>Категория: {{ $post->category }}</p>
        <p>Теги: {{ $post->tags }}</p>
        <p>{{ $post->content }}</p>
    </div>
    <a href="{{ route('welcome') }}" class="btn">Назад на главную</a>
    <h1>Добавить комментарий</h1>
    <form action="{{ route('comments.store') }}" method="POST">
    @csrf
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <div class="mb-3">
        <label for="name" class="form-label">Ваше имя</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Ваш Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Ваш комментарий</label>
        <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Отправить комментарий</button>
</form>

    <h1>Комментарии</h1>
    @foreach ($post->comments as $comment)
    <div class="comment">
        <p>Автор: {{ $comment->name }}</p>
        <p>{{ $comment->content }}</p>
    </div>
@endforeach

</body>
</html>
