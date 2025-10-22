Проект (MyLink) Laravel + Filament + Breeze
Проект веб-приложения, построенного на Laravel с использованием Filament Admin Panel и Laravel Breeze для аутентификации.

 Технологии
Backend: Laravel 12.30.1

Frontend: HTML, CSS, JavaScript

Admin Panel: Filament PHP

Authentication: Laravel Breeze

Database: MySQL

Server: WAMP

Предварительные требования
Перед началом работы убедитесь, что у вас установлены:

PHP 8.1+

Composer

Node.js & npm

WAMP Server

Git

Установка и настройка
1. Клонирование репозитория
   bash
   git clone [URL вашего репозитория]
   cd [название папки проекта]
2. Установка PHP зависимостей
   bash
   composer install
3. Установка JavaScript зависимостей
   bash
   npm install
4. Сборка фронтенда
   bash
   npm run build
   npm run dev
5. Настройка окружения
   Скопируйте файл .env.example в .env:

bash
copy .env.example .env
Сгенерируйте ключ приложения:

bash
php artisan key:generate
6. Настройка базы данных в WAMP
   Запустите WAMP Server

Откройте phpMyAdmin (обычно http://localhost/phpmyadmin)

Создайте новую базу данных с именем: individbd

7. Настройка .env файла
   Обновите настройки базы данных в файле .env:

env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=individbd
DB_USERNAME=root
DB_PASSWORD=
8. Запуск миграций и сидеров
   bash
# Запуск миграций
php artisan migrate

# Запуск сидеров (наполнение базы данных)
php artisan db:seed
Или одной командой:

bash
php artisan migrate --seed
9. Создание символической ссылки для хранилища
   bash
   php artisan storage:link
10. Запуск сервера разработки
    bash
    php artisan serve
    Приложение будет доступно по адресу: http://localhost:8000
    

//////////////////////////////
Доступ к главной странице /main

Доступ к админ-панели
После запуска сидеров будет создан административный пользователь:

URL: http://localhost:8000/admin

Email: superadmin@example.com

Password: password

Доступ к пользователю через регистрацию
//////////////////////////////
