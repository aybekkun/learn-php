
<?php
//Запрос к БД через PDO
require_once "setting.php";
//подключение к MySQL
// charset чтобы не летало кодировка чтобы корректно работать с кирилицой;
$connection = new PDO("mysql:host=localhost;dbname=mysite;charset=utf8", "root", "");

//Прямой запрос не безопасен. не спасает от SQL injection
// $query = "INSERT INTO `users`(`name`, `email`, `text`) VALUES ('Bill','bill@gmail.com','Hell')";
// $count = $connection->exec($query);

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
