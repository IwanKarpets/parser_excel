Для запуска с использованием OpenServer или других аналогов, вам необходимо поместить проект в папку, которая доступна из веб-сервера и настроить хост так, чтобы корневой папкой была папка public.
точка входа в приложение папка public файл index.php
Настройка
Для работы приложения необходимо установить зависимости используя Composer. Также вы можете использовать Composer, установленный локально, для этого вам необходимо выполнить следующую команду:
composer install

За конфигурацию приложения отвечают файлы, которые находятся в папке config.

app.php - конфигурация приложения, в том числе хост
database.php - конфигурация базы данных
База данных
Для работы приложения необходимо создать базу данных и импортировать в нее дамп, который находится в папке dump_database.

html код и представления, находятся в папке views: две страницы: home и products.
Роутинг находится в папке config файл routes. Обработка excel файла происходит в папке Controllers файл HomeController,
для обработки excel использовалась библиотека PHPSpreadsheets,
вывод отфильтрованнных данных происходит в файле ProductsController.
Методы взаимодействия с базой данных находятся kernel/Database файл Database.
В файле HomeController метод store, происходит запись в базу данных $this->database()->insert(),
что бы была возможность парсить файл повторно, при запуске Homecontroller  метод index, происходит удаление всех записей из базы данных.
Зависимости: composer require "ext-gd:*" --ignore-platform-reqs
composer require "ext-fileinfo:*" --ignore-platform-reqs
composer require phpoffice/phpspreadsheet --ignore-platform-reqs
при установке PHPspreadsheet мне помогли эти команды, т.к простая попытка установить composer require phpoffice/phpspreadsheet вызывала ошибку
для более удобного вывода кода и дебага установил пакет symphony vardumper, функция dd();
