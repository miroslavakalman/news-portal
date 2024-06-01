<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Результаты поиска</title>
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
    <div class="news-container">
        <h2>Результаты поиска по тегу: "{{ $tag }}"</h2>
        @if ($posts->isEmpty())
            <p>Ничего не найдено.</p>
        @else
            @foreach($posts as $post)
                <div class="card">
                    <a href="{{ route('posts.show', $post->id) }}">
                        <img src="{{ asset( $post->image) }}" alt="{{ $post->title }}" style="width: 120px;">
                        <h3>{{ $post->title }}</h3>
                        <p>Категория: {{ $post->category }}</p>
                        <p>Теги: {{ $post->tags }}</p>
                    </a>
                </div>
            @endforeach
        @endif
    </div>

</body>
</html>
