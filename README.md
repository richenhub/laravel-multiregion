# Laravel Multiregion Project

Этот проект представляет собой демонстрацию мультирегиональности на Laravel 10 с использованием подпапок для городов.

## Требования

-   PHP >= 8.1
-   Composer
-   MySQL или другая поддерживаемая база данных
-   Расширения PHP: OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, JSON, BCMath

## Установка

1. Клонируйте репозиторий:

`git clone https://github.com/ваше_имя_на_github/имя_репозитория.git`

2. Перейдите в папку проекта:

`cd имя_репозитория`

3. Установите зависимости через Composer:

`composer install`

4. Создайте файл конфигурации .env на основе .env.example:

`cp .env.example .env`

5. Сгенерируйте ключ приложения:

`php artisan key:generate`

6. Настройте параметры подключения к базе данных в файле .env:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

7. Запустите миграции для создания таблиц в базе данных:

`php artisan migrate`

8. Запустите команду для заполнения городов в базу данных (опционально):

`php artisan app:parse-cities`

9. Запустите локальный сервер:

`php artisan serve`

Дефолтный адрес http://localhost:8000/

# Дополнительно

Для очистки и повторного применения миграций используйте:

`php artisan migrate:fresh`
