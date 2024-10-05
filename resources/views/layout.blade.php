<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мультирегиональный сайт</title>
</head>
<body>
    <header>
        @if(session('current_city'))
            <p>Текущий город: {{ session('current_city')->name }}</p>
        @endif
        <nav>
            <a href="{{ route('index') }}">Главная</a>
            <a href="{{ route('about') }}">О нас</a>
            <a href="{{ route('news') }}">Новости</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>