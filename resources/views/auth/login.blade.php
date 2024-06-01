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
<form method="POST" action="{{ route('login') }}">
    @csrf

    <div>
        <label for="login">Логин</label>
        <input id="login" type="text" name="login" value="{{ old('login') }}" required autofocus>

        @error('login')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="password">Пароль</label>
        <input id="password" type="password" name="password" required>

        @error('password')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <button type="submit">Войти</button>
    </div>
    <a href="/new-register">Нет аккаунта? Зарегистрироваться</a>

    
</form>
