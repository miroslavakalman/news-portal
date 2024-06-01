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
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('new_users.register.post') }}">
        @csrf
        <div>
            <label for="name">Имя</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="login">Логин</label>
            <input type="text" name="login" id="login" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="password">Пароль</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div>
            <label for="password_confirmation">Повторите пароль</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>
        <button type="submit">Зарегистрироваться</button>
        <a href="/login">Уже зарегистрированы? Войти в систему</a>
    </form>
</body>
</html>
