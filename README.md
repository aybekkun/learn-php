# Знакомства с PDO на практике, запросы к MySQL.

Код выполняет безопасный запрос на добавление записи в таблицу "users" в базе данных MySQL через PDO, используя параметры для предотвращения SQL-инъекций.

Сначала мы задаем значения для переменных $name, $email и $text, затем помещаем их в массив $param с ключами, соответствующими параметрам в запросе.

Запрос на добавление записи формируется в строке $sql, где значения параметров задаются в виде именованных плейсхолдеров (:name, :email, :text).

Далее мы создаем объект запроса $query с помощью метода prepare() и передаем в него наш SQL-запрос.

В итоге, мы выполняем запрос на добавление записи в таблицу, передавая параметры в метод execute() с помощью массива $param.

```php


<?php
//Запрос к БД через PDO
require_once "setting.php";
//подключение к MySQL
// charset чтобы не летало кодировка чтобы корректно работать с кирилицой;
$connection = new PDO("mysql:host=localhost;dbname=mysite;charset=utf8", "root", "");

$name = 'BAndrey';
$email = "h@gmail.com";
$text = "simple text";

$param = [
    'name' => $name,
    'email' => $email,
    'text' => $text
];

$sql =  "INSERT INTO `users`(`name`, `email`, `text`) VALUES (:name,:email,:text)";

$query = $connection->prepare($sql);

$query->execute($param);


```
