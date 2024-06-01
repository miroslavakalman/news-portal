<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новостной портал</title>
    <link rel="stylesheet" href="{{ asset('/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
    <a href="/"><p>новостной портал.</p></a>
        <div class="images">
            <a href="/new-register"><img src="/img/image 26.png" alt=""></a>
            <a href="/admin/posts"><img src="/img/image 27.png" alt=""></a>
        </div>
    </nav>
    <div class="input-group">
        <form action="{{ route('search') }}" method="GET">
            <input type="text" class="form-control" name="tag" placeholder="поиск новости по тегу">
            <div class="input-group-append">
                <button class="btn" type="submit">Поиск</button>
            </div>
        </form>
    </div>
    <p class="news-title">Статьи</p>
    <div class="news-container">
        @foreach($posts as $post)
        <a href="{{ route('posts.show', $post->id) }}">
            <div class="card">
                <img src="{{ asset( $post->image) }}" alt="{{ $post->title }}" style="width: 120px;">
                <h2>{{ $post->title }}</h2>
                <p>Категория: {{ $post->category }}</p>
                <p>Теги: {{ $post->tags }}</p>
            </div>
        </a>    
        @endforeach
    </div>
    <footer>
    <nav>
    <a href="/"><p>новостной портал.</p></a>
        <div class="images">
            <a href="/new-register"><img src="/img/image 26.png" alt=""></a>
            <a href="/admin/posts"><img src="/img/image 27.png" alt=""></a>
        </div>
    </nav>
    </footer>
</body>
</html>
