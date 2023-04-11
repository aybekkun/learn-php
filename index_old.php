<?php
//Запрос к БД через PDO
require_once "setting.php";
//подключение к MySQL
// charset чтобы не летало кодировка чтобы корректно работать с кирилицой;
$connection = new PDO("mysql:host=localhost;dbname=mysite;charset=utf8", "root", "");

$query = "INSERT INTO `users`(`name`, `email`, `text`) VALUES ('Bill','bill@gmail.com','Hell')";
$count = $connection->exec($query);

echo $count;
