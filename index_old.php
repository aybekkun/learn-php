<?php

require_once "setting.php";
//подключение к MySQL
$connection = new mysqli($host, $user, $pass, $date);

if ($connection->connect_error) die("Error Connection");

//запрос данных
$query = "SELECT * FROM users";
$result = $connection->query($query);

if (!$result) die("error selecct");

$rows = $result->num_rows;

for ($i = 0; $i < $rows; $i++) {
    $result->data_seek($rows);
    echo 'Name: ' . $result->fetch_assoc()['name'];
}
//закрыт связь с бд
$result->close();
$connection->close();
